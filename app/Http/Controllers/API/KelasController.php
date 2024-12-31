<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use App\Http\Resources\MaterialResource;
use App\Models\Group;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request) {
        return response()->json([
            "code" => 200,
            'message' => 'Successfully get kelas data',
            'data' => KelasResource::collection($request->user()->groups()->get()),
        ]);
    }

    public function show(Group $group) {
        return response()->json([
            "code" => 200,
            'message' => 'Successfully get kelas data',
            'data' => $group->with('materials', 'users')->first(),
        ]);
    }

    public function materials(Group $group){
        return response()->json([
            "code" => 200,
            'message' => 'Successfully get materi data',
            'data' => MaterialResource::collection($group->materials),
        ]);
    }
}
