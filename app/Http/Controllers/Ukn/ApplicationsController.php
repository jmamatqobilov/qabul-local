<?php

namespace App\Http\Controllers\Ukn;

use App\Http\Requests\ApplicationModerateRequest;
use App\Models\Application;
use App\Http\Requests\ApplicationUserRequest;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\ObjectsRepository;
use App\Repositories\ObjectTypesRepository;
use App\Repositories\ApplicationStatusesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends UknController
{
    public function __construct(
        ObjectTypesRepository $obj_type_rep,
        ObjectsRepository $obj_rep,
        DirectionsRepository $dir_rep,
        DocumentsRepository $doc_rep,
        UsersRepository $u_rep,
        ApplicationsRepository $app_rep,
        ApplicationStatusesRepository $app_status_rep
    )
    {
        parent::__construct();
        $this->obj_type_rep = $obj_type_rep;
        $this->obj_rep = $obj_rep;
        $this->dir_rep = $dir_rep;
        $this->doc_rep = $doc_rep;
        $this->app_status_rep = $app_status_rep;
        $this->usr_rep = $u_rep;
        $this->app_rep = $app_rep;
        $this->template = 'ukn.page';
        $this->icon = 'file';
        $this->component = config('custom.theme').'.ukn.application.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        if(!$this->authorizeAction('MODERATE_APPLICATION',false,true))
            $this->authorizeAction('MONITOR');

        $hasHiddens = true;
        $thisUser = Auth::user();
            $this->title = __('Applications to - ').($thisUser->direction->name ?? '');
        if(isset($thisUser->direction_id))
            $applications = $this->app_rep->getDirections($thisUser->direction_id);
        elseif($thisUser->is_director)
            $applications = $this->app_rep->getDirectors();
        else abort(403);

        $this->content = view($this->component.'list')->with([
            'applications' => $applications,
            'filters'=> $this->app_rep->getFilterInstance()->drawFilter($thisUser->is_director)
        ])->render();
        return $this->renderOutput($hasHiddens);
    }

    public function monitoring(){
        $this->template = 'ukn.page';
        $this->icon = 'activity';
        if(!$this->authorizeAction('MODERATE_APPLICATION',false,true))
            $this->authorizeAction('MONITOR');
        $hasHiddens = true;
        $thisUser = Auth::user();
        $this->title = __('Decrees of - ').($thisUser->direction->name ?? '');
        if(isset($thisUser->direction_id))
            $applications = $this->app_rep->getDecrees4Monitoring($thisUser->direction_id);
        else
            $applications = $this->app_rep->getDecrees4Monitoring();

        $this->content = view($this->component.'monitoring')
            ->with([
                'applications' => $applications,
                'filters'=> $this->app_rep->getFilterInstance()->drawFilter(!isset($thisUser->direction_id))
            ])->render();
        return $this->renderOutput($hasHiddens);
    }

    public function apply(Application $application){
        if($application->objects->whereNull('deleted_at')->count() == $application->objects_count && $application->status->level < 32)
            return $this->repositoryResult(
                $this->app_rep->setStatus($application,'application_closed'),
                route('ukn.applications.index')
            );
        abort(403);
    }
    public function close(Request $request, Application $application){
        $this->authorizeAction('close', $application);

        return $this->repositoryResult(
            $this->app_rep->setStatus($application,'application_closed'),
            route('ukn.applications.index'),
            'ukn.application.closed'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Throwable
     */
    public function create()
    {
        abort(403,__('You can not create an Application'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApplicationUserRequest $request
     * @return Response
     */
    public function store(ApplicationUserRequest $request)
    {
        abort(403, __('You can not create an Application'));
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(Application $application)
    {
        $this->authorizeAction('see', $application);
        $this->template = 'ukn.blank';
        $this->use_map = true;

        $this->title = __('Просмотр уведомления №').$application->id;
        $this->content = view($this->component.'show')
            ->with([
                'application'=>$application,
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Application $application)
    {
        $this->authorizeAction('edit', $application);
        $this->template = 'ukn.form';

        $this->title = __('Прикрепление распоряжения к заявке №').$application->id;
        if($application->status->code == 'request_added' || $application->status->code == 'refill_complete')
            $this->app_rep->setStatus($application, 'application_validation');
        $this->content = view($this->component.'add')
            ->with([
                'application'=>$application,
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ApplicationModerateRequest $request, Application $application)
    {
        $this->authorizeAction('setDecree', $application);

        return $this->repositoryResult(
            $this->app_rep->setDecree($request, $application, $this->doc_rep),
            route('ukn.applications.index'),
            'ukn.application.edit'
        );
    }

    public function map($option = false){
//        dd($option);
        if($option == 'json'){
//            dd('salam');
            return response()->json($this->obj_rep->getObjectPointsToMapArray());
        }
//        dd('here goes');
        $this->template = 'ukn.map';
        $this->title = __('Объекты на карте');
        $this->use_map = true;
        return $this->renderOutput();
    }

    public function pdf(Application $application){
        return view($this->component.'pdf')->with('application',$application);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return Response
     */
    public function destroy(Application $application)
    {
        abort(403,'Only administrator can delete');
    }
}
