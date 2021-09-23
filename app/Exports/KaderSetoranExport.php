<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class KaderSetoranExport implements
    FromView,
    WithDrawings,
    WithEvents,
    ShouldAutoSize
{
    protected $kaderSetoranList;
    protected $sampahTotal;
    protected $sampahPlastikTotal;
    protected $sampahNonPlastikTotal;
    protected $bulan;
    protected $tahun;
    protected $bank_sampah_nama;

    /**
     * construct function
     *
     * @param [type] $kaderSetoranList
     * @param [type] $sampahTotal
     * @param [type] $sampahPlastikTotal
     * @param [type] $sampahNonPlastikTotal
     * @param [type] $bulan
     * @param [type] $tahun
     * @param [type] $bank_sampah_nama
     */
    public function __construct(
        $kaderSetoranList,
        $sampahTotal,
        $sampahPlastikTotal,
        $sampahNonPlastikTotal,
        $bulan,
        $tahun,
        $bank_sampah_nama
    ) {
        $this->kaderSetoranList = $kaderSetoranList;
        $this->sampahTotal = $sampahTotal;
        $this->sampahPlastikTotal = $sampahPlastikTotal;
        $this->sampahNonPlastikTotal = $sampahNonPlastikTotal;
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
        $kaderSetoranList = $this->kaderSetoranList;
        $sampahTotal = $this->sampahTotal;
        $sampahPlastikTotal = $this->sampahPlastikTotal;
        $sampahNonPlastikTotal = $this->sampahNonPlastikTotal; 
        $bulan = $this->bulan;
        $tahun = $this->tahun;
        $bank_sampah_nama = $this->bank_sampah_nama;

        return view('pengguna.setoran.export-xls', compact(
            'kaderSetoranList',
            'sampahTotal',
            'sampahPlastikTotal',
            'sampahNonPlastikTotal',
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
        $drawing->setWidthAndHeight(45, 70);
        $drawing->setCoordinates('F1');

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
                $cellRange = 'A6:F6'; // All headers
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
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('A6:F'.$highestRow)->applyFromArray($styleArray);
            },
        ];
    }
}
