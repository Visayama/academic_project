@extends('layouts.main')
@section('title')
@section('navMhs','active')

@section('content')
<h1>Daftar Mahasiswa Jurusan TI</h1>
<table class="table table-bordered">
    <tr>
        <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Alamat</th>
    </tr>
    @foreach ($mahasiswas as $mahasiswa)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        {{-- <td>{{ $mahasiswa->firstItem()+$loop->index }} </td> --}}
        <td>{{ $mahasiswa-> nim }}</td>
        <td>{{ $mahasiswa-> nama_lengkap }}</td>
        <td>{{ $mahasiswa-> tempat_lahir }}</td>
        <td>{{ $mahasiswa-> tanggal_lahir }}</td>
        <td>{{ $mahasiswa-> email }}</td>
        <td>{{ $mahasiswa-> prodi->nama }}</td>
        <td>{{ $mahasiswa-> alamat }}</td>
    </tr>
    @endforeach
</table>
@endsection
