{!! Form::open([
    'url' => (isset($menu->id)) ?
        route('admin.menus.update', ['menu'=>$menu->id]) :
        route('admin.menus.store'),
    'method'=>'POST',
    'files' => true]) !!}
<div class="form-group row">
    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    <div class="col-md-6">
        {!! Form::select('role_id', $roles ,isset($menu->role_id) ? $menu->role_id  : '',['class'=>'form-control']) !!}
        @error('role_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="name_ru" class="col-md-4 col-form-label text-md-right">{{ __('NameRu') }}</label>
    <div class="col-md-6">
        {!! Form::text('name_ru', isset($menu->name_ru) ? $menu->name_ru  : old('name_ru'), ['class' => 'form-control']) !!}
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
        {!! Form::text('name_uz', isset($menu->name_uz) ? $menu->name_uz  : old('name_uz'), ['class' => 'form-control']) !!}
        @error('name_uz')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="path" class="col-md-4 col-form-label text-md-right">{{ __('Path') }}</label>
    <div class="col-md-6">
        {!! Form::text('path', isset($menu->path) ? $menu->path  : old('path'), ['class' => 'form-control']) !!}
        @error('path')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="parent" class="col-md-4 col-form-label text-md-right">{{ __('Parent') }}</label>
    <div class="col-md-6">
        {!! Form::text('parent', isset($menu->parent) ? $menu->parent  : old('parent'), ['class' => 'form-control']) !!}
        @error('parent')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        @if(isset($menu->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button('Save',['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}

