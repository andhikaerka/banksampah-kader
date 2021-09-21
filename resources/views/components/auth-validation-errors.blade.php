@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        

        <div class="alert alert-danger">
            <div class="font-medium text-red-600">
                {{ __('Terjadi Kesalahan') }}
            </div>
            
            <ul class="mx-0 my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
