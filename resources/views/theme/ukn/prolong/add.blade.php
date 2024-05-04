<div class="row mb-3 font-size-md">
    <div class="col-6 text-right text-base-2n">{{ __('Application') }}</div>
    <div class="col-6"><a href="{{ route('ukn.applications.show', ['application'=>$application->id]) }}">{!! $application->id !!}</a></div>
</div>
<div class="row mb-3 font-size-md">
    <div class="col-6 text-right text-base-2n">{{ __('Owner') }}</div>
    <div class="col-6">{!! $application->owner->company_name !!}</div>
</div>
<div class="row mb-3">
    <div class="col-6 text-right text-base-2n">{{ __('Objects Count') }}</div>
    <div class="col-6">{!! $application->objects_count !!}</div>
</div>
<div class="row mb-3">
    <div class="col-6 text-right text-base-2n">{{ __('Purpose') }}</div>
    <div class="col-6">{!! $extendMessage->text !!}</div>
</div>
{!! Form::open(['url' => route('ukn.applications.prolongs.store', ['application'=>$application->id, 'extendMessage'=>$extendMessage->id]), 'method'=>'POST', 'class' => 'form mt-5', 'files' => true]) !!}
<div class="form-group">
    <label for="order">{{ __('Prolong Order') }}</label>
    @if(isset($extendMessage->attachment))
        <div class="ex-upload-item">
            <a class="ex-upload-item-box" href="/{!! $extendMessage->attachment !!}" target="_blank">
                <div class="ex-upload-item__header">
                    <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">
                    <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">
                </div>
                <div class="ex-upload-item__content">
                    <div class="ex-upload-item__title">{{__('File')}}</div>
                </div>
            </a>
        </div>
    @endif
    <div class='file-input'>
        {!! Form::file('order', ['class' => 'form-control'.($errors->has('order') ? ' is-invalid':'')]) !!}
        <span class='button'><i data-feather="plus" class="side-icon"></i></span>
        <span class='label' data-js-label></span>
        @error('order')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
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
<div class="form-group row mb-0">
    <div class="col-md-12 d-flex justify-content-center">
        {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type' => 'submit', 'name' => 'action', 'value' => 'save']) !!}
    </div>
</div>
{!! Form::close() !!}
