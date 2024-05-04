@if($objects)
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
                        <button class="table-action">{{__('Direction')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('ObjectType')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Address')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($objects as $object)
                    <tr class="hovered">
                        <td class="td-num">{!! $object->id !!}</td>
                        <td>{!! $object->application->direction->name !!}</td>
                        <td>{!! $object->object_type->name !!}</td>
                        <td>{!! $object->punkt_ustanovki !!}</td>
                        <td>
                            <div class="actions-list">
                                <a href="{{ route('user.applications.objects.show',['application'=>$object->application->id,'object'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
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
            <div class="col-md-10">{{ $objects->appends(request()->except('page'))->links() }}</div>
            <div class="col-md-2 text-right">{{ __('Total') }}:{{ $objects->total() }}</div>
        </div>
    </div>
@endif

