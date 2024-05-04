@if($applications)
    <div class="col-md-12">
        @foreach($applications as $application)
            <div class="ex-card pt-0 px-0">
                <div class="table-list">
                    <!-- Head (green)-->
                    <div class="table table-list-header d-flex p-2">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    {{ __('Order #') }}{!! Html::link(route('user.applications.show',['application'=>$application->id]),$application->id)  !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Direction') }}">
                                    {!! $application->direction->name !!}
                                </div>
                                <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('Objects Count') }}">
                                    {!! ($application->objects->whereNull('deleted_at')->count() ?:'0') !!} / {!! $application->objects_count !!}
                                </div>
                                <div class="col-sm-3" data-toggle="tooltip" data-placement="bottom" title="{{ __('Hududiy') }}">
                                    {!! $application->hududiy->name !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                            @if($application->status->level > 19)
                                <a href="{{ route('user.applications.endpoints.index',['application'=>$application->id]) }}" class="actions-list-item mr-1 h-auto" data-toggle="tooltip" data-placement="bottom" title="{{ __('Endpoints') }}">
                                    <i data-feather="settings"></i>
                                </a>
                            @endif
                            @if(!Gate::denies('add_object', $application))
                                {!! Html::link(route('user.applications.objects.create',['application'=>$application->id]), __('Add Object'), ['class'=>'btn btn-round btn-over']) !!}
                            @endif
                        </div>
                    </div>
                    <!-- List -->
                    @if($application->objects->count()>0)
                        <div class="table-content">
                            <div class="table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="td-num"><button class="table-action">#</button></th>
                                        <th scope="col"><button class="table-action">{{__('ObjectType')}}</button></th>
                                        <th scope="col"><button class="table-action">{{__('Address')}}</button></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($application->objects->whereNull('deleted_at') as $object)
{{--                                        @dd(\Illuminate\Support\Facades\Request::is('objects'))--}}
                                        @if ($loop->index == 4 && \Illuminate\Support\Facades\Request::is('objects'))
                                            <div class="text-center view-all-wrapper">
                                                <a class="view-all" href="{{ route('user.applications.objects.index', ['application' => $application->id]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    Barchasini ko'rish
                                                </a>
                                            </div>
                                            @break
                                        @endif
                                        <tr class="hovered">
                                            <td scope="row" class="td-num">
                                                {!!  $object->id  !!}
                                            </td>
                                            <td>
                                                @if(isset($object->object_type)) {!! $object->object_type->name !!} @endif
                                            </td>
                                            <td>
                                                {!! $object->punkt_ustanovki !!}
                                            </td>
                                            <td>
                                                <div class="actions-list">
                                                    <a href="{{ route('user.applications.objects.show',['application'=>$application->id,'object'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                    @if(!Gate::denies('edit_object', $application))
                                                        @if($object->comments->count() > 0)
                                                            <span class="badge badge-pill badge-danger">{!! $object->comments->count() !!}</span>
                                                        @endif
                                                        <a href="{{ route('user.applications.objects.edit',['application'=>$application->id,'object'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Edit') }}">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                        @if(!Gate::denies('add_object', $application))
                                                            <a href="{{ route('user.applications.objects.copy',['application'=>$application->id,'id'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Copy') }}">
                                                                <i data-feather="copy"></i>
                                                            </a>
                                                        @endif
                                                    @endif
{{--                                                    @if(!Gate::denies('delete_object', $application) && !$object->deleted_at)--}}
{{--                                                        {!! Form::open(['url'=>route('user.applications.objects.destroy',['application'=>$application->id, 'object'=>$object->id]),'class'=>'form-horizontal','method'=>'POST','onSubmit'=>'return confirm("'.__('Are you sure you want to delete?').'");']) !!}--}}
{{--                                                        {{method_field('DELETE')}}--}}
{{--                                                        {!! Form::button('<i data-feather="trash-2"></i>',['class'=>'actions-list-item text-danger','type'=>'submit']) !!}--}}
{{--                                                        {!! Form::close() !!}--}}
{{--                                                    @endif--}}
                                                    @if(!Gate::denies('create_endpoint', $application))
                                                        <a href="{{ route('user.applications.endpoints.create',['application'=>$application->id,'option'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Add Endpoint to Object') }}">
                                                            <i data-feather="settings"></i>
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
