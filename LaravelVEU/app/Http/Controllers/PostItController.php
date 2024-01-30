<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\postit; 

class PostItController extends Controller
{
    //
    public function store(Request $request){
        $request -> validate([
            'tarea' => 'required|min:3',
            'descripcion' => 'required'
        ]);
        $postit = postit::create($request->post());
        return response()->json([
            'postit'=>$postit
        ]);
    }
    public function index()
    {
        $postits = postit::all();
        return response()->json($postits);
    }
    public function show(postit $postit){
        return response()->json([
            'postit'=>$postit
        ]);
    }
    public function update(Request $request, postit $postit){
        $postit->fill($request->post())->save();
        return response()->json([
            'postit'=>$postit
        ]);
    }
    public function destroy(postit $postit){
        $postit->delete();
        return response()->json([
            'message'=>'Borrado con exitacion!'
        ]);
    }
}