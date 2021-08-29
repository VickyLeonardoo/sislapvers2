<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
   public function proses_login(Request $request)
    {
        request()->validate ( 
            [
                'username' => 'required',
                'password' => 'required',
            ]);

            $kredensil = $request->only('username','password');
            
            if (Auth::guard('user')->attempt($kredensil)) {
            
                $user = Auth::guard('user')->user();
                if ($user->level == '2') {
                    return redirect()->intended('/');
                }elseif ($user->level == '3') {
                    return redirect()->intended('manajemen');
                }elseif ($user->level == '4') {
                    return redirect()->intended('unit');
                }
                elseif ($user->level == '99') {
                    return redirect()->intended('administrator');
                }
                
                return view('masyarakat');
                 
            }elseif (Auth::guard('pelapor')->attempt($kredensil)) {
                $user = Auth::guard('pelapor')->user();
                if ($user->level == '999') {
                    return redirect()->route('user');
                }
            }
            return redirect('login')->with('pesan','Maaf Username atau Password anda salah');

    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
    
}
