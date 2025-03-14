<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Ambil data dari API
        $response = Http::get('http://localhost:8080/vmahasiswa');

        // Ambil data dalam format array
        $data = $response->json();

        // dd($data);

        // Kirim data mahasiswa ke view
        return view('mahasiswa.index', ['mahasiswa' => $data]);
    }
}
