<?php

namespace App\Exports;

use App\Repositories\ObjectsRepository;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ObjectsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    var $obj_rep;
    var $thisUser;
    public function __construct(ObjectsRepository $obj_rep)
    {
        $this->thisUser = Auth::user();
        $this->obj_rep = $obj_rep;
    }

    public function title(): string
    {
        return ($this->thisUser->direction ? $this->thisUser->direction->name:"default");
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

    public function headings(): array
    {
        return [
            '#',
            __('Owner'),
            __('Direction'),
            __('Territory'),
            __('fieldnames.object_type_id'),
            __('fieldnames.punkt_ustanovki'),
            __('fieldnames.punkt_ustanovki_location'),
            __('created_at')
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->thisUser->direction)
            $objects = $this->obj_rep->getAllObjectsList($this->thisUser->direction, false);
        else
            $objects = $this->obj_rep->getAllObjects();

        return $objects;
    }

    public function map($object): array
    {
        $returnArr = [
            $object->id,
            $object->application->owner->company_name,
            $object->application->direction->name,
            $object->application->hududiy->name,
            $object->object_type->name,
            $object->punkt_ustanovki,
            $object->punkt_ustanovki_location,
            $object->created_at,
        ];
        return $returnArr;
    }
}
