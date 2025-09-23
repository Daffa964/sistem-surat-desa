<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Pilih Jenis Surat</h3>
                    
                    @if($jenisSurat->isEmpty())
                        <p class="text-gray-600">Belum ada jenis surat yang tersedia.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($jenisSurat as $surat)
                                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50">
                                    <h4 class="font-semibold text-lg">{{ $surat->nama_surat }}</h4>
                                    <p class="text-gray-600 text-sm mt-1">Kode: {{ $surat->kode_surat }}</p>
                                    <a href="{{ route('warga.ajukan-surat', $surat->id) }}" class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
                                        Ajukan
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>