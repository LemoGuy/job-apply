<?php

namespace App\Http\Controllers;

use App\Mail\JobRequestStatusUpdated;
use App\Models\Job;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->account_type == 'user') {
            $requests = ModelsRequest::where('user_id', auth()->id())
                ->with('user')
                ->with('company')
                ->with('job')
                ->get();
        } elseif (auth()->user()->account_type == 'company') {
            $requests = ModelsRequest::where('company_id', auth()->id())
                ->with('user')
                ->with('company')
                ->with('job')
                ->get();
        }

        return view('requests.index', [
            'requests' => $requests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (auth()->user()->account_type == 'user') {
        $request->validate([
            'cv' => 'required|file|max:3072',
            'job' => 'required|integer',

        ]);

        $job = Job::findOrFail($request->job);

        $cv_path = $request->file('cv')->store('cvs');

        $request = ModelsRequest::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'company_id' => $job->user_id,
            'cv_path' => $cv_path,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('message', 'Applied successfully!');
        // } 
        // else
        //     return redirect()->back()->with('message', 'You have to be a user to apply for this job!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rq = ModelsRequest::with('user')->with('company')->with('job')->findOrFail($id);
        $rq->update([
            'status' => $request->status
        ]);

        // TODO!
        // Mail::to($rq->user->email)->send(new JobRequestStatusUpdated($rq));

        return redirect()->back()->with('message', 'Status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = ModelsRequest::findOrFail($id);
        $request->delete();

        return redirect()->back();
    }
}
