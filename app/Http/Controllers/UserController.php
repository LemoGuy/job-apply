<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'], //atleaset 3 chars
            'email' => ['required', 'email', 'unique:users'], //unique email with users table to email column
            'password' => ['required', 'confirmed', 'min:6'],
            'account_type' => ['required', 'String']
            // 'password' => 'required|confirmed|min:6'

        ]);


        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        return redirect()->route('user.index')->with('message', 'User created successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', [
            'user' => $user,
        ]);
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

        $user = User::findOrFail($id);

        if ($request->action == 'user_info') {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email'
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        } elseif ($request->action == 'user_password') {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return back()->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->is_enabled) {
            $message = 'Account Disabled Successfully';
            $user->update([
                'is_enabled' => 0
            ]);
        } else {
            $message = 'Account Enabled Successfully';
            $user->update([
                'is_enabled' => 1
            ]);
        }

        return redirect()->back()->with('message', $message);
    }
}
