<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengajuan->jenisSurat->nama_surat }}</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto;
            padding: 2cm;
            box-sizing: border-box;
        }
        
        .header {
            text-align: center;
            margin-bottom: 1cm;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
        }
        
        .logo-container {
            position: absolute;
            left: 2cm;
            top: 2cm;
        }
        
        .logo {
            width: 2.5cm;
            height: 3cm;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8pt;
            text-align: center;
        }
        
        .kop-surat {
            text-align: center;
            line-height: 1.2;
        }
        
        .kop-surat .institution {
            font-size: 14pt;
            font-weight: bold;
        }
        
        .kop-surat .institution-detail {
            font-size: 12pt;
            font-weight: bold;
        }
        
        .kop-surat .alamat {
            font-size: 10pt;
        }
        
        .kop-surat .contact {
            font-size: 10pt;
        }
        
        .nomor-surat {
            text-align: center;
            margin: 1cm 0;
            padding-top: 5px;
        }
        
        .nomor-surat p {
            margin: 0;
            text-decoration: underline;
        }
        
        .perihal {
            text-align: center;
            font-weight: bold;
            margin-bottom: 1cm;
        }
        
        .content {
            text-align: justify;
            margin-bottom: 1cm;
        }
        
        .content p {
            margin: 0 0 1em 0;
            text-indent: 2cm;
        }
        
        .content .no-indent {
            text-indent: 0;
        }
        
        .data-table {
            width: 100%;
            margin: 0.5cm 0;
            border-collapse: collapse;
        }
        
        .data-table td {
            padding: 2px 0;
        }
        
        .tanda-tangan {
            width: 8cm;
            float: right;
            text-align: center;
            margin-top: 1cm;
        }
        
        .tanda-tangan .jabatan {
            margin-bottom: 2cm;
        }
        
        .tanda-tangan .nama {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 1cm;
        }
        
        .qr-container {
            position: absolute;
            right: 2cm;
            bottom: 3cm;
            text-align: center;
        }
        
        .qr-code {
            margin: 0 auto;
        }
        
        .qr-code svg {
            width: 3cm;
            height: 3cm;
        }
        
        .qr-note {
            font-size: 10pt;
            margin-top: 0.5cm;
        }
        
        .footer {
            position: absolute;
            bottom: 2cm;
            width: 100%;
            text-align: center;
        }
        
        .footer p {
            margin: 0;
            font-size: 10pt;
        }
        
        .stamp {
            position: absolute;
            right: 5cm;
            bottom: 4cm;
            width: 3cm;
            height: 3cm;
            border: 2px dashed #999;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8pt;
            text-align: center;
        }
        
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">Logo Desa</div>
        </div>
        
        <div class="header">
            <div class="kop-surat">
                <div class="institution">PEMERINTAH KABUPATEN SEJAHTERA</div>
                <div class="institution-detail">KECAMATAN MAJU JAYA</div>
                <div class="institution-detail">DESA KEMAKMURAN</div>
                <div class="alamat">Alamat: Jalan Merdeka No. 1 Desa Kemakmuran, Kecamatan Maju Jaya</div>
                <div class="contact">Telepon: (021) 123456 | Email: desakemakmuran@example.com</div>
            </div>
        </div>
        
        @yield('content')
        
        <div class="clear"></div>
        
        <div class="stamp">
            Cap Desa
        </div>
        
        <div class="qr-container">
            <div class="qr-code">{!! $qrCode !!}</div>
            <div class="qr-note">Scan QR Code untuk verifikasi</div>
        </div>
        
        <div class="footer">
            <p>Surat ini dicetak oleh Sistem Surat Desa Digital pada {{ now()->format('d F Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>