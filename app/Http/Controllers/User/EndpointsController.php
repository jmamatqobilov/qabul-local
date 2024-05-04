<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\EndpointRequest;
use App\Models\Application;
use App\Models\Endpoint;
use App\Repositories\ApplicationsRepository;
use App\Repositories\DictionariesRepository;
use App\Repositories\EndpointsRepository;
use App\Repositories\ObjectsRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EndpointsController extends UserController
{
    public function __construct(
        ApplicationsRepository $app_rep,
        DictionariesRepository $dic_rep,
        EndpointsRepository $ept_rep
    )
    {
        parent::__construct();
        $this->app_rep = $app_rep;
        $this->ept_rep = $ept_rep;
        $this->dic_rep = $dic_rep;
        $this->template = 'user.page';
        $this->icon = 'tool';
        $this->component = env('THEME').'.user.endpoint.';
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
        $this->title = __('FillEndpoints');
        $this->template = 'user.blank';
        if(isset($application)){
            $this->authorizeAction('endpoints_list', $application);
        }else{
            $applications = $thisUser->applications->filter(function ($value) {
                return ($value->status->code != 'application_closed' && $value->status->level > 19);
            });
            if($applications->count() == 0){
                $this->title = __('List of Endpoints - ').$thisUser->company_name;
                $this->template = 'user.page';
                $this->icon = 'box';
                $endpoints = $this->ept_rep->getUserEndpoints($thisUser);
                $this->content = view($this->component . 'full_list')
                    ->with([
                        'endpoints' => $endpoints,
                        'filters' => $this->ept_rep->getFilterInstance()->drawFilter(true, false, true)
                    ])->render();
                return $this->renderOutput();
            }
        }
        if(!isset($applications)) $applications = [$application];
        $this->content = view($this->component.'list')
            ->with(['applications'=>$applications])->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Application $application
     * @param bool $option
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create(Application $application, $option = null)
    {
        $this->authorizeAction('create_endpoint', $application);
        if($option && is_numeric($option) && $current_object = $application->checkObjectId($option)){
//            dd($current_object->object_type->endpoint_fields);
//            dd($current_object->object_type);
//            dd($current_object->object_type->endpoint_fields);
            $fields = json_decode($current_object->object_type->endpoint_fields);
//            dd($fields);
        }else{
            $current_object = false; $fields = [];
        }
        $object_types = Arr::pluck($application->direction->object_types->toArray(),'name','id');
        $this->title = __('Добавить оборудование');
        $this->template = 'user.endpoint_form';
        $this->content = view($this->component.'add')
            ->with([
                'application' => $application,
                'object_types' => $object_types,
                'current_object' => $current_object,
                'dictionaries' => $this->dic_rep->getDicWithVals(),
                'object_name' => $application->direction->code.'_object_id',
                'prefixes' => ['t' => in_array($application->direction->code, ['t','s']) ? $application->direction->code:'s', 'r' => in_array($application->direction->code, ['r','m']) ? $application->direction->code:'r'],
                'fields' => $fields
            ])->render();
//        dd($this->dic_rep->getDicWithVals());
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EndpointRequest $request, Application $application)
    {
        $this->authorizeAction('create_endpoint', $application);

        return $this->repositoryResult(
            $this->ept_rep->add($request, $application),
            route('user.applications.endpoints.index', ['application' => $application->id])
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
        $this->authorizeAction('show', $endpoint);

        $this->title = __('Просмотр оборудования #').$endpoint->id;
        $object_types = Arr::pluck($application->direction->object_types->toArray(),'name','id');
        $this->content = view($this->component.'show')
            ->with([
                'endpoint' => $endpoint,
                'object_types' => $object_types,
                'dictionaries' => $this->dic_rep->getDicWithVals(),
                'prefixes' => ['t' => in_array($application->direction->code, ['t','s']) ? $application->direction->code:'s', 'r' => in_array($application->direction->code, ['r','m']) ? $application->direction->code:'r']
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
        $this->authorizeAction('edit', $endpoint);
        $this->template = 'user.endpoint_form';

        $object_types = Arr::pluck($application->direction->object_types->toArray(),'name','id');
        $fields = json_decode($endpoint->object->object_type->endpoint_fields);
        $this->title = __('Изменить оборудование #').$endpoint->id;
        $this->content = view($this->component.'add')
            ->with([
                'endpoint' => $endpoint,
                'application' => $application,
                'object_types' => $object_types,
                'current_object' => $endpoint->object,
                'dictionaries' => $this->dic_rep->getDicWithVals(),
                'object_name' => $application->direction->code.'_object_id',
                'fields' => $fields,
                'prefixes' => ['t' => in_array($application->direction->code, ['t','s']) ? $application->direction->code:'s', 'r' => in_array($application->direction->code, ['r','m']) ? $application->direction->code:'r']
            ])->render();
        return $this->renderOutput();
    }

    public function copy(Application $application, Endpoint $endpoint)
    {
        $this->authorizeAction('edit', $endpoint);
        $this->template = 'user.endpoint_form';

        $object_types = Arr::pluck($application->direction->object_types->toArray(),'name','id');
        $fields = json_decode($endpoint->object->object_type->endpoint_fields);
        $this->title = __('Копировать оборудование #').$endpoint->id;
        $this->content = view($this->component.'add')
            ->with([
                'endpoint' => $endpoint,
                'application' => $application,
                'object_types' => $object_types,
                'current_object' => $endpoint->object,
                'dictionaries' => $this->dic_rep->getDicWithVals(),
                'object_name' => $application->direction->code.'_object_id',
                'fields' => $fields,
                'copy' => true,
                'prefixes' => ['t' => in_array($application->direction->code, ['t','s']) ? $application->direction->code:'s', 'r' => in_array($application->direction->code, ['r','m']) ? $application->direction->code:'r']
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
    public function update(EndpointRequest $request, Application $application, Endpoint $endpoint)
    {
        $this->authorizeAction('edit', $endpoint);

        return $this->repositoryResult(
            $this->ept_rep->update($request, $endpoint),
            route('user.applications.endpoints.index', ['application'=>$application->id])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @param Endpoint $endpoint
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Application $application, Endpoint $endpoint)
    {
        $this->authorizeAction('delete', $endpoint);
        return $this->repositoryResult(
            $this->ept_rep->destroy($endpoint),
            route('user.applications.endpoints.index', ['application'=>$application->id])
        );
    }

    public function vendors($option = false)
    {
        return response()->json($this->ept_rep->getVendors());
    }

    public function endpoint_types($option = false)
    {
        return response()->json($this->ept_rep->getEndpointTypes());
    }
}
