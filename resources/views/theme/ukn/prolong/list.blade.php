@if($application)
    <div class="col-md-12">
        <div class="ex-card pt-0 px-0">
            <div class="table-list">
                <div class="table table-list-header d-flex p-2">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3">
                                {{ __('Order #') }}{!! Html::link(route('ukn.applications.show',['application'=>$application->id]),$application->id)  !!}
                            </div>
                            <div class="col-sm-4" data-toggle="tooltip" data-placement="bottom" title="{{ __('Direction') }}">
                                {!! $application->direction->name !!}
                            </div>
{{--                            <div class="col-sm-5" data-toggle="tooltip" data-placement="bottom" title="{{ __('Status') }}">--}}
{{--                                <span class="badge badge-secondary">{!! $application->status->name !!}</span>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-sm-5" data-toggle="tooltip" data-placement="bottom" title="{{ __('Decree') }}">
                                {!! $application->decree_format !!}
                            </div>
                            <div class="col-sm-2" data-toggle="tooltip" data-placement="bottom" title="{{ __('prolongs Count') }}">
                                {!! ($application->prolongs->whereNull('deleted_at')->count() ?:'0') !!}
                            </div>
                            <div class="col-sm-5" data-toggle="tooltip" data-placement="bottom" title="{{ __('Hududiy') }}">
                                {!! $application->hududiy->name !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if($application->prolongs->count()>0)
                    <div class="table-content">
                        <div class="table-responsive">
                            <table class="table table-default">
                                <thead>
                                <tr>
                                    <th scope="col" class="td-num"><button class="table-action">#</button></th>
                                    <th scope="col"><button class="table-action">{{__('Purpose')}}</button></th>
                                    <th scope="col"><button class="table-action">{{__('Prolong Order')}}</button></th>
                                    <th scope="col"><button class="table-action">{{__('Deadline date')}}</button></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($application->prolongs as $prolong)
                                    <tr class="hovered">
                                        <td scope="row" class="td-num">@if(isset($prolong->decree_num)){!! $prolong->application->decree_num.__('FA-') !!}{!!  $prolong->decree_num  !!}@endif</td>
                                        <td>{!! $prolong->message->text !!}</td>
                                        <td><a href="/{!! $prolong->order !!}" target="_blank">{{ __('File') }}</a></td>
                                        <td>{!! $prolong->deadline_date !!}</td>
                                        <td>
                                            <div class="actions-list">
                                                @if(!Gate::denies('apply',$application) && !isset($prolong->decree_num))
                                                    <a href="{{ route('ukn.applications.prolongs.accept',['application'=>$application->id,'prolong'=>$prolong->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Accept') }}">
                                                        <i data-feather="check"></i>
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
