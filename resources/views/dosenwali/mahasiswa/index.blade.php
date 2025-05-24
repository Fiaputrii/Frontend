@extends('layouts.dosen')
@section('content')
<h2>Daftar Mahasiswa</h2>

<table id="mahasiswaTable" class="display">
    <thead>
        <tr>
            <th>NIM</th><th>Nama</th><th>Email</th><th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $m)
        <tr>
            <td>{{ $m['nim'] }}</td>
            <td>{{ $m['nama_mahasiswa'] }}</td>
            <td>{{ $m['email'] }}</td>
            <td>
                <a href="{{ route('mahasiswa.show', $m['nim']) }}">Lihat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#mahasiswaTable').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
