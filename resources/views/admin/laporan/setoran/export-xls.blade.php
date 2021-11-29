<!DOCTYPE html>
<html lang="en">
<body>
    <table>
        <tr>
            <td colspan="6">Laporan Setoran Bank Sampah</td>
        </tr>
        <tr>
            <td colspan="6">
                Tahun : {{ $tahun ? $tahun : 'Semua Tahun' }}
            </td>
        </tr>
        <tr>
            <td colspan="6">
                Provinsi : {{ $provinsi }}
            </td>
        </tr>
        <tr>
            <td colspan="6">
                Kabupaten/Kota : {{ $kabupaten_kota }}
            </td>
        </tr>
    </table>

    <table>
        <thead class="thead-light">
            <tr>
                <th rowspan="2" class="text-center align-middle" style="background-color: #b6b4b9;">Bank Sampah</th>
                <th rowspan="2" class="text-center align-middle no-wrap" style="background-color: #b6b4b9;">Jenis Sampah</th>
                <th colspan="13">Tahun @if ($tahun) - {{ $tahun }} @else - Semua Tahun @endif</th>
            </tr>
            <tr>
                <th style="background-color: #b6b4b9;">Jan</th>
                <th style="background-color: #b6b4b9;">Feb</th>
                <th style="background-color: #b6b4b9;">Mar</th>
                <th style="background-color: #b6b4b9;">Apr</th>
                <th style="background-color: #b6b4b9;">Mei</th>
                <th style="background-color: #b6b4b9;">Jun</th>
                <th style="background-color: #b6b4b9;">Jul</th>
                <th style="background-color: #b6b4b9;">Agu</th>
                <th style="background-color: #b6b4b9;">Sep</th>
                <th style="background-color: #b6b4b9;">Okt</th>
                <th style="background-color: #b6b4b9;">Nov</th>
                <th style="background-color: #b6b4b9;">Des</th>
                <th class="text-center no-wrap" style="background-color: #b6b4b9;">Total (KG)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bankSampahList as $bankSampah)
            <tr>
                <td rowspan="{{ $kategoriList->count() + 2 }}" class="align-middle">
                    {{ $bankSampah->nama }}
                </td>
                <td colspan="14" class="p-0" style="padding: 0px;"></td>
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
                
                <tr>
                    <td colspan="15"></td>
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
</body>
</html>