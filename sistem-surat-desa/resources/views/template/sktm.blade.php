@extends('layout')

@section('content')
    <div class="judul-surat">
        SURAT KETERANGAN TIDAK MAMPU
    </div>
    <div class="nomor-surat">
        Nomor: {{ $nomor_surat }}
    </div>

    <div class="content">
        <p class="no-indent">Yang bertanda tangan di bawah ini Kepala Desa Kemakmuran, Kecamatan Maju Jaya, Kabupaten
            Sejahtera, dengan ini menerangkan bahwa:</p>

        <table class="data-table">
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $pengajuan->user->name }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $pengajuan->user->dataWarga->nik }}</td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>:</td>
                <td>
                    {{ $pengajuan->user->dataWarga->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($pengajuan->user->dataWarga->tanggal_lahir)->isoFormat('D MMMM Y') }}
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $pengajuan->user->dataWarga->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pengajuan->user->dataWarga->alamat }}</td>
            </tr>
        </table>

        <p>Benar bahwa yang bersangkutan adalah penduduk Desa Kemakmuran dan berdasarkan data serta pengetahuan kami, yang
            bersangkutan termasuk dalam kategori keluarga tidak mampu.</p>

        <p>Surat keterangan ini dibuat untuk keperluan:
            <strong>{{ $pengajuan->data_tambahan['keperluan'] ?? '-' }}</strong>.
        </p>

        <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="tanda-tangan">
        <p>Kemakmuran, {{ now()->isoFormat('D MMMM Y') }}</p>
        <p class="jabatan">Kepala Desa Kemakmuran</p>

        <div class="qr-code">
            {!! $qrCode !!}
        </div>

        <p class="nama">BUDI SANTOSO</p>
        <p>NIP. 19750101 200001 1 001</p>
    </div>
@endsection
