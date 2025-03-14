@extends('layouts.app')

@section('content')
    <h1>Tambah Dosen Wali</h1>

    <form action="{{ route('dosenwali.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dosenwali.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
