<!DOCTYPE html>
<html lang="en">
<head>
    <title>Generate pdf</title>
</head>
<body>
<h1 class="h2">Daftar Prodi Jurusan TI</h1>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
    </tr>
    @foreach($prodis as $prodi)
    <tr>
        <td>{{ $prodis->firstItem() + $loop->index }}</td>
        <td>{{ $prodi->nama }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>
