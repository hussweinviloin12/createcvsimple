<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Product::select
        ('id','titel','description','image')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'titel'=>'required',
                'description'=>'required',
                'image'=>'required|image',
            ]
        );
        $Imagename=Str::random().'.'.$request->image->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('protect/Image',$request->image,$Imagename);
        $product=Product::create($request->post()+['image'=>'protect/Image'.$Imagename]);
        return response()->json(['message'=>"uplaod image Sucessfily"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return response()->json(['protuct'=>
        $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //

        $request->validate(
            [
                'titel'=>'required',
                'description'=>'required',
                'image'=>'nullable',
            ]
        );

            $product->fill($request->post())->update();

            if($request->hasFile('image')){
            if($product->image){
                $exist= Storage::disk('public')->exists("protect/Image/{$product->image}");
                if($exist){
                    Storage::disk('public')->delete("protect/Image/{$product->image}");
                }}

            
            $Imagename=Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('protect/Image',$request->image,$Imagename);
            $product->image=$Imagename;
            $product->save();}
            return response()->json(['message'=>"update image Sucessfily"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
       
        if($product->image){
            $exist= Storage::disk('public')->exists("protect/Image/{$product->image}");
            if($exist){
                Storage::disk('public')->delete("protect/Image/{$product->image}");
            }
            }
            $product->delete();
        return response()->json(['message'=>"delted succussfily"]);

    }
}
