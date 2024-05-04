@if($attributes->get('nopopup') && $attributes->get('nopopup') == true)
    <div class="status-list">
        @foreach($app_statuses as $status)
            <div class="status-item @if($status->level == $applicationStatus->level) active @endif text-{!! $status->class_name !!}">
                <div class="status-item__icon">
                    @if($status->level < $applicationStatus->level)
                        <i data-feather="check"  width="15" height="15" class="check"></i>
                    @endif
                    @if($status->level == $applicationStatus->level)
                        <i data-feather="chevron-right"  width="15" height="15" class="check"></i>
                    @endif
                </div>
                {!! $status->name !!}
            </div>
        @endforeach
    </div>
@else
    <div class="status-popup">
        <div class="status-popup__title text-primary">
            {!! $applicationStatus->name !!}
        </div>
        <div class="status-popup__content status-popup-content">
            @foreach($app_statuses as $status)
                <div class="status-item status-item_finished @if($status->level == $applicationStatus->level) active-item @endif text-{!! $status->class_name !!}">
                    <div class="status-item__icon">
                        @if($status->level < $applicationStatus->level)
                            <i data-feather="check"  width="15" height="15" class="check"></i>
                        @endif
                        @if($status->level == $applicationStatus->level)
                            <i data-feather="chevron-right"  width="15" height="15" class="check"></i>
                        @endif
                    </div>
                    {!! $status->name !!}
                </div>
            @endforeach
        </div>
    </div>
@endif
