<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::all();

        return view('guru.index', [
            'gurus' => $gurus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip',
            'nama_guru' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        Guru::create([
                'nip' => $request->nip,
                'nama_guru' => $request->nama_guru,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
            ]);

        return redirect()->route('guru.index')->with('success', 'Berhasil Menambah Guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('guru.show', [
            'guru' => $guru,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip,' . $guru->id,
            'nama_guru' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'password' => 'nullable',
        ]);

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'password' => $request->password ? Hash::make($request->password) : $guru->password,
        ]);

        return redirect()->route('guru.index')->with('success', 'Berhasil Mengubah Guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Berhasil Menghapus Guru');

    }
}
