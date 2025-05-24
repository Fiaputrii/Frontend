@extends('layouts.app')
@section('content')
<h2>Edit Mahasiswa</h2>
@if($errors->any())
  <div><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('mahasiswa.update', $m['nim']) }}" method="POST">
  @csrf @method('PUT')
  <input name="nama" value="{{ old('nama', $m['nama']) }}" required>
  <input name="email" value="{{ old('email', $m['email']) }}" required>
  <textarea name="alamat">{{ old('alamat', $m['alamat']) }}</textarea>
  <input name="nidn" value="{{ old('nidn', $m['nidn']) }}" required>
  <button type="submit">Update</button>
</form>
@endsection
