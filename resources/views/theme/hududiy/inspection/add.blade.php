{!! Form::open([
    'url' => (isset($inspection)) ? route('hududiy.applications.inspections.update', ['application'=>$application->id, 'inspection' => $inspection->id]) : route('hududiy.applications.inspections.store', ['application'=>$application->id]),
    'method'=>'POST',
    'files' => true
    ]) !!}
<div class="form-group">
    <label for="date">{{ __('Date') }}</label>
    {!! Form::date('date', isset($inspection->date) ? $inspection->date : old('date'), ['class' => 'form-control'.($errors->has('date') ? ' is-invalid':'')]) !!}
    @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="employees">{{ __('Employees') }}</label>
    {!! Form::text('employees', isset($inspection->employees) ? $inspection->employees : old('employees'), ['class' => 'form-control'.($errors->has('employees') ? ' is-invalid':'')]) !!}
    @error('employees')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="{{ $application->direction->code }}'_object_id'">{{ __('Object') }}</label>
    {!! Form::select($object_name, Arr::pluck($application->objects->whereNull('deleted_at'), 'name', 'id'), isset($inspection->$object_name) ? $inspection->$object_name : old($object_name), ['class' => 'form-control'.($errors->has($object_name) ? ' is-invalid':'')]) !!}
    @error($object_name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="inspection_act">{{ __('Inspection Act') }}</label>
    @if(isset($inspection->inspection_act))
        <div class="ex-upload-item">
            <a class="ex-upload-item-box" href="/{!! $inspection->inspection_act !!}" target="_blank">
                <div class="ex-upload-item__header">
                    <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">
                    <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">
                </div>
                <div class="ex-upload-item__content">
                    <div class="ex-upload-item__title">File</div>
                </div>
            </a>
        </div>
    @endif
    <div class='file-input'>
        {!! Form::file('inspection_act', ['class' => 'form-control'.($errors->has('inspection_act') ? ' is-invalid':'')]) !!}
        <span class='button'><i data-feather="plus" class="side-icon"></i></span>
        <span class='label' data-js-label></span>
        @error('inspection_act')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
@if(!isset($inspection))
<div class="photos_to_add">
    <div class="form-group">
        <label for="photo">{{ __('Photo') }}</label>
        {!! Form::file('photo[]', ['class' => 'form-control'.($errors->has('photo.*') ? ' is-invalid':'')]) !!}
        @error('photo.*')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="title">{{ __('Description') }}</label>
        {!! Form::text('title[]', '', ['class' => 'form-control'.($errors->has('title.*') ? ' is-invalid':'')]) !!}
        @error('title.*')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {!! Form::button(__('Add'),['class'=>'btn btn-success','name'=>'add','id'=>'add']) !!}
</div>
    @else
    <input type="hidden" name="_method" value="PUT">
@endif
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        {!! Form::button(__('Save'),['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}
