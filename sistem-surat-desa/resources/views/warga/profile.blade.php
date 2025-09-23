<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Profil Data Diri') }}
            </h2>
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>{{ Auth::user()->name }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <x-alert type="success" class="mb-6">
                    {{ session('success') }}
                </x-alert>
            @endif
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Info Card -->
                <div class="lg:col-span-1">
                    <x-card title="Informasi Profil" icon="<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z' /></svg>">
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-16 h-16" />
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">{{ Auth::user()->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mt-1">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4">
                                <h4 class="text-sm font-medium text-gray-900">Informasi Akun</h4>
                                <dl class="mt-2 space-y-2">
                                    <div class="flex justify-between">
                                        <dt class="text-sm text-gray-500">NIK</dt>
                                        <dd class="text-sm font-medium text-gray-900">{{ $dataWarga->nik ?? '-' }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-sm text-gray-500">No. KK</dt>
                                        <dd class="text-sm font-medium text-gray-900">{{ $dataWarga->no_kk ?? '-' }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-sm text-gray-500">Tanggal Lahir</dt>
                                        <dd class="text-sm font-medium text-gray-900">
                                            @if($dataWarga && $dataWarga->tanggal_lahir)
                                                @if($dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                                                    {{ $dataWarga->tanggal_lahir->format('d F Y') }}
                                                @elseif($dataWarga->tanggal_lahir)
                                                    {{ \Carbon\Carbon::parse($dataWarga->tanggal_lahir)->format('d F Y') }}
                                                @else
                                                    {{ $dataWarga->tanggal_lahir }}
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </x-card>
                </div>
                
                <!-- Edit Form Card -->
                <div class="lg:col-span-2">
                    <x-card title="Edit Profil" icon="<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' /></svg>">
                        <form method="POST" action="{{ route('warga.update-profile') }}">
                            @csrf
                            @method('POST')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', Auth::user()->name)" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                
                                <div>
                                    <x-input-label for="nik" :value="__('NIK')" />
                                    <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik', $dataWarga->nik ?? '')" required />
                                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                                </div>
                                
                                <div>
                                    <x-input-label for="no_kk" :value="__('Nomor KK')" />
                                    <x-text-input id="no_kk" class="block mt-1 w-full" type="text" name="no_kk" :value="old('no_kk', $dataWarga->no_kk ?? '')" required />
                                    <x-input-error :messages="$errors->get('no_kk')" class="mt-2" />
                                </div>
                                
                                <div>
                                    <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                                    <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" :value="old('tempat_lahir', $dataWarga->tempat_lahir ?? '')" required />
                                    <x-input-error :messages="$errors->get('tempat_lahir')" class="mt-2" />
                                </div>
                                
                                <div>
                                    <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                                    <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir', $dataWarga->tanggal_lahir ?? '')" required />
                                    <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
                                </div>
                                
                                <div>
                                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm">
                                        <option value="Laki-laki" {{ (old('jenis_kelamin', $dataWarga->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ (old('jenis_kelamin', $dataWarga->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                                </div>
                                
                                <div class="md:col-span-2">
                                    <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
                                    <textarea id="alamat" name="alamat" rows="4" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm" required>{{ old('alamat', $dataWarga->alamat ?? '') }}</textarea>
                                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-end mt-6">
                                <x-button variant="primary" type="submit" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7' />">
                                    {{ __('Simpan Perubahan') }}
                                </x-button>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>