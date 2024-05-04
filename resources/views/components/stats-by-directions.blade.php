@if (!$export)
    <div class="row">
        <div class="col-md-12">
            <div class="ex-card px-0">
                <div class="table-list">
                    <div class="title-content">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <h3 class="table-list-title">
                                    <i data-feather="box" class="mr-2"></i> {{ __('stats-by-directions-title') }}
                                </h3>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ \Request::is('hududiy/*') ? route('hududiy.exports.index', Arr::add(\Request::all(), 'option', 'stats-by-directions')) : route('ukn.exports.index', Arr::add(\Request::all(), 'option', 'stats-by-directions')) }}"
                                    class="btn-label float-right bg-success mr-3 mb-4">
                                    Excel
                                    <div class="btn-label__icon">
                                        <i data-feather="archive"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <form method="GET">
                            <div class="row mb-4">
                                @foreach ($filters as $filter)
                                    <div class="col-auto">
                                        <select name="{{ $filter['code'] }}"
                                            class="ex-select ex-select_default filter-select dropdown form-control">
                                            <option disabled selected>{{ __($filter['name']) }}</option>
{{--                                                @dd($filter['list'])--}}
                                            @foreach ($filter['list'] as $name)
                                                <option @if ($filter['current'] == $name) selected @endif value="{{ $name }}">{!!
                                                    __($name) !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                                @if ($filter['current'] == 'custom')
                                    <div class="col-auto">
                                        {!! Form::date('s-date-from', $timelimits['custom'][0], ['class' =>
                                        'filter-select form-control' . ($errors->has('s-date-from') ? ' is-invalid' :
                                        '')]) !!}
                                    </div>
                                    <div class="col-auto">
                                        {!! Form::date('s-date-to', $timelimits['custom'][1], ['class' => 'filter-select
                                        form-control' . ($errors->has('s-date-to') ? ' is-invalid' : '')]) !!}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="table-content">
                        <div class="table-responsive">
@endif
<table class="table table-default">
    <thead class="bg-success">
    <tr>
        <th scope="col" class="td-num">
            <button class="table-action text-white">{{ __('id') }}</button>
        </th>
        <th scope="col" class="td-w3 text-center">
            <button
                    class="table-action text-white">{{ __('Direction') }}</button>
        </th>
        <th scope="col">
            <button class="table-action text-white">{{ __('applications_created') }}</button>
        </th>
        <th scope="col">
            <button class="table-action text-white">{{ __('objects_created') }}</button>
        </th>
{{--        <th scope="col">--}}
{{--            <button class="table-action text-white">{{ __('objects_deleted') }}</button>--}}
{{--        </th>--}}
        <th scope="col">
            <button class="table-action text-white">{{ __('Endpoints') }}</button>
        </th>
    </tr>
    </thead>
    <tbody>
{{--    @dd($stats)--}}
        @foreach ($stats as $stat)
{{--            @dd()--}}
            <tr>
                <td scope="row" class="td-num">{{ $stat['counter'] }}</td>
                <td class="td-w3 text-center">{{ $stat['name'] }}</td>
                <td>{{ $stat['applications_created'] }}</td>
                <td>{{ $stat['objects_created'] }}</td>
{{--                <td>{{ $stat['objects_deleted'] }}</td>--}}
                <td>{{ $stat['endpoints_created'] }}</td>
            </tr>
        @endforeach
        <tr class="table-total bg-success text-white">
            <td colspan="2">{{ __('Total') }}:</td>
            <td>{{ $summ['applications_created'] }}</td>
            <td>{{ $summ['objects_created'] }}</td>
{{--            <td>{{ $summ['objects_deleted'] }}</td>--}}
            <td>{{ $summ['endpoints_created'] }}</td>
        </tr>
    </tbody>
</table>
@if (!$export)
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endif
