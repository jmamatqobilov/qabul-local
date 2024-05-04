@if($dictionaries)
    {!! Html::link(route('admin.dictionaries.create'), 'Добавить', ['class'=>'btn btn-success']) !!}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{!! __('Direction') !!}</th>
            <th scope="col">{!! __('Name') !!}</th>
            <th scope="col">{!! __('Code') !!}</th>
            <th scope="col">{!! __('ValuesCount') !!}</th>
            <th scope="col">{!! __('Actions') !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dictionaries as $dictionary)
        <tr>
            <th scope="row">
                {!! Html::link(route('admin.dictionaries.edit',['dictionary'=>$dictionary->id]), $dictionary->id) !!}
            </th>
            <td>
                {!! $dictionary->direction->name !!}
            </td>
            <td>{!! $dictionary->name_ru !!}</td>
            <td>{!! $dictionary->code !!}</td>
            <td>{!! $dictionary->values->count() !!}
                {!! Html::link(route('admin.dictionaries.values.index',['dictionary'=>$dictionary->id]),'>',['class'=>'btn btn-success'])  !!}</td>
            <td>{!! Form::open(['url'=>route('admin.dictionaries.destroy',['dictionary'=>$dictionary->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{method_field('DELETE')}}
                    {!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        @if($dictionaries->lastPage() > 1)
            @if($dictionaries->currentPage() !== 1)
                    <li class="page-item"><a class="page-link" href="{{ $dictionaries->url(($dictionaries->currentPage() - 1)) }}">&laquo;</a></li>
            @endif
            @for($i = 1; $i <= $dictionaries->lastPage(); $i++)
                @if($dictionaries->currentPage() == $i)
                        <li class="page-item active">
                            <a class="page-link">{{ $i }}</a>
                        </li>
                @else
                        <li class="page-item"><a class="page-link" href="{{ $dictionaries->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if($dictionaries->currentPage() !== $dictionaries->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $dictionaries->url(($dictionaries->currentPage() + 1)) }}">&raquo;</a></li>
            @endif
        @endif
        </ul>
    </nav>
@endif
