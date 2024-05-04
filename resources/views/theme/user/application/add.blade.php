{!! Form::open(['url' => (isset($application->id)) ? route('user.applications.update', ['application'=>$application->id]) : route('user.applications.store'), 'method'=>'POST', 'class'=>'form','files' => true]) !!}
@if(isset($application) && $application->status->code == 'refill' && $application->deny_comment)
<div class="alert alert-danger" role="alert">{{ __('Deny Comment') }}: {!! $application->deny_comment !!}</div>
@endif
<div class="form-group">
    <label for="hududiy_id">{{ __('Hududiy') }}</label>
    {!! Form::select('hududiy_id', $hududiys ,isset($application->hududiy_id) ? $application->hududiy_id  : '',['class'=>'ex-select ex-select_default dropup'.($errors->has('hududiy_id') ? ' is-invalid':''), 'data-dropup-auto'=>'false']) !!}
    @error('hududiy_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="direction_id">{{ __('Direction') }}</label>
    {!! Form::select('direction_id', $directions ,isset($application->direction_id) ? $application->direction_id  : '',['class'=>'ex-select ex-select_default'.($errors->has('direction_id') ? ' is-invalid':'')]) !!}
    @error('direction_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="objects_count">{{ __('Objects Count') }}</label>
    {!! Form::number('objects_count', isset($application->objects_count) ? $application->objects_count  : old('objects_count'), ['class' => 'form-control'.($errors->has('objects_count') ? ' is-invalid':'')]) !!}
    @error('objects_count')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
{{--<div class="form-group">--}}
{{--    <label for="order">{{ __('Order') }}</label>--}}
{{--        <p>Order</p>--}}
{{--    @if(isset($application->order))--}}
{{--        <div><a href="{!! route('file.get', $application->order->id) !!}">{!! $application->order->file_name !!}</a></div>--}}
{{--    @endif--}}
{{--    <div class='file-input'>--}}
{{--        {!! Form::file('order',['class'=>'form-control-file'.($errors->has('order') ? ' is-invalid':'')]) !!}--}}
{{--        <span class='button'><i data-feather="plus" class="side-icon"></i></span>--}}
{{--        <span class='label' data-js-label></span>--}}
{{--        @error('order')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--    <label for="final_act">{{ __('Final Act') }}</label>--}}
{{--    <p>Final Act</p>--}}
{{--    @if(isset($application->final_act))--}}
{{--        <div><a href="{!! route('file.get', $application->final_act->id) !!}">{!! $application->final_act->file_name !!}</a></div>--}}
{{--    @endif--}}
{{--    <div class='file-input'>--}}
{{--        {!! Form::file('final_act',['class'=>'form-control-file'.($errors->has('final_act') ? ' is-invalid':'')]) !!}--}}
{{--        <span class='button'><i data-feather="plus" class="side-icon"></i></span>--}}
{{--        <span class='label' data-js-label></span>--}}
{{--        @error('final_act')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
<div class="form-group">
        @if(isset($application->id))
            <input type="hidden" name="_method" value="PUT">
        {!! Html::link(route('user.applications.index'),__('Cancel'),['class'=>'btn btn-success btn-round'])  !!}
        @endif
        {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type'=>'submit']) !!}
</div>
{!! Form::close() !!}

