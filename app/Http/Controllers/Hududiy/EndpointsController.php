<?php

namespace App\Http\Controllers\Hududiy;

use App\Http\Requests\EndpointModerateRequest;
use App\Http\Requests\EndpointRequest;
use App\Models\Application;
use App\Models\Endpoint;
use App\Repositories\ApplicationsRepository;
use App\Repositories\EndpointsRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EndpointsController extends HududiyController
{
    public function __construct(
        ApplicationsRepository $app_rep,
        EndpointsRepository $ept_rep
    )
    {
        parent::__construct();
        $this->app_rep = $app_rep;
        $this->ept_rep = $ept_rep;
        $this->template = 'hududiy.page';
        $this->icon = 'tool';
        $this->component = env('THEME').'.hududiy.endpoint.';
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
        $this->title = __('Endpoints Moderation - ').$application->owner->company_name;
        $this->template = 'hududiy.blank';
        if(isset($application)){
            $this->authorizeAction('hududiy_endpoints_list', $application);
        }else
            abort(403);

        $this->content = view($this->component.'list')
            ->with(['application'=>$application])->render();
        return $this->renderOutput();
    }

    public function create(Application $application)
    {
        abort(403);
    }

    public function store(EndpointRequest $request, Application $application)
    {
        abort(403);
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
        $this->authorizeAction('moderate', $endpoint);
        $this->title = __('Просмотр объекта #').$endpoint->id;

        $object_types = Arr::pluck($application->direction->object_types->toArray(),'name','id');
        foreach($application->direction->dictionaries as $dic){
            $dictionaries[$dic->code] = $dic->name;
            $dictionary_values[$dic->code] = Arr::pluck($dic->values->toArray(), 'name','id');
        }
        $this->content = view($this->component.'show')
            ->with([
                'endpoint' => $endpoint,
                'object_types' => $object_types,
                'dictionaries' => $dictionaries,
                'dictionary_values' => $dictionary_values
            ])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(Application $application, Endpoint $endpoint)
    {
        $this->authorizeAction('moderate', $endpoint);

        $object_types = Arr::pluck($application->direction->object_types->toArray(),'name','id');
        foreach($application->direction->dictionaries as $dic){
            $dictionaries[$dic->code] = $dic->name;
            $dictionary_values[$dic->code] = Arr::pluck($dic->values->toArray(), 'name','id');
        }
        $this->title = __('Изменить объект #').$endpoint->id;

        $this->content = view($this->component.'add')
            ->with([
                'application' => $application,
                'endpoint' => $endpoint,
                'object_types' => $object_types,
                'dictionaries' => $dictionaries,
                'dictionary_values' => $dictionary_values
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
    public function update(EndpointModerateRequest $request, Application $application, Endpoint $endpoint)
    {
        $this->authorizeAction('moderate', $endpoint);
        return $this->repositoryResult(
            $this->ept_rep->moderate($request, $endpoint),
            route('hududiy.applications.endpoints.index', ['application'=>$application->id])
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
