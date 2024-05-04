{!! Form::open([
    'url' => (isset($dictionary->id)) ?
        route('admin.dictionaries.update', ['dictionary'=>$dictionary->id]) :
        route('admin.dictionaries.store'),
    'method'=>'POST',
    'files' => true]) !!}
<div class="form-group row">
    <label for="direction_id" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>
    <div class="col-md-6">
        {!! Form::select('direction_id', $directions ,isset($dictionary->direction_id) ? $dictionary->direction_id  : '',['class'=>'form-control']) !!}
        @error('direction_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name_ru" class="col-md-4 col-form-label text-md-right">{{ __('NameRu') }}</label>
    <div class="col-md-6">
        {!! Form::text('name_ru', isset($dictionary->name_ru) ? $dictionary->name_ru  : old('name_ru'), ['class' => 'form-control']) !!}
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
        {!! Form::text('name_uz', isset($dictionary->name_uz) ? $dictionary->name_uz  : old('name_uz'), ['class' => 'form-control']) !!}
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
        {!! Form::text('code', isset($dictionary->code) ? $dictionary->code  : old('code'), ['class' => 'form-control']) !!}
        @error('code')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if(isset($dictionary->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button('Save',['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}

