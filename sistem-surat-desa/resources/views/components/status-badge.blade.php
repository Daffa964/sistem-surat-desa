@props(['status'])

@php
    $statusClasses = [
        'diajukan' => 'bg-yellow-100 text-yellow-800',
        'perbaikan' => 'bg-red-100 text-red-800',
        'diverifikasi' => 'bg-blue-100 text-blue-800',
        'disetujui' => 'bg-green-100 text-green-800',
        'ditolak' => 'bg-red-100 text-red-800',
        'selesai' => 'bg-green-100 text-green-800',
    ];
    
    $statusText = [
        'diajukan' => 'Diajukan',
        'perbaikan' => 'Perbaikan',
        'diverifikasi' => 'Diverifikasi',
        'disetujui' => 'Disetujui',
        'ditolak' => 'Ditolak',
        'selesai' => 'Selesai',
    ];
@endphp

<span {{ $attributes->merge(['class' => "px-2 inline-flex text-xs leading-5 font-semibold rounded-full {$statusClasses[$status] ?? 'bg-gray-100 text-gray-800'}"]) }}>
    {{ $statusText[$status] ?? ucfirst($status) }}
</span>