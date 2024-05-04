<?php

namespace App\Exports;

use App\Repositories\EndpointsRepository;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EndpointsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    var $ept_rep;
    var $thisUser;
    public function __construct(EndpointsRepository $ept_rep)
    {
        $this->thisUser = Auth::user();
        $this->ept_rep = $ept_rep;
    }

    public function styles(Worksheet $sheet)
    {
        $highests = $sheet->getHighestRowAndColumn();
        $actualCells = $sheet->getStyle('A1:'.$highests['column'].$highests['row']);
        $actualCells
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);
        $sheet->getDefaultColumnDimension()->setWidth(15);
        $actualCells
            ->getAlignment()->setWrapText(true);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->thisUser->direction)
            $endpoints = $this->ept_rep->getDirectionEndpoints($this->thisUser->direction, false);
        else
            $endpoints = $this->ept_rep->get(false);

        return $endpoints;
    }

    public function headings(): array
    {
        $returnArr = [
            '#',
            __('Owner'),
            __('Direction'),
            __('Territory'),
            __('fieldnames.punkt_ustanovki'),
            __('fieldnames.punkt_ustanovki_location'),
            __('fieldnames.object_type_id'),
            __('fieldnames.vendor_name'),
            __('fieldnames.model'),
            __('fieldnames.vendor_country'),
            __('fieldnames.produce_year')
        ];
        if((!$this->thisUser->direction) || ($this->thisUser->direction->code == 't' || $this->thisUser->direction->code == 's')){
            $returnArr[] = __('fieldnames.ts_assembly_value');
            $returnArr[] = __('fieldnames.qol_soha');
            $returnArr[] = __('fieldnames.ts_cable_length');
            $returnArr[] = __('fieldnames.ts_cable_type');
            $returnArr[] = __('fieldnames.ts_cable_vols');
        }
        if((!$this->thisUser->direction) || ($this->thisUser->direction->code == 'r' || $this->thisUser->direction->code == 'm')){
            $returnArr[] = __('fieldnames.rm_broadcasting_standard');
            $returnArr[] = __('fieldnames.rm_station_power');
            $returnArr[] = __('fieldnames.rm_station_purpose');
            $returnArr[] = __('fieldnames.rm_antenna_type');
            $returnArr[] = __('fieldnames.rm_antenna_suspension_height');
            $returnArr[] = __('fieldnames.rm_transceivers_count');
        }
        $returnArr[] = __('created_at');
        return $returnArr;
    }

    public function map($endpoint): array
    {
        $returnArr = [
            $endpoint->id,
            $endpoint->application->owner->company_name,
            $endpoint->application->direction->name,
            $endpoint->application->hududiy->name,
            $endpoint->object->punkt_ustanovki,
            $endpoint->object->punkt_ustanovki_location,
            $endpoint->object_type ? $endpoint->object_type->name : __('No Object Type'),
            $endpoint->vendor_name,
            $endpoint->model,
            __('countries.'.$endpoint->vendor_country),
            $endpoint->produce_year,
        ];
        if($endpoint->application->direction->code == 't' || $endpoint->application->direction->code == 's'){
            $returnArr[] = $endpoint->ts_assembly_value;
            $returnArr[] = $endpoint->qol_soha;
            $returnArr[] = $endpoint->ts_cable_length;
            $returnArr[] = ($endpoint->cable_type ? $endpoint->cable_type->name:'');
            $returnArr[] = ($endpoint->cable_vols ? $endpoint->cable_vols->name:'');
        }elseif(!$this->thisUser->direction){
            $returnArr[] = '';
            $returnArr[] = '';
            $returnArr[] = '';
        }
        if($endpoint->application->direction->code == 'r' || $endpoint->application->direction->code == 'm'){
            $returnArr[] = ($endpoint->broadcasting_standard ? $endpoint->broadcasting_standard->name:'');
            $returnArr[] = $endpoint->rm_station_power;
            $returnArr[] = ($endpoint->station_purpose ? $endpoint->station_purpose->name:'');
            $returnArr[] = ($endpoint->antenna_type ? $endpoint->antenna_type->name:'');
            $returnArr[] = $endpoint->rm_antenna_suspension_height;
            $returnArr[] = $endpoint->rm_transceivers_count;
        }elseif(!$this->thisUser->direction){
            $returnArr[] = ''; $returnArr[] = '';
            $returnArr[] = ''; $returnArr[] = '';
            $returnArr[] = ''; $returnArr[] = '';
        }
        $returnArr[] = $endpoint->created_at;
        return $returnArr;
    }
}
