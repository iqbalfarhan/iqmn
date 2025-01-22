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
        $data = $request->user()->groups()->get();
        return response()->json(KelasResource::collection($data));
    }

    public function show(Group $group) {
        $data = Group::with('materials', 'users')->find($group->id);
        return response()->json(new KelasResource($data));
    }

    public function materials(Group $group){
        $data = $group->materials;
        return response()->json(MaterialResource::collection($data));
    }
}
