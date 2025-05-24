<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    
    /** Base URL API, diambil dari .env */
    protected string $api;

    public function __construct()
    {
        $this->api = rtrim(env('API_URL', 'http://localhost:8080'), '/');
    }

    /**
     * Tampilkan daftar mahasiswa (dengan paging manual).
     */
    public function index(Request $request)
    {
        // Ambil seluruh data dari API
        $res = Http::get("{$this->api}/vmahasiswa");
        if (! $res->successful()) {
            abort(502, 'Gagal mengambil data dari server eksternal.');
        }

        $all = $res->json(); // array of mahasiswa
        // paging sederhana: page? per_page?

        return view('dosenwali.mahasiswa.index', [
            'mahasiswa' => $all,
        ]);
    }

    /**
     * Tampilkan detail satu mahasiswa berdasarkan NIM.
     */
    public function show(string $nim)
    {
        $res = Http::get("{$this->api}/vmahasiswa/{$nim}");
        if ($res->status() === 404) {
            abort(404, "Mahasiswa dengan NIM {$nim} tidak ditemukan.");
        }
        if (! $res->successful()) {
            abort(502, 'Gagal mengambil data detail dari server eksternal.');
        }

        $m = $res->json(); // associative array
        return view('mahasiswa.show', compact('m'));
    }
}
