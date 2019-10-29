<?php

namespace App\Http\Controllers;

use App\DailyRewards;
use Illuminate\Http\Request;

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
    /**
     * Create a new reward entry
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function addDailyRewards(Request $request)
    {
        $reward = new DailyRewards;
        $reward->starting_value = $request->input('starting_value');
        $reward->current_value = $request->input('starting_value');
        $reward->save();
        return response()->json($reward);
    }

    //
}
