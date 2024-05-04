@if($entry)
    <div class="alert alert-secondary" role="alert">
        {{ __('Last_loginmessage', ['ip'=>$entry->ip_address, 'date'=>$entry->entry_date]) }} <a href="{{ route('profile.view') }}">{{ __('All Entrys') }}</a>
    </div>
@endif
