<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImsakiyahResource;
use App\Models\Imsakiyah;
use Illuminate\Http\Request;

class ImsakiyahController extends Controller
{
    public function index(){
        return response()->json(ImsakiyahResource::collection(Imsakiyah::get()));
    }

    public function show(Imsakiyah $imsakiyah){
        return response()->json(new ImsakiyahResource($imsakiyah));
    }
}
