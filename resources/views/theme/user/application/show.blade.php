@if(isset($application) && $application)
<div class="row">
    <div class="col-md-12">
        @if($application->status->code == 'attach_act')
            <h2 class="section-title">{{ __('Attach Act') }}</h2>
            <div class="ex-card">
                {!! Form::open(['url'=>route('user.applications.attach_act',['application'=>$application->id]),'class'=>'form-horizontal','method'=>'POST', 'files' => true]) !!}
                {{method_field('POST')}}
                <div class="form-group">
                    <label for="final_act">{{ __('Final Act') }}</label>
                    @if(isset($application->final_act))
{{--                        <a href="{!! URL::to('/').$application->final_act->file_url !!}">{!! $application->final_act->file_name !!}</a>--}}
                        <a href="{!! route('file.get', $application->final_act->id) !!}">{!! $application->final_act->file_name !!}</a>
                    @endif
                    <div class='file-input'>
                        {!! Form::file('final_act',['class'=>'form-control-file'.($errors->has('final_act') ? ' is-invalid':'')]) !!}
                        <span class='button'><i data-feather="plus" class="side-icon"></i></span>
                        <span class='label' data-js-label></span>
                        @error('final_act')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {!! Form::button(__('Save'),['class'=>'btn btn-round btn-primary','type'=>'submit']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        @endif
        <h2 class="section-title">{{ __('Information') }}</h2>
        <div class="ex-card">
            <div class="info-card">
                <div class="info-card__labels">
                    <div class="info-card__item info-item">
                        <div class="info-item__label">{{ __('ID') }}:</div>
                        <div class="info-item__value">{!! $application->id !!}</div>
                    </div>
                    <div class="info-card__item info-item">
                        <div class="info-item__label">{{ __('Hududiy') }}:</div>
                        <div class="info-item__value">{!! $application->hududiy->name !!}</div>
                    </div>
                    <div class="info-card__item info-item">
                        <div class="info-item__label">{{ __('Direction') }}:</div>
                        <div class="info-item__value">{!! $application->direction->name !!}</div>
                    </div>
                    <div class="info-card__item info-item">
                        <div class="info-item__label">{{ __('Objects Count') }}:</div>
                        <div class="info-item__value">{!! $application->objects_count !!}</div>
                    </div>
                    @if($application->decree_num)
                        <div class="info-card__item info-item">
                            <div class="info-item__label">{{ __('Decree') }}:</div>
                            <div class="info-item__value">{!! $application->decree_format !!}</div>
                        </div>
                        <div class="info-card__item info-item">
                            <div class="info-item__label">{{ __('Deadline date') }}:</div>
                            <div class="info-item__value">{!! $application->deadline_date_format !!}</div>
                        </div>
                    @endif
                </div>
{{--                <div class="info-docs d-flex">--}}
{{--                    @if($application->order)--}}
{{--                        <a href="{{ route('file.get', $application->order->id) }}" class="info-docs__item doc-item" target="_blank">--}}
{{--                            <div class="doc-item__title">{{ __('Order') }}</div>--}}
{{--                            <span class="doc-item__icon"><img src="{{ asset('assets/img/file-pdf.png') }}" alt=""></span>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                    @if($application->act)--}}
{{--                        <a href="{!! asset('storage').'/'. $application->act->file_url !!}" class="info-docs__item doc-item" target="_blank">--}}
{{--                        <a href="{!! route('file.get', $application->act->id) !!}" class="info-docs__item doc-item" target="_blank">--}}
{{--                            <div class="doc-item__title">{{ __('Act') }}</div>--}}
{{--                            <span class="doc-item__icon"><img src="{{ asset('assets/img/file-pdf.png') }}" alt=""></span>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                    @if($application->final_act)--}}
{{--                        <a href="{!! URL::to('/').'/'.$application->final_act->file_url !!}" class="info-docs__item doc-item" target="_blank">--}}
{{--                        <a href="{!! route('file.get', $application->final_act->id) !!}" class="info-docs__item doc-item" target="_blank">--}}
{{--                            <div class="doc-item__title">{{ __('Final Act') }}</div>--}}
{{--                            <span class="doc-item__icon"><img src="{{ asset('assets/img/file-pdf.png') }}" alt=""></span>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                    @if($application->decree_num)--}}
{{--                        <a href="{!! route('user.applications.pdf', ['application' => $application->id]) !!}" class="info-docs__item doc-item" target="_blank">--}}
{{--                            <div class="doc-item__title">{{ __('Decree') }}</div>--}}
{{--                            <span class="doc-item__icon"><img src="{{ asset('assets/img/file-pdf.png') }}" alt=""></span>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
            </div>
        </div>
        @if($application->status->level>19)
        <div class="ex-card">
            <div class="map-tabs">
                <ul class="nav nav-tabs nav-tabs_default mb-4" id="mapTab" role="tablist">
                    @if($application->objects->count()>0)
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_nav_1" data-toggle="tab" href="#tab_1" role="tab" aria-controls="home" aria-selected="true">{{ __('Objects in map') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_nav_2" data-toggle="tab" href="#tab_2" role="tab" aria-controls="profile" aria-selected="false">{{ __('Objects list') }}</a>
                        </li>
                    @endif
                    @if($application->endpoints->count()>0)
                        <li class="nav-item">
                            <a class="nav-link" id="tab_nav_3" data-toggle="tab" href="#tab_3" role="tab" aria-controls="contact" aria-selected="false">{{ __('Endpoints list') }}</a>
                        </li>
                    @endif
                    @if($application->inspections->count()>0)
                        <li class="nav-item">
                            <a class="nav-link" id="tab_nav_4" data-toggle="tab" href="#tab_4" role="tab" aria-controls="contact" aria-selected="false">{{ __('Inspections list') }}</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    @if($application->objects->count()>0)
                        <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2">
                            <x-objects :application="$application"/>
                        </div>
                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                            <x-objects-on-map :application="$application"/>
                        </div>
                    @endif
                    @if($application->endpoints->count()>0)
                        <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="tab_3">
                            <x-endpoints :application="$application"/>
                        </div>
                    @endif
                    @if($application->inspections->count()>0)
                        <div class="tab-pane fade" id="tab_4" role="tabpanel" aria-labelledby="tab_4">
                            <x-inspections :application="$application"/>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endif
{!! Html::link(route('user.applications.index'), __('back to list'), ['class'=>'btn btn-warning back-to-list-button']) !!}
