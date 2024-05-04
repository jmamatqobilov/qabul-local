@if($applications)
{{--    @dd('list')--}}
    <div class="col-md-12">
        @foreach($applications as $application)
            <div class="ex-card pt-0 px-0">
                <div class="table-list">
                    <div class="table table-list-header d-flex p-2">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    {{ __('Order #') }}{!! Html::link(route('user.applications.show',['application'=>$application->id]),$application->id)  !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Direction') }}">
{{--                                    dd($application->direction->name)--}}
                                    {!! $application->direction->name !!}
                                </div>
                                <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('Endpoints Count') }}">
                                    {!! ($application->endpoints->count() ?:'0') !!}
                                </div>
                                <div class="col-sm-3" data-toggle="tooltip" data-placement="bottom" title="{{ __('Hududiy') }}">
                                    {!! $application->hududiy->name !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                            @if($application->status->level > 19)
                                <a href="{{ route('user.applications.objects.index',['application'=>$application->id]) }}" class="actions-list-item mr-1 h-auto" data-toggle="tooltip" data-placement="bottom" title="{{ __('Objects') }}">
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
                                        @if ($loop->index == 4 && \Illuminate\Support\Facades\Request::is('endpoints'))
                                            <div class="text-center view-all-wrapper">
                                                <a class="view-all" href="{{ route('user.applications.endpoints.index', ['application' => $application->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    Barchasini ko'rish
                                                </a>
                                            </div>
                                            @break
                                        @endif
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
                                                    <a href="{{ route('user.applications.endpoints.show',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item"  data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                    @if(!Gate::denies('edit', $endpoint))
                                                        <a href="{{ route('user.applications.endpoints.edit',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Edit') }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                        <a href="{{ route('user.applications.endpoints.copy',['application'=>$application->id,'endpoint'=>$endpoint->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Copy') }}">
                                                            <i data-feather="copy"></i>
                                                        </a>
                                                        @if(!Gate::denies('delete', $endpoint) && !$endpoint->deleted_at)
                                                            {!! Form::open(['url'=>route('user.applications.endpoints.destroy',['application'=>$application->id, 'endpoint'=>$endpoint->id]),'class'=>'form-horizontal','method'=>'POST','onSubmit'=>'return confirm("'.__('Are you sure you want to delete?').'");']) !!}
                                                            {{method_field('DELETE')}}
                                                            {!! Form::button('<i data-feather="trash-2"></i>',['class'=>'actions-list-item text-danger','type'=>'submit']) !!}
                                                            {!! Form::close() !!}
                                                        @endif
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
