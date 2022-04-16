<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Manager',
            'email' => 'manager@examle.com',
            'password' => bcrypt('manager'),
            'is_manager' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
