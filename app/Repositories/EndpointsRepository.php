<?php
namespace App\Repositories;
use App\Filters\EndpointFilters;
use App\Http\Requests\EndpointModerateRequest;
use App\Http\Requests\EndpointRequest;
use App\Models\Application;
use App\Models\Direction;
use App\Models\Endpoint;
use App\User;
use Illuminate\Support\Facades\Gate;


class EndpointsRepository extends Repository {

    public function __construct(Endpoint $endpoint, EndpointFilters $endpointFilters) {
        $this->filter = $endpointFilters;
        $this->model = $endpoint;
    }

    public function getDirectionEndpoints(Direction $direction, $use_paginate = true){
        return $this->get($use_paginate,20,false, ['name'=>'application','field'=>'direction_id','value' => $direction->id]);
    }

    public function getUserEndpoints(User $user){
        return $this->get(true,20,false, ['name'=>'application','field'=>'owner_id','value' => $user->id]);
    }


    public function add(EndpointRequest $endpointrequest, Application $application)
    {
        if (Gate::denies('create_endpoint', $application)) {
            abort(403, __('You dont have permission or status of application is wrong'));
        }

        if ($application->direction->code == 't' || $application->direction->code == 's') {
            $data = $endpointrequest->except([
                'rm_broadcasting_standard', 'rm_station_power', 'rm_station_purpose',
                'rm_antenna_type', 'rm_antenna_suspension_height', 'rm_transceivers_count'
            ]);
        } else {
            $data = $endpointrequest->except([
                'ts_assembly_value', 'ts_cable_length', 'ts_cable_type_new', 'ts_cable_vols'
            ]);
        }

        if (empty($data)) {
            return ['error' => __('No Data')];
        }
        $object_name = $application->direction->code.'_object_id';
        if(!array_key_exists($object_name, $data) || !$data[$object_name] || !$application->checkObjectId($data[$object_name])){
            return ['error' => __('Selected object doesnt become to Application')];
        }

//        dd($data);
        $this->model->fill($data);
//        dd($this->model);
        if ($result = $application->endpoints()->save($this->model)) {
            return $result;
        }
    }

    public function update(EndpointRequest $request, Endpoint $endpoint){
        if(Gate::denies('edit', $endpoint)) {
            abort(403,__('Deny in Repository while update Endpoint'));
        }
        $data = $request->validated();

        if(empty($data)){
            return ['error'=> __('No Data')];
        }

        if($endpoint->fill($data)->update()) {
            return $endpoint;
        }
        return ['error'=> __('Internal Error')];
    }

    public function moderate(EndpointModerateRequest $request, Endpoint $endpoint){
        if(Gate::denies('moderate', $endpoint)) {
            abort(403,__('Deny in Repository while update Endpoint'));
        }
        $data = $request->only('deny_comment');
        if(empty($data)){
            return ['error'=> __('No Data')];
        }
        if($endpoint->fill($data)->update()) {
            return $endpoint;
        }
        return ['error'=> __('Internal Error')];
    }

    public function destroy(Endpoint $endpoint){
        if($endpoint->delete()) {
            return ['status'=>__('Удаление успешно!')];
        }
        return false;
    }

    public function getVendors(){
        $builder = $this->model->select('vendor_name');
        if(request()->filled('q'))
            $builder = $builder->where('vendor_name', 'ilike', '%'.request()->get('q').'%');
        return $builder->distinct()->pluck('vendor_name')->toArray();
    }

    public function getEndpointTypes(){
        $builder = $this->model->select('endpoint_type');
        if(request()->filled('q'))
            $builder = $builder->where('endpoint_type', 'ilike', '%'.request()->get('q').'%');
        return $builder->distinct()->pluck('endpoint_type')->toArray();
    }
}
