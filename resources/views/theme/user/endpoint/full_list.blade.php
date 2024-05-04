@if($endpoints)
    <div class="table-filter">
        @includeIf('includes.filter')
    </div>
{{--    @dd('full_list')--}}
    <div class="table-content">
        <div class="table-responsive">
            <table class="table table-default">
                <thead>
                <tr>
                    <th scope="col" class="td-num">
                        <button class="table-action">{{ __('id') }}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Direction')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('ObjectType')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('fieldnames.vendor_name')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('fieldnames.model')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($endpoints as $endpoint)
                    <tr class="hovered">
                        <td class="td-num">{!! $endpoint->id !!}</td>
{{--                        @dd($endpoint->application->direction->name)--}}
                        <td>{!! $endpoint->application->direction->name !!}</td>
                        <td>{!! $endpoint->object_type->name !!}</td>
                        <td>{!! $endpoint->vendor_name !!}</td>
                        <td>{!! $endpoint->model !!}</td>
                        <td>
                            <div class="actions-list">
                                <a href="{{ route('user.applications.endpoints.show',['application'=>$endpoint->application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
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
            <div class="col-md-10">{{ $endpoints->appends(request()->except('page'))->links() }}</div>
            <div class="col-md-2 text-right">{{ __('Total') }}:{{ $endpoints->total() }}</div>
        </div>
    </div>
@endif

