<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The model class for the transaction table
 * @author andyskan
 * @package ovo-bonus
 */
class Transaction extends Model
{
    protected $table = "transaction";
    protected $fillable = ['user_id', 'daily_reward_id'];
}
