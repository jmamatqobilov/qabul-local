@if($dictionary)
    {!! Html::link(route('admin.dictionaries.values.create', ['dictionary'=>$dictionary->id]), 'Добавить', ['class'=>'btn btn-success']) !!}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{!! __('Dictionary') !!}</th>
            <th scope="col">{!! __('Name') !!}</th>
            <th scope="col">{!! __('Code') !!}</th>
            <th scope="col">{!! __('Actions') !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dictionary->values as $dictionaryValue)
        <tr>
            <th scope="row">
                {!! Html::link(route('admin.dictionaries.values.edit',['value'=>$dictionaryValue->id, 'dictionary'=>$dictionary->id]), $dictionaryValue->id) !!}
            </th>
            <td>
                {!! $dictionaryValue->dictionary->name !!}
            </td>
            <td>{!! $dictionaryValue->name_ru !!}</td>
            <td>{!! $dictionaryValue->code !!}</td>
            <td>
                {!! Form::open(['url'=>route('admin.dictionaries.values.destroy',['dictionary' => $dictionary->id, 'value'=>$dictionaryValue->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{method_field('DELETE')}}
                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endif
