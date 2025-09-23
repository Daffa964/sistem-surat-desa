<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pengajuan Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Data Pemohon</h3>
                            <div class="space-y-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                                    <p class="mt-1">{{ $pengajuan->user->name }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">NIK</label>
                                    <p class="mt-1">{{ $pengajuan->user->dataWarga->nik }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                                    <p class="mt-1">{{ $pengajuan->user->dataWarga->alamat }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <p class="mt-1">{{ $pengajuan->user->dataWarga->tanggal_lahir->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Data Pengajuan</h3>
                            <div class="space-y-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                                    <p class="mt-1">{{ $pengajuan->jenisSurat->nama_surat }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
                                    <p class="mt-1">{{ $pengajuan->created_at->format('d F Y H:i') }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Keperluan</label>
                                    <p class="mt-1">{{ $pengajuan->data_tambahan['keperluan'] ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('kepala-desa.verifikasi-pengajuan', $pengajuan->id) }}">
                        @csrf
                        @method('POST')
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status Persetujuan</label>
                            <select name="status" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Pilih Status</option>
                                <option value="disetujui">Setujui & Terbitkan</option>
                                <option value="ditolak">Tolak</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alasan (Opsional)</label>
                            <textarea name="alasan" rows="3" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <a href="{{ route('kepala-desa.pengajuan') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                Batal
                            </a>
                            
                            <x-primary-button>
                                Simpan Persetujuan
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>