<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    //show all jobs
    public function index() {
        // dd(request('tag'));
        // dd(Job::latest()->filter(request(['tag', 'search']))->paginate(2) );

        return view('jobs.index', [
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->paginate(6) 
        ]);
    }

    //show single job
    public function show(Job $job) {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    //show create form
    public function create() {
        return view('jobs.create');
    }

    //store job data
    public function store(Request $request) {
        // dd($request->all());
        
        // dd($request->file('logo')->store());

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('jobs',
            'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        
        Job::create($formFields);

        // Session::flash('message', 'Job Created');

        return redirect('/')->with('message', 'Job created successfully!');
    }


    // Show edit form
    public function edit(Job $job){
        // dd($job->title);
        return view('jobs.edit', ['job' => $job]);
    }

    //update job data
    public function update(Request $request, Job $job) {
        // dd($request->all());
        
        // dd($request->file('logo')->store());

        // make sure logged in user is the owner
        if($job->user_id != auth()-> id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        
        $job->update($formFields);

        // Session::flash('message', 'Job Created');

        return back()->with('message', 'Job updated successfully!');
    }

    // Delete job
    public function delete(Job $job) {
         // make sure logged in user is the owner
         if($job->user_id != auth()-> id()) {
            abort(403, 'Unauthorized Action');
        }
        $job->delete();
        return redirect('/')->with('message', 'Job deleted successfuly!');
    }

    // Manage Job
    public function manage() {
        return view('jobs.manage', ['jobs' => auth()->user()->jobs()->get()]);
    }

    // Manage All Job
    public function manageAll() {
        return view('jobs.manageAll', 'jobs');
    }
}
