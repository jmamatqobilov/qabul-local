{!! Form::open(['url' => (isset($application->id)) ? route('hududiy.applications.update', ['application'=>$application->id]) : '', 'method'=>'POST', 'files' => true]) !!}
<div class="form-group row">
    <label for="hududiy_id" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>
    <div class="col-md-6">
        {!! $application->owner->company_name !!}
    </div>
</div>
<div class="form-group row">
    <label for="direction_id" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>
    <div class="col-md-6">
        {!! $application->direction->name !!}
    </div>
</div>
<div class="form-group row">
    <label for="objects_count" class="col-md-4 col-form-label text-md-right">{{ __('Objects Count') }}</label>
    <div class="col-md-6">
        {!! $application->objects_count !!}
    </div>
</div>
<div class="form-group row">
    <label for="order" class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>
    <div class="col-md-6">
        @if(isset($application->order))
            <a href="{!! route('file.get', $application->order->id) !!}">{!! $application->order->file_name !!}</a>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="act" class="col-md-4 col-form-label text-md-right">{{ __('Act') }}</label>
    <div class="col-md-6">
        @if(isset($application->act))
            <a href="{!! route('file.get', $application->act->id) !!}">{!! $application->act->file_name !!}</a>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Decree') }}</label>
    <div class="col-md-6">
        {!! $application->decree_num.__('-ФА от ').$application->decree_date !!}
    </div>
</div>
<div class="form-group row">
    <label for="inspection_act" class="col-md-4 col-form-label text-md-right">{{ __('Failed issue') }}</label>
    <div class="col-md-6">
        {!! Form::text('failed_issue', old('failed_issue'), ['class'=>'form-control-file']) !!}
        @error('failed_issue')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if(isset($application->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button('Save',['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}
