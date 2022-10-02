@extends('clients.layout.main')
@section('title')
<title>Home | {{request()->search}}</title>
@endsection
@section('content')
<div class="category">
    @if (!$products->isEmpty()) 
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('client.home')}}</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="{{route('categories' ,$products[0]->category->id )}}">{{$products[0]->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{request()->search}}</li>
                </ol>
            </nav>
    
            <!--search with image-->
            
                @foreach ($products as $product)
                <li class="media">
                    <div class="row" style="width: 100%">
                        <div class="col-md-2 col-sm-12 media-left">
                            <a href="#">
                            <img class="media-object width-150" src="{{asset('productsImages/'.$product->image)}}"
                            alt="Generic placeholder image">
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-12 media-body media-search">
                                <p class="lead mb-0">
                                <a href="#"> {{$product->name}}</a>
                                </p>
                                <p>{{$product->des}}</p>
                                <p>
                                    <button class="btn btn-outline-primary"><i class="ft-shopping-cart"></i> {{__('client.shopNow')}}</button>
                                    <button class="btn btn-outline-success"> {{$product->purchasePrice}}$ </button>
                                    <button class="btn btn-outline-danger"> <i class="ft-tag"></i>{{$product->category->name}} </button>

                               </p>
                        </div>
                    </div>
                    
                </li>
                <hr>
        
                @endforeach



    
    @else
    <h3>{{__('static.noData')}}</h3> 
    @endif


</div>
@endsection