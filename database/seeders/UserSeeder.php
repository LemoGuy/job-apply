<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'is_admin' => 1,
            'account_type' => 'admin',
        ]);

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('123456'),
            'account_type' => 'user',
        ]);

        $user = User::factory()->create([
            'name' => 'Company',
            'email' => 'company@email.com',
            'password' => Hash::make('123456'),
            'account_type' => 'company',
        ]);

        // Cretae Jobs
        Job::factory(20)->create([
            'user_id' => $user->id
        ]);
    }
}
