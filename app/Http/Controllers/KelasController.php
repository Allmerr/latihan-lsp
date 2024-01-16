<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index', [
            'kelases' => Kelas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|in:10,11,12,13',
            'jurusan' => 'required:in:DKV,BKP,DPIB,RPL,SIJA,TKJ,TP,TOI,TKR,TFLM',
            'rombel' => 'required|in:1,2,3,4',
        ]);

        if(Kelas::where('nama_kelas', $request->kelas . '_' . $request->jurusan . '_' . $request->rombel)->exists()){
            return redirect()->back()->with('failed', 'Kelas sudah ada!');
        }

        Kelas::create([
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'rombel' => $request->rombel,
            'nama_kelas' => $request->kelas . '_' . $request->jurusan . '_' . $request->rombel,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $idKelas)
    {
        $kelas = Kelas::find($idKelas);
        return view('kelas.edit', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idKelas)
    {
        $kelas = Kelas::find($idKelas);

        if($kelas->kelas == $request->kelas && $kelas->jurusan == $request->jurusan && $kelas->rombel == $request->rombel){
            return redirect()->back()->with('failed', 'Tidak ada perubahan!');
        }

        $request->validate([
            'kelas' => 'required|in:10,11,12,13',
            'jurusan' => 'required:in:DKV,BKP,DPIB,RPL,SIJA,TKJ,TP,TOI,TKR,TFLM',
            'rombel' => 'required|in:1,2,3,4',
        ]);

        if(Kelas::where('nama_kelas', $request->kelas . '_' . $request->jurusan . '_' . $request->rombel)->exists()){
            return redirect()->back()->with('failed', 'Kelas sudah ada!');
        }

        $kelas->update([
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'rombel' => $request->rombel,
            'nama_kelas' => $request->kelas . '_' . $request->jurusan . '_' . $request->rombel,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idKelas)
    {
        $kelas = Kelas::find($idKelas);

        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
