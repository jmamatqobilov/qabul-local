<?php

namespace App\Http\Controllers\Ukn;

use App\Exports\EndpointsExport;
use App\Exports\ObjectsExport;
use App\Models\Application;
use App\Models\Document;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\ObjectsRepository;
use App\Repositories\ValidationCommentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ObjectsController extends UknController
{
    public function __construct(
        DocumentsRepository $doc_rep,
        ObjectsRepository $obj_rep,
        ApplicationsRepository $app_rep,
        ValidationCommentsRepository $vcm_rep,
        DirectionsRepository $dir_rep
    )
    {
        parent::__construct();
        $this->app_rep = $app_rep;
        $this->doc_rep = $doc_rep;
        $this->obj_rep = $obj_rep;
        $this->vcm_rep = $vcm_rep;
        $this->dir_rep = $dir_rep;
        $this->template = 'ukn.blank';
        $this->component = config('custom.theme').'.ukn.object.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application = null, $option = null)
    {
        if($option && $option == 'export')
            return Excel::download(new ObjectsExport($this->obj_rep), 'objects.xlsx');
        if(isset($application))
            $this->authorizeAction('hududiy_objects_list', $application);
        $thisUser = Auth::user();
        if(isset($application)){
            $this->title = __('List of Objects');
            $applications = [$application];
        }elseif($thisUser->direction){
            $this->title = __('List of all Objects').' - '.$thisUser->direction->name;
            $applications = $thisUser->direction->applications->filter(function ($value) use ($option) {
                return ($option == 'all' || $value->status->level < 32) && $value->status->level > 19;
            });
        }
        else $this->title = __('List of all Objects');
//        if(($thisUser->direction_id || $thisUser->is_director && !isset($application)) || count($applications) == 0 || $this->authorizeAction('MONITOR',false,true)) {
        if(($thisUser->is_director && !isset($application)) || count($applications) == 0 || $this->authorizeAction('MONITOR',false,true)) {
            $this->template = 'ukn.page';
            $this->icon = 'box';
            $objects = $this->obj_rep->getAllObjectsList($thisUser->direction);
            $this->content = view($this->component . 'full_list')
                ->with([
                    'objects' => $objects,
                    'filters' => $this->obj_rep->getFilterInstance()->drawFilter($thisUser->is_director)
                ])->render();
//            dd('salam');
//            dd($objects);
            return $this->renderOutput(false, 'ukn.objects.index');
        } else
            $this->content = view($this->component.'list')
                ->with(['applications'=>$applications])->render();
//        dd($applications);
        return $this->renderOutput();
    }

    public function create(Application $application)
    {
        abort(403);
    }

    public function store(Request $request, Application $application)
    {
        abort(404);
    }

    public function restore(Application $application, $id)
    {
        $this->authorizeAction('object_restore', $application);
        return $this->repositoryResult(
            $this->obj_rep->restore($application, $id),
            route('ukn.applications.objects.index', ['application' => $application->id])
        );
    }

    public function show(Application $application, $id)
    {
        $this->authorizeAction('hududiy_objects_list', $application);
        $this->template = 'ukn.form';
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
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Application $application, $id)
    {
        $this->authorizeAction('ukn_objects_delete', $application);

        return $this->repositoryResult(
            $this->obj_rep->delete($application, $id),
            route('ukn.applications.objects.index', ['application' => $application->id])
        );
    }
}
