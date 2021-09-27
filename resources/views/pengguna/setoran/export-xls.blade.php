<!DOCTYPE html>
<html lang="en">
<body>
    <table>
        <tr>
            <td colspan="6">Laporan Setoran Kader</td>
        </tr>
        <tr>
            <td colspan="6">{{ $bank_sampah_nama }}</td>
        </tr>
        <tr>
            <td colspan="6">
                Bulan : {{ bulan($bulan) }}
            </td>
        </tr>
        <tr>
            <td colspan="6">
                Tahun : {{ $tahun }}
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th style="background-color: #b6b4b9;">No</th>
                <th style="background-color: #b6b4b9;">Nama</th>
                <th style="background-color: #b6b4b9;">Barang</th>
                <th style="background-color: #b6b4b9;">Plastik (KG)</th>
                <th style="background-color: #b6b4b9;">Non Plastik (KG)</th>
                <th style="background-color: #b6b4b9;">Total Sampah (KG)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kaderSetoranList as $kaderSetoran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kaderSetoran->created_user->name }}</td>
                <td>{{ $kaderSetoran->barang->nama }}</td>
                <td>
                    @if ($kaderSetoran->barang->kategori->nama == 'Plastik')
                        {{ currency_format(float_two($kaderSetoran->jumlah)) }}
                    @endif
                </td>
                <td >
                    @if ($kaderSetoran->barang->kategori->nama == 'Non Plastik')
                        {{ currency_format(float_two($kaderSetoran->jumlah)) }}
                    @endif
                </td>
                <td >{{ currency_format(float_two($kaderSetoran->jumlah)) }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center">Tidak Ada Data Tersedia</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="table-secondary">
                <td colspan="3" align="right"><b>Total (KG)</b></td>
                <td >{{ currency_format(float_two($sampahPlastikTotal)) }}</td>
                <td >{{ currency_format(float_two($sampahNonPlastikTotal)) }}</td>
                <td >{{ currency_format(float_two($sampahTotal)) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>