<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Kepala Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Total Pengajuan</h3>
                            <p class="text-3xl font-bold">{{ $totalPengajuan }}</p>
                        </div>
                        
                        <div class="bg-yellow-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Menunggu Persetujuan</h3>
                            <p class="text-3xl font-bold">{{ $pengajuanMenunggu }}</p>
                        </div>
                        
                        <div class="bg-green-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">Telah Disetujui</h3>
                            <p class="text-3xl font-bold">{{ $pengajuanDisetujui }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Aksi Cepat</h3>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('kepala-desa.pengajuan') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Setujui Pengajuan
                            </a>
                            <a href="{{ route('kepala-desa.riwayat') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                                Riwayat Pengajuan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>