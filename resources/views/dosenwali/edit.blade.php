@extends('layouts.app')

@section('content')
    <h1>Edit Dosen Wali</h1>

    <form action="{{ route('dosenwali.update', $dosenwali->nidn) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menentukan bahwa ini adalah request untuk update data -->

        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $dosenwali->nidn }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosenwali->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $dosenwali->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('dosenwali.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
