@props(['title', 'nomor' => null, 'tanggal' => null])

<div class="border border-gray-300 rounded-lg p-6 bg-white">
    <div class="text-center mb-6">
        @if($nomor)
            <div class="text-sm text-gray-600">Nomor: {{ $nomor }}</div>
        @endif
        @if($tanggal)
            <div class="text-sm text-gray-600">Tanggal: {{ $tanggal }}</div>
        @endif
    </div>
    
    <div class="text-center mb-6">
        <h2 class="text-xl font-bold">{{ $title }}</h2>
    </div>
    
    <div class="prose max-w-none">
        {{ $slot }}
    </div>
</div>