<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**using database */
            // $products = DB::table('products')->paginate(15);


        /**using recent product model */
        $products = Product::latest()->orderBy('id')->paginate(5);

        $products = Product::paginate(5);

        $products = DB::table('products')->orderBy('name','desc')->paginate(5);

        //$products = DB::table('products')->groupBy('price')->paginate(5);
        $products = DB::table('products')->having('price', '>', 200)->paginate(5);
        
        $products = DB::table('products')->havingBetween('price', [150, 300])->paginate(5);
        
        $products = DB::table('products')->skip(1)->paginate(5);

        $products = DB::table('products')->where('price', '>', 300)->paginate(5);
        //$products = DB::table('products')->where('name', 'Test Product')->first();
        return view('products.index',['products' =>  $products])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //Product::create($request->all());
        
        $input = $request->all();
       
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
       
        Product::create($input);
        return redirect()->route('products.index')->with('success','Product created successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $input = $request->all();
       
        if ($image = $request->file('image')) {
           
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $product->update($input);
        return redirect()->route('products.index')->with('success','Product updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
->with('success','Product has been deleted successfully');
    }
}
