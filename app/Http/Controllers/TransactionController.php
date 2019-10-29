<?php

namespace App\Http\Controllers;

use App\BonusUser;
use App\DailyRewards;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
    public function getAllTransaction()
    {
        $data = Transaction::all();
        return response($data);
    }
    public function newTransaction(Request $request)
    {
        $transactionList = Transaction::where('user_id', $request->input('user_id'))
            ->where('daily_reward_id', $request->input('daily_reward_id'))->get();

        if (count($transactionList) > 0) {
            return response("User has received daily rewards");
        } else {
            $user = BonusUser::find($request->input('user_id'));
            $randomNumber = mt_rand($user->low_range, $user->top_range);
            $rewardAmount = ceil($randomNumber / 5000) * 5000;

            $dailyRewards = DailyRewards::where('id', $request->input('daily_reward_id'))
                ->lockForUpdate()->first();
            $dailyRewards->current_value -= $rewardAmount;
            $dailyRewards->save();

            $transaction = new Transaction();
            $transaction->user_id = $request->input('user_id');
            $transaction->daily_reward_id = $request->input('daily_reward_id');
            $transaction->reward_amount = $rewardAmount;
            $transaction->save();

            return response($transaction);
        }
    }

    //
}
