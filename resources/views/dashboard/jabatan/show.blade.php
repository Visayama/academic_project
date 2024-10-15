@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Data Jabtan</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                </div>
                <div class="card-body">
                    <hr>
                    <p class="card-text"><strong>Nama Jabatan: </strong>{{ $jabatanss->nama_jabatan }}</p>
                    <p class="card-text"><strong>Kode Jabatan: </strong>{{ $jabatanss->kode_jabatan }}</p>
                    <hr>
                    <a href="/dashboard-jabatan" class="btn btn-secondary">Kembali ke Daftar Jabatan</a>
                </div>
                <div class="card-footer text-muted">
                    Data terakhir diperbarui: {{ \Carbon\Carbon::parse($jabatanss->updated_at)->format('d M Y H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection
