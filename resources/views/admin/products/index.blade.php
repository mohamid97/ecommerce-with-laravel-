@extends('admin.layout.main')
@section('content')
   @include('admin.success')
   <p>{{  __('static.total_products')}} <span class="text text-primary">{{$products->total()}}</span></p>
   <form class="row" action="{{route('dashboard.products.index')}}" method="GET">
    <div class="col">
        <input class="form-control" type="text" name="search" placeholder="{{__('static.search')}}" required value="{{request()->search}}">
       </div>
       <div class="col">
          <button type="submit" class="btn btn-sm btn-primary"><i class="la la-plus-circle"></i>{{__('static.search')}}</button>
          @if (auth()->user()->hasPermission('product_create'))
            <a class="btn btn-primary btn-sm " href="{{route('dashboard.products.create')}}"><i class="la la-plus-square"></i>{{__('static.create')}}</a>
          @endif    

       </div>
   </form>
   <br>

<table class="table mb-0">
    <thead>
      <tr>
        <th>{{__('adminSidebar.products')}}</th>
        <th>{{__('static.category')}}</th>
        <th>{{__('static.purchasePrice')}}</th>
        <th>{{__('static.purchasePrice')}}</th>
        <th>{{__('static.controll')}}</th>
      </tr>
    </thead>
    <tbody>
        @if (!$products->isEmpty())
             @foreach ($products as $key=>$product)
                  <tr>
                  <td>{{$product->name}}</td>
                  <td>{{$product->category->name}}</td>
                  <td>{{$product->purchasePrice}}</td>
                  <td>{{$product->stockNumber}}</td>
                
                  <td>
                    @if (auth()->user()->hasPermission('product_update'))
                    <a href="{{route('dashboard.products.edit' , $product->id)}}"><button class="btn btn-sm btn-primary"><i class="la la-edit"></i> {{__('static.edit')}}</button></a>                      
                    @else
                    <a href="#"><button class="btn btn-sm btn-primary disabled"><i class="la la-edit"></i> {{__('static.edit')}}</button></a>                      
                    @endif
                    @if (auth()->user()->hasPermission('product_delete'))
                     <form method="post" action="{{route("dashboard.products.destroy" , $product->id)}}" style="display:inline">
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
  {{$products->appends(request()->query())->links()}}
@endsection