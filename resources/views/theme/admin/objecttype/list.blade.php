@if($objtypes)
    {!! Html::link(route('admin.objecttypes.create'), 'Добавить тип', ['class'=>'btn btn-success']) !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Direction</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($objtypes as $objtype)
        <tr>
            <th scope="row">
                {!! Html::link(route('admin.objecttypes.edit',['objecttype'=>$objtype->id]), $objtype->id) !!}
            </th>
            <td>
                {!! $objtype->name !!}
            </td>
            <td>{!! $objtype->code !!}</td>
            <td>{!! $objtype->direction->name !!}</td>
            <td>
                {!! Form::open(['url'=>route('admin.objecttypes.destroy',['objecttype'=>$objtype->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{method_field('DELETE')}}
                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $objtypes->appends(request()->except('page'))->links() }}
@endif
