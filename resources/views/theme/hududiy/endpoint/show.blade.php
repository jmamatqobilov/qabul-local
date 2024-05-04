<div class="form-group row">
    <label for="objecttype_id" class="col-md-4 text-md-right">{{ __('fieldnames.object_type_id') }}</label>
{{--    @dd($object_types)--}}
{{--    @dd($endpoint->object->object_type)--}}
{{--    @dd($object_types[$endpoint->object->object_type->id])--}}
    <div class="col-md-6">
        {!! $endpoint->object->object_type->id == 3 ? 'Uzatish tizimlari / Системы передачи' : $object_types[$endpoint->object->object_type->id] !!}
    </div>
</div>
<div class="form-group row">
    <label for="vendor_name" class="col-md-4 text-md-right">{{ __('fieldnames.vendor_name') }}</label>
    <div class="col-md-6">
        {!! $endpoint->vendor_name !!}
    </div>
</div>
<div class="form-group row">
    <label for="model" class="col-md-4 text-md-right">{{ __('fieldnames.model') }}</label>
    <div class="col-md-6">
        {!! $endpoint->model !!}
    </div>
</div>
<div class="form-group row">
    <label for="vendor_country" class="col-md-4 text-md-right">{{ __('fieldnames.vendor_country') }}</label>
    <div class="col-md-6">
        {!! __('countries.'.$endpoint->vendor_country) !!}
    </div>
</div>
<div class="form-group row">
    <label for="produce_year" class="col-md-4 text-md-right">{{ __('fieldnames.produce_year') }}</label>
    <div class="col-md-6">
        {!! $endpoint->produce_year !!}
    </div>
</div>

@if($endpoint->application->direction->code == 't')

    <div class="form-group row">
        <label for="ts_assembly_value" class="col-md-4 text-md-right">{{ __('fieldnames.ts_assembly_value') }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_assembly_value !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="ts_cable_length" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_length') }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_cable_length !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="ts_cable_type_new" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_type') }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_cable_type_new ? $dictionary_values[$endpoint->application->direction->code.'_cable_type'][$endpoint->ts_cable_type_new] : __('No Answer') !!}
        </div>
    </div>

    <div class="form-group row">
        <label for="ts_cable_vols" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_vols') }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_cable_vols ? $dictionary_values[$endpoint->application->direction->code.'_cable_vols'][$endpoint->ts_cable_vols] : __('No Answer') !!}
        </div>
    </div>

@elseif($endpoint->application->direction->code == 's')
    <div class="form-group row">
        <label for="ts_assembly_value" class="col-md-4 text-md-right">{{ __('fieldnames.ts_assembly_value') }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_assembly_value !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="ts_cable_length" class="col-md-4 text-md-right">{{ __('fieldnames.ts_cable_length') }}</label>
        <div class="col-md-6">
            {!! $endpoint->ts_cable_length !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="qol_soha" class="col-md-4 text-md-right">{{ __('fieldnames.qol_soha') }}</label>
        <div class="col-md-6">
            {!! $endpoint->qol_soha !!}
        </div>
    </div>
@else
{{--    @dd($endpoint)--}}
    <div class="form-group row">
        <label for="rm_broadcasting_standard" class="col-md-4 text-md-right">{{ __('fieldnames.rm_broadcasting_standard') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_broadcasting_standard ? $dictionary_values[$endpoint->application->direction->code.'_broadcasting_standard'][$endpoint->rm_broadcasting_standard] : __('No Answer') !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_station_power" class="col-md-4 text-md-right">{{ __('fieldnames.rm_station_power') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_station_power !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_station_purpose" class="col-md-4 text-md-right">{{ __('fieldnames.rm_station_purpose') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_station_purpose ? $dictionary_values[$endpoint->application->direction->code.'_station_purpose'][$endpoint->rm_station_purpose] : __('No Answer') !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_antenna_type" class="col-md-4 text-md-right">{{ __('fieldnames.rm_antenna_type') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_antenna_type ? $dictionary_values[$endpoint->application->direction->code.'_antenna_type'][$endpoint->rm_antenna_type] : __('No Answer') !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_antenna_suspension_height" class="col-md-4 text-md-right">{{ __('fieldnames.rm_antenna_suspension_height') }}</label>
        <div class="col-md-6">
{{--            @dd($endpoint->rm_antenna_suspension_height)--}}
            {!! $endpoint->rm_antenna_suspension_height !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_transceivers_count" class="col-md-4 text-md-right">{{ __('fieldnames.rm_transceivers_count') }}</label>
        <div class="col-md-6">
            {!! $endpoint->rm_transceivers_count !!}
        </div>
    </div>
@endif
{!! Html::link(route('hududiy.applications.endpoints.index', ['application' => $endpoint->application->id]), __('back to list'), ['class'=>'btn btn-warning']) !!}
