<?php

namespace App\Http\Controllers;

use App\BonusUser;
use Illuminate\Http\Request;

/**
 * UserController is a class that handles the user model
 * @author andyskan
 * @package ovo-bonus
 */
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
    /**
     * Get all users
     *
     * @return object
     */
    public function getAllUsers()
    {
        $data = BonusUser::all();
        return response($data);
    }
    /**
     * Creates new user
     *
     * @param  mixed $request
     *
     * @return object
     */
    public function addUser(Request $request)
    {
        $user = BonusUser::create($request->all());

        return response()->json($user);
    }

    //
}
