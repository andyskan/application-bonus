<?php

namespace App\Http\Controllers;

use App\BonusUser;
use App\DailyRewards;
use App\Transaction;
use Illuminate\Http\Request;
/**
 * Transaction controller is a class that handles transaction
 * @author andyskan
 * @package ovo-bonus
 */
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
    /**
     * Retreive all transaction history
     *
     * @return mixed
     */
    public function getAllTransaction()
    {
        $data = Transaction::all();
        return response($data, 200);
    }
    /**
     * Create a new transaction
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function newTransaction(Request $request)
    {
        //assume that one daily rewards is created daily
        $transactionList = Transaction::where('user_id', $request->input('user_id'))
            ->where('daily_reward_id', $request->input('daily_reward_id'))->get();
        if (count($transactionList) > 0) {
            return response()->json(
                [
                    'message'=>"user has received a reward"
                ]
            );
        } else {

            $randomReward = $this->getRewardAmount($request->input('user_id'));
            $rewardAmount = $this->getDailyRewardAmount(
                $randomReward,
                $request->input('daily_reward_id')
            );

            $transaction = new Transaction();
            $transaction->user_id = $request->input('user_id');
            $transaction->daily_reward_id = $request->input('daily_reward_id');
            $transaction->reward_amount = $rewardAmount;
            $transaction->save();

            return response()->json($transaction);
        }
    }
    /**
     * Get daily reward amount, calculates whether the reward amount retrieved is beyond limit
     *
     * @param  integer $rewardAmount
     * @param  integer $dailyRewardsId
     *
     * @return void
     */
    public function getDailyRewardAmount($rewardAmount, $dailyRewardsId)
    {
        $dailyRewards = DailyRewards::where('id', $dailyRewardsId)
            ->lockForUpdate()->first();
        if ($dailyRewards->current_value - $rewardAmount <= 0) {
            $rewardAmount = $dailyRewards->current_value;
            $dailyRewards->current_value = 0;

        } else {
            $dailyRewards->current_value -= $rewardAmount;
        }
        $dailyRewards->save();
        return $rewardAmount;

    }

    /**
     * Get random reward amount
     *
     *
     * @param  mixed $userId
     *
     * @return void
     */
    public function getRewardAmount($userId)
    {
        $user = BonusUser::find($userId);
        $randomNumber = mt_rand($user->low_range, $user->top_range);
        $rewardAmount = ceil($randomNumber / 5000) * 5000;
        return $rewardAmount;
    }

    //
}
