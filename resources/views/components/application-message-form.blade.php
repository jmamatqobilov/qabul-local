<div class="modal fade" id="add_message_to_{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add Message to Application #:id', ['id'=>$application->id]) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => route(Auth::user()->roles->first()->code.'.applications.messages.store', ['application'=> $application->id]), 'method'=>'POST', 'class'=>'form', 'files'=>'true']) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label for="text">{{ __('Text') }}</label>
                    {!! Form::textarea('text', old('text'), ['class' => 'form-control'.($errors->has('text') ? ' is-invalid':'')]) !!}
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class='file-input'>
                    {!! Form::file('attachment', ['class' => 'form-control'.($errors->has('attachment') ? ' is-invalid':'')]) !!}
                    <span class='button'><i data-feather="plus" class="side-icon"></i></span>
                    <span class='label' data-js-label></span>
                    @error('attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
