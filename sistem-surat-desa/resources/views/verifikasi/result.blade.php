<x-layouts.guest>
    <x-slot name="title">
        Hasil Verifikasi Surat
    </x-slot>

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold">Hasil Verifikasi Surat</h2>
    </div>

    @if(!$pengajuan)
        <div class="text-center">
            <p class="text-red-600">Surat tidak ditemukan atau belum disetujui.</p>
            <a href="{{ route('verifikasi.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Kembali ke halaman verifikasi</a>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-center mb-6">
                <svg class="w-16 h-16 text-green-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold mt-2">Surat Dinyatakan VALID</h3>
                <p class="text-gray-600">Surat ini adalah surat resmi yang diterbitkan oleh Kantor Desa</p>
            </div>
            
            <div class="border-t border-gray-200 pt-4">
                <h4 class="font-semibold text-lg mb-3">Detail Surat</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                        <p class="mt-1">{{ $pengajuan->id }}/KD/{{ date('Y') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                        <p class="mt-1">{{ $pengajuan->jenisSurat->nama_surat }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Pemohon</label>
                        <p class="mt-1">{{ $pengajuan->user->name }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Diterbitkan</label>
                        <p class="mt-1">{{ $pengajuan->updated_at->format('d F Y') }}</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Keperluan</label>
                        <p class="mt-1">{{ $pengajuan->data_tambahan['keperluan'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('verifikasi.index') }}" class="text-blue-600 hover:underline">Verifikasi surat lain</a>
        </div>
    @endif
</x-layouts.guest>