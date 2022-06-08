<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
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
    public function index(User $model)
    {
        // dd(Gate::allows('is-admin'));
        Gate::authorize('is-admin');
        $data['users'] = $model->paginate(15);
        return view('user.index')->with($data);
    }
}
