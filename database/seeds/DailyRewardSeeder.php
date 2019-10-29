<?php

use Illuminate\Database\Seeder;

class DailyRewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_rewards')->insert(
            [
            'starting_value'=>200000,
            'current'=>200000
            ]
        );
        // $this->call('UsersTableSeeder');
    }
}
