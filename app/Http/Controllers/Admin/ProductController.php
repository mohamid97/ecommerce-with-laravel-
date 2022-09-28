<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->search) && is_string($request->search)){
           $products = Product::whereTranslationLike('name' , '%'.$request->search.'%')
                                ->latest()->paginate(10);
        }else{
            $products = Product::latest()->paginate(10);
        }
        
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.products.create' ,compact('cats'));
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
          'category'=>'required|integer',
          'ar.*'=>'required|string',
          'en.*'=>'required',
          'stockNumber'=>'required|integer',
          'purchasePrice'=>'required'
        ]);
        Product::create([
            'en.name'=>$request->en['name'],
            'en.des'=>$request->en['des'],
            'ar.name'=>$request->ar['name'],
            'ar.des'=>$request->ar['des'],
            'category_id'=>$request->category,
            'stockNumber'=>$request->stockNumber,
            'purchasePrice'=>$request->purchasePrice
           
        ]);

        session()->flash('success' , __('static.created_product_successfully'));
        return redirect()->route('dashboard.products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

        ]);
        $product->update([
          ]);
    
           session()->flash('success' , __('static.edit_product_successfully'));
           return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success' , __('static.delete_product_successfully'));
        return  redirect()->route('dashboard.products.index');
        
    }
}
