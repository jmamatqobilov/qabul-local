<div class="ex-card px-0">
    <div class="title-content">
        <h3 class="table-list-title text-success">
            <i data-feather="check-circle" class="mr-2"></i> {{ __('Inspections list') }}
        </h3>
    </div>
    <div class="table-content">
        <table class="table table-default">
            <thead>
            <tr>
                <th scope="col">
                    <button class="table-action">{{ __('id') }}</button>
                </th>
                <th scope="col">
                    <button class="table-action">{{ __('Date') }}</button>
                </th>
                <th scope="col">
                    <button class="table-action">{{ __('employees') }}</button>
                </th>
                <th scope="col">
                    <button class="table-action">{{ __('inspection_act') }}</button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($inspections as $inspection)
                <tr>
                    <td class="td-num">{!! $inspection->id !!}</td>
                    <td>{!! $inspection->date !!}</td>
                    <td>{!! $inspection->employees !!}</td>
                    <td><a href="/{!! $inspection->inspection_act !!}" target="_blank">PDF</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-footer">
        <div class="row align-items-center">
            <div class="col-md-6">{{ $inspections->appends(request()->except('page'))->links() }}</div>
        </div>
    </div>
</div>
