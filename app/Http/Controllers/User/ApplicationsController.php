<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ApplicationFinalActRequest;
use App\Models\Application;
use App\Http\Requests\ApplicationUserRequest;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DirectionsRepository;
use App\Repositories\DocumentsRepository;
use App\Repositories\TerritoriesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationsController extends UserController
{
    public function __construct(
        DirectionsRepository $dir_rep,
        DocumentsRepository $doc_rep,
        TerritoriesRepository $ter_rep,
        ApplicationsRepository $app_rep
    )
    {
        parent::__construct();
        $this->dir_rep = $dir_rep;
        $this->doc_rep = $doc_rep;
        $this->ter_rep = $ter_rep;
        $this->app_rep = $app_rep;
        $this->template = 'user.page';
        $this->icon = 'file';
        $this->component = env('THEME').'.user.application.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        $this->title = __('My applications');
        $applications = $this->app_rep->getUsers(Auth::user()->id);
        $this->content = view($this->component.'list')
            ->with([
                'applications' => $applications,
                'filters'=> $this->app_rep->getFilterInstance()->drawFilter()
            ])->render();
        return $this->renderOutput($this->returnButtons('application_add'), true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        $this->authorizeAction('GIVE_APPLICATION');
        $this->icon = 'plus';
        $this->template = 'user.application_form';
        $this->title = __('Добавить уведомление');
        $directions = $this->dir_rep->getToList();
        $hududiys =  $this->ter_rep->getToList();
        $this->content = view($this->component.'add')
            ->with([
                'directions' => $directions,
                'hududiys' => $hududiys
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
        $this->authorizeAction('GIVE_APPLICATION');
        return $this->repositoryResult(
            $this->app_rep->add($request, $this->doc_rep),
            route('user.applications.index'),
            'application.created'
        );
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
        $this->template = 'user.blank';
        $this->use_map = true;
        $this->title = __('My application - #').$application->id;
        $this->content = view($this->component.'show')->with('application',$application)->render();
        return $this->renderOutput();
    }

    public function pdf(Application $application){
        return view($this->component.'pdf')->with('application',$application);
    }

    public function send_to_validate(Application $application){
        $this->authorizeAction('sendToValidate', $application);

        return $this->repositoryResult(
            $this->app_rep->sendToValidate($application),
            route('user.applications.index'),
            'application.send_to_validate'
        );
    }

    public function refill_endpoints_done(Application $application){
        $this->authorizeAction('refill_endpoints_done', $application);

        return $this->repositoryResult(
            $this->app_rep->refill_endpoints_done($application),
            route('user.applications.index'),
            'application.refill_endpoints_done'
        );
    }

    public function attach_act(ApplicationFinalActRequest $finalActRequest, Application $application){
        $this->authorizeAction('attach_act', $application);

        return $this->repositoryResult(
            $this->app_rep->attach_act($finalActRequest, $application, $this->doc_rep),
            route('user.applications.index'),
            'application.attach_act'
        );
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
        $this->icon = 'plus';
        $this->template = 'user.application_form';
        $this->title = __('Edit Application #').$application->id;

        $directions = $this->dir_rep->getToList();
        $hududiys =  $this->ter_rep->getToList('full_name');

        $this->content = view($this->component.'add')
            ->with([
                'application'=>$application,
                'directions'=>$directions,
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
    public function update(ApplicationUserRequest $request, Application $application)
    {
        $this->authorizeAction('edit', $application);

        return $this->repositoryResult(
            $this->app_rep->update($request, $application, $this->doc_rep),
            route('user.applications.index'),
            'application.updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return void
     */
    public function destroy(Application $application)
    {
        abort(403);
    }
}
