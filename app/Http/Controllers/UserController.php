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
    /**
     * Function to edit user
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function updateUser(Request $request,$id)
    {
        $user = BonusUser::find($id);
        // return response()->json($request);
        $user->name = $request->input('name');
        $user->low_range = $request->input('low_range');
        $user->top_range = $request->input('top_range');
        $user->save();

        return response("User edit succesfull!", 200);

    }

    //
}
