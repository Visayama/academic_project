@extends('dashboard.layouts.main')
@section('title')
@section('navMhs','active')

@section('content')
<h1>Daftar Mahasiswa Jabatan TI</h1>
@if (session('pesan'))
@endif
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('pesan')}}
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<a href="/dashboard-jabatan/create" class="btn btn-primary mb-2">Create Jabatan</a>
<a href="/cetak-pdf" target="_blank" class="btn btn-success mb-2">Cetak pdf</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
            <th>Kode_Jabatan</th>
            <th>Nama_Jabatan</th>
    </tr>
    @foreach ($jabatanss as $jabatan)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        {{-- <td>{{ $mahasiswa->firstItem()+$loop->index }} </td> --}}
        <td>{{ $jabatan-> kode_jabatan }}</td>
        <td>{{ $jabatan-> nama_jabatan }}</td>
        <td>
            <div class="d-flex">
                <a href="dashboard-jabatan/{{ $jabatan->id }}" title="Lihat Detail"><button class="btn btn-success  me-2" type="button"><i class="bi bi-eye"></i></button></a>
                <a href="dashboard-jabatan/{{ $jabatan->id }}/edit" title="Edit Data"><button class="btn btn-warning  me-2" type="button"><i class="bi bi-pencil-square"></i></button></a>
                <form action="/dashboard-jabatan/{{ $jabatan->id }}" method="post" class="d-inline">
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
