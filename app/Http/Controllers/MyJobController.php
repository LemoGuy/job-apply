<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MyJobController extends Controller
{
    //show all jobs
    public function index()
    {
        $jobs = Job::where('user_id', auth()->id())
            ->withCount('requests')
            ->get();

        return view('jobs.my', [
            'jobs' => $jobs,
        ]);
    }

    //show single job
    public function show($id)
    {
        $job = Job::withCount(['requests' => function ($query) {
            $query->where('user_id', auth()->id());
        }])
            ->with('user')
            ->findOrFail($id);
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    //show create form
    public function create()
    {
        return view('jobs.create');
    }

    //store job data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'website' => 'nullable',
            'duration' => 'required|integer',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'nullable'
        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos');
        }

        $formFields['user_id'] = auth()->id();

        Job::create($formFields);

        // Session::flash('message', 'Job Created');

        return redirect('/')->with('message', 'Job created successfully!');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        if (auth()->id() == $job->user_id) {
            return view('jobs.edit', ['job' => $job]);
        } else {
            abort(403, 'Unauthorized Action');
        }
    }



    //update job data
    public function update(Request $request, $id)
    {

        $job = Job::findOrFail($id);

        if ($job->user_id == auth()->id()) {


            $formFields = $request->validate([
                'title' => 'required',
                'location' => 'required',
                'website' => 'nullable',
                'duration' => 'required|integer',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'nullable'
            ]);
        } else {
            abort(403, 'Unauthorized Action');
        }


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $job->update($formFields);

        // Session::flash('message', 'Job Created');

        return back()->with('message', 'Job updated successfully!');
    }


    // Delete job
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // make sure logged in user is the owner
        if (auth()->id() == $job->user_id) {

            $job->requests()->delete();
            $job->delete();
            return redirect('/')->with('message', 'Job deleted successfuly!');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }
}
