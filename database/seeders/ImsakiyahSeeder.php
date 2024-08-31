<?php

namespace Database\Seeders;

use App\Models\Imsakiyah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ImsakiyahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Imsakiyah::truncate();

        $startDate = Carbon::createFromFormat('Y-m-d', '2024-07-20');
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $dateMasehi = $startDate->copy()->addDays($i)->format('Y-m-d');

            $data[] = [
                'kota' => 'Balikpapan',
                'hijriyah' => implode("-", ["1446", "09", $i+1]),
                'masehi' => $dateMasehi,
                'imsak' => '04:50',
                'subuh' => '05:00',
                'dzuhur' => '12:15',
                'ashar' => '15:30',
                'maghrib' => '18:15',
                'isya' => '19:30',
            ];
        }

        foreach ($data as $item){
            Imsakiyah::updateOrCreate(['hijriyah' => $item['hijriyah']], $item);
        }
    }
}
