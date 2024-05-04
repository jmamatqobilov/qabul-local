{!! Form::open(['url' => route('hududiy.applications.endpoints.update', ['application'=> $application->id,'endpoint'=>$endpoint->id]), 'method'=>'POST', 'files' => true]) !!}

<div class="form-group row">
    <label for="objecttype_id" class="col-md-4 col-form-label text-md-right">{{ __('fieldnames.object_type_id') }}</label>
    <div class="col-md-6">
        {!! $endpoint->object_type->name !!}
    </div>
</div>
<div class="form-group row">
    <label for="vendor_name" class="col-md-4 col-form-label text-md-right">{{ __('fieldnames.vendor_name') }}</label>
    <div class="col-md-6">
        {!! $endpoint->vendor_name !!}
    </div>
</div>
<div class="form-group row">
    <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('fieldnames.model') }}</label>
    <div class="col-md-6">
        {!! $endpoint->model !!}
    </div>
</div>
<div class="form-group row">
    <label for="vendor_country" class="col-md-4 col-form-label text-md-right">{{ __('fieldnames.vendor_country') }}</label>
    <div class="col-md-6">
        {!! __('countries.'.$endpoint->vendor_country) !!}
    </div>
</div>
<div class="form-group row">
    <label for="produce_year" class="col-md-4 col-form-label text-md-right">{{ __('fieldnames.produce_year') }}</label>
    <div class="col-md-6">
        {!! $endpoint->produce_year !!}
    </div>
</div>

@if($endpoint->application->direction->code == 't' || $endpoint->application->direction->code == 's')
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
            {!! $dictionary_values[$endpoint->application->direction->code.'_cable_type'][$endpoint->ts_cable_type_new] !!}
        </div>
    </div>
@else
    <div class="form-group row">
        <label for="rm_broadcasting_standard" class="col-md-4 text-md-right">{{ __('fieldnames.rm_broadcasting_standard') }}</label>
        <div class="col-md-6">
            {!! $dictionary_values[$endpoint->application->direction->code.'_broadcasting_standard'][$endpoint->rm_broadcasting_standard] !!}
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
            {!! $dictionary_values[$endpoint->application->direction->code.'_station_purpose'][$endpoint->rm_station_purpose] !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_antenna_type" class="col-md-4 text-md-right">{{ __('fieldnames.rm_antenna_type') }}</label>
        <div class="col-md-6">
            {!! $dictionary_values[$endpoint->application->direction->code.'_antenna_type'][$endpoint->rm_antenna_type] !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="rm_antenna_suspension_height" class="col-md-4 text-md-right">{{ __('fieldnames.rm_antenna_suspension_height') }}</label>
        <div class="col-md-6">
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

<div class="form-group row">
    <label for="deny_comment" class="col-md-4 col-form-label text-md-right">{{ __('fieldnames.deny_comment') }}</label>
    <div class="col-md-6">
        {!! Form::text('deny_comment', isset($endpoint->deny_comment) ? $endpoint->deny_comment  : old('deny_comment'), ['class' => 'form-control']) !!}
        @error('deny_comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if(isset($endpoint->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button(__('Save'),['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}
