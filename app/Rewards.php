<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
/**
 * The model class for the daily rewards table
 * @author andyskan
 * @package ovo-bonus
 */
class DailyRewards extends Model
{ 
    protected $table="daily_rewards"; 
    protected $fillable = ['starting_value']; 
}
?>