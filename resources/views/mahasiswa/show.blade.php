@extends('layouts.app')
@section('content')
<h2>Detail Mahasiswa</h2>

<ul>
  <li><strong>NIM:</strong> {{ $m['nim'] }}</li>
  <li><strong>Nama:</strong> {{ $m['nama'] }}</li>
  <li><strong>Email:</strong> {{ $m['email'] }}</li>
  <li><strong>Alamat:</strong> {{ $m['alamat'] }}</li>
  <li><strong>NIDN Wali:</strong> {{ $m['nidn'] }}</li>
</ul>

<a href="{{ route('mahasiswa.index') }}">« Kembali ke daftar</a>
@endsection
