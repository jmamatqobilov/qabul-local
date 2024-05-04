<div class="notifications-area">
    @foreach($notifications as $notification)
        <div class="notify {!! (array_key_exists('label', $notification->data) ? $notification->data['label']:'') !!}">
            <div class="notify__date">{!! $notification->created_at !!}</div>
            <div class="notify__icon"><i data-feather="bell"></i></div>
            <div class="notify__content">
                <h4>{!! $notification->data['from'] !!}</h4>
                {!! __($notification->data['message'], ['id'=>$notification->data['id']]) !!}
            </div>
        </div>
    @endforeach
</div>
