@if($applications)
    <div class="col-md-12">
        @foreach($applications as $application)
            <div class="ex-card pt-0 px-0">
                <div class="table-list">
                    <div class="table table-list-header d-flex p-2">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-4">
                                    {{ __('Order #') }}{!! Html::link(route('user.applications.show',['application'=>$application->id]),$application->id)  !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Direction') }}">
                                    {!! $application->direction->name !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Hududiy') }}">
                                    {!! $application->hududiy->name !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5" data-toggle="tooltip" data-placement="bottom" title="{{ __('Decree') }}">
                                    {!! $application->decree_format !!}
                                </div>
                                <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('Endpoints Count') }}">
                                    {!! ($application->endpoints->count() ?:'0') !!}
                                </div>
                                <div class="col-sm-5" data-toggle="tooltip" data-placement="bottom" title="{{ __('Status') }}">
                                    <span class="badge badge-secondary">{!! $application->status->name !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 d-flex align-items-center">
                            @if($application->status->level > 19)
                                <a href="{{ route('user.applications.objects.index',['application'=>$application->id]) }}" class="actions-list-item mr-1 h-auto">
                                    <i data-feather="box"></i>
                                </a>
                            @endif
                            @if($application->status->code == 'refill_endpoints' && $application->status->level > 19)
                                @if(!Gate::denies('create_endpoint', $application))
                                    {!! Html::link(route('user.applications.endpoints.create',['application'=>$application->id]), __('+'), ['class'=>'btn btn-round btn-over']) !!}
                                @endif
                                {!! Html::link(route('user.applications.refill_endpoints_done',['application'=>$application->id]), __('Validate'), ['class'=>'btn btn-round btn-over']) !!}
                            @elseif(!Gate::denies('create_endpoint', $application))
                                {!! Html::link(route('user.applications.endpoints.create',['application'=>$application->id]), __('Add'), ['class'=>'btn btn-round btn-over']) !!}
                            @endif
                        </div>
                    </div>
                    @if($application->endpoints->count()>0)
                        <div class="table-filter">
                            <form class="row">
                                <div class="form-group mb-2 col-md-3">
                                    <select class="ex-select ex-select_default">
                                        <option value="1">for all the time</option>
                                        <option value="2">Ucel</option>
                                        <option value="3">Mobi</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="table-content">
                            <div class="table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="td-num"><button class="table-action">#</button></th>
                                        <th scope="col"><button class="table-action">{{__('fieldnames.object_type_id')}}</button></th>
                                        <th scope="col"><button class="table-action">{{__('fieldnames.vendor_name')}}</button></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($application->endpoints as $endpoint)
                                        <tr class="hovered bl-violet">
                                            <td scope="row" class="td-num">
                                                {!!  $endpoint->id  !!}
                                            </td>
                                            <td>
                                                @if(isset($endpoint->object_type)) {!! $endpoint->object_type->name !!} @endif
                                            </td>
                                            <td>
                                                @if(isset($endpoint->vendor_name)) {!! $endpoint->vendor_name !!} @endif
                                            </td>
                                            <td>
                                                <div class="actions-list">
                                                    <a href="{{ route('user.applications.endpoints.show',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                    @if(!Gate::denies('edit', $endpoint))
                                                        <a href="{{ route('user.applications.endpoints.edit',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="d-block text-center">{!! __('No Data') !!}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endif
