<?php

namespace App\Http\Controllers;

use App\BonusUser;

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

    //
}
