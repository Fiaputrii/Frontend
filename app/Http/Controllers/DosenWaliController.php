<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use Illuminate\Http\Request;

class DosenWaliController extends Controller
{
    // Menampilkan semua dosen wali
    public function index()
    {
        $dosenwali = DosenWali::all();
        return view('dosenwali.index', compact('dosenwali'));
    }

    // Menampilkan form untuk membuat dosen wali baru
    public function create()
    {
        return view('dosenwali.create');
    }

    // Menyimpan dosen wali baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        // Menyimpan data dosen wali ke dalam database
        DosenWali::create($request->all());

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('dosenwali.index');
    }

    // Menampilkan form untuk mengedit data dosen wali
    public function edit(DosenWali $dosenwali)
    {
        return view('dosenwali.edit', compact('dosenwali'));
    }

    // Memperbarui data dosen wali ke database
    public function update(Request $request, DosenWali $dosenwali)
    {
        // Validasi input
        $request->validate([
           
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        // Memperbarui data dosen wali
        $dosenwali->update($request->all());

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('dosenwali.index');
    }

    // Menghapus data dosen wali
    public function destroy(DosenWali $dosenwali)
    {
        // Menghapus data dosen wali dari database
        $dosenwali->delete();

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('dosenwali.index');
    }
}

