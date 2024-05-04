<?php

namespace App\Exports;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StatsExport implements FromView, ShouldQueue, WithStyles
{
    use Exportable, Queueable;

    public $viewname;
    public function __construct($viewname)
    {
        $this->viewname = $viewname;
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
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $actualCells
            ->getAlignment()->setWrapText(true);
    }

    /**
     * @return View
     */
    public function view(): View
    {
//         dd($this->viewname);
        return view($this->viewname);
    }
}
