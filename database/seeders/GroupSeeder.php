<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'ASE_01',
            'ASE_02',
        ];

        foreach ($datas as $data) {
            Group::create([
                'name' => $data
            ]);
        }
    }
}
