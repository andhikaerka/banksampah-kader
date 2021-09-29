<x-app-layout>
    <x-card>
        <x-slot name="title">
            Laporan Edukasi
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
            </div>
        </x-slot>

        <div class="row">
            <div class="col-12">
                <form class="" action="" method="GET">
                    <div class="form-group row">
                        <div class="col-5">
                            <select class="form-control mr-2" name="kategori[]" id="kategori" style="width: 100%;" multiple="multiple">
                                <option value="">Semua Kategori</option>
                                @foreach ($penggunaKategoriList as $kategori)
                                    <option value="{{ $kategori->id }}" 
                                        @if (is_array(request()->kategori))
                                            @foreach (request()->kategori as $item)
                                                @if ($item == $kategori->id)
                                                    selected="selected"
                                                @endif
                                            @endforeach
                                        @endif
                                        >{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-2">
                            <select class="form-control mr-2" name="tahun" id="tahun" style="width: 100%;">
                                <option value="">Semua Tahun</option>
                                @foreach ($kaderTahunList as $tahun)
                                    <option value="{{ $tahun }}" @if($tahun == request()->tahun) selected @endif>{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                <i class="flaticon2-search-1"></i>Cari
                            </button>

                            <button type="button" id="cetak-xls" data-url="{{ route('pengguna.excel.export') }}" class="btn btn-success font-weight-bold">
                                <i class="far fa-file-excel"></i>Cetak .XLS
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                        <th rowspan="3" class="text-center align-middle">Penerima Manfaat</th>
                        <th rowspan="3" class="text-center align-middle no-wrap">Edukasi</th>
                        <th colspan="12" class="text-center">Tahun @if (request()->tahun) - {{ request()->tahun }} @else - Semua Tahun @endif</th>
                        <th class="text-center align-middle no-wrap"><i class="text-dark">Direct</i></th>
                        <th class="text-center align-middle no-wrap"><i class="text-dark">Indirect</i></th>
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
                        <th class="text-center no-wrap">Kader</th>
                        <th class="text-center no-wrap">Kaderisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bankSampahList as $bankSampah)
                        <tr>
                            <td rowspan="{{ $kategoriList->count() + 2 }}" class="align-middle">
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
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 1
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 2
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 3
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 4
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 5
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 6
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 7
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                            $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 8
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                                $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->created_at->format('m') == 9
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                                $kader->kader_kategori_id == $kategori->id
                                                && 
                                                $kader->created_at->format('m') == 10
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                                $kader->kader_kategori_id == $kategori->id
                                                && 
                                                $kader->created_at->format('m') == 11
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                                $kader->kader_kategori_id == $kategori->id
                                                && 
                                                $kader->created_at->format('m') == 12
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                                $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $kader->created_user->roles->pluck('name')[0] == 'pengguna'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                                <td class="text-right">
                                    @php
                                        $jumlah = $bankSampah->kader
                                        ->filter(function($kader) use ($kategori){
                                            $tahun = request()->tahun;
                                            if($tahun) {
                                                $tahun = $kader->created_at->format('Y') == $tahun;
                                            } else {
                                                $tahun = $kader->created_at->format('Y') != null;
                                            }
                                            return 
                                                $kader->kader_kategori_id == $kategori->id
                                                &&
                                                $kader->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $kader->created_user->roles->pluck('name')[0] == 'kader'
                                                &&
                                                $tahun;
                                        })->count();
                                    @endphp

                                    {{ $jumlah }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                Total
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 1
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 2
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 3
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 4
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 5
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 6
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 7
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 8
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 9
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 10
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 11
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->created_at->format('m') == 12
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $kader->created_user->roles->pluck('name')[0] == 'pengguna'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $bankSampah->kader
                                    ->filter(function($kader) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $kader->created_user->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="16"></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16" class="text-center">
                                Tidak Ada Data Tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    @foreach ($kategoriList as $kategori)
                        <tr>
                            <td colspan="2" class="text-right">Total {{ $kategori->nama }}</td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 1
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 2
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 3
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 4
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 5
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 6
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 7
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 8
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 9
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 10
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 11
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->created_at->format('m') == 12
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return 
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $kader->created_user->roles->pluck('name')[0] == 'pengguna'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                            <td class="text-right">
                                @php
                                    $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                        $tahun = request()->tahun;
                                        if($tahun) {
                                            $tahun = $kader->created_at->format('Y') == $tahun;
                                        } else {
                                            $tahun = $kader->created_at->format('Y') != null;
                                        }
                                        return
                                            $kader->kader_kategori_id == $kategori->id
                                            &&
                                            $kader->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $kader->created_user->roles->pluck('name')[0] == 'kader'
                                            &&
                                            $tahun;
                                    })->count();
                                @endphp

                                {{ $jumlah }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 1
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 2
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 3
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 4
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 5
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 6
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 7
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 8
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 9
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 10
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 11
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->created_at->format('m') == 12
                                        &&
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $kader->created_user->roles->pluck('name')[0] == 'pengguna'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                        <td class="text-right">
                            @php
                                $jumlah = $kaderTotal->filter(function($kader) use ($kategori) {
                                    $tahun = request()->tahun;
                                    if($tahun) {
                                        $tahun = $kader->created_at->format('Y') == $tahun;
                                    } else {
                                        $tahun = $kader->created_at->format('Y') != null;
                                    }
                                    return
                                        $kader->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $kader->created_user->roles->pluck('name')[0] == 'kader'
                                        &&
                                        $tahun;
                                })->count();
                            @endphp

                            {{ $jumlah }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        {{-- slot end --}}
        
        @push('page-scripts')
            <script>
                $( document ).ready(function() {
                    $('#kategori').select2({
                        placeholder: "Pilih Kategori",
                    });

                    $('#tahun').select2();

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