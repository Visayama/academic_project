<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generate pdf</title>
</head>
<body>
<h1>Daftar Dosen TI</h1>
<table>
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
    </tr>
    @endforeach
</table>
</body>
</html>
