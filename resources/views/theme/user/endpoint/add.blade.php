{!! Form::open(['url' => (isset($endpoint->id) && !(isset($copy) && $copy)) ? route('user.applications.endpoints.update', ['application'=> $application->id,'endpoint'=>$endpoint->id]) : route('user.applications.endpoints.store', ['application'=> $application->id]), 'method'=>'POST', 'class'=>'form', 'files' => true]) !!}
@if(isset($application) && isset($endpoint) && $application->status->code == 'refill_endpoints' && $endpoint->deny_comment)
    <div class="alert alert-danger" role="alert">{{ __('Deny Comment') }}: {!! $endpoint->deny_comment !!}</div>
@endif

@if(!isset($current_object) || !$current_object || !is_object($current_object))
    <div class="form-group">

        <label for="{{ $object_name }}">{{ __('Object') }}</label>
        @if(1)
            {!! Form::select('object_id', Arr::pluck($application->objects->whereNull('deleted_at'), 'name', 'id'), isset($endpoint->$object_name) ? $endpoint->$object_name : old($object_name), ['placeholder' => __('Object'), 'redirect_to'=>''.route('user.applications.endpoints.create', ['application'=>$application->id]).'' ,'class' => 'object-select form-control'.($errors->has($object_name) ? ' is-invalid':'')]) !!}
        @elseif(2)
            {!! Form::select('object_id', Arr::pluck($application->objects->whereNull('deleted_at'), 'name', 'id'), isset($endpoint->$object_name) ? $endpoint->$object_name : old($object_name), ['placeholder' => __('Object'), 'redirect_to'=>''.route('user.applications.endpoints.create', ['application'=>$application->id]).'' ,'class' => 'object-select form-control'.($errors->has($object_name) ? ' is-invalid':'')]) !!}
        @elseif(4)
            {!! Form::select('object_id', Arr::pluck($application->objects->whereNull('deleted_at'), 'name', 'id'), isset($endpoint->$object_name) ? $endpoint->$object_name : old($object_name), ['placeholder' => __('Object'), 'redirect_to'=>''.route('user.applications.endpoints.create', ['application'=>$application->id]).'' ,'class' => 'object-select form-control'.($errors->has($object_name) ? ' is-invalid':'')]) !!}
        @else
            {!! Form::select('object_id', Arr::pluck($application->objects->whereNull('deleted_at'), 'name', 'id'), isset($endpoint->$object_name) ? $endpoint->$object_name : old($object_name), ['placeholder' => __('Object'), 'redirect_to'=>''.route('user.applications.endpoints.create', ['application'=>$application->id]).'' ,'class' => 'object-select form-control'.($errors->has($object_name) ? ' is-invalid':'')]) !!}
        @endif
        @error($object_name)
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
@else
    @if($current_object)
        <div class="form-group">
            <label for="{{ $object_name }}">{{ __('Object') }}</label>
            {!! Form::text('', $current_object->name, ['readonly' => 'true', 'class' => 'object-select form-control']) !!}
        </div>
        {!! Form::hidden('hidden', 1) !!}
        <input type="hidden" name="object_type_id" value="{{ $current_object->object_type_id }}">
        {!! Form::hidden($object_name, isset($endpoint->$object_name) ? $endpoint->$object_name : $current_object->id) !!}
    @endif
    <div class="form-group">
        <label for="endpoint_type">{{ __('fieldnames.endpoint_type') }}</label>
        {!! Form::text('endpoint_type', isset($endpoint->endpoint_type) ? $endpoint->endpoint_type : old('endpoint_type'),['class'=>'form-control basicAutoComplete'.($errors->has('endpoint_type') ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('string_tooltip'), 'data-url'=>route('user.endpoint_types.index'), 'autocomplete'=>'off']) !!}
        @error('endpoint_type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
{{--    <div class="form-group">--}}
{{--        <label for="endpoint_type">{{ __('fieldnames.qol_soha') }}</label>--}}
{{--        {!! Form::text('qol_soha', isset($endpoint->qol_soha) ? $endpoint->qol_soha : old('qol_soha'),['class'=>'form-control basicAutoComplete'.($errors->has('qol_soha') ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('string_tooltip'),  'autocomplete'=>'off']) !!}--}}
{{--        @error('qol_soha')--}}
{{--        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>--}}
{{--        @enderror--}}
{{--    </div>--}}
    <div class="form-group">
        <label for="vendor_name">{{ __('fieldnames.vendor_name') }}</label>
        {!! Form::text('vendor_name', isset($endpoint->vendor_name) ? $endpoint->vendor_name  : old('vendor_name'), ['class' => 'form-control basicAutoComplete'.($errors->has('vendor_name') ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('string_tooltip'), 'data-url'=>route('user.vendors.index'), 'autocomplete'=>'off']) !!}
        @error('vendor_name')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="model">{{ __('fieldnames.model') }}</label>
        {!! Form::text('model', isset($endpoint->model) ? $endpoint->model  : old('model'), ['class' => 'form-control'.($errors->has('model') ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('string_tooltip')]) !!}
        @error('model')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="vendor_country">{{ __('fieldnames.vendor_country') }}</label>
        {!! Form::select('vendor_country', __('countries'), (isset($endpoint->vendor_country) ? $endpoint->vendor_country : old('vendor_country')),['class'=>'form-control'.($errors->has('vendor_country') ? ' is-invalid':'')]) !!}
        @error('vendor_country')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="produce_year">{{ __('fieldnames.produce_year') }}</label>
        {!! Form::text('produce_year', isset($endpoint->produce_year) ? $endpoint->produce_year  : old('produce_year'), ['class' => 'form-control'.($errors->has('produce_year') ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('year_tooltip')]) !!}
        @error('produce_year')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
@endif
@foreach($fields as $field=>$val)
{{--    @dd($fields)--}}
    @switch($field)
        @case('ts_assembly_value')
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field  : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('float_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('ts_cable_length')
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field  : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('float_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('ts_cable_length_')
{{--        @dd($field)--}}
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field  : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('float_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        {{--  --}}
        @case('ts_cable_type_new')
        <div class="form-group">
            <label
                    for="ts_cable_type_new">{{ $dictionaries['names'][$prefixes['t'].'_cable_type'] }}</label>
            {!! Form::select($field, $dictionaries['values'][$prefixes['t'].'_cable_type'], (isset($endpoint->$field) ? $endpoint->$field : old($field)),['placeholder' => $dictionaries['names'][$prefixes['t'].'_cable_type'], 'class'=>'form-control'.($errors->has($field) ? ' is-invalid':'')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        {{----}}
        @case('ts_cable_vols')
        <div class="form-group">
            <label
                    for="ts_cable_vols">{{ $dictionaries['names'][$prefixes['t'].'_cable_vols'] }}</label>
            {!! Form::select($field, $dictionaries['values'][$prefixes['t'].'_cable_vols'], (isset($endpoint->$field) ? $endpoint->$field : old($field)),['placeholder' => $dictionaries['names'][$prefixes['t'].'_cable_vols'], 'class'=>'form-control'.($errors->has($field) ? ' is-invalid':'')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        {{-- ---- --}}
        @case('rm_broadcasting_standard')
        <div class="form-group">
            <label
                    for="rm_broadcasting_standard">{{ $dictionaries['names'][$prefixes['r'].'_broadcasting_standard'] }}</label>
            {!! Form::select($field, $dictionaries['values'][$prefixes['r'].'_broadcasting_standard'], (isset($endpoint->$field) ? $endpoint->$field : old($field)),['placeholder'=> $dictionaries['names'][$prefixes['r'].'_broadcasting_standard'],'class'=>'form-control'.($errors->has($field) ? ' is-invalid':'')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('rm_station_power')
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('float_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('rm_station_purpose')
        <div class="form-group">
            <label
                    for="rm_station_purpose">{{ $dictionaries['names'][$prefixes['r'].'_station_purpose'] }}</label>
            {!! Form::select($field, $dictionaries['values'][$prefixes['r'].'_station_purpose'], (isset($endpoint->$field) ? $endpoint->$field : old($field)),['placeholder'=> $dictionaries['names'][$prefixes['r'].'_station_purpose'], 'class'=>'form-control'.($errors->has($field) ? ' is-invalid':'')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('rm_antenna_type')
        <div class="form-group">
            <label for="rm_antenna_type">{{ $dictionaries['names'][$prefixes['r'].'_antenna_type'] }}</label>
            {!! Form::select($field, $dictionaries['values'][$prefixes['r'].'_antenna_type'], (isset($endpoint->$field) ? $endpoint->$field : old($field)),['placeholder'=> $dictionaries['names'][$prefixes['r'].'_antenna_type'],'class'=>'form-control'.($errors->has($field) ? ' is-invalid':'')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('rm_antenna_suspension_height')
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field  : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('float_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('rm_transceivers_count')
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field  : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('int_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
        @case('qol_soha')
        <div class="form-group">
            <label for="{{ $field }}">{{ __('fieldnames.'.$field.$val) }}</label>
            {!! Form::text($field, isset($endpoint->$field) ? $endpoint->$field  : old($field), ['class' => 'form-control'.($errors->has($field) ? ' is-invalid':''), 'data-toggle'=>'tooltip','title'=> __('int_tooltip')]) !!}
            @error($field)
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        @break
    @endswitch
@endforeach
<div class="form-group">
    @if(isset($endpoint->id) && !(isset($copy) && $copy))
        <input type="hidden" name="_method" value="PUT">
        {!! Html::link(route('user.applications.endpoints.index',['application'=>$application->id]),__('Cancel'),['class'=>'btn btn-success btn-round'])  !!}
    @endif
    {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
