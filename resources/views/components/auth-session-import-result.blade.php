@props(['result'])

@if ($result)
    <div class="alert alert-custom alert-warning fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">
            <b>Error</b>
            <ul class="mb-0">
                @foreach ($result as $failure)
                <li>
                    Baris ke-{{ $failure->row() }}
                    <br>
                    Atribut: {{ $failure->attribute() }}
                    <br>
                    error:
                    @foreach ($failure->errors() as $error)
                        @if ($loop->last)
                            {{ $error }}
                        @else
                            {{ $error }}
                            <br>
                        @endif
                    @endforeach
                    <br>
                    data:
                    @foreach ($failure->values() as $value)
                        @if ($loop->last)
                            {{ $value }}
                        @else
                            {{ $value }}, 
                        @endif
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
