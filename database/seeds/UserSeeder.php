<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::table('users')->insert(
            [
            'name' => 'Deni',
            'low_range'=>10000,
            'top_range'=>20000
            ]
        );
        DB::table('users')->insert(
            [
            'name' => 'Gilbert',
            'low_range'=>45000,
            'top_range'=>75000
            ]
        );
        DB::table('users')->insert(
            [
            'name' => 'Brandon',
            'low_range'=>60000,
            'top_range'=>80000
            ]
        );
        DB::table('users')->insert(
            [
            'name' => 'There',
            'low_range'=>30000,
            'top_range'=>50000
            ]
        );
        DB::table('users')->insert(
            [
            'name' => 'Jill',
            'low_range'=>25000,
            'top_range'=>35000
            ]
        );
    }
}
