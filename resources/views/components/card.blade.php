@props(['title', 'toolbar' => ''])

<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                {{ $title }}
            </h3>
        </div>

        {{ $toolbar }}
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>