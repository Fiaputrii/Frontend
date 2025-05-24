@extends('layouts.app')
@section('content')
<h2>Tambah Mahasiswa</h2>
@if($errors->any())
  <div><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('mahasiswa.store') }}" method="POST">
  @csrf
  <input name="nim" placeholder="NIM" value="{{ old('nim') }}" required>
  <input name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
  <input name="email" placeholder="Email" value="{{ old('email') }}" required>
  <textarea name="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
  <input name="nidn" placeholder="NIDN Dosen Wali" value="{{ old('nidn') }}" required>
  <button type="submit">Simpan</button>
</form>
@endsection
