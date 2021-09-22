<x-app-layout>
    <x-card>
        <x-slot name="title">
            Setoran Kader
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Nama</th>
                <th>Total Sampah (KG)</th>
            </thead>
            <tbody>
                @foreach ($kaderSetoranList as $kaderSetoran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kaderSetoran->name }}</td>
                        <td class="text-right">{{ currency_format(float_two($kaderSetoran->setoran->sum('jumlah'))) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- slot end --}}
    </x-card>
</x-app-layout>