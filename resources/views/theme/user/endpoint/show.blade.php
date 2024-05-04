<div class="form-group row">
    <label for="objecttype_id" class="col-md-4 text-md-right">{{ __('fieldnames.object_type_id') }}</label>
    <div class="col-md-6">
        {!! $endpoint->object->object_type->name !!}
    </div>
</div>
@if($endpoint->endpoint_type)
    <div class="form-group row">
        <label for="endpoint_type" class="col-md-4 text-md-right">{{ __('fieldnames.endpoint_type') }}</label>
        <div class="col-md-6">
            {!! $endpoint->endpoint_type !!}
        </div>
    </div>
@endif
@if($endpoint->vendor_name)
    <div class="form-group row">
        <label for="vendor_name" class="col-md-4 text-md-right">{{ __('fieldnames.vendor_name') }}</label>
        <div class="col-md-6">
            {!! $endpoint->vendor_name !!}
        </div>
    </div>
@endif
@if($endpoint->model)
    <div class="form-group row">
        <label for="model" class="col-md-4 text-md-right">{{ __('fieldnames.model') }}</label>
        <div class="col-md-6">
            {!! $endpoint->model !!}
        </div>
    </div>
@endif
@if($endpoint->vendor_country)
    <div class="form-group row">
        <label for="vendor_country" class="col-md-4 text-md-right">{{ __('fieldnames.vendor_country') }}</label>
        <div class="col-md-6">
            {!! __('countries.'.$endpoint->vendor_country) !!}
        </div>
    </div>
@endif
@if($endpoint->produce_year)
    <div class="form-group row">
        <label for="produce_year" class="col-md-4 text-md-right">{{ __('fieldnames.produce_year') }}</label>
        <div class="col-md-6">
            {!! $endpoint->produce_year !!}
        </div>
    </div>
@endif
@if($endpoint->ts_assembly_value)
    <div class="form-group row">
        <label for="ts_assembly_value" class="col-md-4 text-md-right">{{ __('fieldnames.ts_assembly_value'.json_decode($endpoint->object->object_type->endpoint_fields, true)['ts_assembly_value']) }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_assembly_value !!}
        </div>
    </div>
@endif
@if($endpoint->ts_cable_length)
    <div class="form-group row">
        <label for="ts_cable_length" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_length'.json_decode($endpoint->object->object_type->endpoint_fields, true)['ts_cable_length']) }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_cable_length !!}
        </div>
    </div>
@endif
@if($endpoint->ts_cable_type_new)
    <div class="form-group row">
        <label for="ts_cable_type_new" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_type') }}</label>
        <div class="col-md-6">
            {!! $dictionaries['values'][$prefixes['t'].'_cable_type'][$endpoint->ts_cable_type_new] !!}
        </div>
    </div>
@endif
@if($endpoint->ts_cable_vols)
    <div class="form-group row">
        <label for="ts_cable_vols" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_vols') }}</label>
        <div class="col-md-6">
            {!! $dictionaries['values'][$prefixes['t'].'_cable_vols'][$endpoint->ts_cable_vols] !!}
        </div>
    </div>
@endif
@if($endpoint->rm_broadcasting_standard)
    <div class="form-group row">
        <label for="rm_broadcasting_standard"
               class="col-md-4 text-md-right">{{ __('fieldnames.rm_broadcasting_standard') }}</label>
        <div class="col-md-6">
            {!! $dictionaries['values'][$prefixes['r'].'_broadcasting_standard'][$endpoint->rm_broadcasting_standard] !!}
        </div>
    </div>
@endif
@if($endpoint->rm_station_power)
    <div class="form-group row">
        <label for="rm_station_power" class="col-md-4 text-md-right">{{ __('fieldnames.rm_station_power') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_station_power !!}
        </div>
    </div>
@endif
@if($endpoint->rm_station_purpose)
    <div class="form-group row">
        <label for="rm_station_purpose"
               class="col-md-4 text-md-right">{{ __('fieldnames.rm_station_purpose') }}</label>
        <div class="col-md-6">
            {!! $dictionaries['values'][$prefixes['r'].'_station_purpose'][$endpoint->rm_station_purpose] !!}
        </div>
    </div>
@endif
@if($endpoint->rm_antenna_type)
    <div class="form-group row">
        <label for="rm_antenna_type" class="col-md-4 text-md-right">{{ __('fieldnames.rm_antenna_type') }}</label>
        <div class="col-md-6">
            {!! $dictionaries['values'][$prefixes['r'].'_antenna_type'][$endpoint->rm_antenna_type] !!}
        </div>
    </div>
@endif
@if($endpoint->rm_antenna_suspension_height)
    <div class="form-group row">
        <label for="rm_antenna_suspension_height"
               class="col-md-4 text-md-right">{{ __('fieldnames.rm_antenna_suspension_height') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_antenna_suspension_height !!}
        </div>
    </div>
@endif
@if($endpoint->rm_transceivers_count)
    <div class="form-group row">
        <label for="rm_transceivers_count"
               class="col-md-4 text-md-right">{{ __('fieldnames.rm_transceivers_count') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_transceivers_count !!}
        </div>
    </div>
@endif
{{--@dd($endpoint->qol_soha)--}}
@if($endpoint->qol_soha)
    <div class="form-group row">
        <label for="qol_soha"
               class="col-md-4 text-md-right">{{ __('fieldnames.qol_soha') }}</label>
        <div class="col-md-6">
            {!! $endpoint->qol_soha !!}
        </div>
    </div>
@endif
{!! Html::link(route('user.applications.endpoints.index', ['application' => $endpoint->application->id]), __('back to list'), ['class'=>'btn btn-warning']) !!}
