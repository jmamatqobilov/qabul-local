@if($endpoints)
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
                        <button class="table-action">{{__('Owner')}}<span class="chevron-filter"></span></button>
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
{{--                    <th scope="col">--}}
{{--                        <button class="table-action">{{__('Status')}}<span class="chevron-filter"></span></button>--}}
{{--                    </th>--}}
                    <th scope="col">
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($endpoints as $endpoint)
{{--                    @dd($endpoints, $endpoint, $endpoint->object_type)--}}
                    <tr class="hovered">
                        <td class="td-num">{!! $endpoint->id !!}</td>
                        <td>{!! $endpoint->application->owner->company_name !!}</td>
{{--                        @dd($endpoint->object_type->name)--}}
                        <td>{!! $endpoint->object_type ? $endpoint->object_type->name : __('No Answer') !!}</td>
                        <td>{!! $endpoint->vendor_name !!}</td>
                        <td>{!! $endpoint->model !!}</td>
{{--                        <td>--}}
{{--                            <x-status applicationStatus="{{ $endpoint->application->status->id }}"/>--}}
{{--                        </td>--}}
                        <td>
                            <div class="actions-list">
                                <a href="{{ route('ukn.applications.endpoints.show',['application'=>$endpoint->application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
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

