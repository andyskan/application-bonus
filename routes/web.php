<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->get(
    '/', function () use ($router) {
        return $router->app->version();
    }
);
$router->get('user/all', ['uses' => 'UserController@getAllUsers']);
$router->get('user/{id}', ['uses' => 'UserController@getUser']);
$router->post('user/add', ['uses' => 'UserController@addUser']);
$router->put('user/update/{id}', ['uses' => 'UserController@updateUser']);

$router->get('daily-rewards/all', ['uses' => 'DailyRewardController@getRewards']);
$router->post('daily-rewards/add', ['uses' => 'DailyRewardController@addDailyRewards']);
$router->put('daily-rewards/update/{id}', ['uses' => 'DailyRewardController@updateDailyRewards']);

$router->post('transaction/add', ['uses' => 'TransactionController@newTransaction']);
