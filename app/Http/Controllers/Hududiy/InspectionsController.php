<?php

namespace App\Http\Controllers\Hududiy;

use App\Http\Requests\EndpointModerateRequest;
use App\Http\Requests\EndpointRequest;
use App\Http\Requests\InspectionRequest;
use App\Http\Requests\PhotoRequest;
use App\Models\Application;
use App\Models\Endpoint;
use App\Models\Inspection;
use App\Models\Photo;
use App\Repositories\ApplicationsRepository;
use App\Repositories\InspectionsRepository;
use App\Repositories\PhotosRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class InspectionsController extends HududiyController
{
    public function __construct(
        InspectionsRepository $insp_rep
    )
    {
        parent::__construct();
        $this->insp_rep = $insp_rep;
        $this->template = 'user.page';
        $this->icon = 'check-circle';
        $this->component = env('THEME').'.hududiy.inspection.';
    }

    /**
     * Display a listing of the resource.
     *
     * @param Application|null $application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Application $application)
    {
        $this->title = 'FillInspection - '.$application->owner->company_name;
        $this->template = 'hududiy.blank';
        if(isset($application)){
            $this->authorizeAction('hududiy_inspections_list', $application);
        }else{
            abort(403);
        }

        $this->content = view($this->component.'list')
            ->with(['application'=>$application])->render();
        return $this->renderOutput();
    }

    public function create(Application $application)
    {
        $this->authorizeAction('hududiy_inspections_edit', $application);
        $this->template = 'hududiy.form';

        $this->title = __('Add Inspection to Application #').$application->id;
        $object_name = $application->direction->code.'_object_id';
        $this->content = view($this->component.'add')
            ->with([
                'application' => $application,
                'object_name' => $object_name
            ])->render();
        return $this->renderOutput();
    }

    public function store(InspectionRequest $request, Application $application)
    {
        $this->authorizeAction('hududiy_inspections_edit', $application);

        return $this->repositoryResult(
            $this->insp_rep->add($request, $application),
            route('hududiy.applications.inspections.index', ['application'=>$application->id])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(Application $application, Endpoint $endpoint)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Application $application, Inspection $inspection)
    {
        $this->authorizeAction('hududiy_inspections_edit', $application);
        $this->template = 'hududiy.form';

        $this->title = __('Edit Inspection #').$inspection->id;
        $object_name = $application->direction->code.'_object_id';
        $this->content = view($this->component.'add')
            ->with([
                'application' => $application,
                'inspection' => $inspection,
                'object_name' => $object_name
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EndpointRequest $request
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(InspectionRequest $request, Application $application, Inspection $inspection)
    {
        $this->authorizeAction('hududiy_inspections_edit', $application);

        return $this->repositoryResult(
            $this->insp_rep->edit($request, $inspection),
            route('hududiy.applications.inspections.index', ['application'=>$application->id])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Application $application
     * @param Photo $photo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Application $application, Inspection $inspection)
    {
        $this->authorizeAction('hududiy_inspections_edit', $application);

        return $this->repositoryResult(
            $this->insp_rep->delete($inspection, $application),
            route('hududiy.applications.inspections.index', ['application'=>$application->id])
        );
    }
}
