@extends('layouts.app')

@section('content')
    <h1>Daftar Mahasiswa</h1>

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

    <!-- Tabel untuk menampilkan data dosen wali -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>NIDN Dosen Wali</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs['nim'] }}</td> <!-- Akses data sebagai array -->
                <td>{{ $mhs['nama_mahasiswa'] }}</td>
                <td>{{ $mhs['email'] }}</td>
                <td>{{ $mhs['alamat'] }}</td>
                <td>{{ $mhs['nim'] }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mhs['nim']) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mhs['nim']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
