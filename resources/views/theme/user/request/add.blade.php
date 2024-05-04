{!! Form::open(['url' => route('user.applications.messages.store', ['application'=> $application->id]), 'method'=>'POST', 'class'=>'form']) !!}
<div class="form-group">
    <label for="text">{{ __('Text') }}</label>
    {!! Form::text('text', isset($request->text) ? $request->text  : old('text'), ['class' => 'form-control'.($errors->has('text') ? ' is-invalid':'')]) !!}
    @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type'=>'submit']) !!}
</div>
{!! Form::close() !!}
