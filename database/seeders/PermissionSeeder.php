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
            'material.comot' => ['reader'],
            'material.cari' => ['reader'],
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
            'group.mine' => ['reader'],
            'group.show' => ['reader'],

            'ujian.user' => ['reader'],
            'ujian.index' => ['pengawas'],
            'ujian.create' => [],
            'ujian.edit' => [],
            'ujian.show' => ['pengawas'],
            'ujian.delete' => [],
            'ujian.start' => ['pengawas'],
        ];

        foreach ($datas as $permit => $roles) {
            $permission = Permission::updateOrCreate([
                'name' => $permit
            ]);

            $permission->assignRole($roles);
        }
    }
}
