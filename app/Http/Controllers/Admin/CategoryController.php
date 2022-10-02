<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search) && is_string($request->search)){

             $categories = Category::whereTranslationLike('name', '%'.$request->search.'%')
             ->latest()->paginate(10);
                      
        }else{
            $categories = Category::latest()->paginate(10);        
        }
    
            return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        'ar.name'=>'required|unique:category_translations,name',
        'en.name'=>'required|unique:category_translations,name'
       ]);
       Category ::create([
        'ar' => [
          'name' => $request->ar['name'],
        ],
        'en' => [
          'name' => $request->en['name'],
        ],
      ]);

       session()->flash('success' , __('static.created_category_successfully'));
       return redirect()->route('dashboard.categories.index');
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'ar.name'=>'required|unique:category_translations,name,'.$category->id,
            'en.name'=>'required|unique:category_translations,name,'.$category->id,
        ]);
        $category->update([
            'ar' => [
              'name' => $request->ar['name'],
            ],
            'en' => [
              'name' => $request->en['name'],
            ],
          ]);
    
           session()->flash('success' , __('static.edit_category_successfully'));
           return redirect()->route('dashboard.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success' , __('static.delete_category_successfully'));
        return redirect()->route('dashboard.categories.index');
       
    }
}
