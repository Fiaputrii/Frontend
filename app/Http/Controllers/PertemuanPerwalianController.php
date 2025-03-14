<?php

namespace App\Http\Controllers;

use App\Models\PertemuanPerwalian;
use Illuminate\Http\Request;

class PertemuanPerwalianController extends Controller
{
    // Menampilkan semua data pertemuan perwalian
    public function index()
    {
        $pertemuanperwalian = PertemuanPerwalian::all();
        return view('pertemuanperwalian.index', compact('pertemuanperwalian'));
    }

    // Menampilkan form untuk menambahkan pertemuan perwalian baru
    public function create()
    {
        return view('pertemuanperwalian.create');
    }

    // Menyimpan pertemuan perwalian baru ke database
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'id_pertemuan' => 'required',
        'tanggal' => 'required',
        'topik' => 'required',
        'catatan' => 'required',
        'saran_akademik' => 'required',
        'nim' => 'required|exists:mahasiswa,nim',  // Validasi NIM mahasiswa
        'nidn' => 'required|exists:dosen_wali,nidn',  // Validasi NIDN dosen wali
    ]);

    // Tambahkan kolom bulan_tahun berdasarkan tanggal
    $tanggal = \Carbon\Carbon::parse($request->tanggal);
    $bulan_tahun = $tanggal->format('m/Y');  // Format bulan/tahun

    // Menyimpan data pertemuan perwalian ke dalam database
    PertemuanPerwalian::create([
        'id_pertemuan' => $request->id_pertemuan,
        'tanggal' => $request->tanggal,
        'topik' => $request->topik,
        'catatan' => $request->catatan,
        'saran_akademik' => $request->saran_akademik,
        'nim' => $request->nim,
        'nidn' => $request->nidn,
        //'bulan_tahun' => $bulan_tahun,  // Set bulan_tahun secara manual
    ]);

    // Redirect ke halaman index setelah berhasil
    return redirect()->route('pertemuanperwalian.index');
}

    // Menampilkan form untuk mengedit data pertemuan perwalian
    public function edit(PertemuanPerwalian $pertemuanperwalian)
    {
        return view('pertemuanperwalian.edit', compact('pertemuanperwalian'));
    }

    // Memperbarui data pertemuan perwalian ke database
    public function update(Request $request, PertemuanPerwalian $pertemuanperwalian)
    {
        // Validasi input
        $request->validate([
            'id_pertemuan' => 'required',
            'tanggal' => 'required|date',
            'topik' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'saran_akademik' => 'nullable|string',
            'nim' => 'required|exists:mahasiswa,nim',
            'nidn' => 'required|exists:dosen_wali,nidn',
            'bulan_tahun' => 'nullable|string',
        ]);

        
        $pertemuanperwalian->update($request->all());

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('pertemuanperwalian.index');
    }

    // Menghapus data pertemuan perwalian
    public function destroy(PertemuanPerwalian $pertemuanperwalian)
    {
        // Menghapus data pertemuan perwalian dari database
        $pertemuanperwalian->delete();

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('pertemuanperwalian.index');
    }
}
