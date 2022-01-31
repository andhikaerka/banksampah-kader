<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Kader Bank Sampah Online" />
        <title>Kader Bank Sampah Online</title>
        <link rel="icon" type="image/x-icon" href="assets/media/logos/favicon.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body onload="load()">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
				<a class="navbar-brand fw-bold" href="{{ url('/') }}">Kader Bank Sampah Online</a>

                @if ($sponsorHeaderMenuList->isNotEmpty())
                    @forelse ($sponsorHeaderMenuList as $sponsor)
                        <a @if($sponsor->url) href="{{ $sponsor->url }}" target="_blank" @else href="#" @endif rel="noopener noreferrer">
                            <img class="max-h-70px navbar-brand fw-bold" height="50px" src="{{ asset('sponsor/'.$sponsor->gambar) }}" alt="{{ $sponsor->alt_text }}">
                        </a>
                    @empty
                        
                    @endforelse
                @endif
				
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
				
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        @if (auth()->check())
                        <li class="nav-item"><a class="nav-link me-lg-3 fw-bold" href="{{ route('dashboard') }}">Dahsboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link me-lg-3 fw-bold" href="{{ route('login') }}">Login</a></li>
                        {{-- <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('register') }}">Register</a></li> --}}
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="container-fluid px-5">
                        <h2 class="text-center text-dark font-alt mb-5">Capaian Program</h2>
                        <div class="row">
                            <form class="mb-2 px-0" action="" method="GET">
                                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center">
                                    <select class="form-control" name="provinsi" id="provinsi" style="margin-right:5px">
                                        <option value="">- Semua Provinsi -</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" @if($province->id == request('provinsi')) selected @endif>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" name="kabupaten_kota" id="kabupaten_kota" style="margin-right:5px">
                                        <option value="">- Semua Kabupaten/Kota -</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if($city->id == request('kabupaten_kota')) selected @endif>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" name="kategori" id="kategori" style="margin-right:5px">
                                        <option value="">- Semua Kategori -</option>
                                        @foreach ($penggunaKategoriList as $penggunaKategori)
                                        <option value="{{ $penggunaKategori->id }}" @if($penggunaKategori->id == request('kategori')) selected @endif>{{ $penggunaKategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control" name="tahun" id="tahun" style="margin-right:5px">
                                        <option value="">- Semua Tahun Setoran-</option>
                                        @foreach ($tahunSetoranList as $tahunSetoran)
                                        <option value="{{ $tahunSetoran->tahun }}" @if($tahunSetoran->tahun == request('tahun')) selected @endif>{{ $tahunSetoran->tahun }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle">Bank Sampah</th>
                                        <th colspan="3" class="text-center">Penerima Manfaat</th>
                                        <th colspan="3" class="text-center">Jumlah Tabungan</th>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kader <br> (Langsung)</th>
                                        <th class="align-middle">Kaderisasi <br> (Tidak Langsung)</th>
                                        <th class="align-middle">Nasabah</th>

                                        <th class="align-middle">Plastik (KG)</th>
                                        <th class="align-middle">Non Plastik (KG)</th>
                                        <th class="align-middle">Total (KG)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bankSampahTable as $bankSampah)
                                    <tr>
                                        <td>{{ $bankSampahTable->firstItem() + $loop->index }}</td>
                                        <td>{{ $bankSampah->nama }}</td>
                                        <td align="right">{{ $bankSampah->kader_count }}</td>
                                        <td align="right">{{ $bankSampah->kaderisasi_count }}</td>
                                        <td align="right">{{ $bankSampah->nasabah_count }}</td>
                                        <td align="right">{{ float_two($bankSampah->setoran_plastik_sum_jumlah) }}</td>
                                        <td align="right">{{ float_two($bankSampah->setoran_non_plastik_sum_jumlah) }}</td>
                                        <td align="right">{{ float_two($bankSampah->setoran_sum_jumlah) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $bankSampahTable->appends([
                                'provinsi' => request('provinsi'),
                                'kabupaten_kota' => request('kabupaten_kota'),
                                'tahun' => request('tahun')
                                ])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Bank Sampah Online 2021. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
