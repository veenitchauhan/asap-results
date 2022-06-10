<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        Gate::authorize('is-admin');
        // $data['users'] = User::get();
        $data['users'] = User::where('is_admin', 0)->get();
        return view('user.index')->with($data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('secret')
        ]);

        return back();
    }

    public function destroy($user_id)
    {
        User::find($user_id)->delete();
        return back();
    }
}
