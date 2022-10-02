@extends('clients.layout.main')
@section('title')
<title>Fur | Home</title>
@endsection
@section('content')
<div class="category">
    @if ($category) 
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('client.home')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('client.categories')}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                </ol>
            </nav>
    
            <!--search with image-->
            @if ($category->products)
                @foreach ($category->products as $product)
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
                               </p>
                        </div>
                    </div>
                    
                </li>
                <hr>
        
                @endforeach
            @else
            <div>{{__('static.noDatads')}}dsd</div>
            @endif


    
    @else
    <h3>{{__('static.noData')}}</h3> 
    @endif


</div>
@endsection