<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class Home extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }
}
