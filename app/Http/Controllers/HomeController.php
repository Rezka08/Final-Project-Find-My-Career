<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Jobpost;
use App\Models\Perusahaan;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Skill;
class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function jobs()
    {
        $job = Jobpost::all();
        $jobposts = Jobpost::select('posisi')->distinct()->get();
        $lokasi = Jobpost::select('lokasi')->distinct()->get();
        $perusahaan = Perusahaan::all();
        $fulltime = Jobpost::where('type', 'full-time')->get();
        $parttime = Jobpost::where('type', 'part-time')->get();

        // Tambahkan properti baru ke setiap objek Jobpost dengan nama 'similarPositionsCount'
        foreach ($jobposts as $jobpost) {
            $jobpost->similarPositionsCount = Jobpost::where('posisi', $jobpost->posisi)->count();
        }

        return view('jobs')->with(compact('job', 'jobposts', 'lokasi', 'fulltime', 'parttime', 'perusahaan'));
    }

    public function show($id)
    {
        // Ambil data pekerjaan berdasarkan ID
        $jobpost = Jobpost::find($id);
        
        // Jika data tidak ditemukan
        if (!$jobpost) {
            abort(404, 'Job Not Found!');
        }
        
        $perusahaan = Perusahaan::findorFail($jobpost->id_company);
        $formattedGaji = $jobpost->formatGaji();
        $jumlahPosisi = Jobpost::countByCompany($jobpost->id_company);

        // Jika user adalah Pelamar
        if (auth()->user()->role == 'Pelamar') {
            // Cek profile terlebih dahulu
            $profile = Profile::where('id_user', auth()->user()->id)->first();
            
            if (!$profile) {
                // Redirect jika profile belum ada
                return redirect()->route('profile.create')->with('warning', 'Please complete your Profile first!');
            }

            // Setelah memastikan profile ada, baru ambil data aplikasi
            $userApply = Applicant::where('id_jobpost', $jobpost->id)
                ->where('id_profile', $profile->id)
                ->get();

            $otherApply = Applicant::where('id_jobpost', $jobpost->id)
                ->where('id_profile', '<>', $profile->id)
                ->get();
                
            return view('jobs-detail', compact(
                'jobpost', 
                'perusahaan', 
                'formattedGaji', 
                'jumlahPosisi', 
                'profile', 
                'userApply',
                'otherApply'
            ));
        }

        // Untuk non-Pelamar
        return view('jobs-detail', compact('jobpost', 'perusahaan', 'formattedGaji', 'jumlahPosisi'));
    }

    public function search(Request $request)
    {
        $jobposts = Jobpost::select('posisi')->distinct()->get();
        $lokasi = Jobpost::select('lokasi')->distinct()->get();
        $perusahaan = Perusahaan::all();

        // Tambahkan properti baru ke setiap objek Jobpost dengan nama 'similarPositionsCount'
        foreach ($jobposts as $jobpost) {
            $jobpost->similarPositionsCount = Jobpost::where('posisi', $jobpost->posisi)->count();
        }

        // Ambil input dari formulir pencarian
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $location = $request->input('location');
        $inputpers = $request->input('perusahaan');

        // Query berdasarkan kriteria pencarian
        $jobs = Jobpost::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('posisi', 'like', '%' . $keyword . '%')
                        ->orWhere('lokasi', 'like', '%' . $keyword . '%')
                        ->orWhere('type', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%')
                        ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
                        ->orWhere('gaji', 'like', '%' . $keyword . '%');
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->where('posisi', $category);
            })
            ->when($location, function ($query) use ($location) {
                $query->where('lokasi', $location);
            })
            ->when($inputpers, function ($query) use ($inputpers) {
                $query->where('id_company', $inputpers);
            })
            ->get();

        // Kirim data hasil pencarian ke tampilan
        return view('jobs-search', compact('jobs', 'jobposts', 'lokasi', 'perusahaan'));
    }

    public function someMethod()
    {
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();
        
        if ($profile) {
            $skill = Skill::where('id_profile', $profile->id)->get();
        } else {
            $skill = collect([]); // Return empty collection jika tidak ada profile
        }
        
        return view('your.view', compact('profile', 'skill'));
    }
}