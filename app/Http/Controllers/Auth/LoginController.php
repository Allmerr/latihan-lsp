<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Guru;

class LoginController extends Controller
{
    public function index(Request $request){

        if($request->type_user == 'admin'){
            $rules = [
                'id' => 'required',
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

        $validatedData = $request->validate($rules);

        if($request->type_user == 'admin'){
            $admin = Admin::where('id', $request->id)->where('password', Hash::make($validatedData['password']))->first();

            if(!$admin){
                return redirect()->back()->with('error', 'ID atau Password salah');
            }
        }else if($request->type_user == 'siswa'){
            $siswa = Siswa::where('nis', $request->nis)->where('password', Hash::make($validatedData['password']))->first();

            if(!$siswa){
                return redirect()->back()->with('error', 'NIS atau Password salah');
            }
        }else if($request->type_user == 'guru'){
            $guru = Guru::where('nip', $request->nip)->where('password', Hash::make($validatedData['password']))->first();

            if(!$guru){
                return redirect()->back()->with('error', 'NIP atau Password salah');
            }
        }

        if($request->type_user == 'admin'){
            $request->session()->put('id', $admin->id);
            $request->session()->put('nama', $admin->nama);
            $request->session()->put('type_user', 'admin');
        }else if($request->type_user == 'siswa'){
            $request->session()->put('nis', $siswa->nis);
            $request->session()->put('nama', $siswa->nama);
            $request->session()->put('type_user', 'siswa');
        }else if($request->type_user == 'guru'){
            $request->session()->put('nip', $guru->nip);
            $request->session()->put('nama', $guru->nama);
            $request->session()->put('type_user', 'guru');
        }

        return redirect()->route('home');

    }
}
