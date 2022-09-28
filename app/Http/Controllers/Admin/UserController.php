<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware('permission:users_create')->only(['create' , 'store']);
        $this->middleware('permission:users_update')->only(['edit' , 'update']);
        $this->middleware('permission:users_delete')->only('destroy');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search) && is_string($request->search)){
            $users = User::whereRoleIs('admin')->where('firstName' , 'like' , '%'.$request->search . '%')
                           ->orWhere('lastName' , 'like' , '%' . $request->search .'%')
                           ->latest()->paginate(10);
        }else{
            $users = User::whereRoleIs('admin')->latest()->paginate(10);
        }

        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
          'firstName'=>'required',
          'lastName'=>'required',
          'email'   =>'required|unique:users',
          'password' =>'required|confirmed',
          'roles'   =>'required|array'
        ]);
        $request->password = bcrypt($request->password);
        if (!extension_loaded('imagick')){
            echo 'imagick not installed';
        }
        dd(true);
        $manager = new ImageManager(['driver' => 'imagick']);
        $image = $manager->make(asset('uploads/dashboard'))->resize(300, 200);

        $user = User::create([
          'firstName'=>$request->firstName,
          'lastName' =>$request->lastName,
          'email'=>$request->email,
          'password'=>$request->password
        ]);
        /* add roles */
        $user->attachRole('admin');
        $user->syncPermissions($request->roles);
        session()->flash('success' , __('static.created_user_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        return view('admin.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'   =>'required|email|unique:users,email,'.$user->id,
            'roles'   =>'required|array'
          ]);
           
          $user->update([
            'firstName' =>$request->firstName,
            'lastName' =>$request->lastName,
            'email'=>$request->email,

          ]);
          $user->syncPermissions($request->roles);
          session()->flash('success' , __('static.edit_user_successfully'));
          return redirect()->route('dashboard.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success' , __('static.delete_user_successfully'));
        return redirect()->back();
    }
}
