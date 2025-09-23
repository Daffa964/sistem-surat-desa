<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Surat: ') }} {{ $jenisSurat->nama_surat }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Data Pemohon</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <p class="mt-1">{{ Auth::user()->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NIK</label>
                            <p class="mt-1">{{ $dataWarga->nik }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <p class="mt-1">{{ $dataWarga->alamat }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <p class="mt-1">
                                @if($dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                                    {{ $dataWarga->tanggal_lahir->format('d F Y') }}
                                @elseif($dataWarga->tanggal_lahir)
                                    {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->format('d F Y') }}
                                @else
                                    {{ $dataWarga->tanggal_lahir }}
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <h3 class="text-lg font-semibold mb-4">Formulir {{ $jenisSurat->nama_surat }}</h3>
                    
                    <form method="POST" action="{{ route('warga.store-ajukan-surat', $jenisSurat->id) }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan</label>
                            <textarea name="data_tambahan[keperluan]" rows="3" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <a href="{{ route('warga.surat') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                Batal
                            </a>
                            
                            <x-primary-button>
                                Ajukan Surat
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>