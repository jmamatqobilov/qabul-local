<?php

namespace App\Http\Controllers\Hududiy;

use App\Http\Requests\ApplicationInspectionActRequest;
use App\Models\Application;
use App\Http\Requests\ApplicationUserRequest;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DocumentsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationsController extends HududiyController
{
    public function __construct(
        DocumentsRepository $doc_rep,
        ApplicationsRepository $app_rep
    )
    {
        parent::__construct();
        $this->doc_rep = $doc_rep;
        $this->app_rep = $app_rep;
        $this->template = 'hududiy.page';
        $this->icon = 'file';
        $this->component = config('custom.theme').'.hududiy.application.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index()
    {
        $this->title = __('Applications to - ').Auth::user()->territory->name;
        $this->hasHiddens = true;

        $applications = $this->app_rep->getHududiys(Auth::user()->territory->id);
        $this->content = view($this->component.'list')
            ->with([
                'applications' => $applications,
                'filters'=> $this->app_rep->getFilterInstance()->drawFilter(true,false)
            ])
            ->render();
        return $this->renderOutput(true);
    }

    public function pdf(Application $application){
        return view($this->component.'pdf')->with('application',$application);
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
        abort(403,__('You can not create an Application'));
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
        $this->template = 'hududiy.blank';
        $this->use_map = true;

        $this->title = __('Просмотр заявки №').$application->id;

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

        $this->title = __('Указание причины провала заявки №').$application->id;
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
    public function update(ApplicationInspectionActRequest $request, Application $application)
    {
        $this->authorizeAction('edit', $application);

        return $this->repositoryResult(
            $this->app_rep->setInspectionAct($request, $application, $this->doc_rep),
            route('ukn.applications.index'),
            'ukn.application.edit'
        );
    }

    public function objects_validated(Application $application)
    {
        if($application->objects->whereNull('deleted_at')->count() == $application->objects_count && $application->status->level < 32)
            return $this->repositoryResult(
                $this->app_rep->setStatus($application,'application_closed'),
                route('hududiy.applications.index')
            );
        abort(403);
    }

    public function endpoints_validated(Application $application)
    {
        $this->authorizeAction('change_status', $application);

        return $this->repositoryResult(
            $this->app_rep->setStatus($application,'on_site_validation'),
            route('hududiy.applications.inspections.index', ['application' => $application->id])
        );
    }

    public function back_to_object_validation(Application $application){
        $this->authorizeAction('change_status', $application);

        return $this->repositoryResult(
            $this->app_rep->setStatus($application,'validation_objects'),
            route('hududiy.applications.objects.index', ['application'=>$application->id])
        );
    }

    public function back_to_endpoint_validation(Application $application){
        $this->authorizeAction('change_status', $application);

        return $this->repositoryResult(
            $this->app_rep->setStatus($application,'validation_endpoints'),
            route('hududiy.applications.endpoints.index', ['application'=>$application->id])
        );
    }

    public function objects_declined(Application $application){
        $this->authorizeAction('change_status', $application);

        return $this->repositoryResult(
            $this->app_rep->setStatus($application,'refill_objects'),
            route('hududiy.applications.index'),
            'hududiy.application.objects_declined'
        );
    }

    public function on_site_validated(Application $application){
        $this->authorizeAction('change_status', $application);

        return $this->repositoryResult(
            $this->app_rep->setStatus($application,'attach_act'),
            route('hududiy.applications.index'),
            'hududiy.application.on_site_validated'
        );
    }

    public function endpoints_declined(Application $application){
        $this->authorizeAction('change_status', $application);

        if($application->status->code != 'on_site_validation' && count($application->endpoints)>0){
            $hasDenyComment = false;
            foreach($application->endpoints as $endpoint){
                if($endpoint->deny_comment)
                    $hasDenyComment = true;
            }
        }else $hasDenyComment = true;
        if(!$hasDenyComment)
            return back()->with('error','You must add at least one deny comment to deny');
        else
            return $this->repositoryResult(
                $this->app_rep->setStatus($application,'refill_endpoints'),
                route('hududiy.applications.index'),
                'hududiy.application.endpoints_declined'
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return Response
     */
    public function destroy(Application $application)
    {
        abort(403);
    }
}
