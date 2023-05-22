<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
   
//show products list   
        public function productslist()
            {
                $products= products::all();
                if($products->count() >0){
                
                    return response()->json
                (['message' => 'products list',
                    'products'=> $products  ]);
                }

                else{  return response()->json
                    (['message' => 'products list',
                        'products'=> 'No products'  ]);
                    }
            }

//save products and image
        public function storeproducts(Request $request)
            {
            $validator = Validator::make($request->all(),[
                        'name'=>'required|string| max:50',
                        'description'=>'required|string| max:250',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
                ]); 
                
                if($validator->fails()){

                    return response()->json([
                        'errors' =>422,
                    ]);
                }

                else{
                    $imagePath = $request->file('image')->store('public');
                    $products= products::create([
                        'name'=>$request->name,
                        'description'=>$request->description,
                        'image' => Storage::url($imagePath),
                        
                    ]);

                            if($products){

                                return response()->json([
                                    'message' =>"products created succesfully",
                                ]);
                            }else{
                                return response()->json([
                                    'massage' =>"products created unsuccesfully",
                                ]);
                            }
                        }
            }

//search products using id
        public function searchproducts($id)
        {
                $products = products::find($id);
                if($products){
                    return response()->json([
                        'products' =>$products,
                    ]);
                }else{
                    return response()->json([
                        'massage' =>"no products found",
                    ]);
                }

        }

 //update products
        public function updateproducts(Request $request, int $id)
        {
            $validator = Validator::make($request->all(),[
                'name'=>'required|string| max:50',
                'description'=>'required|string| max:250',
        ]); 
        
        if($validator->fails()){

            return response()->json([
                'errors' =>422,
            ]);
        }

        else{
            $products= products::find($id);

                    if($products){
                        $products->update([
                            'name'=>$request->name,
                            'description'=>$request->description,
                        ]);

                        return response()->json([
                            'message' =>"products updated succesfully",
                        ]);
                    }else{
                        return response()->json([
                            'massage' =>"no products found",
                        ]);
                    }
                }
        }


// delete products
        public function deleteproducts($id)
            {
                $products= products::find($id);
                if($products){
                    $products->delete();
                    return response()->json([
                        'massage' =>"products deleted successfully",
                    ]);
                }else{
                    return response()->json([
                        'massage' =>"products no found",
                    ]);
                    }
            }
//search product by name 
        public function searchproductsname($name)
        {
            $products = products::where("name", "like", "%".$name."%")->get();

            if ($products->isEmpty()) {
                return response()->json(['message' => 'No results found'], 200);
            }

            return response()->json($products);
        }

}

