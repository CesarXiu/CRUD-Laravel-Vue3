<?php

namespace App\Http\Controllers;
use App\Http\Resources\GroupCollection;
use App\Http\Resources\JSONAPI\GroupResource;
use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function store(Request $request){
        $request -> validate([
            'tarea' => 'required|min:3',
            'descripcion' => 'required'
        ]);
        $group = group::create($request->post());
        return response()->json([
            'group'=>$group
        ]);
    }
    public function index()
    {
        $groupRelations = group::checkForRelations()->checkForSort()->CheckForFilters()->get();
        return GroupResource::collection($groupRelations);
    }
    public function show(group $group){
        //checkForRelations()
        $groupRelations = group::checkForRelations()->findOrFail($group->id);
        return GroupResource::make($groupRelations);
    }
    public function update(Request $request, group $group){
        $group->fill($request->post())->save();
        return response()->json([
            'group'=>$group
        ]);
    }
    public function destroy(group $group){
        $group->delete();
        return response()->json([
            'message'=>'Borrado con exitacion!'
        ]);
    }
}
