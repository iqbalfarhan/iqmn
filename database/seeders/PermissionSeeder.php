<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'material.index',
            'material.create',
            'material.edit',
            'material.delete',
            'material.comot',
            'material.cari',
            'material.show',
            'material.quiz',

            'user.index',
            'user.create',
            'user.edit',
            'user.delete',

            'group.index',
            'group.create',
            'group.edit',
            'group.delete',
        ];

        foreach ($datas as $data) {
            Permission::updateOrCreate([
                'name' => $data
            ]);
        }
    }
}
