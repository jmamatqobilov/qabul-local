@if(!$export)
    <div class="row">
        <div class="col-md-12">
            <div class="ex-card px-0">
                <div class="table-list">
                    <div class="title-content">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <h3 class="table-list-title">
                                    <i data-feather="settings"
                                       class="mr-2"></i> {{ __('ukn-stats-of-direction-title') }}
                                </h3>
                            </div>
                            <div class="col-md-4">
                                @if($stats)
                                    <a href="{{ route($userRole->code.'.exports.index', Arr::add(\Request::all(),'option','ukn-stats-of-direction')) }}"
                                       class="btn-label float-right bg-success mr-3 mb-4">
                                        Excel
                                        <div class="btn-label__icon">
                                            <i data-feather="archive"></i>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if(isset($filters))
                            <form method="GET">
                                <div class="row mb-4">
{{--                                        @dd($filters)--}}
                                    @foreach($filters as $filter)
                                        <div class="col-auto">
                                            <select name="{{ $filter['code'] }}"
                                                    class="ex-select ex-select_default filter-select dropdown form-control">
                                                <option disabled selected>{{ __($filter['name']) }}</option>
                                                @foreach($filter['list'] as $key=>$name)
                                                    <option @if($filter['current'] == $key) selected
                                                            @endif value="{{ $key }}">{{ __($name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                    @if($filter['current'] == 'custom')
                                        <div class="col-auto">
                                            {!! Form::date('s-date-from', $timelimits['custom'][0], ['class' => 'filter-select form-control'.($errors->has('s-date-from') ? ' is-invalid':'')]) !!}
                                        </div>
                                        <div class="col-auto">
                                            {!! Form::date('s-date-to', $timelimits['custom'][1], ['class' => 'filter-select form-control'.($errors->has('s-date-to') ? ' is-invalid':'')]) !!}
                                        </div>
                                    @endif
                                </div>
                            </form>
                        @endif
                    </div>
                    @endif
                    @if($stats)
                        <div class="table-content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td rowspan="2">{{ __('Territory') }}</td>
                                        @foreach($array_head as $head_key => $head_item)
{{--                                            @dd($array_head, $head_key, $head_item, $object_types, $array_data)--}}
                                            @if($object_types[$head_key] == 'Радиорелейные линии' || $object_types[$head_key] == 'Radiorele liniyalari')
                                                <td colspan="{{ count($array_data[$head_key]) - 3 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'OTAL' || $object_types[$head_key] == 'ВОЛС')
                                                <td colspan="{{ count($array_data[$head_key]) - 2 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'Медный кабель' || $object_types[$head_key] == 'Mis simli aloqa kabeli')
                                                <td colspan="{{ count($array_data[$head_key]) - 2 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            {{----}}
                                            @elseif($object_types[$head_key] == 'OLT')
                                                <td colspan="{{ count($array_data[$head_key]) - 2 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'Switch')
                                                <td colspan="{{ count($array_data[$head_key]) - 2 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'Системы передачи' || $object_types[$head_key] == 'Uzatish tizimlari')
                                                <td colspan="{{ count($array_data[$head_key]) - 1 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'ЭАТС' || $object_types[$head_key] == 'EATS')
                                                <td colspan="{{ count($array_data[$head_key]) - 1 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'МиниАТС' || $object_types[$head_key] == 'MiniATS')
                                                <td colspan="{{ count($array_data[$head_key]) - 1 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @elseif($object_types[$head_key] == 'Сооружения связи' || $object_types[$head_key] == 'Aloqa qurilmalari')
                                                <td colspan="{{ count($array_data[$head_key]) - 1 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
{{--                                            @elseif($object_types[$head_key] == 'РРЛ' || $object_types[$head_key] == 'RRL')--}}
{{--                                            @elseif($object_types[$head_key] == 'Активные устройства' || $object_types[$head_key] == 'Aktiv qurilmalar')--}}
{{--                                            @elseif($object_types[$head_key] == 'Связывающие устройства ВОЛС' || $object_types[$head_key] == 'OTAL bog\'lovchi qurilmalari')--}}
{{--                                                <td colspan="{{ count($array_data[$head_key]) - 1 }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>--}}
                                            @else
                                                <td colspan="{{ count($array_data[$head_key]) }}">{{ $head_key ? $object_types[$head_key] : 'default' }}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($array_data as $data_key=>$data_item)
                                            @foreach($data_item as $d_key => $d_item)
{{--                                                @dd($array_data, $data_key, $data_item, $array_head, $d_key, $d_item[0], $object_types)--}}
                                                @if(($object_types[$data_key] == 'Радиорелейные линии' || $object_types[$data_key] == 'Radiorele liniyalari') && ($d_key == 'ts_assembly_value' || $d_key == 'ts_cable_length'|| $d_key == 'ts_cable_length_'))
                                                @elseif(($object_types[$data_key] == 'OTAL' || $object_types[$data_key] == 'ВОЛС') && ($d_key == 'ts_assembly_value' || $d_key == 'ts_cable_length_'))
                                                @elseif(($object_types[$data_key] == 'Медный кабель' || $object_types[$data_key] == 'Mis simli aloqa kabeli') && ($d_key == 'ts_assembly_value' || $d_key == 'ts_cable_length_'))
                                                    {{----}}
                                                @elseif($object_types[$data_key] == 'OLT' && ($d_key == 'ts_cable_length' || $d_key == 'ts_cable_length_'))
                                                @elseif($object_types[$data_key] == 'Switch' && ($d_key == 'ts_cable_length' || $d_key == 'ts_cable_length_'))
{{--                                                @elseif(($object_types[$data_key] == 'РРЛ' || $object_types[$data_key] == 'RRL'))--}}
{{--                                                @elseif(($object_types[$data_key] == 'Активные устройства' || $object_types[$data_key] == 'Aktiv qurilmalar'))--}}
{{--                                                @elseif(($object_types[$data_key] == 'Связывающие устройства ВОЛС' || $object_types[$data_key] == 'OTAL bog\'lovchi qurilmalari'))--}}
                                                @elseif((
                                                    $object_types[$data_key] == 'Uzatish tizimlari'
                                                    || $object_types[$data_key] == 'Системы передачи'
                                                    || $object_types[$data_key] == 'EATS'
                                                    || $object_types[$data_key] == 'ЭАТС'
                                                    || $object_types[$data_key] == 'MiniATS'
                                                    || $object_types[$data_key] == 'МиниАТС'
                                                    || $object_types[$data_key] == 'Aloqa qurilmalari'
                                                    || $object_types[$data_key] == 'Сооружения связи'
                                                )
                                                &&
                                                $d_key == 'ts_cable_length_'
                                                )
                                                @else
                                                    <td>{{ __('fieldnames.'.$d_key.(array_key_exists($d_key, $data_key ? $object_type_endpoint_fields[$data_key] : [] ) && $data_key !== ""  ? $object_type_endpoint_fields[$data_key][$d_key] : '')) }}</td>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tr>
                                    </thead>
                                    @foreach($array_reg_data as $reg_key => $reg_data)
{{--                                        @dd($array_reg_data)--}}
                                        <tr>
{{--                                            @dd($territories, $reg_key, $territories[$reg_key], $reg_data)--}}
                                            <td> {{ $territories[$reg_key] }} </td>
                                            @foreach($array_data as $a_key => $a_data)
{{--                                                @dd($array_reg_data, $reg_key, $a_key, $reg_data, $array_data, $a_data, $array_reg_data[$reg_key][$a_key])--}}
                                                @if(isset($array_reg_data[$reg_key][$a_key]))
{{--                                                    @dd($array_reg_data[$reg_key][$a_key]))--}}
                                                    @foreach($array_reg_data[$reg_key][$a_key] as $key => $item_data)
{{--                                                        @dd($array_reg_data[$reg_key][$a_key], $key, $item_data)--}}
                                                        @if($item_data['0']->object_type_id == 6 && ($key == 'ts_assembly_value' || $key == 'ts_cable_length' || $key == 'ts_cable_length_'))
                                                        @elseif($item_data['0']->object_type_id == 1 && ($key == 'ts_assembly_value' || $key == 'ts_cable_length_'))
                                                        @elseif($item_data['0']->object_type_id == 2 && ($key == 'ts_assembly_value' || $key == 'ts_cable_length_'))
                                                    {{----}}
                                                        @elseif($item_data['0']->object_type_id == 22 && ($key == 'ts_cable_length' || $key == 'ts_cable_length_'))
                                                        @elseif($item_data['0']->object_type_id == 24 && ($key == 'ts_cable_length' || $key == 'ts_cable_length_'))
{{--                                                        @elseif($item_data['0']->object_type_id == 23)--}}
{{--                                                        @elseif($item_data['0']->object_type_id == 8)--}}
{{--                                                        @elseif($item_data['0']->object_type_id == 9)--}}
                                                        @elseif((
                                                            $item_data['0']->object_type_id == 3
                                                            || $item_data['0']->object_type_id == 4
                                                            || $item_data['0']->object_type_id == 5
                                                            || $item_data['0']->object_type_id == 7
                                                        )
                                                        &&
                                                        $key == 'ts_cable_length_'
                                                        )
                                                        @else
{{--                                                            @dd($item_data['0'])--}}
                                                            <td> {{ $item_data['0']->qty }} </td>
                                                        @endif
                                                    @endforeach
                                                @else
{{--                                                    @dd($a_key)--}}  {{--here!!--}}
{{--                                                @dd($array_reg_data, $reg_key, $reg_data, $array_data, $a_key, $a_data) --}}{{--available variables--}}
                                                    @if($a_key == 6)
                                                        @for($i = 0; $i < (count($a_data) - 3); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 1)
                                                        @for($i = 0; $i < (count($a_data) - 2); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 2)
                                                        @for($i = 0; $i < (count($a_data) - 2); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 22)
                                                        @for($i = 0; $i < (count($a_data) - 2); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 24)
                                                        @for($i = 0; $i < (count($a_data) - 2); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 3)
                                                        @for($i = 0; $i < (count($a_data) - 1); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 4)
                                                        @for($i = 0; $i < (count($a_data) - 1); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 5)
                                                        @for($i = 0; $i < (count($a_data) - 1); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @elseif($a_key == 7)
                                                        @for($i = 0; $i < (count($a_data) - 1); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @else
                                                        @for($i = 0; $i < (count($a_data)); $i++)
                                                            <td>0</td>
                                                        @endfor
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif
                    @if(!$export)
                </div>
            </div>
        </div>
    </div>
@endif