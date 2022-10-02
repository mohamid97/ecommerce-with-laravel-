@extends('admin.layout.main')
@section('content')


   @include('admin.success')
   <p>{{  __('static.total_clients')}} <span class="text text-primary">{{$clients->total()}}</span></p>
   <form class="row" action="{{route('dashboard.clients.index')}}" method="GET">
    <div class="col">
        <input class="form-control" type="text" name="search" placeholder="{{__('static.search')}}" required value="{{request()->search}}">
       </div>
       <div class="col">
          <button type="submit" class="btn btn-sm btn-primary"><i class="la la-plus-circle"></i>{{__('static.search')}}</button>
          @if (auth()->user()->hasPermission('clients_create'))
              
            <a class="btn btn-primary btn-sm " href="{{route('dashboard.clients.create')}}"><i class="la la-plus-square"></i>{{__('static.create')}}</a>
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
        <th>{{__('static.phone')}}</th>
        <th>{{__('static.address')}}</th>
        <th>{{__('static.controll')}}</th>
      </tr>
    </thead>
    <tbody>
        @if (!$clients->isEmpty())
             @foreach ($clients as $client)
                  <tr>
                  <td>{{$client->firstName}}</td>
                  <td>{{$client->lastName}}</td>
                  <td>{{$client->phone}}</td>
                  <td>{{$client->address}}</td>
                  <td>{{$client->email}}</td>
                  <td>
                    @if (auth()->user()->hasPermission('clients_update'))
                    <a href="{{route('dashboard.clients.edit' , $user->id)}}"><button class="btn btn-sm btn-primary"><i class="la la-edit"></i> {{__('static.edit')}}</button></a>                      
                    @else
                    <a href="#"><button class="btn btn-sm btn-primary disabled"><i class="la la-edit"></i> {{__('static.edit')}}</button></a>                      
                    @endif
                    @if (auth()->user()->hasPermission('clients_delete'))
                     <form method="post" action="{{route("dashboard.clients.destroy" , $user->id)}}" style="display:inline">
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
  {{$clients->appends(request()->query())->links()}}
@endsection