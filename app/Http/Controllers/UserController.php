<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Helpers;

class UserController extends Controller
{
    //get all users
    public function users(){
        $users = User::latest()->paginate(40);
        // return response()->json([
        //     'data' => User::all()
        // ]);

        return view('admin.users.users')->with([
            'users' => $users
        ]);
    }
}
