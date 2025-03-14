@extends('layouts.app')

@section('content')
    <h1>Edit Notifikasi</h1>

    <form action="{{ route('notifikasi.update', $notifikasi->id_notifikasi) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menentukan bahwa ini adalah request untuk update data -->

        <div class="mb-3">
            <label for="id_notifikasi" class="form-label">ID Notifikasi</label>
            <input type="text" class="form-control" id="id_notifikasi" name="id_notifikasi" value="{{ $notifikasi->id_notifikasi }}" readonly>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" id="tipe" name="tipe" value="{{ $notifikasi->tipe }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
            <input type="date" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="{{ $notifikasi->tanggal_kirim }}" required>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="3" required>{{ $notifikasi->pesan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM Mahasiswa</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $notifikasi->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN Dosen</label>
            <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $notifikasi->nidn }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('notifikasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
