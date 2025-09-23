<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Surat Desa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Sistem Surat Desa Digital</h1>
                    <p class="text-lg text-gray-600 mb-8">Solusi modern untuk penerbitan surat administratif di desa Anda</p>
                    
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700">
                            Daftar
                        </a>
                    </div>
                </div>

                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-2">Efisiensi</h2>
                        <p class="text-gray-600">Kurangi waktu proses penerbitan surat dari beberapa hari menjadi maksimal 1x24 jam.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-2">Aksesibilitas</h2>
                        <p class="text-gray-600">Ajukan permohonan surat secara online 24/7 tanpa harus datang ke kantor desa.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-2">Transparansi</h2>
                        <p class="text-gray-600">Lacak status pengajuan surat secara real-time dan unduh surat yang sudah jadi.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>