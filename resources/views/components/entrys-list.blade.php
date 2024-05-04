@if($entrys)
    <div class="row">
        <div class="col-md-12">
            <div class="ex-card px-0">
                <div class="table-list">
                    <div class="title-content">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <h3 class="table-list-title">
                                    <i data-feather="box" class="mr-2"></i> {{ __('entrys-list-title') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-content">
                        <div class="table-responsive">
                            <table class="table table-default">
                                <thead class="bg-success">
                                <tr>
                                    <th scope="col" class="td-num"><button class="table-action text-white">{{ __('id') }}</button></th>
                                    <th scope="col" class="td-w3 text-center"><button class="table-action text-white">{{ __('IP') }}</button></th>
                                    <th scope="col"><button class="table-action text-white">{{ __('entry_date') }}</button></th>
                                    <th scope="col"><button class="table-action text-white">{{ __('User agent') }}</button></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($entrys as $entry)
                                    <tr>
                                        <td scope="row" class="td-num">{{ ($entrys->currentPage()-1)*$entrys->perPage() + $counter++ }}</td>
                                        <td class="td-w3 text-center">{{ $entry->ip_address }}</td>
                                        <td>{{ $entry->entry_date }}</td>
                                        <td>{{ $entry->user_agent }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-footer">
                        <div class="row align-items-center">
                            <div class="col-md-6">{{ $entrys->appends(request()->except('page'))->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
