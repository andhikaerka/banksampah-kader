<x-app-layout>
    <x-card>
        <x-slot name="title">
            Setoran Kader
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <form class="" action="" method="GET">
                    <select class="form-control form-control-sm mr-2 d-inline" name="bulan" id="bulan" style="width: auto;">
                        <option value="">Semua Bulan</option>
                        <option value="1" @if(request()->bulan == 1) selected @endif>Januari</option>
                        <option value="2" @if(request()->bulan == 2) selected @endif>Februari</option>
                        <option value="3" @if(request()->bulan == 3) selected @endif>Maret</option>
                        <option value="4" @if(request()->bulan == 4) selected @endif>April</option>
                        <option value="5" @if(request()->bulan == 5) selected @endif>Mei</option>
                        <option value="6" @if(request()->bulan == 6) selected @endif>Juni</option>
                        <option value="7" @if(request()->bulan == 7) selected @endif>Juli</option>
                        <option value="8" @if(request()->bulan == 8) selected @endif>Agustus</option>
                        <option value="9" @if(request()->bulan == 9) selected @endif>September</option>
                        <option value="10" @if(request()->bulan == 10) selected @endif>Oktober</option>
                        <option value="11" @if(request()->bulan == 11) selected @endif>November</option>
                        <option value="12" @if(request()->bulan == 12) selected @endif>Desember</option>
                    </select>

                    <select class="form-control form-control-sm mr-2 d-inline" name="tahun" id="tahun" style="width: auto;">
                        <option value="">Semua Tahun</option>
                        @foreach ($tahunList as $tahun)
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

        {{-- slot start --}}

        <div class="mb-5">
            <span class="label label-lg label-light-success label-inline mr-3 p-5 font-weight-bold">
                Plastik: {{ currency_format(float_two($sampahPlastikTotal)) }} KG
            </span>
    
            <span class="label label-lg label-light-success label-inline mr-3 p-5 font-weight-bold">
                Non Plastik: {{ currency_format(float_two($sampahNonPlastikTotal)) }} KG
            </span>
    
            <span class="label label-lg label-light-primary label-inline mr-3 p-5 font-weight-bold">
                Total: {{ currency_format(float_two($sampahTotal)) }} KG
            </span>
        </div>

        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th class="text-right">Plastik (KG)</th>
                <th class="text-right">Non Plastik (KG)</th>
                <th class="text-right">Total Sampah (KG)</th>
            </thead>
            <tbody>
                @foreach ($kaderSetoranList as $kaderSetoran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kaderSetoran->created_user->name }}</td>
                        <td>{{ $kaderSetoran->barang->nama }}</td>
                        <td class="text-right">
                            @if ($kaderSetoran->barang->kategori->nama == 'Plastik')
                                {{ currency_format(float_two($kaderSetoran->jumlah)) }}
                            @endif
                        </td>
                        <td class="text-right">
                            @if ($kaderSetoran->barang->kategori->nama == 'Non Plastik')
                                {{ currency_format(float_two($kaderSetoran->jumlah)) }}
                            @endif
                        </td>
                        <td class="text-right">{{ currency_format(float_two($kaderSetoran->jumlah)) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-secondary">
                    <td colspan="3" class="text-right"><b>Total (KG)</b></td>
                    <td class="text-right">{{ currency_format(float_two($sampahPlastikTotal)) }}</td>
                    <td class="text-right">{{ currency_format(float_two($sampahNonPlastikTotal)) }}</td>
                    <td class="text-right">{{ currency_format(float_two($sampahTotal)) }}</td>
                </tr>
            </tfoot>
        </table>
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
                                link.download = "setoran_kader_" + tahun + "_" + bulan +".pdf";
                                link.click();

                                setTimeout(function() {
                                    KTUtil.btnRelease(btn);
                                }, 1000);
                            },
                            error: function () {
                                alert("Terjadi kesalahan, coba lagi nanti");
                            }
                        });

                    });

                    $('#cetak-xls').on('click', function(e) {
                        e.preventDefault();
                    });
                });
            </script>
        @endpush
    </x-card>
</x-app-layout>