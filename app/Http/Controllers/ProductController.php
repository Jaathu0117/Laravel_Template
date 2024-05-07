<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::latest()->paginate(5);
        return view('products.index',['products'=>$products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'price'=>'required|numeric',
            'image'=>'required|mimes:png,jpg|max:10000'



        ]);

        $imageName=time().".".$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        //dd($request);

        $product = new \App\Models\Product;
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->mrp=$request->mrp;
        $product->price=$request->price;
        $product->save();
        return back()->withSuccess('Product Details Added  Success...');
    }

    public function show($id){
        $product=product::where('id',$id)->first();
        return view('products.show',['product'=>$product]);
    }

    public function edit($id){
        $product=product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([ 'name'=>'required',
            'description'=>'required',
            'mrp'=>'required|numeric',
            'price'=>'required|numeric',
            'image'=>'required|mimes:png,jpg|max:10000'
        ]);

        $product=product::where('id',$id)->first();

        if(isset($request->image))
        {
          $imageName=time().".".$request->image->extension();
          $request->image->move(public_path('products'),$imageName);
          $product->image=$imageName;
        }

        $product->name=$request->name;
        $product->description=$request->description;
        $product->mrp=$request->mrp;
        $product->price=$request->price;
        $product->save();
        return back()->withSuccess('Product Details updated Success...');
        return view('products.edit',['product'=>$product]);
    }

    public function destroy($id)
    {
        $product=product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Details Deleeted Success...');

    }
}
