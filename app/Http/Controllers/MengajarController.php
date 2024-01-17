<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mengajars = Mengajar::all();
        return view('mengajar.index', [
            'mengajars' => $mengajars,
        ]);
    }

/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = Guru::all();
        $mapels = Mapel::all();
        $kelases = Kelas::all();

        return view('mengajar.create', [
            'gurus' => $gurus,
            'mapels' => $mapels,
            'kelases' => $kelases,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
        ]);

        if(Mengajar::where('guru_id', $request->guru_id)->where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->exists()){
            return redirect()->back()->with('failed', 'Guru atau Kelas atau Mapel sudah digunakan');
        }

        Mengajar::create([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('mengajar.index')->with('success', 'Berhasil Menambah Mengajar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mengajar $mengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mengajar $mengajar)
    {
        $gurus = Guru::all();
        $mapels = Mapel::all();
        $kelases = Kelas::all();

        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'gurus' => $gurus,
            'mapels' => $mapels,
            'kelases' => $kelases,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mengajar $mengajar)
    {
        $request->validate([
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'guru_id' => 'required',
        ]);

        if($request->guru_id == $mengajar->guru_id || $request->mapel_id == $mengajar->mapel_id || $request->kelas_id == $mengajar->kelas_id){
            return redirect()->back()->with('failed', 'Tidak Ada Perubahan');
        }

        if(Mengajar::where('guru_id', $request->guru_id)->where('mapel_id', $request->mapel_id)->where('kelas_id', $request->kelas_id)->exists()){
            return redirect()->back()->with('failed', 'Guru atau Kelas atau Mapel sudah digunakan');
        }

        Mengajar::create([
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('mengajar.index')->with('success', 'Berhasil Mengubah Mengajar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mengajar $mengajar)
    {
        $mengajar->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Mengajar');
    }
}
