<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jenis Surat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('surat.store') }}">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="kode_surat" :value="__('Kode Surat')" />
                                <x-text-input id="kode_surat" class="block mt-1 w-full" type="text" name="kode_surat" :value="old('kode_surat')" required />
                                <x-input-error :messages="$errors->get('kode_surat')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="nama_surat" :value="__('Nama Surat')" />
                                <x-text-input id="nama_surat" class="block mt-1 w-full" type="text" name="nama_surat" :value="old('nama_surat')" required />
                                <x-input-error :messages="$errors->get('nama_surat')" class="mt-2" />
                            </div>
                            
                            <div class="md:col-span-2">
                                <x-input-label for="template_path" :value="__('Template Path')" />
                                <x-text-input id="template_path" class="block mt-1 w-full" type="text" name="template_path" :value="old('template_path')" required />
                                <x-input-error :messages="$errors->get('template_path')" class="mt-2" />
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('surat.index') }}" class="mr-3 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                Batal
                            </a>
                            
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>