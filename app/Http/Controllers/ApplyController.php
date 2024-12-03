<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Jobpost;
use App\Models\Perusahaan;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplyController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        // Ambil data pekerjaan berdasarkan ID
        $jobpost = Jobpost::find($id);
        $perusahaan = Perusahaan::findorFail($jobpost->id_company);

        $formattedGaji = $jobpost->formatGaji();
        $profile = Profile::where('id_user', auth()->user()->id)->first();

        // Jika data tidak ditemukan, dapatkan data pekerjaan lainnya atau tampilkan pesan kesalahan
        if (!$jobpost) {
            // Misalnya, arahkan ke halaman 404
            abort(404, 'Pekerjaan tidak ditemukan');
        }

        // Kirim data pekerjaan ke tampilan
        return view('apply-create', compact('jobpost', 'perusahaan', 'formattedGaji', 'profile'));
    }

    public function store(Request $request)
    {
        $tes = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($tes)) {
            if (Auth::user()->role == 'Pelamar') {
                $input = $request->all();
                $profile = Profile::where('id_user', auth()->user()->id)->first();

                Applicant::create([
                    'id_jobpost' => $input['job'],
                    'id_profile' => $profile->id,
                    'status' => 'menunggu',
                ]);

                return redirect("/jobs/{$profile->id}")->with('success', 'Data has been sent, Please Wait!');
            }
        }

        return back()->with('failed', 'Your Email or Password is Wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $applicant = Applicant::where('id_jobpost',$id)->first();

        $jobpost = Jobpost::findOrFail($applicant->id_jobpost);

        $profile = Profile::findOrFail($applicant->id_profile);

        $skill = Skill::where('id_profile', $profile->id)->get();

        $perusahaan = Perusahaan::findOrFail($jobpost->id_company);

        $formattedGaji = $jobpost->formatGaji();
        $jumlahPosisi = Jobpost::countByCompany($jobpost->id_company);

        $userApply = $applicant;

        return view('penyedia.apply-edit', compact('jobpost', 'perusahaan', 'formattedGaji', 'jumlahPosisi', 'profile', 'skill', 'userApply'));
    }

    public function update(Request $request, $applyId)
    {
        try {
            // Validasi
            $validator = Validator::make($request->all(), [
                'status' => 'required|in:diterima,dibatalkan',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Cek apakah data ada
            $apply = Applicant::where('id_jobpost', $applyId)->first();
            
            if (!$apply) {
                return redirect()->back()
                    ->with('error', 'Data applicant not found');
            }

            // Update status
            $apply->status = $request->status;
            $result = $apply->save();

            if ($result) {
                return redirect()->route('penyedia')
                    ->with('message', 'Status Updated Succesfully');
            } else {
                return redirect()->back()
                    ->with('error', 'Failed Updated Status');
            }

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something Wrong: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
