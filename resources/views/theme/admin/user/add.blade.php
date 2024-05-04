{!! Form::open(['url' => (isset($user->id)) ? route('admin.users.update',['user'=>$user->id]):route('admin.users.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

<div class="form-group row">
	<label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
	<div class="col-md-6">
		{!! Form::select('role_id', $roles, (isset($user)) ? $user->roles()->first()->id : null,['class'=>'form-control']) !!}
		@error('role_id')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>
@if(isset($user) && isset($directions) && isset($territories))
<div class="form-group row">
    <label for="direction_id" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>
    <div class="col-md-6">
        {!! Form::select('direction_id', $directions, (isset($user->direction)) ? $user->direction->id : null,['class'=>'form-control']) !!}

        @error('direction_id')
        <span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="territory_id" class="col-md-4 col-form-label text-md-right">{{ __('Territory') }}</label>
    <div class="col-md-6">
        {!! Form::select('territory_id', $territories, (isset($user->territory)) ? $user->territory->id : null,['class'=>'form-control']) !!}
        @error('territory_id')
            <span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>
    <div class="col-md-6">
        {!! Form::checkbox('is_director', true, (isset($user->is_director) ? $user->is_director : false), ['class'=>'form-control']) !!}
        @error('is_director')
            <span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
        @enderror
    </div>
</div>
@endif
<div class="form-group row">
	<label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
	<div class="col-md-6">
		{!! Form::text('company_name',isset($user->company_name) ? $user->company_name  : old('company_name'), ['class'=>'form-control','placeholder'=>'Введите Company Name']) !!}

		@error('company_name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
	<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
	<div class="col-md-6">
		{!! Form::text('email',isset($user->email) ? $user->email  : old('email'), ['class'=>'form-control','placeholder'=>'Введите E-Mail Address']) !!}

		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
    <div class="col-md-6">
        {!! Form::text('photo',isset($user->photo) ? $user->photo  : old('photo'), ['class'=>'form-control']) !!}
        @error('photo')
            <span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
        @enderror
    </div>
</div>

<div class="form-group row">
	<label for="director_fio" class="col-md-4 col-form-label text-md-right">{{ __('Directors Name') }}</label>
	<div class="col-md-6">
		{!! Form::text('director_fio',isset($user->director_fio) ? $user->director_fio  : old('director_fio'), ['class'=>'form-control','placeholder'=>'Введите Directors Name']) !!}

		@error('director_fio')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
	<label for="inn" class="col-md-4 col-form-label text-md-right">{{ __('INN') }}</label>

	<div class="col-md-6">
		{!! Form::text('inn',isset($user->inn) ? $user->inn  : old('inn'), ['class'=>'form-control','placeholder'=>'Введите INN']) !!}

		@error('inn')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
	<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Company Address') }}</label>
	<div class="col-md-6">
		{!! Form::text('address',isset($user->address) ? $user->address  : old('address'), ['class'=>'form-control','placeholder'=>'Введите Company Address']) !!}

		@error('address')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
	<label for="license" class="col-md-4 col-form-label text-md-right">{{ __('License Number') }}</label>

	<div class="col-md-6">
		{!! Form::text('license',isset($user->license) ? $user->license  : old('license'), ['class'=>'form-control','placeholder'=>'Введите License Number']) !!}

		@error('license')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>

<div class="form-group row">
	<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

	<div class="col-md-6">
		{!! Form::password('password',['class'=>'form-control']) !!}

		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>
<div class="form-group row">
	<label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

	<div class="col-md-6">
		{!! Form::password('password_confirmation',['class'=>'form-control']) !!}

		@error('password_confirmation')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
</div>
		@if(isset($user->id))
			<input type="hidden" name="_method" value="PUT">

		@endif
<div class="form-group row mb-0">
	<div class="col-md-6 offset-md-4">
		{!! Form::button('Сохранить', ['class' => 'btn btn-success','type'=>'submit']) !!}
	</div>
</div>


{!! Form::close() !!}
