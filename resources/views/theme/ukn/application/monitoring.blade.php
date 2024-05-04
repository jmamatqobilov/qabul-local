@if($applications)
    <div class="table-filter">
        @includeIf('includes.filter')
    </div>
    <div class="table-content">
        <div class="table-responsive">
            <table class="table table-default">
                <thead>
                <tr>
                    <th scope="col" class="td-num">
                        <button class="table-action">{{ __('id') }}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Decree')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Responsible')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Deadline date')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Left')}}<span class="chevron-filter"></span></button>
                    </th>
{{--                    <th scope="col">--}}
{{--                        <button class="table-action">{{__('Status')}}<span class="chevron-filter"></span></button>--}}
{{--                    </th>--}}
                    <th scope="col">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr class="hovered">
                        <td class="td-num">{!! $application->id !!}</td>
                        <td>{!! $application->decree_format !!}</td>
                        <td>{!! $application->responsible !!}</td>
                        <td>{!! $application->deadline_date !!}</td>
                        <td>
                            @if($application->status->level <32)
                                <div class="text-primary">{!! (\Carbon\Carbon::now()->diff(\Carbon\Carbon::parse($application->deadline_date))->days < 1) ? 'today' : \Carbon\Carbon::parse($application->deadline_date)->diffForHumans(\Carbon\Carbon::now()) !!}</div>
                            @endif
                        </td>
{{--                        <td>--}}
{{--                            <x-status applicationStatus="{{ $application->status->id }}"/>--}}
{{--                        </td>--}}
                        <td>
                            <div class="actions-list">
                                <a href="{{ route('ukn.applications.show',['application'=>$application->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
                                    <i data-feather="eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="table-footer">
        <div class="row align-items-center">
            <div class="col-md-10">{{ $applications->appends(request()->except('page'))->links() }}</div>
            <div class="col-md-2 text-right">{{ __('Total') }}:{{ $applications->total() }}</div>
        </div>
    </div>
@endif
