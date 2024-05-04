{!! Form::open(['url' => route('admin.documents.store'), 'method'=>'POST', 'files' => true]) !!}
    @csrf

    <div class="form-group row">
        <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>

        <div class="col-md-6">
            {!! Form::file('document',['class'=>'form-control-file']) !!}

            @error('document')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            {!! Form::button('Add',['class'=>'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>
{!! Form::close() !!}
