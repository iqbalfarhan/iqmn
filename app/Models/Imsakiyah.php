<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Imsakiyah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota',
        'hijriyah',
        'masehi',
        'imsak',
        'subuh',
        'dzuhur',
        'ashar',
        'maghrib',
        'isya',
    ];

    public function getDateStatusAttribute(){
        $masehiDate = Carbon::parse($this->masehi);
        $currentDate = Carbon::today();

        if ($masehiDate < $currentDate) {
            return "sudah lewat";
        }
        elseif ($masehiDate->isSameDay($currentDate)) {
            return "hari ini";
        }
        else{
            return "akan datang";
        }
    }

}
