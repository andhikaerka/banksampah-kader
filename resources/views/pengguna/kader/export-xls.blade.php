<!DOCTYPE html>
<html lang="en">
<body>
    <table>
        <tr>
            <td colspan="7">Laporan Kader</td>
        </tr>
        <tr>
            <td colspan="7">{{ $bank_sampah_nama }}</td>
        </tr>
        <tr>
            <td colspan="7">
                Bulan : {{ bulan($bulan) }}
            </td>
        </tr>
        <tr>
            <td colspan="7">
                Tahun : {{ $tahun }}
            </td>
        </tr>
    </table>

    <table>
        <thead class="thead-light">
            <tr>
                <th style="background-color: #b6b4b9;">No</th>
                <th style="background-color: #b6b4b9;">Nama Lengkap</th>
                <th style="background-color: #b6b4b9;">Email</th>
                <th style="background-color: #b6b4b9;">Telepon</th>
                <th style="background-color: #b6b4b9;">Alamat</th>
                <th style="background-color: #b6b4b9;">Dibuat Oleh</th>
                <th style="background-color: #b6b4b9;">Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kaderList as $kader)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $kader->name }}</td>
                    <td>{{ $kader->email }}</td>
                    <td style="text-align:left">{{ $kader->telepon }}</td>
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
</body>
</html>