<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        if(session('type_user') === 'guru'){
            $mengajars = Mengajar::where('guru_id', session('id'))->get();
            
            return view('nilai.menu', [
                'mengajars' => $mengajars,
            ]);
            
        }else if(session('type_user') === 'siswa'){

        }else{
            abort(403);
        }
    }

    public function kelasIndex(Request $request, $id_mengajar) {

        $mengajar = Mengajar::where('id', $id_mengajar)->first();


        if(session('type_user') !== 'guru' && session('id')  !== $mengajar->guru_id){
            abort(403);
        }

        $kelas = Kelas::where('id', $mengajar->kelas_id )->first();
        $nilais = Nilai::all();

        return view('nilai.kelas.index', [
            'nilais' => $nilais,
            'kelas' => $kelas,
            'mengajar' => $mengajar
        ]);
    }

    public function kelasCreate(Request $request, $id_mengajar)  {

        $mengajar = Mengajar::where('id', $id_mengajar)->first();
        
        if(session('type_user')  !== 'guru' && session('id')  !== $mengajar->guru_id){
            abort(403);
        }

        $siswas = Siswa::where('kelas_id', $mengajar->kelas_id)->get();

        return view('nilai.kelas.create', [
            'siswas' => $siswas,
            'mengajar' => $mengajar,
        ]);

    }

    public function kelasStore(Request $request, $id_mengajar){

        $mengajar = Mengajar::where('id', $id_mengajar)->first();
        
        if(session('type_user')  !== 'guru' && session('id')  !== $mengajar->guru_id){
            abort(403);
        }

        $request->validate([
            'siswa_id' => 'required',
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'na' => 'required',
        ]);

        if(Nilai::where('siswa_id', $request->siswa_id)->where('mengajar_id', $id_mengajar)->exists()){
            return redirect()->back()->with('failed', 'Sudah memberi nilai');
        }

        Nilai::create([
            'mengajar_id' => $id_mengajar,
            'siswa_id' => $request->siswa_id,
            'uh' => $request->uh,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'na' => $request->na,
        ]);

        return redirect()->route('nilai.kelas_index', $mengajar->id)->with('success', 'Berhasil Memberi Nilai Siswa');   
    }

    public function kelasShow(Request $request, $id_mengajar, $id_nilai){
        $nilai = Nilai::where('id', $id_nilai)->first();
        $mengajar = Mengajar::where('id', $id_mengajar)->first();
        
        if(session('type_user')  !== 'guru' && session('id')  !== $mengajar->guru_id){
            abort(403);
        }

        $siswas = Siswa::where('kelas_id', $mengajar->kelas_id)->get();

        return view('nilai.kelas.show', [
            'siswas' => $siswas,
            'nilai' => $nilai,
            'mengajar' => $mengajar,
        ]);

    }
}
