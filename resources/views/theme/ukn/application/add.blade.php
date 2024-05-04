<div class="row mb-3 font-size-md">
    <div class="col-6 text-right text-base-2n">{{ __('Owner') }}</div>
    <div class="col-6">{!! $application->owner->company_name !!}</div>
</div>
<div class="row mb-3">
    <div class="col-6 text-right text-base-2n">{{ __('Hududiy') }}</div>
    <div class="col-6">{!! $application->hududiy->name !!}</div>
</div>
@if($application->status->level < 20)
    <div class="row mb-3">
        <div class="col-6 text-right text-base-2n">{{ __('Objects Count') }}</div>
        <div class="col-6">{!! $application->objects_count !!}</div>
    </div>
@endif
@if(isset($application->order))
    <div class="row mb-3">
        <div class="col-6 text-right text-base-2n">{{ __('Order') }}</div>
        <div class="col-6">
            <div class="ex-upload-item">
                <a class="ex-upload-item-box" href="{!! route('file.get', $application->order->id) !!}" target="_blank">
                    <div class="ex-upload-item__header">
                        <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">
                        <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">
                    </div>
                    <div class="ex-upload-item__content">
                        <div class="ex-upload-item__title">
                            {!! $application->order->file_name !!}
                        </div>
                        <div class="ex-upload-item__date">
                            {!! $application->order->created_at !!}
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif
@if(isset($application->act))
    <div class="row mb-3">
        <div class="col-6 text-right text-base-2n">{{ __('Act') }}</div>
        <div class="col-6">
            <div class="ex-upload-item">
                <a class="ex-upload-item-box" href="{!! route('file.get', $application->act->id) !!}" target="_blank">
                    <div class="ex-upload-item__header">
                        <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">
                        <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">
                    </div>
                    <div class="ex-upload-item__content">
                        <div class="ex-upload-item__title">
                            {!! $application->act->file_name !!}
                        </div>
                        <div class="ex-upload-item__date">
                            {!! $application->act->created_at !!}
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif

{!! Form::open(['url' => (isset($application->id)) ? route('ukn.applications.update', ['application'=>$application->id]) : '', 'method'=>'POST', 'class' => 'form mt-5', 'files' => true]) !!}
@if($application->status->level < 20)
    <div class="form-group">
        <label for="responsible">{{ __('Responsible') }}</label>
        {!! Form::text('responsible', old('responsible') ? old('responsible') : $application->hududiy->director_fio, ['class' => 'form-control'.($errors->has('responsible') ? ' is-invalid':'')]) !!}
        @error('responsible')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="deadline_date">{{ __('Deadline date') }}</label>
        {!! Form::date('deadline_date', isset($application->deadline_date) ? $application->deadline_date  : (old('deadline_date') ? old('deadline_date') : \Carbon\Carbon::now()->addMonth()), ['class' => 'form-control'.($errors->has('deadline_date') ? ' is-invalid':'')]) !!}
        @error('deadline_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="deny_comment">{{ __('Deny Comment') }}</label>
        {!! Form::text('deny_comment', isset($application->deny_comment) ? $application->deny_comment  : old('deny_comment'), ['class' => 'form-control'.($errors->has('deny_comment') ? ' is-invalid':'')]) !!}
        @error('deny_comment')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
@else
    <div class="form-group">
        <label for="objects_count">{{ __('Objects Count') }}</label>
        {!! Form::number('objects_count', old('objects_count') ? old('objects_count') : $application->objects_count, ['class' => 'form-control'.($errors->has('objects_count') ? ' is-invalid':'')]) !!}
        @error('objects_count')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endif
<div class="form-group row mb-0">
    <div class="col-md-12 d-flex justify-content-center">
        @if(isset($application->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        @if($application->status->level > 19)
            {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type' => 'submit', 'name' => 'action', 'value' => 'save']) !!}
        @else
            {!! Form::button(__('Reject'),['class'=>'btn btn-warning btn-round','type' => 'submit', 'name' => 'action', 'value' => 'reject']) !!}
            {!! Form::button(__('Accept'),['class'=>'btn btn-success btn-round','type' => 'submit', 'name' => 'action', 'value' => 'accept']) !!}
        @endif
    </div>
</div>
{!! Form::close() !!}
