@extends('dashboard.layouts.main')
@section('title')
@section('navMhs','active')

@section('content')
<h1>Daftar Mahasiswa MataKuliah TI</h1>
@if (session('pesan'))
@endif
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('pesan')}}
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<a href="/dashboard-matakuliah/create" class="btn btn-primary mb-2">Create Mata Kuliah</a>
<a href="/cetak-pdf" target="_blank" class="btn btn-success mb-2">Cetak pdf</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
            <th>Kode_MK</th>
            <th>Nama_MK</th>
            <th>SKS</th>
            <th>Semester</th>
    </tr>
    @foreach ($matakuliahs as $matakuliah)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        {{-- <td>{{ $mahasiswa->firstItem()+$loop->index }} </td> --}}
        <td>{{ $matakuliah-> kode_mk }}</td>
        <td>{{ $matakuliah-> nama_mk }}</td>
        <td>{{ $matakuliah-> sks }}</td>
        <td>{{ $matakuliah-> semester }}</td>
        <td>
            <div class="d-flex">
                <a href="dashboard-matakuliah/{{ $matakuliah->id }}" title="Lihat Detail"><button class="btn btn-success  me-2" type="button"><i class="bi bi-eye"></i></button></a>
                <a href="dashboard-matakuliah/{{ $matakuliah->id }}/edit" title="Edit Data"><button class="btn btn-warning  me-2" type="button"><i class="bi bi-pencil-square"></i></button></a>
                <form action="/dashboard-matakuliah/{{ $matakuliah->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button title="Hapus Data" class="btn btn-danger btn-sm" onclick="return confirm('Ada iya mau hapus tu?')">
                        <i class="bi bi-trash3"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection
