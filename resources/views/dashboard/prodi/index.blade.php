@extends('dashboard.layouts.main')
@section('title','Data Prodi')
@section('navDsn','active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Prodi Jurusan TI</h1>
  </div>

  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
    <a href="/dashboard-prodi/create" class="btn btn-primary mb-3">Create Prodi</a>
    <a href="/cetak-pdf" target="_blank" class="btn btn-success mb-2">Cetak pdf</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            {{-- <th>NIM</th> --}}
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
@foreach($prodis as $prodi)
        <tr>
            <td>{{ $prodis->firstItem()+$loop->index}}</td>
            {{-- <td>{{ $mahasiswa->nim }}</td> --}}
            <td>{{ $prodi->nama }}</td>
            <td class="text-nowrap">
                <a href="/dashboard-prodi/{{ $prodi->id }}" title="Lihat Detail" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                <a href="/dashboard-prodi/{{ $prodi->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                <form action="/dashboard-prodi/{{ $prodi->id }}" title="Hapus Data" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
        </tr>
@endforeach
    </table>
@endsection
