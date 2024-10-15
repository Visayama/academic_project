@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Data Mahasiswa</h1>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h3>{{ $mahasiswas->nama_lengkap }}</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-3">NIM: {{ $mahasiswas->nim }}</h5>
                    <hr>
                    <p class="card-text"><strong>Tempat Lahir: </strong>{{ $mahasiswas->tempat_lahir }}</p>
                    <p class="card-text"><strong>Tanggal Lahir: </strong>{{ $mahasiswas->tanggal_lahir }}</p>
                    <p class="card-text"><strong>Prodi: </strong>{{ $mahasiswas->prodi->nama }}</p>
                    <p class="card-text"><strong>Email: </strong>{{ $mahasiswas->email }}</p>
                    <p class="card-text"><strong>Alamat: </strong>{{ $mahasiswas->alamat }}</p>
                    <hr>
                    <a href="/dashboard-mahasiswa" class="btn btn-secondary">Kembali ke Daftar Mahasiswa</a>
                </div>
                <div class="card-footer text-muted">
                    Data terakhir diperbarui: {{ \Carbon\Carbon::parse($mahasiswas->updated_at)->format('d M Y H:i') }}
                </div>
            </div>
        </div>
    </div>
@endsection
