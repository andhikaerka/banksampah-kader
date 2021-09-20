<x-app-layout>
    <div class="card card-custom gutter-b">
        <div class="card-body">
            Selamat Datang, 
            {{ ucwords(auth()->user()->name) }}
        </div>
    </div>
</x-app-layout>
