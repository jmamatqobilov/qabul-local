@if($applications)
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
                        <button class="table-action">{{__('Owner')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Hududiy')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Count')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                        <button class="table-action">{{__('Create Date')}}<span class="chevron-filter"></span></button>
                    </th>
                    <th scope="col">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr class="hovered @if($application->hasNotification(true)) bl-violet @endif">
                        <td class="td-num">{!! $application->id !!}</td>
                        <td>{!! $application->owner->company_name !!}</td>
                        <td>{!! $application->hududiy->name !!}</td>
                        <td>{!! $application->objects_count !!}</td>
                        <td>
                            <div class="text-primary">{!! $application->created_at !!}</div>
                        </td>
                        <td>
                            <div class="actions-list">
                                @if(!Gate::denies('see', $application))
                                    <a href="{{ route('ukn.applications.show',['application'=>$application->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Show') }}">
                                        <i data-feather="eye"></i>
                                    </a>
                                @endif
                                @if($application->status->level > 14 && !Gate::denies('message_access', $application))
                                    <a href="#" data-toggle="modal" data-target="#messages_modal_{{ $application->id }}" class="actions-list-item text-danger">
                                        <span data-toggle="tooltip" data-placement="bottom" title="{{ __('Mssgs') }}"><i data-feather="message-square"></i></span>
                                    </a>
                                @endif
                                @if(!Gate::denies('edit', $application))
                                    <a href="{{ route('ukn.applications.edit',['application'=>$application->id]) }}" class="actions-list-item text-violet" data-toggle="tooltip" data-placement="bottom" title="{{ __('Edit') }}">
                                        <i data-feather="edit"></i>
                                    </a>
                                @endif
                                @if($application->status->level > 19)
                                    <a href="{{ route('ukn.applications.objects.index',['application'=>$application->id]) }}" class="actions-list-item text-warning" data-toggle="tooltip" data-placement="bottom" title="{{ __('Objects') }}">
                                        <i data-feather="box"></i>
                                    </a>
                                    <a href="{{ route('ukn.applications.endpoints.index',['application'=>$application->id]) }}" class="actions-list-item text-primary" data-toggle="tooltip" data-placement="bottom" title="{{ __('Endpoints') }}">
                                        <i data-feather="settings"></i>
                                    </a>
                                @endif
                                @if($application->prolongs->count() > 0)
                                    <a href="{{ route('ukn.applications.prolongs.index',['application'=>$application->id]) }}" class="actions-list-item" data-toggle="tooltip" data-placement="bottom" title="{{ __('Prolongs') }}">
                                        <i data-feather="clock"></i>
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
    <div class="table-footer">
        <div class="row align-items-center">
            <div class="col-md-10">{{ $applications->appends(request()->except('page'))->links() }}</div>
            <div class="col-md-2 text-right">{{ __('Total') }}:{{ $applications->total() }}</div>
        </div>
    </div>
@endif

@foreach($applications as $application)
    <x-application-messages :application="$application"/>
    <x-application-message-form :application="$application"/>
@endforeach
