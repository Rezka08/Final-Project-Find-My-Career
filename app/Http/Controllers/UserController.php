<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Models\Perusahaan;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index-user')->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3',
            'inputEmail3' => 'required|email|unique:users,email',
            'inputPassword3' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]/', 'min:8']
        ], [
            'username.required' => 'Username must filled in.',
            'username.min' => 'Username must at least 3 characters.',
            'inputEmail3.required' => 'Email must filled in.',
            'inputEmail3.email' => 'Format email is invalid.',
            'inputEmail3.unique' => 'Email has been registered.',
            'inputPassword3.required' => 'Password must filled in.',
            'inputPassword3.regex' => 'Password must contain letters and numbers.',
            'inputPassword3.min' => 'Password must at least 3 characters.'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/create')
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

        return redirect('/admin/user/create')
            ->with('message', 'User Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = User::where('id', $user->id)->first();
        $role = User::where('role', '!=', $user->role)
            ->where('role', '!=', 'Admin')
            ->pluck('role');
        return view('admin.user.edit-user')->with(compact('data', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        if (!$input['inputPassword3']) {
            // Cek apakah email diubah
            if ($input['inputEmail3'] !== $user->email) {
                // Jika iya, validasi email yang baru
                $emailValidator = Validator::make($request->all(), [
                    'inputEmail3' => 'unique:users,email',
                ], [
                    'inputEmail3.unique' => 'Email already registered.',
                ]);

                // Validasi email yang baru
                if ($emailValidator->fails()) {
                    return redirect("/admin/user/{$user->id}/edit")
                        ->withErrors($emailValidator)
                        ->withInput();
                }
            }

            $validator = Validator::make($request->all(), [
                'username' => 'required|min:3',
                'inputEmail3' => 'required|email',
            ], [
                'username.required' => 'Username must be filled.',
                'username.min' => 'Username at least have 3 character.',
                'inputEmail3.required' => 'Email must be filled.',
                'inputEmail3.email' => 'Format email tidak valid.',
            ]);

            if ($validator->fails()) {
                return redirect("/admin/user/{$user->id}/edit")
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = [
                'name' => $input['username'],
                'email' => $input['inputEmail3'],
                'role' => $input['role'],
            ];
        } else {
            // Cek apakah email diubah
            if ($input['inputEmail3'] !== $user->email) {
                // Jika iya, validasi email yang baru
                $emailValidator = Validator::make($request->all(), [
                    'inputEmail3' => 'unique:users,email',
                ], [
                    'inputEmail3.unique' => 'Email already registered.',
                ]);

                // Validasi email yang baru
                if ($emailValidator->fails()) {
                    return redirect("/admin/user/{$user->id}/edit")
                        ->withErrors($emailValidator)
                        ->withInput();
                }
            }

            $validator = Validator::make($request->all(), [
                'username' => 'required|min:3',
                'inputEmail3' => 'required|email',
                'inputPassword3' => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]/', 'min:8']
            ], [
                'username.required' => 'Username must be filled.',
                'username.min' => 'Username must be at least 3 character.',
                'inputEmail3.required' => 'Email must be filled in.',
                'inputEmail3.email' => 'Email format not valid.',
                'inputPassword3.required' => 'Password must be filled.',
                'inputPassword3.regex' => 'Password must contain letter and number.',
                'inputPassword3.min' => 'Password must at least 8 character.'
            ]);

            if ($validator->fails()) {
                return redirect("/admin/user/{$user->id}/edit")
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = [
                'name' => $input['username'],
                'email' => $input['inputEmail3'],
                'password' => Hash::make($input['inputPassword3']),
                'role' => $input['role'],
            ];
        }

        $user = User::findorfail($user->id);
        $user->update($data);

        return redirect()->back()->with('message', 'Data Succesfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role == "Penyedia") {
            $jobposts = Jobpost::where('id_user', $user->id)->get();
            $perusahaan = Perusahaan::where('id_user', $user->id)->first();

            foreach ($jobposts as $jobpost) {
                $jobpost->delete();
            }

            if ($perusahaan) {
                $perusahaan->delete();
            }
        } elseif ($user->role == "Pelamar") {
            $profile = Profile::where('id_user', $user->id)->first();
            if ($profile) {
                $skills = Skill::where('id_profile', $profile->id)->get();

                // Iterasi setiap skill dan hapus filenya
                foreach ($skills as $skill) {
                    if (Storage::disk('public')->exists('photo-user-' . $profile->id . '/' . $skill->skill)) {
                        Storage::disk('public')->delete('photo-user-' . $profile->id . '/' . $skill->skill);
                    }
                    $skill->delete();
                }

                $profile->delete();
            }
        }

        User::where('id', $user->id)->delete();

        return redirect()->back()->with('message', 'Data Successfully Deleted');
    }
}
