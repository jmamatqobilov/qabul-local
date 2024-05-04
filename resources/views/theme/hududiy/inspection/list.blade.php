@if($application)
    <div class="col-md-12">
        <div class="ex-card pt-0 px-0">
            <div class="table-list">
                <div class="table table-list-header d-flex p-2">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-3">
                                {{ __('Order #') }}{!! Html::link(route('hududiy.applications.show',['application'=>$application->id]),$application->id)  !!}
                            </div>
                            <div class="col-sm-5" data-toggle="tooltip" data-placement="top" title="{{ __('Direction') }}">
                                {!! $application->direction->name !!}
                            </div>
                            <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Status') }}">
                                <span class="badge badge-secondary">{!! $application->status->name !!}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Decree') }}">
                                {!! $application->decree_format !!}
                            </div>
                            <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('Inspections Count') }}">
                                {!! count($application->inspections) !!}
                            </div>
                            <div class="col-sm-6" data-toggle="tooltip" data-placement="top" title="{{ __('Owner') }}">
                                {!! $application->owner->company_name !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 d-inline-block align-items-center">
                        @if($application->status->code == 'on_site_validation')
                            <a href="{{ route('hududiy.applications.inspections.create',['application'=>$application->id]) }}" class="btn btn-round btn-over" data-toggle="tooltip" data-placement="top" title="{{ __('Add') }}">
                                <span class="d-flex"><i data-feather="plus"></i><i data-feather="check-circle"></i></span>
                            </a>
                            <a href="{{ route('hududiy.applications.on_site_validated',['application'=>$application->id]) }}" class="btn btn-round btn-over" data-toggle="tooltip" data-placement="top" title="{{ __('On Site Validated') }}">
                                <span class="d-flex"><i data-feather="check-circle"></i><i data-feather="thumbs-up"></i></span>
                            </a>
                            <a href="{{ route('hududiy.applications.back_to_object_validation',['application'=>$application->id]) }}" class="btn btn-round btn-danger" data-toggle="tooltip" data-placement="bottom" title="{{ __('Back to Objects Validation') }}">
                                <span class="d-flex"><i data-feather="chevrons-right"></i><i data-feather="box"></i></span>
                            </a>
                            <a href="{{ route('hududiy.applications.back_to_endpoint_validation',['application'=>$application->id]) }}" class="btn btn-round btn-danger" data-toggle="tooltip" data-placement="bottom" title="{{ __('Back to Endpoints Validation') }}">
                                <span class="d-flex"><i data-feather="chevrons-right"></i><i data-feather="settings"></i></span>
                            </a>
                        @endif
                    </div>
                </div>
                @if($application->inspections->count()>0)
                    <div class="table-content">
                            <div class="table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="td-num"><button class="table-action">{{ __('#') }}</button></th>
                                        <th scope="col"><button class="table-action">{{__('Date')}}</button></th>
                                        <th scope="col"><button class="table-action">{{__('Employees')}}</button></th>
                                        <th scope="col"><button class="table-action">{{__('Object')}}</button></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($application->inspections as $inspection)
                                        <tr class="hovered">
                                            <td class="td-num">{!!  $inspection->id  !!}</td>
                                            <td>{!! $inspection->date !!}</td>
                                            <td>{!! $inspection->employees !!}</td>
                                            <td>{!! $inspection->object->punkt_ustanovki !!}</td>
                                            <td>
                                                <div class="actions-list">
                                                    @if($inspection->photos->count()>0 || !Gate::denies('hududiy_inspections_edit', $application))
                                                        <a class="actions-list-item" data-toggle="modal" data-target="#photosModal_{!! $inspection->id !!}" data-toggle="tooltip" data-placement="bottom" title="{{ __('Images') }}">
                                                            <i data-feather="image"></i>
                                                        </a>
                                                    @endif
                                                    @if(!Gate::denies('hududiy_inspections_edit', $application))
                                                        <a href="{{ route('hududiy.applications.inspections.edit',['application'=>$application->id,'inspection' => $inspection->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Edit') }}">
                                                            <i data-feather="check-square"></i>
                                                        </a>
                                                    @elseif($inspection->inspection_act)
                                                        <a href="/{!! $inspection->inspection_act !!}" class="actions-list-item" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ __('Inspection Act') }}">
                                                            <i data-feather="file-text"></i>
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
@if($application)
    @foreach($application->inspections as $inspection)
        @if($inspection->photos->count()>0 || !Gate::denies('hududiy_inspections_edit', $application))
            <div class="modal fade" id="photosModal_{!! $inspection->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Photos') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach($inspection->photos as $photo)
                                <figure class="figure">
                                    {!! Form::open(['url' => route('hududiy.inspections.photos.destroy', ['inspection'=>$inspection->id, 'photo'=>$photo->id]), 'method' => 'DELETE']) !!}
                                    {!! Form::submit('X', ['class'=>'close-button']) !!}
                                    {!! Form::close() !!}
                                    <a href="/{!! $photo->url !!}" data-fancybox="gallery" data-caption="{!! $photo->title !!}">
                                        <img src="/{!! $photo->url_formatted !!}" title="{!! $photo->title !!}" class="figure-img img-fluid rounded img-thumbnail">
                                    </a>
                                    <figcaption class="figure-caption">{!! $photo->title !!}</figcaption>
                                </figure>
                            @endforeach
                        </div>
                        @if(!Gate::denies('hududiy_inspections_edit', $application))
                            {!! Form::open(['url' => route('hududiy.inspections.photos.store', ['inspection'=> $inspection->id]), 'method'=>'POST', 'files' => true]) !!}
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                                <div class="col-md-6">
                                    {!! Form::file('photo', ['class' => 'form-control']) !!}
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                {!! Form::button(__('Save'),['class'=>'btn btn-primary','type'=>'submit']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
