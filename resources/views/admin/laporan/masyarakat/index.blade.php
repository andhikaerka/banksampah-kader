<x-app-layout>
    <x-card>
        <x-slot name="title">
            Laporan Masyarakat
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <form class="" action="" method="GET">
                    <select class="form-control form-control-sm mr-2 d-inline" name="tahun" id="tahun" style="width: auto;">
                        <option value="">Semua Tahun</option>
                        @foreach ($setoranTahunList as $tahun)
                            <option value="{{ $tahun }}" @if($tahun == request()->tahun) selected @endif>{{ $tahun }}</option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="btn btn-sm btn-primary font-weight-bold d-inline">
                        <i class="flaticon2-search-1"></i>Cari
                    </button>

                    <button type="button" id="cetak-pdf" data-url="{{ route('pengguna.pdf.export') }}" class="btn btn-sm btn-danger font-weight-bold d-inline">
                        <i class="far fa-file-pdf"></i>Cetak .PDF
                    </button>

                    <button type="button" id="cetak-xls" data-url="{{ route('pengguna.excel.export') }}" class="btn btn-sm btn-success font-weight-bold d-inline">
                        <i class="far fa-file-excel"></i>Cetak .XLS
                    </button>
                </form>
            </div>
        </x-slot>

        <style>
            .table.table-bordered tfoot th, .table.table-bordered tfoot td {
                border-bottom: 1px solid #eaecf2;
            }
        </style>

        {{-- slot start --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="tablea" width="100%">
                <thead class="thead-light">
                    <tr>
                        <th rowspan="3" class="text-center align-middle">Bank Sampah</th>
                        <th rowspan="3" class="text-center align-middle no-wrap">Jenis Sampah</th>
                        <th colspan="13" class="text-center">Tahun @if (request()->tahun) - {{ request()->tahun }} @else - Semua Tahun @endif</th>
                    </tr>
                    <tr>
                        <th class="text-center">Jan</th>
                        <th class="text-center">Feb</th>
                        <th class="text-center">Mar</th>
                        <th class="text-center">Apr</th>
                        <th class="text-center">Mei</th>
                        <th class="text-center">Jun</th>
                        <th class="text-center">Jul</th>
                        <th class="text-center">Agu</th>
                        <th class="text-center">Sep</th>
                        <th class="text-center">Okt</th>
                        <th class="text-center">Nov</th>
                        <th class="text-center">Des</th>
                        <th class="text-center no-wrap">Total (KG)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bankSampahList as $bankSampah)
                    <tr>
                        <td rowspan="4" class="align-middle">
                            {{ $bankSampah->nama }}
                        </td>
                        <td colspan="14" class="p-0"></td>
                    </tr>
                        @foreach ($kategoriList as $kategori)
                            <tr>
                                <td>
                                    {{ $kategori->nama }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 1
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 2
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 3
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 4
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 5
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 6
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 7
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 8
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 9
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 10
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 11
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                && 
                                                $setoran->created_at->format('m') == 12
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->setoran
                                        ->filter(function($setoran) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $setoran->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $setoran->created_at->format('Y') != null;
                                            }
                                            return 
                                                $setoran->barang->kategori->id == $kategori->id
                                                &&
                                                $tahun;
                                        })->sum('jumlah');  
                                    @endphp

                                    {{ currency_format(float_two($jumlah)) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                Total
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 1
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 2
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 3
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 4
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 5
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 6
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 7
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 8
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 9
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 10
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 11
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $setoran->created_at->format('m') == 12
                                            &&
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->setoran
                                    ->filter(function($setoran) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return
                                            $tahun;
                                    })->sum('jumlah');  
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    @foreach ($kategoriList as $kategori)
                        <tr>
                            <td colspan="2" class="text-right">Total {{ $kategori->nama }}</td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 1
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 2
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 3
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 4
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 5
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 6
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 7
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 8
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 9
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 10
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 11
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $setoran->created_at->format('m') == 12
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $setoran->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $setoran->created_at->format('Y') != null;
                                        }
                                        return 
                                            $setoran->barang->kategori->id == $kategori->id
                                            &&
                                            $tahun;
                                    })->sum('jumlah');
                                @endphp

                                {{ currency_format(float_two($jumlah)) }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 1
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 2
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 3
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 4
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 5
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 6
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 7
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 8
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 9
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 10
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 11
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $setoran->created_at->format('m') == 12
                                        &&
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $setoranTotal->filter(function($setoran) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $setoran->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $setoran->created_at->format('Y') != null;
                                    }
                                    return
                                        $tahun;
                                })->sum('jumlah');
                            @endphp

                            {{ currency_format(float_two($jumlah)) }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        {{-- slot end --}}
        
        @push('page-scripts')
            <script>
                $( document ).ready(function() {
                    $('#bulan, #tahun').select2();

                    $('#cetak-pdf').on('click', function(e) {
                        e.preventDefault();

                        //get bulan
                        var bulan = $('#bulan').val();
                        // get tahun
                        var tahun = $('#tahun').val();
                        // akses url to generate pdf
                        var url = $("#cetak-pdf").data('url');
                        // button effect
                        var btn = KTUtil.getById("cetak-pdf");

                        KTUtil.btnWait(btn, "spinner spinner-white spinner-right pr-15", "Loading");

                        $.ajax({
                            url: url,
                            type: 'GET',
                            xhrFields: {
                                responseType: 'blob'
                            },
                            data: {
                                "tahun": tahun,
                                "bulan": bulan,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (response) {
                                var blob = new Blob([response], { type: 'application/pdf' });
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = "bank_sampah_" + tahun + "_" + bulan +".pdf";
                                link.click();

                                setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                            },
                            error: function () {
                                alert("Terjadi kesalahan, coba lagi nanti");

                                setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                            }
                        });

                    });

                    $('#cetak-xls').on('click', function(e) {
                        e.preventDefault();

                        //get bulan
                        var bulan = $('#bulan').val();
                        // get tahun
                        var tahun = $('#tahun').val();
                        // akses url to generate pdf
                        var url = $("#cetak-xls").data('url');
                        // button effect
                        var btn = KTUtil.getById("cetak-xls");

                        KTUtil.btnWait(btn, "spinner spinner-white spinner-right pr-15", "Loading");

                        $.ajax({
                            url: url,
                            type: 'GET',
                            xhrFields: {
                                responseType: 'blob'
                            },
                            data: {
                                "tahun": tahun,
                                "bulan": bulan,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (response) {
                                var blob = new Blob([response], { type: 'application/xls' });
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = "bank_sampah_" + tahun + "_" + bulan +".xls";
                                link.click();

                                setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                            },
                            error: function () {
                                alert("Terjadi kesalahan, coba lagi nanti");

                                setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                            }
                        });
                    });
                });
            </script>
        @endpush
    </x-card>
</x-app-layout>