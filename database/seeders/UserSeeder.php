<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Hash;
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
        $user = User::create([
            'name' => 'shindjogja',
            'email' => 'shindjogja@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole('admin');
    }
}
