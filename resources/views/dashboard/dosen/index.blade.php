@extends('dashboard.layouts.main')
@section('title', 'Data Dosen')
@section('navDosen', 'active')

{{-- @section('content')
<h1>Daftar Dosen</h1>
<ol>
    @forelse ($dosen as $namaDosen)
    <li>{{ $namaDosen }}</li>
    @empty
    <div class="alert alert-warning d-inline-block">
        Datat tidak ada..Silahkan isi array untuk data dosen!</div>
        @endforelse
</ol>
@endsection --}}

@section('content')
<h1>Daftar Dosen</h1>
@if (session('pesan'))
@endif
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('pesan')}}
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <a href="/dashboard-dosen/create" class="btn btn-primary mb-2">Create Dosen</a>
  <a href="/cetak-pdf" target="_blank" class="btn btn-success mb-2">Cetak pdf</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Prodi</th>
        <th>Alamat</th>
    </tr>
    @foreach ($dosens as $dosen)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $dosen->nik }}</td>
        <td>{{ $dosen->nama }}</td>
        <td>{{ $dosen->email }}</td>
        <td>{{ $dosen->no_telp }}</td>
        <td>{{ $dosen->prodi_id }}</td>
        <td>{{ $dosen->alamat }}</td>
        <td>
            <div class="d-flex">
                <a href="dashboard-dosen/{{ $dosen->id }}" title="Lihat Detail"><button class="btn btn-success  me-2" type="button"><i class="bi bi-eye"></i></button></a>
                <a href="dashboard-dosen/{{ $dosen->id }}/edit" title="Edit Data"><button class="btn btn-warning  me-2" type="button"><i class="bi bi-pencil-square"></i></button></a>
                <form action="/dashboard-dosen/{{ $dosen->id }}" method="post" class="d-inline">
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
