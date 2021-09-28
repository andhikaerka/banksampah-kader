<x-app-layout>
    <x-card>
        <x-slot name="title">
            Laporan
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <form class="" action="" method="GET">
                    <select class="form-control form-control-sm mr-2 d-inline" name="tahun" id="tahun" style="width: auto;">
                        <option value="">Semua Tahun</option>
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
                        <th colspan="13" class="text-center">Tahun</th>
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
                    @foreach (\App\Models\BankSampah::all() as $bankSampah)
                    <tr>
                        <td rowspan="4" class="align-middle">
                            {{ $bankSampah->nama }}
                        </td>
                        <td colspan="14" class="p-0"></td>
                    </tr>
                        @foreach (\App\Models\BarangKategori::all() as $kategori)
                            <tr>
                                <td>
                                    {{ $kategori->nama }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                    {{-- <br>
                                    filter kategori ini
                                    filter bulan ini
                                    filter tahun ini --}}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                                <td>
                                    {{ $bankSampah->setoran->sum('jumlah') }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>
                                Total
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                            <td>
                                {{ $bankSampah->setoran->sum('jumlah') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-right">Total Plastik</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">Total Non Plastik</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
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
                                link.download = "setoran_kader_" + tahun + "_" + bulan +".pdf";
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
                                link.download = "setoran_kader_" + tahun + "_" + bulan +".xls";
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