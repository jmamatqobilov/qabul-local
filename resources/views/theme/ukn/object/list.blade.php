@if($applications)
    <div class="col-md-12">
        @foreach($applications as $application)
            <div class="ex-card pt-0 px-0">
                <div class="table-list">
                    <div class="table table-list-header d-flex p-2">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-2">
                                    {{ __('Order #') }}{!! Html::link(route('ukn.applications.show',['application'=>$application->id]),$application->id)  !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Direction') }}">
                                    {!! $application->direction->name !!}
                                </div>
                                <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('Objects Count') }}">
                                    {!! ($application->objects->whereNull('deleted_at')->count() ?:'0') !!} / {!! $application->objects_count !!}
                                </div>
                                <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Hududiy') }}">
                                    {!! $application->hududiy->name !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ route('ukn.applications.endpoints.index',['application'=>$application->id]) }}" class="actions-list-item mr-1 h-auto" data-toggle="tooltip" data-placement="bottom" title="{{ __('Endpoints') }}">
                                <i data-feather="settings"></i>
                            </a>
{{--                            @if($application->objects->whereNull('deleted_at')->count() == $application->objects_count && $application->status->level < 32)--}}
{{--                                {!! Html::link(route('ukn.applications.apply',['application'=>$application->id]), __('Validated'), ['class'=>'btn btn-round btn-over']) !!}--}}
{{--                            @endif--}}
                        </div>
                    </div>
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
                                    @foreach($application->objects as $object)
                                        <tr class="hovered @if($object->deleted_at) bl-danger @endif">
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
                                                    <a href="{{ route('ukn.applications.objects.show',['application'=>$application->id,'object'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                    @if(!Gate::denies('ukn_objects_delete',$application) && !$object->deleted_at)
                                                        {!! Form::open(['url'=>route('ukn.applications.objects.destroy',['application'=>$application->id, 'object'=>$object->id]),'class'=>'form-horizontal','method'=>'POST','onSubmit'=>'return confirm("Are you sure you wish to delete?");']) !!}
                                                        {{method_field('DELETE')}}
                                                        {!! Form::button('<i data-feather="trash-2"></i>',['class'=>'actions-list-item text-danger','type'=>'submit']) !!}
                                                        {!! Form::close() !!}
                                                    @endif
                                                    @if(!Gate::denies('object_restore',$application) && $object->deleted_at)
                                                        <a href="{{ route('ukn.applications.objects.restore',['application'=>$application->id,'object'=>$object->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Restore') }}">
                                                            <i data-feather="share"></i>
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
