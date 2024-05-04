<div id="messages_modal_{{ $application->id }}" class="modal fixed-left fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-aside" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Application #:id messages', ['id'=>$application->id]) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
{{--            --}}
            <div class="modal-body">
                <ul class="chat">
                    @foreach($application->extendMessages as $message)
                        <li class="{{ ($message->author->current_user ? 'right':'left') }} clearfix">
                            <span class="chat-img float-{{ ($message->author->current_user ? 'right':'left') }}">
                                @if(isset($message->author->photo))
{{--                                    @dd($message->author->company_name)--}}
{{--                                @dd($message->author->photo)--}}
{{--                                @dd(Auth::user()->photo)--}}
                                    <img src="/{!! $message->author->photo !!}"
                                         alt="{{ $message->author->company_name }}" class="img-circle">
                                @else
                                    <img src="{{ asset('assets/img/Avatar.jpg') }}"
                                         alt="{{ Auth::user()->company_name }}" class="img-circle">
                                @endif
                            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="@if($message->author->current_user) float-right @endif primary-font">{{ (($message->author->direction || $message->author->territory) ? $message->author->company_name:$message->author->director_fio) }}</strong>
                                    <small class="@if(!$message->author->current_user) float-right @endif text-muted">
                                        <span class="glyphicon glyphicon-time"></span>{{ $message->created_at }}
                                    </small>
                                </div>
                                <p>
                                    {{ $message->text }}
                                </p>
                                @if(isset($message->attachment))
                                    <a href="{{ URL::to('/')  }}/{{ $message->attachment }}" target="_blank"><i
                                                data-feather="paperclip"></i>{{ __('Attachment') }}</a>
                                    @if(!Gate::denies('edit', $application) && Gate::denies('GIVE_APPLICATION'))
                                        <a href="{{ route('ukn.applications.prolongs.create', ['application'=>$application->id,'extendMessage'=>$message->id]) }}"
                                           class="float-right" data-toggle="tooltip" data-placement="bottom"
                                           title="{{ __('Prolong Decree') }}"><i data-feather="clock"></i></a>
                                    @endif
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
{{--            --}}
            @if(!Gate::denies('message_access', $application))
                <div class="modal-footer">
                    <button type="button" class="btn brn-round btn-success" data-toggle="modal"
                            data-target="#add_message_to_{{ $application->id }}">{{ __('Write') }}</button>
                </div>
            @endif
        </div>
    </div>
</div>
