@extends('admin.layout.main')
@section('content')


   @include('admin.success')
   <p>{{  __('static.total_users')}} <span class="text text-primary">{{$users->total()}}</span></p>
   <form class="row" action="{{route('dashboard.users.index')}}" method="GET">
    <div class="col">
        <input class="form-control" type="text" name="search" placeholder="{{__('static.search')}}" required value="{{request()->search}}">
       </div>
       <div class="col">
          <button type="submit" class="btn btn-sm btn-primary"><i class="la la-plus-circle"></i>{{__('static.search')}}</button>
          @if (auth()->user()->hasPermission('users_create'))
              
            <a class="btn btn-primary btn-sm " href="{{route('dashboard.users.create')}}"><i class="la la-plus-square"></i>{{__('static.create')}}</a>
          @endif    

       </div>
   </form>
   <br>

<table class="table mb-0">
    <thead>
      <tr>
        <th>{{__('static.firstName')}}</th>
        <th>{{__('static.lastName')}}</th>
        <th>{{__('static.email')}}</th>
        <th>{{__('static.controll')}}</th>
      </tr>
    </thead>
    <tbody>
        @if (!$users->isEmpty())
             @foreach ($users as $user)
                  <tr>
                  <td>{{$user->firstName}}</td>
                  <td>{{$user->lastName}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @if (auth()->user()->hasPermission('users_update'))
                    <a href="{{route('dashboard.users.edit' , $user->id)}}"><button class="btn btn-sm btn-primary"><i class="la la-edit"></i> {{__('static.edit')}}</button></a>                      
                    @else
                    <a href="#"><button class="btn btn-sm btn-primary disabled"><i class="la la-edit"></i> {{__('static.edit')}}</button></a>                      
                    @endif
                    @if (auth()->user()->hasPermission('users_delete'))
                     <form method="post" action="{{route("dashboard.users.destroy" , $user->id)}}" style="display:inline">
                      @csrf
                      {{ method_field('DELETE') }} 
                      <a href="#"><button 
                         class="btn btn-sm btn-danger" type="submit"><i class="la la-cut"></i> {{__('static.delete')}}</button> </a>

                     </form>
                    @else
                    <a href="#"><button class="btn btn-sm btn-danger disabled"><i class="la la-cut"></i> {{__('static.delete')}}</button></a>     
                    @endif

                  </td>
                  </tr>
        
              @endforeach       
        
        @else:
        <tr>
        <td class="text text-primary  text-center font-bold" colspan='3'>{{__('static.noData')}}</td>
      </tr>
        @endif



    </tbody>
  </table>
  <br><Br><br>
  {{$users->appends(request()->query())->links()}}
@endsection