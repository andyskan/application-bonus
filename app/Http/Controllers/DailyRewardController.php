<?php

namespace App\Http\Controllers;

use App\DailyRewards;
/**
 * DailyRewardController is a class to handle the reward moded
 * @author andyskan
 * @package ovo-bonus
 */
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
    /**
     * Get all rewards
     *
     * @return object
     */
    public function getRewards()
    {
        $data = DailyRewards::all();
        return response($data);
    }

    //
}
