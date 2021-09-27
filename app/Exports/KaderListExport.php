<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class KaderListExport implements
    FromView,
    WithDrawings,
    WithEvents,
    ShouldAutoSize,
    WithColumnFormatting
{
    protected $kaderList;
    protected $bulan;
    protected $tahun;
    protected $bank_sampah_nama;

    /**
     * Undocumented function
     *
     * @param [type] $kaderList
     * @param [type] $bulan
     * @param [type] $tahun
     * @param [type] $bank_sampah_nama
     */
    public function __construct(
        $kaderList,
        $bulan,
        $tahun,
        $bank_sampah_nama
    ) {
        $this->kaderList = $kaderList;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->bank_sampah_nama = $bank_sampah_nama;
    }

    /**
     * view function
     *
     * @return View
     */
    public function view(): View
    {
        $kaderList = $this->kaderList;
        $bulan = $this->bulan;
        $tahun = $this->tahun;
        $bank_sampah_nama = $this->bank_sampah_nama;

        return view('pengguna.kader.export-xls', compact(
            'kaderList',
            'tahun',
            'bulan',
            'bank_sampah_nama'
        ));
    }

    /**
     * drawings function
     *
     * @return void
     */
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Kader Bank Sampah Online Logo');
        $drawing->setDescription('Kader Bank Sampah Online');
        $drawing->setPath(public_path('/assets/media/logos/logo-letter-1.png'));
        $drawing->setResizeProportional(true);
        $drawing->setWidthAndHeight(65, 150);
        $drawing->setCoordinates('G1');

        return $drawing;
    }

    /**
     * events function
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A6:G6'; // All headers
                $highestRow = $event->sheet->getHighestRow();
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => [
                                'rgb' => '333333'
                            ]
                        ]
                    ],
                ];

                // $event->sheet->getDelegate()
                // ->getStyle('D7:D'.$highestRow)
                // ->getNumberFormat()
                // ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_GENERAL);

                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('A6:G'.$highestRow)->applyFromArray($styleArray);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => '+#',
        ];
    }
}
