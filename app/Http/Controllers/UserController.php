<?php

namespace App\Http\Controllers;

use App\BonusUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function getUsers()
    {
        $data = BonusUser::all();
        return response($data);
    }
    public function newUser(Request $request) 
    {
        $user = BonusUser::create($request->all());

        return response()->json($user);
    }
    

    //
}
