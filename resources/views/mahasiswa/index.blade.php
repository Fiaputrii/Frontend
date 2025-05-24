@extends('layouts.app')
@section('content')
<h2>Daftar Mahasiswa</h2>

<table>
  <tr>
    <th>NIM</th><th>Nama</th><th>Email</th><th>Detail</th>
  </tr>
  @foreach($mahasiswa as $m)
    <tr>
      <td>{{ $m['nim'] }}</td>
      <td>{{ $m['nama_mahasiswa'] }}</td>
      <td>{{ $m['email'] }}</td>
      <td>
        <a href="{{ route('mahasiswa.show', $m['nim']) }}">Lihat</a>
      </td>
    </tr>
  @endforeach
</table>

{{-- Pagination --}}
<div>
  @if($page > 1)
    <a href="{{ route('mahasiswa.index', ['page'=>$page-1]) }}">« Prev</a>
  @endif
  Halaman {{ $page }} dari {{ $last }}
  @if($page < $last)
    <a href="{{ route('mahasiswa.index', ['page'=>$page+1]) }}">Next »</a>
  @endif
</div>
@endsection
