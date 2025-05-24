@extends('layouts.app')

@section('content')
    <h1>Daftar Pertemuan Perwalian</h1>

    <a href="{{ route('pertemuanperwalian.create') }}" class="btn btn-primary mb-3">Tambah Pertemuan Perwalian</a>

    <!-- Tabel untuk menampilkan data pertemuan perwalian -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pertemuan</th>
                <th>Tanggal</th>
                <th>Topik</th>
                <th>Catatan</th>
                <th>Saran Akademik</th>
                <th>NIM</th>
                <th>NIDN Dosen Wali</th>
                <th>Tahun Bulan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pertemuanperwalian as $pertemuan)
                <tr>
                    <td>{{ $pertemuan['id_pertemuan'] }}</td> <!-- ID Pertemuan -->
                    <td>{{ $pertemuan['tanggal'] }}</td> <!-- Tanggal -->
                    <td>{{ $pertemuan['topik'] }}</td> <!-- Topik -->
                    <td>{{ $pertemuan['catatan'] }}</td> <!-- Catatan -->
                    <td>{{ $pertemuan['saran_akademik'] }}</td> <!-- Saran Akademik -->
                    <td>{{ $pertemuan['nim'] }}</td> <!-- NIM -->
                    <td>{{ $pertemuan['nidn'] }}</td> <!-- NIDN Dosen Wali -->
                    <td>{{ $pertemuan['bulan_tahun'] }}</td> <!-- Tahun Bulan -->
                    <td>
                        <a href="{{ route('pertemuanperwalian.edit', $pertemuan['id_pertemuan']) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pertemuanperwalian.destroy', $pertemuan['id_pertemuan']) }}" method="POST" style="display:inline;">
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
