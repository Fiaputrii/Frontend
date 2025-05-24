@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Form Register</h2>

    <form method="POST" action="/register">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username"><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br>

        <label>Role:</label><br>
        <select name="role">
            <option value="mahasiswa">Mahasiswa</option>
            <option value="dosen wali">Dosen</option>
        </select><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>

@endsection
