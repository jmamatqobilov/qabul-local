@if($application)
    <div class="col-md-12">
            <div class="ex-card pt-0 px-0">
                <div class="table-list">
                    <div class="table table-list-header d-flex p-2">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-2">
                                    {{ __('Order #') }}{!! Html::link(route('hududiy.applications.show',['application'=>$application->id]),$application->id)  !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Direction') }}">
                                    {!! $application->direction->name !!}
                                </div>
                                <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('Endpoints Count') }}">
                                    {!! ($application->endpoints->count() ?:'0') !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Applicant') }}">
                                    {!! $application->owner->company_name !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                            @if($application->status->code == 'validation_endpoints')
                                {!! Html::link(route('hududiy.applications.endpoints_declined',['application'=>$application->id]), __('Decline'), ['class'=>'btn btn-round btn-danger']) !!}
                                {!! Html::link(route('hududiy.applications.endpoints_validated',['application'=>$application->id]), __('Validated'), ['class'=>'btn btn-round btn-over']) !!}
                            @endif
                        </div>
                    </div>
                    @if($application->endpoints->count()>0)
                        <div class="table-content">
                            <div class="table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="td-num"><button class="table-action">#</button></th>
                                        <th scope="col"><button class="table-action">{{__('fieldnames.object_type_id')}}</button></th>
                                        <th scope="col"><button class="table-action">{{__('fieldnames.vendor_name')}}</button></th>
                                        <th scope="col"><button class="table-action">{{__('fieldnames.model')}}</button></th>
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
                                                @if(isset($endpoint->object->object_type)) {!! $endpoint->object->object_type->name !!} @endif
                                            </td>
                                            <td>{!! $endpoint->vendor_name !!}</td>
                                            <td>{!! $endpoint->model !!}</td>
                                            <td>
                                                <div class="actions-list">
                                                    <a href="{{ route('hududiy.applications.endpoints.show',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                    @if($application->status->code == 'validation_endpoints' && $application->status->level > 19)
                                                        <a href="{{ route('hududiy.applications.endpoints.edit',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Edit') }}">
                                                            <i data-feather="check-square"></i>
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
    </div>
@endif
