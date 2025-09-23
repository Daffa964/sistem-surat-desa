# Sistem Surat Desa Digital

Sistem Surat Desa Digital adalah aplikasi berbasis web yang dirancang untuk memodernisasi dan menyederhanakan proses pengajuan, verifikasi, dan penerbitan surat-surat administratif di tingkat desa.

## Fitur Utama

1. **Manajemen Pengguna**:
   - Tiga tingkat peran: Warga, Admin, dan Kepala Desa
   - Autentikasi dan registrasi pengguna

2. **Profil Data Kependudukan**:
   - Warga dapat melengkapi dan mengelola data diri mereka

3. **Pengajuan Surat**:
   - Warga dapat mengajukan berbagai jenis surat secara online
   - Alur pengajuan yang mudah dan terstruktur

4. **Verifikasi Dua Tahap**:
   - Verifikasi oleh Admin
   - Persetujuan akhir oleh Kepala Desa

5. **Penerbitan Surat**:
   - Pembuatan otomatis surat dalam format PDF
   - Penyematan QR Code sebagai tanda tangan digital
   - Penomoran surat otomatis

6. **Verifikasi Keaslian Surat**:
   - Halaman publik untuk memverifikasi keaslian surat melalui QR Code

7. **Riwayat Pengajuan**:
   - Warga dapat melihat riwayat pengajuan mereka
   - Status real-time untuk setiap pengajuan

## Teknologi yang Digunakan

- **Backend**: Laravel 10+
- **Frontend**: Blade Templates, Tailwind CSS
- **Database**: MySQL
- **Library Tambahan**:
  - `barryvdh/laravel-dompdf` untuk pembuatan PDF
  - `simplesoftwareio/simple-qrcode` untuk pembuatan QR Code

## Instalasi

1. Clone repository ini
2. Jalankan `composer install`
3. Salin file `.env.example` menjadi `.env`
4. Generate application key dengan `php artisan key:generate`
5. Konfigurasi database di file `.env`
6. Jalankan migrasi database dengan `php artisan migrate`
7. (Opsional) Jalankan seeder dengan `php artisan db:seed`
8. Jalankan server dengan `php artisan serve`

## Penggunaan

Setelah instalasi, Anda dapat mengakses aplikasi melalui browser di `http://localhost:8000`.

### Akun Default

- **Admin**: admin@desa.com / password
- **Kepala Desa**: kepala@desa.com / password
- **Warga**: warga@desa.com / password

## Struktur Database

Aplikasi ini menggunakan 4 tabel utama:

1. `users` - Menyimpan data pengguna dengan peran mereka
2. `data_warga` - Menyimpan data kependudukan warga
3. `jenis_surat` - Menyimpan jenis-jenis surat yang tersedia
4. `pengajuan_surat` - Menyimpan riwayat pengajuan surat

## Lisensi

MIT License