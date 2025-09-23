@extends('templates.layout')

@section('content')
<div class="nomor-surat">
    <p>Nomor: {{ $nomor_surat }}</p>
</div>

<div class="perihal">
    <p>SURAT KETERANGAN USAHA</p>
</div>

<div class="content">
    <p>Yang bertanda tangan di bawah ini Kepala Desa Kemakmuran, Kecamatan Maju Jaya, Kabupaten Sejahtera dengan ini menerangkan bahwa :</p>
    
    <table class="data-table">
        <tr>
            <td width="30%">Nama</td>
            <td width="5%">:</td>
            <td>{{ $pengajuan->user->name }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $pengajuan->user->dataWarga->nik }}</td>
        </tr>
        <tr>
            <td>Tempat/Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $pengajuan->user->dataWarga->tempat_lahir }}, 
                @if($pengajuan->user->dataWarga->tanggal_lahir instanceof \Carbon\Carbon)
                    {{ $pengajuan->user->dataWarga->tanggal_lahir->format('d F Y') }}
                @elseif($pengajuan->user->dataWarga->tanggal_lahir)
                    {{ \Carbon\Carbon::parse($pengajuan->user->dataWarga->tanggal_lahir)->format('d F Y') }}
                @else
                    {{ $pengajuan->user->dataWarga->tanggal_lahir }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $pengajuan->user->dataWarga->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>Wiraswasta</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $pengajuan->user->dataWarga->alamat }}</td>
        </tr>
        <tr>
            <td>Nama Usaha</td>
            <td>:</td>
            <td>{{ $pengajuan->data_tambahan['keperluan'] ?? '-' }}</td>
        </tr>
    </table>

    <p class="no-indent">Benar nama tersebut di atas adalah penduduk Desa Kemakmuran dan memiliki usaha {{ $pengajuan->data_tambahan['keperluan'] ?? '-' }} yang berdomisili di {{ $pengajuan->user->dataWarga->alamat }}.</p>
    
    <p class="no-indent">Surat keterangan ini diberikan untuk keperluan : {{ $pengajuan->data_tambahan['keperluan'] ?? '-' }}.</p>
    
    <p class="no-indent">Demikian Surat Keterangan Usaha ini dibuat dengan sebenarnya dan untuk dapat dipergunakan sebagaimana mestinya.</p>
</div>

<div class="tanda-tangan">
    <p>Kemakmuran, {{ now()->format('d F Y') }}</p>
    <p class="jabatan">Kepala Desa Kemakmuran</p>
    <p class="nama">BUDI SANTOSO</p>
    <p>NIP. 19750101 200001 1 001</p>
</div>
@endsection