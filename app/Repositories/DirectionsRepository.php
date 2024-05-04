<?php
namespace App\Repositories;
use App\Models\Direction;
use Carbon\Carbon;


class DirectionsRepository extends Repository {

    protected $timeFilter = false;
    protected $territoryFilter = false;
    public function __construct(Direction $direction) {
        $this->model = $direction;
    }

    protected function dateFilter($query){
        if($this->timeFilter)
            $query = $query->whereBetween('endpoints.created_at', $this->timeFilter);
//        $query = $query->where('endpoints.created_at', );
        return $query;
    }

    protected function subjectFilter($query){
        if($this->getFilterCurrent('s-subject'))
            $query = $query->whereHas('application', function($q){
                $q->where('owner_id', '=', $this->getFilterCurrent('s-subject'));
            });
        return $query;
    }

    protected function territoryFilter($query){
        if($this->territoryFilter)
            $query = $query->whereHas('application', function($q){
                $q->where('hududiy_id', '=', $this->territoryFilter->id);
            });
        return $query;
    }

    public function getFilterCurrent($code){
        if (
            !request()->filled($code . '-clear') &&
            request()->get($code . '-clear') != 'clear' &&
            request()->filled($code) &&
            request()->get($code) != 'clear'
        ) {
            return request()->get($code);
        }
        return false;
    }

    protected function activateFilters($query){
        $query = $this->dateFilter($query);
        $query = $this->subjectFilter($query);
        if($this->territoryFilter)
            $query = $this->territoryFilter($query);
        return $query;
    }

    public function stats(Direction $direction, $timeFilter = false, $territory = false){
        if($timeFilter)
            $this->timeFilter = $timeFilter;
        if($territory)
            $this->territoryFilter = $territory;

        $builder = $this->activateFilters($direction->endpoints());
        $builder2 = $this->activateFilters($direction->endpoints());
        $builder3 = $this->activateFilters($direction->endpoints());
        $builder31 = $this->activateFilters($direction->endpoints());
        $builder4 = $this->activateFilters($direction->endpoints());
        $builder5 = $this->activateFilters($direction->endpoints());
        $arResult = [];
        if($direction->code == 't'){
//            dd($direction);
            $arPreResult = [
                'object_type' => $builder->select('endpoints.object_type_id')
                    ->selectRaw('applications.hududiy_id, count(endpoints.object_type_id) as qty')
                    ->groupBy(['endpoints.object_type_id', 'applications.direction_id', 'applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'ts_assembly_value' => $builder2
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.ts_assembly_value) as qty')
                    ->groupBy(['endpoints.object_type_id', 'applications.direction_id', 'applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'ts_cable_length' => $builder3
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.ts_cable_length) as qty')
                    ->groupBy(['endpoints.object_type_id', 'applications.direction_id', 'applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'ts_cable_length_' => $builder31
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.ts_cable_length_) as qty')
                    ->groupBy(['endpoints.object_type_id', 'applications.direction_id', 'applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get()
            ];
//            dd($arPreResult);
        } elseif ($direction->code == 's') {
            $arPreResult =  [
                'object_type' => $builder->select('endpoints.object_type_id')
                    ->selectRaw('applications.hududiy_id, count(endpoints.object_type_id) as qty')
                    ->groupBy(['endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'ts_assembly_value' => $builder2
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.ts_assembly_value) as qty')
                    ->groupBy(['endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'ts_cable_length' => $builder3
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.ts_cable_length) as qty')
                    ->groupBy(['endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get()
            ];
        } elseif($direction->code == 'r'){
            $arPreResult = [
                'object_type' => $builder->select('endpoints.object_type_id')
                    ->selectRaw('applications.hududiy_id, count(endpoints.object_type_id) as qty')
                    ->groupBy(['endpoints.object_type_id','endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'vendor_name' => $builder2->select('endpoints.vendor_name')
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, count(endpoints.vendor_name) as qty')
                    ->groupBy(['endpoints.object_type_id','endpoints.vendor_name','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'rm_broadcasting_standard' => $builder3->select('endpoints.rm_broadcasting_standard')
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, count(endpoints.rm_broadcasting_standard) as qty')
                    ->groupBy(['endpoints.object_type_id','endpoints.rm_broadcasting_standard','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'rm_station_power' => $builder4
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.rm_station_power) as qty')
                    ->groupBy(['endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'rm_transceivers_count' => $builder5
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, SUM(endpoints.rm_transceivers_count) as qty')
                    ->groupBy(['endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
            ];
        }
        else{
            $arPreResult = [
                'object_type' => $builder->select('endpoints.object_type_id')
                    ->selectRaw('applications.hududiy_id, count(endpoints.object_type_id) as qty')
                    ->groupBy(['endpoints.object_type_id','endpoints.object_type_id','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'rm_broadcasting_standard' => $builder2->select('endpoints.rm_broadcasting_standard')
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, count(endpoints.rm_broadcasting_standard) as qty')
                    ->groupBy(['endpoints.object_type_id','endpoints.rm_broadcasting_standard','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
                'rm_antenna_type' => $builder3->select('endpoints.rm_antenna_type')
                    ->selectRaw('endpoints.object_type_id, applications.hududiy_id, count(endpoints.rm_antenna_type) as qty')
                    ->groupBy(['endpoints.object_type_id','endpoints.rm_antenna_type','applications.direction_id','applications.hududiy_id'])
                    ->orderBy('qty', 'DESC')
                    ->get(),
            ];
        }
        foreach ($arPreResult as $key=>$preResult)
            foreach ($preResult as $preResultItem){
                $arResult[$preResultItem->hududiy_id][$preResultItem->object_type_id][$key][] = $preResultItem;
            }
//        dd($arResult);

        foreach ($arResult as $key=>$preResult)
            ksort($arResult[$key]);
        ksort($arResult);
        return $arResult;
    }
}
