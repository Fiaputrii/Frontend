@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>
<p>Selamat datang, {{ auth()->user()->username }} ({{ auth()->user()->role }})</p>
<ul>

  @if(auth()->user()->isDosen())
    <li><a href="{{ route('dosenwali.index') }}">Data Dosen Wali</a></li>
  @endif
  <li>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit">Logout</button>
    </form>
  </li>
</ul>
@endsection
