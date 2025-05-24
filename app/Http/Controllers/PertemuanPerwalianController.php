<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PertemuanPerwalianController extends Controller
{
    public function index()
    {
        // Ambil data dari API
        $response = Http::get('http://localhost:8080/vpertemuan');

        // Ambil data dalam format array
        $data = $response->json();

        // dd($data);

        // Kirim data mahasiswa ke view
        return view('pertemuanperwalian.index', ['pertemuanperwalian' => $data]);
    }

   public function riwayatPertemuanMahasiswa()
   {
        $response = Http::get('http://localhost:8080/vpertemuan');
        $dosen = Http::get('http://localhost:8080/dosen')->json();
        $allData = $response->json();

        // Ambil NIM dari session
        $userNim = session('user.mahasiswa.nim');

        // Filter data berdasarkan NIM user
        $data = array_filter($allData, function ($item) use ($userNim) {
            return isset($item['nim']) && $item['nim'] == $userNim;
        });

        // Reset array keys
        $data = array_values($data);

        return view('mahasiswa.riwayat-perwalian.index', ['data' => $data, 'dosen' => $dosen]);
    }

    public function riwayatPertemuanDosen()
    {
        $response = Http::get('http://localhost:8080/vpertemuan');
        $alldata = $response->json();

        $userNidn = session('user.dosen.nidn');
        $data = array_filter($alldata, function($item) use ($userNidn) {
            return isset($item['nidn']) && $item['nidn'] == $userNidn;
            
        });
           
        return view('dosenwali.riwayat-pertemuan.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|string',
            'nidn' => 'required|string',
            'tanggal' => 'required|date',
            'topik' => 'required|string',
            'catatan' => 'required|string',
            'saran_akademik' => 'nullable|string',
            'bulan_tahun' => 'required|string',
        ]);

        // Kirim ke API eksternal
        $response = Http::post('http://localhost:8080/pertemuan', $data);

        if ($response->status() === 201) {
            return redirect()->back()->with('success', 'Pertemuan berhasil ditambahkan.');
        }

        // Tangani error
        $json = $response->json();
        $errorMessage = $json['message'] ?? 'Terjadi kesalahan.';
        $errorDetail = is_array($json['errors'] ?? null)
            ? implode(' ', array_values($json['errors']))
            : '';

        return redirect()->back()->with('error', $errorMessage . ' ' . $errorDetail);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nidn' => 'required|string',
            'tanggal' => 'required|date',
            'topik' => 'required|string',
            'catatan' => 'required|string',
            'bulan_tahun' => 'required|string',
            'nim' => 'required|numeric',
            'saran_akademik' => 'nullable'
        ]);

        $response = Http::put("http://localhost:8080/pertemuan/{$id}", $data);

        $json = $response->json();
        $errorMessage = $json['message'] ?? 'Terjadi kesalahan.';
        $errorDetail = is_array($json['errors'] ?? null)
            ? implode(' ', array_values($json['errors']))
            : '';
        
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Pertemuan berhasil diperbarui.');
        }

        return redirect()->back()->with('error', $errorMessage . $errorDetail);
    }


    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8080/pertemuan/{$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Pertemuan berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus pertemuan.');
    }

        
}
