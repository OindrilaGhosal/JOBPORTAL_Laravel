<?php

namespace App\Http\Controllers;
use App\Job;
use Auth;
use App\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::latest()->limit(10)->get();
        $companies = Company::latest()->limit(12)->get();
        return view('welcome',compact('jobs','companies'));
    }

    public function show($id, Job $job) {
        return view('jobs.show', compact('job'));
    }
    public function create() {
        return view('jobs.create');
    }
    public function store() {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
        ]);

        return redirect()->back()->with('message','Job posted successfully');
    }
    public function myjobs() {
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjobs',compact('jobs'));
    }
    public function  apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Job Applied Successfully');
    }
    public function applicants() {
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }
    public function alljobs(Request $request) {
        $keyword = request('title');
        $type = request('type');
        $address = request('address');
        if($keyword || $type || $address) {
            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', $type)
                ->orWhere('address', $address)
                ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }else{

            $jobs = Job::paginate(10);
            return view('jobs.alljobs',compact('jobs'));

        }
    }

}
