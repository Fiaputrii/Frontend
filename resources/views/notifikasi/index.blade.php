@extends('layouts.app')

@section('content')
    <h1>Data Notifikasi</h1>
    <a href="{{ route('notifikasi.create') }}" class="btn btn-primary mb-3">Tambah Notifikasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Notifikasi</th>
                <th>Tipe</th>
                <th>Tanggal Kirim</th>
                <th>Pesan</th>
                <th>NIM Mahasiswa</th>
                <th>NIDN Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifikasi as $notif)
                <tr>
                    <td>{{ $notif->id_notifikasi }}</td>
                    <td>{{ $notif->tipe }}</td>
                    <td>{{ $notif->tanggal_kirim }}</td>
                    <td>{{ $notif->pesan }}</td>
                    <td>{{ $notif->nim }}</td>
                    <td>{{ $notif->nidn }}</td>
                    <td>
                        <a href="{{ route('notifikasi.edit', $notif->id_notifikasi) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('notifikasi.destroy', $notif->id_notifikasi) }}" method="POST" style="display:inline;">
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
