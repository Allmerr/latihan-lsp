<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;
use App\Models\Siswa;
use App\Models\Guru;

class LoginController extends Controller
{
    public function index(Request $request){

        if($request->type_user == 'administrator'){
            $rules = [
                'id_admin' => 'required',
                'password' => 'required|min:6'
            ];
        }else if($request->type_user == 'siswa'){
            $rules = [
                'nis' => 'required',
                'password' => 'required|min:6'
            ];
        }else if($request->type_user == 'guru'){
            $rules = [
                'nip' => 'required',
                'password' => 'required|min:6'
            ];
        }
        
        $request->validate($rules);

        if($request->type_user == 'administrator'){
            $admin = Administrator::where('id_admin', $request->id_admin)->first();
            
            if($admin == null){
                return redirect()->back()->with('failed', 'ID atau Password salah');
            }

            if( $admin == null || !Hash::check($request->password, $admin->password)){
                return redirect()->back()->with('failed', 'ID atau Password salah');
            }
        }else if($request->type_user == 'siswa'){
            $siswa = Siswa::where('nis', $request->nis)->first();

            if( $siswa == null || !Hash::check($request->password, $siswa->password)){
                return redirect()->back()->with('failed', 'NIS atau Password salah');
            }
        }else if($request->type_user == 'guru'){
            $guru = Guru::where('nip', $request->nip)->first();

            if( $guru == null || !Hash::check($request->password, $guru->password)){
                return redirect()->back()->with('failed', 'NIP atau Password salah');
            }
        }

        if($request->type_user == 'administrator'){
            session([
                'id' => $admin->id,
                'id_admin' => $admin->id_admin,
                'type_user' => 'administrator'
            ]);
        }else if($request->type_user == 'siswa'){
            session([
                'id' => $siswa->id,
                'nis' => $siswa->nis,
                'nama_siswa' => $siswa->nama_siswa,
                'type_user' => 'siswa'
            ]);
        }else if($request->type_user == 'guru'){
            session([
                'id' => $guru->id,
                'nip' => $guru->nip,
                'nama_guru' => $guru->nama_guru,
                'type_user' => 'guru'
            ]);
        }

        return redirect()->route('home');
        
    }
}
