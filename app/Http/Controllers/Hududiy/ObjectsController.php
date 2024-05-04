<?php

namespace App\Http\Controllers\Hududiy;

use App\Models\Application;
use App\Models\Document;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\ObjectsRepository;
use App\Repositories\ValidationCommentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ObjectsController extends HududiyController
{
    public function __construct(
        DocumentsRepository $doc_rep,
        ObjectsRepository $obj_rep,
        ApplicationsRepository $app_rep,
        ValidationCommentsRepository $vcm_rep
    )
    {
        parent::__construct();
        $this->app_rep = $app_rep;
        $this->doc_rep = $doc_rep;
        $this->obj_rep = $obj_rep;
        $this->vcm_rep = $vcm_rep;
        $this->template = 'hududiy.form';
        $this->icon = 'box';
        $this->component = env('THEME').'.hududiy.object.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application = null, $option = false)
    {
        $thisUser = Auth::user();
        $this->title = __('List of Objects').' - '.$thisUser->territory->name;
        $this->template = 'hududiy.blank';

        if(isset($application)){
            $this->authorizeAction('hududiy_objects_list', $application);
            if($application->status->code == 'object_filling_complete')
                $this->app_rep->setStatus($application, 'validation_objects');
            $applications = [$application];
        }else {
            $applications = $thisUser->territory->applications->filter(function ($value) use ($option) {
                return ($option == 'all' || $value->status->level < 29) && $value->status->level > 19;
            });
        }
//        dd('salam');
//        dd($applications);
//        dd($thisUser->territory);
        if(count($applications) == 0) {
            $this->template = 'ukn.page';
            $this->icon = 'box';
            $objects = $this->obj_rep->getTerritoryObjects($thisUser->territory);
//            dd($objects);
//            dd($this->component . 'full_list');
            $this->content = view($this->component . 'full_list')
                ->with([
                    'objects' => $objects,
                    'filters' => $this->obj_rep->getFilterInstance()->drawFilter(true, true, true, false)
                ])->render();
        }else
            $this->content = view($this->component.'list')
                ->with(['applications'=>$applications])->render();
        return $this->renderOutput();
    }

    public function create(Application $application)
    {
        abort(403);
    }

    public function store(Request $request, Application $application)
    {
        abort(403);
    }

    public function show(Application $application, $id)
    {
        $this->authorizeAction('hududiy_objects_list', $application);
        $this->template = 'hududiy.form';
        $this->use_map = 'true';

        $thisObject = $this->obj_rep->getObject($id, $application, $this->doc_rep);
        $thisFieldsList = $application->getCurrentModel()->getFileAreas();

        if ($application->getCurrentModel()->child_prefix == 't'){
            $thisDocuments = Document::where('t_object_id', $thisObject->id)->get();
        }
        if ($application->getCurrentModel()->child_prefix == 's'){
            $thisDocuments = Document::where('s_object_id', $thisObject->id)->get();
        }
        if ($application->getCurrentModel()->child_prefix == 'r'){
            $thisDocuments = Document::where('r_object_id', $thisObject->id)->get();
        }
        if ($application->getCurrentModel()->child_prefix == 'm'){
            $thisDocuments = Document::where('m_object_id', $thisObject->id)->get();
        }

        $this->title = __('Просмотр объекта #').$thisObject->id;
        $this->content = view($this->component.'show')
            ->with([
                'application' => $application,
                'object' => $thisObject,
                'filefields'=> $thisFieldsList,
                'documents' => $thisDocuments
            ])->render();

        return $this->renderOutput();
    }

    public function edit(Application $application, $id)
    {
        $this->authorizeAction('hududiy_objects_edit', $application);

        $thisObject = $this->obj_rep->getObject($id, $application, $this->doc_rep);
        $thisFieldsList = $application->getCurrentModel()->getFileAreas();
        $this->template = 'hududiy.form';

        $this->title = __('Валидация объекта #').$thisObject->id;
        $this->content = view($this->component.'validate')
            ->with([
                'application' => $application,
                'object' => $thisObject,
                'filefields'=> $thisFieldsList
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Application $application, $id)
    {
        $this->authorizeAction('hududiy_objects_edit', $application);

        $validator = Validator::make($request->all(), $application->getCurrentModel()->getCommentValidationArray());
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        return $this->repositoryResult(
            $this->vcm_rep->setcomments($request, $application, $id),
            route('hududiy.applications.objects.index',['application'=>$application->id])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(403);
    }
}
