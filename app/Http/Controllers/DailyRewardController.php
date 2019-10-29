<?php

namespace App\Http\Controllers;

use App\DailyRewards;

class DailyRewardController extends Controller
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
    public function getRewards()
    {
        $data = DailyRewards::all();
        return response($data);
    }

    //
}
