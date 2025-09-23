<x-layouts.guest>
    <x-slot name="title">
        Verifikasi Surat
    </x-slot>

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold">Verifikasi Keaslian Surat</h2>
        <p class="text-gray-600 mt-2">Masukkan kode QR atau ID surat untuk memverifikasi keasliannya</p>
    </div>

    @if(session('error'))
        <div class="mb-4 text-red-600 text-center">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verifikasi.verify') }}">
        @csrf
        
        <div>
            <x-input-label for="kode_qr" :value="__('Kode QR / ID Surat')" />
            <x-text-input id="kode_qr" class="block mt-1 w-full" type="text" name="kode_qr" :value="old('kode_qr')" required autofocus />
            <x-input-error :messages="$errors->get('kode_qr')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Verifikasi') }}
            </x-primary-button>
        </div>
    </form>
</x-layouts.guest>