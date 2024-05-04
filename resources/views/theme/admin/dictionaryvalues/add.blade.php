{!! Form::open([
    'url' => (isset($dictionary_value->id)) ?
            route('admin.dictionaries.values.update', ['dictionary'=> $dictionary->id, 'value'=>$dictionary_value->id]) :
            route('admin.dictionaries.values.store', ['dictionary' => $dictionary->id]),
    'method'=>'POST',
    'files' => true
]) !!}
<div class="form-group row">
    <label for="dictionary_id" class="col-md-4 col-form-label text-md-right">{{ __('Dictionary') }}</label>
    <div class="col-md-6">
		{!! Form::hidden('dictionary_id', isset($dictionary_value->dictionary_id) ? $dictionary_value->dictionary_id  : $dictionary->id, ['class' => 'form-control']) !!}
        {!! $dictionary->name_ru !!}
        @error('dictionary_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name_ru" class="col-md-4 col-form-label text-md-right">{{ __('NameRu') }}</label>
    <div class="col-md-6">
        {!! Form::text('name_ru', isset($dictionary_value->name_ru) ? $dictionary_value->name_ru  : old('name_ru'), ['class' => 'form-control']) !!}
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
        {!! Form::text('name_uz', isset($dictionary_value->name_uz) ? $dictionary_value->name_uz  : old('name_uz'), ['class' => 'form-control']) !!}
        @error('name_uz')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
    <div class="col-md-6">
        {!! Form::text('code', isset($dictionary_value->code) ? $dictionary_value->code  : old('code'), ['class' => 'form-control']) !!}
        @error('code')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if(isset($dictionary_value->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button('Save',['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}

