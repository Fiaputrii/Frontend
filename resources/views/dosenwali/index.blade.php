@extends('layouts.app')

@section('content')
    <h1>Daftar Dosen Wali</h1>

    <a href="{{ route('dosenwali.create') }}" class="btn btn-primary mb-3">Tambah Dosen Wali</a>

    <!-- Tabel untuk menampilkan data dosen wali -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosenwali as $item)
                <tr>
                    <td>{{ $item->nidn }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <!-- Tombol untuk edit dan hapus -->
                        <a href="{{ route('dosenwali.edit', $item->nidn) }}" class="btn btn-warning">Edit</a>
                        
                        <form action="{{ route('dosenwali.destroy', $item->nidn) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
