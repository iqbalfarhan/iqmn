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
            'material.index' => [],
            'material.create' => [],
            'material.edit' => [],
            'material.delete' => [],
            'material.comot' => ['user'],
            'material.cari' => ['user'],
            'material.show' => [],
            'material.quiz' => [],
            'user.index' => [],
            'user.create' => [],
            'user.edit' => [],
            'user.delete' => [],
            'group.index' => [],
            'group.create' => [],
            'group.edit' => [],
            'group.delete' => [],
            'group.mine' => ['user'],
            'group.show' => ['user'],
        ];

        foreach ($datas as $permit => $roles) {
            $permission = Permission::updateOrCreate([
                'name' => $permit
            ]);

            $permission->assignRole($roles);
        }
    }
}
