<?php
namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::all();
        return view('notifikasi.index', compact('notifikasi'));
    }

    public function create()
    {
        return view('notifikasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_notifikasi' => 'required',
            'tipe' => 'required',
            'tanggal_kirim' => 'required',
            'pesan' => 'required',
            'nim' => 'required',
            'nidn' => 'required',
        ]);

        Notifikasi::create($request->all());

        return redirect()->route('notifikasi.index');
    }

    public function edit(Notifikasi $notifikasi)
    {
        return view('notifikasi.edit', compact('notifikasi'));
    }

    public function update(Request $request, Notifikasi $notifikasi)
{
    $request->validate([
        'id_notifikasi' => 'required',
            'tipe' => 'required',
            'tanggal_kirim' => 'required',
            'pesan' => 'required',
            'nim' => 'required',
            'nidn' => 'required',

    ]);

    $notifikasi->update($request->all());

    return redirect()->route('notifikasi.index');
}

    public function destroy(Notifikasi $notifikasi)
    {
        $notifikasi->delete();

        return redirect()->route('notifikasi.index');
    }
}
