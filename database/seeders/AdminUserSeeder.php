<?php

namespace Database\Seeders;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@email.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => bcrypt('password'),
        ]);
    }
}
