@extends('layouts.app')

@section('content')
    <h1>Tambah Notifikasi</h1>

    <form action="{{ route('notifikasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_notifikasi" class="form-label">ID Notifikasi</label>
            <input type="text" class="form-control" id="id_notifikasi" name="id_notifikasi" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" id="tipe" name="tipe" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
            <input type="date" class="form-control" id="tanggal_kirim" name="tanggal_kirim" required>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM Mahasiswa</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>

        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN Dosen</label>
            <input type="text" class="form-control" id="nidn" name="nidn" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('notifikasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
