@if($menus)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Path</th>
            <th scope="col">Parent</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
        <tr>
            <th scope="row">
                {!! Html::link(route('admin.menus.edit',['menu'=>$menu->id]), $menu->id) !!}
            </th>
            <td>
                {!! $menu->name_ru !!}
            </td>
            <td>{!! $menu->path !!}</td>
            <td>{!! $menu->parent !!}</td>
            <td>
                {!! Form::open(['url'=>route('admin.menus.destroy',['menu'=>$menu->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{method_field('DELETE')}}
                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! Html::link(route('admin.menus.create'), 'Добавить пункт меню') !!}
@endif
