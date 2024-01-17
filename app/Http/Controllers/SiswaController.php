<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', [
            'siswas' => $siswas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelases = Kelas::all();
        return view('siswa.create', [
            'kelases' => $kelases,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama_siswa' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Berhasil Menambah Guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $kelases = Kelas::all();
        return view('siswa.show', [
            'siswa' => $siswa, 
            'kelases' => $kelases,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $kelases = Kelas::all();
        return view('siswa.edit', [
            'siswa' => $siswa, 
            'kelases' => $kelases,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama_siswa' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'password' => 'nullable',
        ]);
        
        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'password' => $request->password ? Hash::make($request->password) : $siswa->password,
        ]);
        // dd($siswa);
        
        return redirect()->route('siswa.index')->with('success', 'Berhasil Mengubah Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Berhasil Menghapus Siswa');
    }
}
