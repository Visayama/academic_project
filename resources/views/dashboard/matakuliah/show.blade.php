@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Data Prodi</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                </div>
                <div class="card-body">
                    <hr>
                    <p class="card-text"><strong>Nama Mata Kuliah: </strong>{{ $matakuliahs->nama_mk }}</p>
                    <p class="card-text"><strong>Kode Mata Kuliah: </strong>{{ $matakuliahs->kode_mk }}</p>
                    <p class="card-text"><strong>SKS: </strong>{{ $matakuliahs ->sks }}</p>
                    <p class="card-text"><strong>Semester: </strong>{{ $matakuliahs->semester }}</p>
                    <hr>
                    <a href="/dashboard-matakuliah" class="btn btn-secondary">Kembali ke Daftar Mata kuliah</a>
                </div>
                <div class="card-footer text-muted">
                    Data terakhir diperbarui: {{ \Carbon\Carbon::parse($matakuliahs->updated_at)->format('d M Y H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection
