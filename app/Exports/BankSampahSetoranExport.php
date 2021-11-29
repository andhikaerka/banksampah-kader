<?php

namespace App\Exports;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BankSampahSetoranExport implements
    FromView,
    WithDrawings,
    WithEvents,
    ShouldAutoSize
{

    protected $tahun;
    protected $provinsi;
    protected $kabupaten_kota;
    protected $bankSampahList;
    protected $kategoriList;
    protected $setoranTotal;
    protected $penggunaKategoriList;

    /**
     * Undocumented function
     *
     * @param [type] $tahun
     * @param [type] $provinsi
     * @param [type] $kabupaten_kota
     * @param [type] $bankSampahList
     */
    public function __construct(
        $tahun,
        $provinsi,
        $kabupaten_kota,
        $bankSampahList,
        $kategoriList,
        $setoranTotal,
        $penggunaKategoriList
    ) {
        $this->tahun = $tahun;
        $this->provinsi = $provinsi;
        $this->kabupaten_kota = $kabupaten_kota;
        $this->bankSampahList = $bankSampahList;
        $this->kategoriList = $kategoriList;
        $this->setoranTotal = $setoranTotal;
        $this->penggunaKategoriList = $penggunaKategoriList;
    }

    /**
     * view function
     *
     * @return View
     */
    public function view(): View
    {
        $tahun = $this->tahun;
        $provinsi = $this->provinsi ? Provinsi::where('id', $this->provinsi)->first()->name : 'Semua Provinsi';
        $kabupaten_kota = $this->kabupaten_kota ? KabupatenKota::where('id', $this->kabupaten_kota)->first()->name : 'Semua Kabupaten/Kota';
        $bankSampahList = $this->bankSampahList;
        $kategoriList = $this->kategoriList;
        $setoranTotal = $this->setoranTotal;
        $penggunaKategoriList = $this->penggunaKategoriList;

        return view('admin.laporan.setoran.export-xls', compact(
            'tahun',
            'provinsi',
            'kabupaten_kota',
            'bankSampahList',
            'kategoriList',
            'setoranTotal',
            'penggunaKategoriList'
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
        $drawing->setCoordinates('O1');

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
                $cellRange = 'A6:O6'; // All headers
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
                $event->sheet->getDelegate()->getStyle('A6:O'.$highestRow)->applyFromArray($styleArray);
            },
        ];
    }
    
}
