@extends('dashboard.layouts.main')
@section('title')
@section('navMhs','active')

@section('content')
<h1>Daftar User</h1>
@if (session('pesan'))
@endif
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('pesan')}}
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<a href="/dashboard-user/create" class="btn btn-primary mb-2">Create User</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
            <th>Nama</th>
            <th>Email</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        {{-- <td>{{ $mahasiswa->firstItem()+$loop->index }} </td> --}}
        <td>{{ $user-> name }}</td>
        <td>{{ $user-> email }}</td>
        <td>
            <div class="d-flex">
                <a href="dashboard-user/{{ $user->id }}" title="Lihat Detail"><button class="btn btn-success  me-2" type="button"><i class="bi bi-eye"></i></button></a>
                <a href="dashboard-user/{{ $user->id }}/edit" title="Edit Data"><button class="btn btn-warning  me-2" type="button"><i class="bi bi-pencil-square"></i></button></a>
                <form action="/dashboard-user/{{ $user->id }}" method="post" class="d-inline">
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
