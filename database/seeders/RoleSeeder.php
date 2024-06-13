<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'superadmin',
            'author',
            'reader',
        ];

        foreach ($datas as $data) {
            Role::updateOrCreate(['name' => $data]);
        }
    }
}
