<?php


namespace App\Http\Controllers;

use App\Models\Mahasiswas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswas::latest()->get();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        Mahasiswas::create($validated);

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswas::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswas::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        $mahasiswa->update($validated);

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswas::findOrFail($id);

        $mahasiswa->delete();

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}