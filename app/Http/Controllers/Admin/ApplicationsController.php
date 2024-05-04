<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use App\Http\Requests\ApplicationUserRequest;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\ObjectTypesRepository;
use App\Repositories\ApplicationStatusesRepository;
use App\Repositories\TerritoriesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;

class ApplicationsController extends AdminController
{
    protected $component;

    public function __construct(
        DirectionsRepository $dir_rep,
        DocumentsRepository $doc_rep,
        TerritoriesRepository $ter_rep,
        ApplicationsRepository $app_rep,
        ApplicationStatusesRepository $app_status_rep
    )
    {
        parent::__construct();
        $this->dir_rep = $dir_rep;
        $this->doc_rep = $doc_rep;
        $this->ter_rep = $ter_rep;
        $this->app_rep = $app_rep;
        $this->app_status_rep = $app_status_rep;
        $this->template = 'admin.page';
        $this->component = config('custom.theme').'.admin.application.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        if(Gate::denies('MANAGE_APPLICATIONS')){
            abort(403);
        }
        $this->title = __('Applications manager');

        $applications = $this->app_rep->get();
        $this->content = view($this->component.'list')->with('applications',$applications)->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        if(Gate::denies('MANAGE_APPLICATIONS')){
            abort(403);
        }
        $this->title = __('Add application');

        $directions = Arr::pluck($this->dir_rep->get(false)->toArray(),'name','id');
        $hududiys =  Arr::pluck($this->ter_rep->get(false)->toArray(), 'name', 'id');

        $this->content = view($this->component.'add')
            ->with([
                'directions'=>$directions,
                'hududiys'=>$hududiys
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApplicationUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ApplicationUserRequest $request)
    {
        if(Gate::denies('MANAGE_APPLICATIONS')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->app_rep->add($request, $this->doc_rep),
            route('admin.applications.index')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        abort(403);
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
        if(Gate::denies('MANAGE_APPLICATIONS')){
            abort(403);
        }
        $this->title = __('Change Application #').$application->id;

        $statuses = Arr::pluck($this->app_status_rep->get(false)->toArray(),'name','id');
        $directions = Arr::pluck($this->dir_rep->get(false)->toArray(), 'name', 'id');
        $hududiys =  Arr::pluck($this->ter_rep->get(false)->toArray(), 'name', 'id');


        $this->content = view($this->component.'add')
            ->with([
                'application'=>$application,
                'directions'=>$directions,
                'statuses'=>$statuses,
                'hududiys'=>$hududiys
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
    public function update(Request $request, Application $application)
    {
        if(Gate::denies('MANAGE_APPLICATIONS')){
            abort(403);
        }
        return $this->repositoryResult(
            $this->app_rep->updateApplication($request, $application, $this->doc_rep),
            route('admin.applications.index')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Application $application)
    {
        return $this->repositoryResult(
            $this->app_rep->deleteApplication($application),
            route('admin.applications.index')
        );
    }
}
