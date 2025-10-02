<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengajuan->jenisSurat->nama_surat }}</title>
    <style>
        @page {
            /* Set margin halaman langsung di sini */
            margin: 2cm 1.5cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        /* Container tidak perlu padding/width lagi karena sudah diatur di @page */
        .container {
            width: 100%;
            position: relative;
        }

        .kop-surat {
            width: 100%;
            border-bottom: 4px double #000;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .kop-surat .logo {
            width: 85px;
            /* Sesuaikan ukuran logo jika perlu */
            height: auto;
        }

        .kop-surat .text-kop {
            text-align: center;
            line-height: 1.3;
        }

        .kop-surat .text-kop .nama-instansi {
            font-size: 18pt;
            font-weight: bold;
        }

        .kop-surat .text-kop .nama-detail {
            font-size: 16pt;
            font-weight: bold;
        }

        .kop-surat .text-kop .alamat {
            font-size: 11pt;
        }

        /* Mengganti class .perihal dan .nomor-surat */
        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
            margin-top: 20px;
            margin-bottom: 5px;
        }

        .nomor-surat-text {
            text-align: center;
            font-size: 12pt;
            margin-bottom: 30px;
        }

        .content {
            text-align: justify;
        }

        .content p {
            margin: 0 0 1em 0;
            text-indent: 2.5cm;
        }

        .content .no-indent {
            text-indent: 0;
        }

        .data-table {
            width: 100%;
            margin-left: 2.5cm;
            /* Menjorok ke dalam */
            border-collapse: collapse;
        }

        .data-table td {
            padding: 4px 0;
            vertical-align: top;
        }

        .tanda-tangan {
            width: 40%;
            float: right;
            text-align: center;
            margin-top: 40px;
        }

        .tanda-tangan .jabatan {
            /* Kurangi jarak bawah untuk memberi ruang bagi QR Code */
            margin-bottom: 10px;
        }

        .tanda-tangan .qr-code {
            /* Memberi sedikit spasi dan memastikan di tengah */
            margin: 5px auto;
            display: block;
        }

        .tanda-tangan .qr-code svg {
            width: 80px;
            /* Ukuran QR Code */
            height: 80px;
        }

        .tanda-tangan .nama {
            font-weight: bold;
            text-decoration: underline;
            /* Beri jarak dari QR Code */
            margin-top: 10px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="kop-surat">
            <tr>
                <td style="width: 20%; text-align: center;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo-desa.png'))) }}"
                        alt="Logo Desa" class="logo">
                </td>
                <td style="width: 80%;" class="text-kop">
                    <div class="nama-instansi">PEMERINTAH KABUPATEN SEJAHTERA</div>
                    <div class="nama-detail">KECAMATAN MAJU JAYA</div>
                    <div class="nama-detail">DESA KEMAKMURAN</div>
                    <div class="alamat">Alamat: Jalan Merdeka No. 1 Desa Kemakmuran, Kecamatan Maju Jaya</div>
                    <div class="alamat">Telepon: (021) 123456 | Email: desakemakmuran@example.com</div>
                </td>
            </tr>
        </table>

        @yield('content')

        <div class="clear"></div>

    </div>
</body>

</html>
