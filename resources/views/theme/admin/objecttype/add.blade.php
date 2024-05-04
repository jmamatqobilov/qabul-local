{!! Form::open(['url' => (isset($objecttype->id)) ? route('admin.objecttypes.update', ['objecttype'=>$objecttype->id]) : route('admin.objecttypes.store'), 'method'=>'POST', 'files' => true]) !!}
<div class="form-group row">
    <label for="direction" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>
    <div class="col-md-6">
        {!! Form::select('direction_id', $directions ,isset($objecttype->direction_id) ? $objecttype->direction_id  : '',['class'=>'form-control']) !!}
        @error('direction')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name_ru" class="col-md-4 col-form-label text-md-right">{{ __('NameRu') }}</label>
    <div class="col-md-6">
        {!! Form::text('name_ru', isset($objecttype->name_ru) ? $objecttype->name_ru  : old('name_ru'), ['class' => 'form-control']) !!}
        @error('name_ru')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name_uz" class="col-md-4 col-form-label text-md-right">{{ __('NameUz') }}</label>
    <div class="col-md-6">
        {!! Form::text('name_uz', isset($objecttype->name_uz) ? $objecttype->name_uz  : old('name_uz'), ['class' => 'form-control']) !!}
        @error('name_uz')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
    <div class="col-md-6">
        {!! Form::text('code', isset($objecttype->code) ? $objecttype->code  : old('code'), ['class' => 'form-control']) !!}
        @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="endpoint_fields" class="col-md-4 col-form-label text-md-right">{{ __('endpoint_fields') }}</label>
    <div class="col-md-6">
        {!! Form::textarea('endpoint_fields', isset($objecttype->endpoint_fields) ? $objecttype->endpoint_fields  : old('endpoint_fields'), ['class' => 'form-control']) !!}
        @error('endpoint_fields')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if(isset($objecttype->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button('Save',['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}

