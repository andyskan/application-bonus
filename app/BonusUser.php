<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The model class for the users table
 * @author andyskan
 * @package ovo-bonus
 */
class BonusUser extends Model
{
    protected $table = "users";
    protected $fillable= ['name','low_range','top_range'];
}
