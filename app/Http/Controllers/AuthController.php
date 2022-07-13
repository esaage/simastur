<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        /* 
            Validation
        */
        $rules = [
            'username'=>'required',
            'password'=>'required',
        ];

        $messages = [
            'username.required'=>'Username harus diisi',
            'password.required'=>'Password harus diisi',
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if( $validator->fails() ) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        $data = request(['username','password']);
        
        Auth::attempt($data);

        if( !Auth::check() ) {

            return back()->with('error','Username/Password salah');
        } 
        
        session()->flash('login');
        return redirect('/admin/dashboard')->with('success','Anda berhasil login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Anda berhasil logout');
    }
}
