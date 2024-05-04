@if($applications)
    {!! Html::link(route('admin.applications.create'), 'Подать заявку', ['class'=>'btn btn-success']) !!}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Direction</th>
            <th scope="col">Owner</th>
            <th scope="col">Hududiy</th>
            <th scope="col">Count</th>
            <th scope="col">Decree</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $application)
        <tr>
            <th scope="row">
                {!! Html::link(route('admin.applications.edit',['application'=>$application->id]), $application->id) !!}
                <span class="badge badge-{!! $application->status->class_name !!}">{!! $application->status->name !!}</span>
            </th>
            <td>
                {!! $application->direction->name !!}
            </td>
            <td>{!! $application->owner->company_name !!}</td>
            <td>{!! $application->hududiy->name !!}</td>
            <td>{!! $application->objects_count !!}</td>
            <td>@if($application->decree_num) {!! $application->decree_num.__('-ФА от ').$application->decree_date !!} @endif</td>
            <td>
                {!! Form::open(['url'=>route('admin.applications.destroy',['application'=>$application->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
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
        @if($applications->lastPage() > 1)
            @if($applications->currentPage() !== 1)
                    <li class="page-item"><a class="page-link" href="{{ $applications->url(($applications->currentPage() - 1)) }}">&laquo;</a></li>
            @endif
            @for($i = 1; $i <= $applications->lastPage(); $i++)
                @if($applications->currentPage() == $i)
                        <li class="page-item active">
                            <a class="page-link">{{ $i }}</a>
                        </li>
                @else
                        <li class="page-item"><a class="page-link" href="{{ $applications->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if($applications->currentPage() !== $applications->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $applications->url(($applications->currentPage() + 1)) }}">&raquo;</a></li>
            @endif
        @endif
        </ul>
    </nav>
@endif
