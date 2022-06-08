<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'email' => 'admin@asapresults.com',
            'email_verified_at' => now(),
            'password' => Hash::make('super_secret'),
            'is_admin' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'First Staff',
            'email' => 'staff@asapresults.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'is_admin' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
