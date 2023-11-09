<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'email' => 'iqbalfarhan1996@gmail.com',
        ], [
            'name' => 'iqbal farhan syuhada',
            'password' => Hash::make('adminoke'),
        ]);

        $user->assignRole('superadmin');

        User::factory()->count(10)->each(function (User $baru) {
            $baru->assignRole('user');
        });
    }
}
