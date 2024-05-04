@if($users)
	{!! Html::link(route('admin.users.create'), 'Добавить пользователя', ['class'=>'btn btn-success']) !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">FIO</th>
            <th scope="col">E-mail</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">
                {!! Html::link(route('admin.users.edit',['user'=>$user->id]), $user->id) !!}
            </th>
            <td>
                {{ $user->company_name }}
                @foreach($user->roles as $role)
                    <span class="badge badge-primary">{!! $role->name !!}</span>
                @endforeach
            </td>
            <td>{!! $user->email !!}</td>
            <td>
                {!! Form::open(['url'=>route('admin.users.destroy',['user'=>$user->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                {{method_field('DELETE')}}
                {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->appends(request()->except('page'))->links() }}
@endif
