<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                // $request->session()->regenerate();
                return redirect('admin');
            } elseif (Auth::user()->role == 'Pelamar') {
                // $request->session()->regenerate();
                return redirect()->intended('/pelamar');
            }
        }
        return view('Auth.regist');
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3',
            'inputEmail3' => 'required|email|unique:users,email',
            'inputPassword3' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]/', 'min:8']
        ], [
            'username.required' => 'Username must filled in.',
            'username.min' => 'Username at least 3 characters.',
            'inputEmail3.required' => 'Email must filled in.',
            'inputEmail3.email' => 'Invalid Format Email.',
            'inputEmail3.unique' => 'Email has been registered.',
            'inputPassword3.required' => 'Password must filled in.',
            'inputPassword3.regex' => 'Password must contain a combination letters and numbers.',
            'inputPassword3.min' => 'Password must at least 8 characters.'
        ]);

        if ($validator->fails()) {
            return redirect(route('regist'))
                ->withErrors($validator)
                ->withInput();
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data ke database
        $input = $request->all();
        User::create([
            'name' => $input['username'],
            'email' => $input['inputEmail3'],
            'password' => Hash::make($input['inputPassword3']),
            'role' => $input['role'],
        ]);
        
        return redirect(route('regist'))
            ->with('message', 'User Succesfully Created');
    }
}

