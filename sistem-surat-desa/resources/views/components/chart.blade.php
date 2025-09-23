@props(['id', 'type' => 'bar', 'data' => '[]', 'options' => '[]'])

<div {{ $attributes->merge(['class' => 'chart-container']) }}>
    <canvas id="{{ $id }}"></canvas>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('{{ $id }}').getContext('2d');
        var chart = new Chart(ctx, {
            type: '{{ $type }}',
            data: @json($data),
            options: @json($options)
        });
    });
</script>
@endpush