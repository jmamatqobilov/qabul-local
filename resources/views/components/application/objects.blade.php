<div class="ex-card px-0">
    <div class="title-content">
        <h3 class="table-list-title text-success">
            <i data-feather="box" class="mr-2"></i> {{ __('Objects list') }}
        </h3>
        <form method="GET">
            <div class="row mb-4">
                <div class="col-auto">
                    <select name="o-object-type" class="ex-select ex-select_default dropdown form-control filter-select">
                        <option disabled selected>{{ __('Object Type') }}</option>
                        @foreach($object_types as $key=>$name)
                            <option @if($current == $key) selected @endif value="{{ $key }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto ml-auto">
                    @if(isset($current))
                        <button class="btn btn-success" name="o-clear-button" value="clear">
                            {{ __('Clear filter') }}
                            <i data-feather="delete"></i>
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <div class="table-content">
        <table class="table table-default">
            <thead>
                <tr>
                    <th scope="col">
                        <button class="table-action">{{__('id')}}</button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('ObjectType')}}</button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Address')}}</button>
                    </th>
                    <th scope="col">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($objects as $object)
                    <tr>
                        <td class="td-num">{!! $object->id !!}</td>
                        <td>{!! $object->object_type->name !!}</td>
                        <td>{{ $object->punkt_ustanovki }}</td>
                        <td>
                            <a href="{{ route(Auth::user()->roles->first()->code.'.applications.objects.show',['application' => $application->id, 'object' => $object->id]) }}" class="actions-list-item">
                                <i data-feather="eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-footer">
        <div class="row align-items-center">
            <div class="col-md-6">{{ $objects->appends(request()->except('page'))->links() }}</div>
        </div>
    </div>
</div>
