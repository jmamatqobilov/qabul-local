<?php

namespace App\Http\Controllers\User;

use App\Models\Application;
use App\Models\Direction;
use App\Models\DObjectType;
use App\Models\Document;
use App\Models\MObject;
use App\Models\ParentObject;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\ObjectsRepository;
use App\Models\RObject;
use App\Models\SObject;
use App\Models\TObject;
use App\Repositories\ObjectTypesRepository;
use App\Repositories\ValidationCommentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ObjectsController extends UserController
{
    public function __construct(
        DocumentsRepository $doc_rep,
        ApplicationsRepository $app_rep,
        ObjectsRepository $obj_rep
    )
    {
        parent::__construct();
        $this->doc_rep = $doc_rep;
        $this->app_rep = $app_rep;
        $this->obj_rep = $obj_rep;
        $this->template = 'user.blank';
        $this->icon = 'box';
        $this->component = env('THEME') . '.user.object.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application = null)
    {
        $thisUser = Auth::user();
        $this->title = __('FillObjects - ') . $thisUser->company_name;
        if (isset($application)) {
            if (
                Gate::denies('ADD_OBJECT') &&
                $thisUser->id != $application->owner_id ||
                !(
                    $application->status->level > 19
                )
            ) {
                abort(403, __('You dont have permission or status of application is wrong'));
            }
            $applications = [$application];
        } else {
            $applications = $thisUser->applications->filter(function ($value) {
                return ($value->status->level < 32 && $value->status->level > 19);
            });
            if ($applications->count() == 0) {
                $this->title = __('List of all Objects') . ' - ' . $thisUser->company_name;
                $this->template = 'user.page';
                $this->icon = 'box';
                $objects = $this->obj_rep->getUserObjects($thisUser);
                $this->content = view($this->component . 'full_list')
                    ->with([
                        'objects' => $objects,
                        'filters' => $this->obj_rep->getFilterInstance()->drawFilter(true, false, true)
                    ])->render();
                return $this->renderOutput();
            }
        }
        $this->content = view($this->component . 'list')
            ->with(['applications' => $applications])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Application $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create(Application $application)
    {
        $this->authorizeAction('add_object', $application);

        $this->template = 'user.form';
        $object_types = Arr::pluck($application->direction->object_types->toArray(), 'name', 'id');
        $this->title = __('Добавить объект');
//        dd($application->direction);
        $this->content = view($this->component . 'add')
            ->with([
                'application' => $application,
                'object_types' => $object_types,
                'filefields' => $application->getCurrentModel()->getFileAreas()
            ])->render();
        return $this->renderOutput(false, false, true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Application $application)
    {
        $this->authorizeAction('add_object', $application);
//dd(request());
        $validator = Validator::make(
            $request->all(),
            $application->getCurrentModel()->getValidationArray(),
            $application->getCurrentModel()->getCustomValidationMessage(),
            $application->getCurrentModel()->getCustomAttributes()
        );
//        dd();
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
//            dd('validation');
        }
//            dd($request, $application, $this->doc_rep);
        $objectModel = $application->getCurrentModel();
//        dd($objectModel);
        return $this->repositoryResult(
            $this->obj_rep->add($request, $application, $this->doc_rep),
            route('user.applications.objects.index', ['application' => $application->id])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(Application $application, $id)
    {
        if (Auth::user()->id != $application->owner_id) {
            abort(403, __('You dont have permission'));
        }
        $this->template = 'user.form';
        $this->use_map = 'true';

        $thisObject = $this->obj_rep->getObject($id, $application, $this->doc_rep);
//        dd($thisObject == TObject);
//        dd($application->getCurrentModel());
//        dd($id, $application, $this->doc_rep);
        $thisFieldsList = $application->getCurrentModel()->getFileAreas();

//        dd($thisObject->id);
//        dd($application->getCurrentModel()->child_prefix);
//dd($application->getCurrentModel());
        if ($application->getCurrentModel()->child_prefix == 't') {
            $thisDocuments = Document::where('t_object_id', $thisObject->id)->get();
        }
        if ($application->getCurrentModel()->child_prefix == 's') {
            $thisDocuments = Document::where('s_object_id', $thisObject->id)->get();
        }
        if ($application->getCurrentModel()->child_prefix == 'r') {
            $thisDocuments = Document::where('r_object_id', $thisObject->id)->get();
        }
        if ($application->getCurrentModel()->child_prefix == 'm') {
            $thisDocuments = Document::where('m_object_id', $thisObject->id)->get();
        }
//dd($thisDocuments);
        $this->title = __('Show Object #') . $thisObject->id;
        $this->content = view($this->component . 'show')
            ->with([
                'application' => $application,
                'object' => $thisObject,
                'filefields' => $thisFieldsList,
                'documents' => $thisDocuments
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Application $application, $id)
    {
        $this->authorizeAction('edit_object', $application);

        $this->template = 'user.form';

        $thisObject = $this->obj_rep->getObject($id, $application, $this->doc_rep);
        $thisFieldsList = $application->getCurrentModel()->getFileAreas();
        $object_types = Arr::pluck($application->direction->object_types->toArray(), 'name', 'id');
//        dd($thisObject->child_prefix);
//        dd($thisObject->documents);

        if ($thisObject->child_prefix == 't') {
            $thisdocuments = Document::where('t_object_id', $thisObject->id)->get();
        }
        if ($thisObject->child_prefix == 's') {
            $thisdocuments = Document::where('s_object_id', $thisObject->id)->get();
        }
        if ($thisObject->child_prefix == 'r') {
            $thisdocuments = Document::where('r_object_id', $thisObject->id)->get();
        }
        if ($thisObject->child_prefix == 'm') {
            $thisdocuments = Document::where('m_object_id', $thisObject->id)->get();
        }

        $this->title = __('Изменить объект #') . $thisObject->id;

        $this->content = view($this->component . 'add')
            ->with([
                'application' => $application,
                'object' => $thisObject,
                'object_types' => $object_types,
                'filefields' => $thisFieldsList,
                'documents' => $thisdocuments
            ])->render();
        return $this->renderOutput(false, false, true);
    }

    public function copy(Application $application, $id)
    {
        $this->authorizeAction('edit_object', $application);
        $this->authorizeAction('add_object', $application);

        $this->template = 'user.form';

        $thisObject = $this->obj_rep->getObject($id, $application, $this->doc_rep);
        $thisFieldsList = $application->getCurrentModel()->getFileAreas();
        $object_types = Arr::pluck($application->direction->object_types->toArray(), 'name', 'id');

        $this->title = __('Копировать объект #') . $thisObject->id;

        $this->content = view($this->component . 'add')
            ->with([
                'application' => $application,
                'object' => $thisObject,
                'object_types' => $object_types,
                'filefields' => $thisFieldsList,
                'copy' => true
            ])->render();
        return $this->renderOutput(false, false, true);
    }

    public function delete_document($doc_id)
    {
        $doc = Document::findOrFail($doc_id);
        $doc->delete();

        return redirect()->back();
    }

    public function delete_old_document($object_type, $object_id, $document_type)
    {
        if ($object_type == 't') {
            $object = TObject::findOrFail($object_id);
        } elseif ($object_type == 's') {
            $object = SObject::findOrFail($object_id);
        } elseif ($object_type == 'r') {
            $object = RObject::findOrFail($object_id);
        } else {
            $object = MObject::findOrFail($object_id);
        }

        $object->$document_type = null;
        $object->save();

        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Application $application
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Application $application, $id)
    {
        $this->authorizeAction('edit_object', $application);

        if ($application->status->code == 'refill_objects')
            $validatorArray = $this->obj_rep->getObjectCommentFields($id, $application);
        else $validatorArray = $application->getCurrentModel()->getValidationArray();

        $validator = Validator::make(
            $request->all(),
            $validatorArray,
            $application->getCurrentModel()->getCustomValidationMessage(),
            $application->getCurrentModel()->getCustomAttributes()
        );
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        return $this->repositoryResult(
            $this->obj_rep->updateobject($request, $application, $id, $this->doc_rep),
            route('user.applications.objects.index', ['application' => $application->id])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @param int $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Application $application, $id)
    {
        $this->authorizeAction('delete_object', $application);
        return $this->repositoryResult(
            $this->obj_rep->delete($application, $id),
            route('user.applications.objects.index', ['application' => $application->id]),
            'object.deleted'
        );
    }
}
