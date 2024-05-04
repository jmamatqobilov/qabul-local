<a href="#" class="btn-circle btn-circle_thin @if(count($unreadNotifications)>0) btn-circle_active @endif btn-circle_default" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i data-feather="bell" width="20" height="20"></i>
</a>
<div class="dropdown-menu ex-bar-notify" ss-container aria-labelledby="dropdownMenuLink">
    <a href="{{ route('notification.read') }}" class="notify notify_dropdown active">
        <div class="notify__icon">
            <i data-feather="eye" width="20" height="20"></i>
        </div>
        <div class="notify__content">
            <h4>{{ __('Make all readed!') }}</h4>
        </div>
    </a>
    @foreach($notifications as $notification)
        <a href="{{ route($user->roles->first()->code.'.'.$notification->data['group'].'.index') }}" class="notify notify_dropdown @if(!$notification->read_at) active @endif">
            <div class="notify__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            </div>
            <div class="notify__content">
                <h4>{{ $notification->data['from'] }}</h4>
                {!! __($notification->data['message'], ['id'=>$notification->data['id']]) !!}
            </div>
        </a>
    @endforeach
</div>

