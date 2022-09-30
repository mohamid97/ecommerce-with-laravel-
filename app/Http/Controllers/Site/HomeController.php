<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{  
  
    /** index return  all data for home page to the clients */
    public function index(){
        $latestProducts = Product::latest()->paginate(4);
        $mostCostProducts = Product::orderBy('purchasePrice' , 'DESC')->paginate(6);
        $lowestCostProducts = Product::orderBy('purchasePrice' , 'ASC')->paginate(6);
        //mosthotest
        return view('clients.home' , 
        compact(
            'latestProducts' , 
            'mostCostProducts' , 
            'lowestCostProducts'
        ));

    }


    public function getCategory(Request $request){
        //dd(LaravelLocalization::setLocale());
        if(isset($request->id) && !empty($request->id) && is_numeric($request->id)){
            $category = Category::where('id' ,  $request->id)->first();
            return view('clients.category' , compact('category'));
        }else{
            return redirect()->route('home');
        }

    }

    public function search(Request $request){
     if($request->has('headerSearch')){
        $products = Product::whereTranslationLike('name' , '%' .$request->headerSearch . '%')->get();
        return view('clients.search' , compact('products')); 
     }
    $request->validate([
    'category'=>'required'
    ]);
    $search = $request->search ?? '';
    $category = $request->category;
    if(empty($search)){
        $category = Category::where('id' ,$category)->first();
        return view('clients.category' , compact('category'));
    }else{
       $products = Product::where('category_id' , $category)->whereTranslationLike('name' , '%' .$request->search . '%')->get();
        //dd($products);
       return view('clients.search' , compact('products'));
    }
     
  
      

    }


}
