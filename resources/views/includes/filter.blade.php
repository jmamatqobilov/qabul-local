<form method="GET">
    <div class="row mb-4">
        @if(request()->filled('show-complete') && request()->get('show-complete') == 'on')
            <input type="hidden" name="show-complete" value="on"/>
        @endif
        @if(isset($filters))
            @foreach($filters as $filter)
                <div class="col-auto">
                    <select name="{{ $filter['code'] }}" class="ex-select ex-select_default dropdown form-control filter-select">
                        <option disabled selected>{{ __($filter['name']) }}</option>
                        @foreach($filter['list'] as $key=>$name)
                            <option @if($filter['current'] == $key) selected @endif value="{{ $key }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        @endif
    </div>
</form>
