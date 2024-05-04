{!! Form::open(['url' => route('hududiy.applications.photos.store', ['application'=> $application->id]), 'method'=>'POST', 'files' => true]) !!}

<div class="form-group row">
    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
    <div class="col-md-6">
        {!! Form::file('photo', ['class' => 'form-control']) !!}
        @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    <div class="col-md-6">
        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
        @error('title')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        {!! Form::button(__('Save'),['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>

{!! Form::close() !!}
