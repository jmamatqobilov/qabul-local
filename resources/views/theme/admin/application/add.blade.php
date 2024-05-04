{!! Form::open(['url' => (isset($application->id)) ? route('admin.applications.update', ['application'=>$application->id]) : route('admin.applications.store'), 'method'=>'POST', 'files' => true]) !!}
<div class="form-group row">
    <label for="hududiy_id" class="col-md-4 col-form-label text-md-right">{{ __('Hududiy') }}</label>
    <div class="col-md-6">
        {!! Form::select('hududiy_id', $hududiys ,isset($application->hududiy_id) ? $application->hududiy_id  : '',['class'=>'form-control']) !!}
        @error('hududiy_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="direction_id" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>
    <div class="col-md-6">
        {!! Form::select('direction_id', $directions ,isset($application->direction_id) ? $application->direction_id  : '',['class'=>'form-control']) !!}
        @error('direction_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="objects_count" class="col-md-4 col-form-label text-md-right">{{ __('Objects Count') }}</label>
    <div class="col-md-6">
        {!! Form::number('objects_count', isset($application->objects_count) ? $application->objects_count  : old('objects_count'), ['class' => 'form-control']) !!}
        @error('objects_count')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="order" class="col-md-4 col-form-label text-md-right">{{ __('Order') }}</label>
    <div class="col-md-6">
        @if(isset($application->order))
            <a href="{!! route('file.get', $application->order->id) !!}">{!! $application->order->file_name !!}</a>
        @endif
        {!! Form::hidden('order', isset($application->order) ? $application->order->id  : '') !!}
        {!! Form::file('order_file',['class'=>'form-control-file']) !!}
        @error('order')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="act" class="col-md-4 col-form-label text-md-right">{{ __('Act') }}</label>
    <div class="col-md-6">
        @if(isset($application->act))
            <a href="{!! route('file.get' ,$application->act->id) !!}">{!! $application->act->file_name !!}</a>
        @endif
        {!! Form::hidden('act', isset($application->act) ? $application->act->id  : '') !!}
        {!! Form::file('act_file',['class'=>'form-control-file']) !!}
        @error('act')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="decree_num" class="col-md-4 col-form-label text-md-right">{{ __('Decree Num') }}</label>
    <div class="col-md-6">
        {!! Form::text('decree_num', isset($application->decree_num) ? $application->decree_num  : old('decree_num'), ['class' => 'form-control']) !!}
        @error('decree_num')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="decree_date" class="col-md-4 col-form-label text-md-right">{{ __('Decree Date') }}</label>
    <div class="col-md-6">
        {!! Form::date('decree_date', isset($application->decree_date) ? $application->decree_date  : old('decree_date'), ['class' => 'form-control']) !!}
        @error('decree_date')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="responsible" class="col-md-4 col-form-label text-md-right">{{ __('Responsible') }}</label>
    <div class="col-md-6">
        {!! Form::text('responsible', isset($application->responsible) ? $application->responsible  : old('responsible'), ['class' => 'form-control']) !!}
        @error('responsible')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="deadline_date" class="col-md-4 col-form-label text-md-right">{{ __('Deadline Date') }}</label>
    <div class="col-md-6">
        {!! Form::date('deadline_date', isset($application->deadline_date) ? $application->deadline_date  : old('deadline_date'), ['class' => 'form-control']) !!}
        @error('deadline_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="final_act_id" class="col-md-4 col-form-label text-md-right">{{ __('Final act') }}</label>
    <div class="col-md-6">
        @if(isset($application->final_act))
            <a href="{!! route('file.get', $application->final_act->id) !!}">{!! $application->final_act->file_name !!}</a>
        @endif
        {!! Form::hidden('final_act_id', isset($application->final_act) ? $application->final_act->id  : '') !!}
        {!! Form::file('final_act_file',['class'=>'form-control-file']) !!}
        @error('final_act_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@if(isset($statuses))
<div class="form-group row">
    <label for="status_id" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
    <div class="col-md-6">
        {!! Form::select('status_id', $statuses ,isset($application->status_id) ? $application->status_id  : '',['class'=>'form-control']) !!}
        @error('status_id')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@endif
<div class="form-group row">
    <label for="deny_comment" class="col-md-4 col-form-label text-md-right">{{ __('Deny Comment') }}</label>
    <div class="col-md-6">
        {!! Form::text('deny_comment', isset($application->deny_comment) ? $application->deny_comment  : old('deny_comment'), ['class' => 'form-control']) !!}
        @error('deny_comment')
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

