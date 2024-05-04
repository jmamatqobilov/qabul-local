@if($documents)
    {!! Html::link(route('admin.documents.create'), 'Добавить документ', ['class'=>'btn btn-success']) !!}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Url</th>
            <th scope="col">Owner</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
        <tr>
            <th scope="row">
                {!! $document->id !!}
            </th>
            <td>
                {!! $document->file_name !!}
            </td>
            <td>{!! $document->file_url !!}</td>
            <td>{!! $document->user->company_name !!}</td>
            <td>
                {!! Form::open(['url'=>route('admin.documents.destroy',['document'=>$document->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
        @if($documents->lastPage() > 1)
            @if($documents->currentPage() !== 1)
                    <li class="page-item"><a class="page-link" href="{{ $documents->url(($documents->currentPage() - 1)) }}">&laquo;</a></li>
            @endif
            @for($i = 1; $i <= $documents->lastPage(); $i++)
                @if($documents->currentPage() == $i)
                        <li class="page-item active">
                            <a class="page-link">{{ $i }}</a>
                        </li>
                @else
                        <li class="page-item"><a class="page-link" href="{{ $documents->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if($documents->currentPage() !== $documents->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $documents->url(($documents->currentPage() + 1)) }}">&raquo;</a></li>
            @endif
        @endif
        </ul>
    </nav>
@endif
