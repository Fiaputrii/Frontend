<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // Menampilkan semua mahasiswa dari API
    public function index()
    {
        // Mengambil data mahasiswa dari API eksternal
        $response = Http::get('http://localhost:8080/vmahasiswa');

        // Cek jika respons API berhasil
        if ($response->successful()) {
            $mahasiswa = $response->json(); // Ambil data dalam format JSON
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
        } else {
            // Jika API gagal memberikan respons, kembalikan pesan error
            return back()->with('error', 'Gagal mengambil data dari API.');
        }
    }

    /**
     * Menampilkan form untuk membuat data mahasiswa baru
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nim' => 'required|unique:mahasiswa|char',
            'nama' => 'required|varchar|max:255',
            'email' => 'required|email',
            'alamat' => 'required|text',
            'nidn' => 'required|char',
        ]);

        // Kirim data mahasiswa ke API untuk disimpan
        $response = Http::post('http://localhost:8080/vmahasiswa', [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nidn' => $request->nidn,
        ]);

        // Cek jika respons berhasil
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        } else {
            // Jika gagal, tampilkan pesan error
            $errorMessage = $response->json()['message'] ?? 'Gagal menambahkan data mahasiswa.';
            return back()->with('error', $errorMessage);
        }
    }

    /**
     * Menampilkan form untuk mengedit data mahasiswa berdasarkan nim
     */
    public function edit(string $nim)
    {
        // Mengambil data mahasiswa dari API berdasarkan nim
        $response = Http::get("http://localhost:8080/Mahasiswa/{$nim}");

        // Cek jika respons API berhasil
        if ($response->successful()) {
            $mahasiswa = $response->json();
            return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
        } else {
            return back()->with('error', 'Gagal mengambil data mahasiswa.');
        }
    }

    /**
     * Memperbarui data mahasiswa
     */
    public function update(Request $request, string $nim)
    {
        // Validasi inputan
        $request->validate([
            'nim' => 'required|char',
            'nama' => 'required|varchar|max:255',
            'email' => 'required|email',
            'alamat' => 'required|text',
            'nidn' => 'required|char',
        ]);

        // Kirim data yang diperbarui ke API
        $response = Http::put("http://localhost:8080/vmahasiswa/{$nim}", [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nidn' => $request->nidn,
        ]);

        // Cek apakah respons dari API berhasil
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
        } else {
            return back()->with('error', 'Gagal memperbarui data mahasiswa.');
        }
    }

    /**
     * Menghapus data mahasiswa berdasarkan nim
     */
    public function destroy(string $nim)
    {
        // Mengirim permintaan untuk menghapus data mahasiswa melalui API
        $response = Http::delete("http://localhost:8080/vmahasiswa/{$nim}");

        // Cek apakah respons dari API berhasil
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
        } else {
            return back()->with('error', 'Gagal menghapus data mahasiswa.');
        }
    }
}
