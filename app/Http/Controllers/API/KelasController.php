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
        $data = Group::with('materials', 'users')->find($group->id);
        return response()->json(new KelasResource($data));
    }

    public function materials(Group $group){
        $data = MaterialResource::collection($group->materials);
        return response()->json(MaterialResource::collection($data));
    }
}
