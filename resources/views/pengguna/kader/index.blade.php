<x-app-layout>
    <x-card>
        <x-slot name="title">
            Kader
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ asset('assets/import_kader.xls') }}" class="mr-2">
                    Download Template .xls
                </a>
                <a href="{{ route('pengguna.kader-import.create') }}" class="btn btn-sm btn-success font-weight-bold mr-2">
                    <i class="flaticon-signs-1"></i>Import Kader
                </a>

                <a href="{{ route('pengguna.kader.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                    <i class="flaticon2-plus-1"></i>Tambah Kader
                </a>
            </div>
        </x-slot>

        {{-- slot start --}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-session-import-result class="mb-4" :result="session('result')" />

        <div class="row">
            <div class="col-12">
                <form class="mb-3 float-right" action="" method="GET">
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
        
                    <button type="button" id="cetak-pdf" data-url="{{ route('pengguna.kader.pdf.export') }}" class="btn btn-sm btn-danger font-weight-bold d-inline">
                        <i class="far fa-file-pdf"></i>Cetak .PDF
                    </button>
        
                    <button type="button" id="cetak-xls" data-url="{{ route('pengguna.kader.xls.export') }}" class="btn btn-sm btn-success font-weight-bold d-inline">
                        <i class="far fa-file-excel"></i>Cetak .XLS
                    </button>
                </form>
            </div>
        </div>

        <table class="table table-bordered" id="table" width="100%" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th class="no-wrap">Dibuat Oleh</th>
                    <th>Tgl Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kaderList as $kader)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kader->name }}</td>
                        <td>{{ $kader->email }}</td>
                        <td>{{ $kader->telepon }}</td>
                        <td class="no-wrap">{{ optional($kader->created_user)->name }}</td>
                        <td>{{ $kader->created_at }}</td>
                        <td class="no-wrap">
                            @if ($kader->created_by == auth()->user()->id)
                                <form method="POST" action="{{ route('pengguna.kader.destroy', ['kader' => $kader->id]) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <a href="{{ route('pengguna.kader.edit', ['kader' => $kader->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
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
                                link.download = "report_kader_" + tahun + "_" + bulan +".pdf";
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
                                link.download = "report_kader_" + tahun + "_" + bulan +".xls";
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