<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProtectResource;
use App\Models\Protect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class protectcontroller extends Controller
{
    //

    public function index() {
       $protect =Protect::get();
        if($protect->count()>0){
         return ProtectResource::collection($protect);
        }else{
            return response()->json(['message'=>'no required'],200);
        }
    }
    
    public function store(Request $request) {
        
        $validator=Validator::make($request->all(),
            ['name'=>'required|string|max:255',
            'descrption'=>'required',
        'price'=>'required|integer']
        );
      if($validator->fails()){
        return response()->json(['message'=>'fail all mandotor',
    'error'=>$validator->messages()],400);
        }else{

      $protect=  Protect::create([
            'name'=>$request->name,
            'descrption'=>$request->descrption,
            'price'=>$request->price,
        ]);}
        return response()->json(['message'=>'created Scuccfily','data'=> new ProtectResource($protect)],200);
    }

    public function show(Protect $protect) {
       return new ProtectResource($protect);
    }
    public function update(Request $request,Protect $protect) {

        $validator=Validator::make(
            ['name'=>'required|string|max:255',
            'descrption'=>'required',
            'price'=>'required|integer']
        );
        if($validator->fails()){
            return response()->json(['message'=>'fail all mandotor',
            'error'=>$validator->messages()],422);
            }
                $protect->update([
                'name'=>$request->name,
                'descrption'=>$request->descrption,
                'price'=>$request->price,
                ]);

                return response()->json(['message'=>"update protuct scussfily",'data'=> new ProtectResource($protect)],200);

    }
    public function destroy(Protect $protect) {
        $protect->delete();
        return response()->json(['message'=>'delete scussfily'],200);

    }
}
