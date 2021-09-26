<x-app-layout>
    <x-card>
        <x-slot name="title">
            Setoran
        </x-slot>

        {{-- <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('kader.setoran.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                    <i class="flaticon2-plus-1"></i>Tambah Setoran
                </a>
            </div>
        </x-slot> --}}

        {{-- slot start --}}

        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <div class="row">
            <div class="col-12">
                <form action="{{ route('kader.setoran.store') }}" method="POST" id="setoran-store">
                    @csrf
        
                    <div class="form-group row">
                        <div class="col-3">
                            <select class="form-control select2" name="barang" id="barang">
                                <option value="">- Pilih Barang -</option>
                                @foreach ($barangList as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                @endforeach
                            </select>
                            <div id="barang-nya"></div>
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="text" name="jumlah" id="Jumlah" placeholder="Jumlah">
                        </div>
                        <div class="col-3">
                            <select class="form-control select2" name="berat_satuan" id="berat_satuan">
                                <option value="">- Pilih Berat Satuan -</option>
                                @foreach ($barangBeratList as $berat)
                                    <option value="{{ $berat->id }}">{{ $berat->nama }}</option>
                                @endforeach
                            </select>
                            <div id="berat_satuan-nya"></div>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary btn-block"><i class="flaticon2-plus-1"></i> Tambah Setoran</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered" id="table" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Barang Kategori</th>
                    <th>Jumlah (KG)</th>
                    <th>Tgl Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($setoranList as $setoran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $setoran->barang->nama }}</td>
                        <td>{{ $setoran->barang->kategori->nama }}</td>
                        <td class="text-right">{{ currency_format(float_two($setoran->jumlah)) }}</td>
                        <td>{{ $setoran->created_at }}</td>
                        <td>
                            <form method="POST" action="{{ route('kader.setoran.destroy', ['setoran' => $setoran->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\KaderSetoranStore',  '#setoran-store') !!}

            <script type="text/javascript">
                $(document).ready(function () {
                    $("#setoran-store").on('submit', function(){
                        if ($('#barang-error').length){
                            $("#barang-error").insertAfter("#barang-nya");
                        }

                        if ($('#berat_satuan-error').length){
                            $("#berat_satuan-error").insertAfter("#berat_satuan-nya");
                        }
                    });
                });
            </script>
        @endpush
    </x-card>
</x-app-layout>