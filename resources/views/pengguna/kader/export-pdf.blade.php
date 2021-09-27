<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kader</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        @page { 
            margin: 150px 50px 50px 50px;
        }

        #header { 
            position: fixed; 
            left: 0px; 
            top: -120px; 
            right: 0px; 
            height: 120px; 
            /* background-color: orange; */
        }

        #footer { 
            position: fixed; 
            left: 0px; 
            bottom: -120px; 
            right: 0px; 
            height: 20px;
            background-color: lightblue;
        }

        #footer .page:after { 
            content: counter(page, upper-roman); 
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font: normal 10px Verdana, Arial, sans-serif;
        }

        thead { display: table-header-group; }
        tfoot { display: table-row-group; }
        tr { page-break-inside: avoid; }

        th, tr {
            white-space: nowrap;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="header">
        <span style="float:left;">
            <b>
                Laporan Kader
                <br>
                {{ $bank_sampah_nama }}
                <br>
                Daftar Kader {{ bulan($bulan) }}  {{ $tahun }}
            </b>
            <br>
            @php
                setlocale (LC_TIME, 'id_ID');
                echo "Tanggal Cetak: ".strftime( "%d %B %Y");
            @endphp
        </span>
    
        <span style="float:right">
            <img src="{{ public_path('assets/media/logos/logo-letter-1.png') }}" width="70px" height="70px">
        </span>
    </div>
    <div id="footer">
        <p class="page">Page </p>
    </div>

    <table class="table" style="width:100%;">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Dibuat Oleh</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kaderList as $kader)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $kader->name }}</td>
                    <td>{{ $kader->email }}</td>
                    <td>{{ $kader->telepon }}</td>
                    <td>{{ $kader->alamat }}</td>
                    <td>{{ $kader->created_user->name }}</td>
                    <td>{{ $kader->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Here's the magic. This MUST be inside body tag. Page count / total, centered at bottom of page --}}
    <script type="text/php">
        if (isset($pdf)) {
            $text = "Halaman {PAGE_NUM} dari {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("Verdana");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) / 1;
            $y = $pdf->get_height() - 35;
            $pdf->page_text(735, $y, $text, $font, $size);
        }
    </script>
</body>
</html>