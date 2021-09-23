<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setoran Kader</title>
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
                Laporan Setoran Kader
                <br>
                {{ $bank_sampah_nama }}
                <br>
                Setoran Kader {{ bulan($bulan) }}  {{ $tahun }}
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
                <th>Nama</th>
                <th>Barang</th>
                <th class="text-right">Plastik (KG)</th>
                <th class="text-right">Non Plastik (KG)</th>
                <th class="text-right">Total Sampah (KG)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kaderSetoranList as $kaderSetoran)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
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