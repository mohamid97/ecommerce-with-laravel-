@extends('clients.layout.main')
@section('title')
<title>Fur | Home</title>
@endsection
@section('content')
@include('clients.error')
<!--- search with category and name of product -->
<div class="form">
  <form method="get" action="{{route('search')}}" class="d-flex nav-link" role="search" style="padding: 0.8rem .1rem" >
     <div class="row"  style="width: 100%">
            
         <div class="col"><input  name="search" class="form-control me-2" type="search" placeholder="{{__('client.headerSearch')}}" aria-label="Search"></div>
         <div class="col">
          <select name="category" class="select2 form-control">
              <option value="">All Category</option>
              @foreach ($cats as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach      

          </select>
         </div>
         <div class="col"> <button class="btn btn-primary" type="submit" style="margin: 0 .2rem"><i class="la la-search-plus"></i>{{__('client.search')}}</button>  </div>
     </div>
  </form>
</div>
<!-- latest product only five products -->
  @if (!$latestProducts->isEmpty())
    <div class="row">
      <div class="col-12 mt-3 mb-1">
          <h2 class=" text-uppercase">{{__('client.newArrival')}}</h2>  
      </div>
    </div>
  <div class="row match-height">
    @foreach ($latestProducts as $latest)
      <div class="col-md-6 col-sm-12">
        <div class="card border-primary text-center bg-transparent">
          <div class="card-content">
            <div class="card-body pt-3">
              <img src="{{asset('productsImages/'.$latest->image)}}" alt="element 01" width="190"
              class="float-left">
              <h4 class="card-title mt-3 text-primary">{{$latest->name}}</h4>
              <p class="card-text">{{$latest->des}}.</p>
              <button class="btn btn-outline-primary"><i class="ft-shopping-cart"></i> Buy Now</button>
              <button class="btn btn-outline-success">{{$latest->purchasePrice}}$</button>
            </div>
          </div>
        </div>
      </div>

    @endforeach
  </div>
  @else
  <h3> {{__('client.noProduct')}}</h3>
  @endif

  <!-- start sextion max expensive -->
  <section id="shopping-cards margin-top">

    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h2 class="text-uppercase">{{__('client.mostExpensive')}}</h2>
      </div>
    </div>

    <div class="row match-height">
      @if (!$mostCostProducts->isEmpty())
          @foreach ($mostCostProducts as $most)
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="{{asset('productsImages/'.$most->image)}}"
                  alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">{{$most->name}}</h4>
                    <p class="card-text">{{$most->des}}</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <span class="btn btn-outline-primary">{{$most->purchasePrice}}$</span>
                      <button type="button" class="btn btn-outline-success">{{__('client.shopNow')}} <i class="ft-shopping-cart"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
      @else
      <h3> {{__('client.noProduct')}}</h3>
      @endif
  
    </div>
  </section>

  <!-- strat callout -->
  <div class="row margin-top">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{__('client.steps')}}</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="bs-callout-primary">
              <div class="media align-items-stretch">
                <div class="media-left media-middle bg-primary p-2">
                  <i class="la la-sun-o white font-medium-5 mt-1"></i>
                </div>
                <div class="media-body p-1">
                  <strong>First!</strong>
                  <p>Soufflé topping bear claw sugar plum gummies jelly. Carrot
                    cake lemon drops gummies. Danish oat cake icing jelly
                    icing cookie gingerbread jelly beans. Tiramisu sweet
                    roll gummies cake carrot cake biscuit.</p>
                </div>
              </div>
            </div>
            <div class="bs-callout-success mt-1">
              <div class="media align-items-stretch">
                <div class="media-left media-middle bg-success p-2">
                  <i class="la la-diamond white font-medium-5 mt-1"></i>
                </div>
                <div class="media-body p-1">
                  <strong>Congratulations!</strong>
                  <p>Cake chupa chups tootsie roll brownie pastry marzipan lollipop
                    sweet. Chocolate cake candy sweet macaroon sugar plum
                    tiramisu carrot cake. Cupcake ice cream gummies. Sugar
                    plum cupcake cotton candy jelly beans.</p>
                </div>
              </div>
            </div>
            <div class="bs-callout-danger mt-1">
              <div class="media align-items-stretch">
                <div class="media-left media-middle bg-danger p-2">
                  <i class="la la-ge white font-medium-5"></i>
                </div>
                <div class="media-body p-1">
                  <strong>Not Bad!</strong>
                  <p>Croissant carrot cake sesame snaps dessert wafer dessert
                    wafer icing jelly. Halvah jelly beans dragée oat cake
                    sesame snaps. Pie carrot cake liquorice. Chocolate marzipan
                    chocolate gummi bears.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<!-- most ordered --->
  @if (!$latestProducts->isEmpty())
    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <h2 class="text-uppercase">{{__('client.mostPaied')}}</h2>  
        </div>
    </div>
  <div class="row match-height">
    @foreach ($latestProducts as $latest)
      <div class="col-md-6 col-sm-12">
        <div class="card border-primary text-center bg-transparent">
          <div class="card-content">
            <div class="card-body pt-3">
              <img src="{{asset('productsImages/'.$latest->image)}}" alt="element 01" width="190"
              class="float-left">
              <h4 class="card-title mt-3 text-primary">{{$latest->name}}</h4>
              <p class="card-text">{{$latest->des}}.</p>
              <span class="btn btn-outline-primary">{{$most->purchasePrice}}$</span>
              <button class="btn btn-outline-success"><i class="ft-shopping-cart"></i> {{__('client.shopNow')}}</button>
            </div>
          </div>
        </div>
      </div>

    @endforeach
  @else
  <h3> {{__('client.noProduct')}}</h3>
  </div>
  @endif



    <!-- start sextion max expensive -->
    <section id="shopping-cards margin-top">

      <div class="row">
        <div class="col-12 mt-3 mb-1">
          <h2 class="text-uppercase">{{__('client.lowestExpensive')}}</h2>
        </div>
      </div>
  
      <div class="row match-height">
        @if (!$lowestCostProducts->isEmpty())
            @foreach ($lowestCostProducts as $lowest)
              <div class="col-lg-4 col-md-12">
                <div class="card text-center">
                  <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{asset('productsImages/'.$lowest->image)}}"
                    alt="Card image cap">
                    <div class="card-body">
                      <h4 class="card-title">{{$lowest->name}}</h4>
                      <p class="card-text">{{$lowest->des}}</p>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <span class="btn btn-outline-primary">{{$lowest->purchasePrice}}$</span>
                        <button type="button" class="btn btn-outline-success">{{__('client.shopNow')}} <i class="ft-shopping-cart"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        @else
        <h3> {{__('client.noProduct')}}</h3>
        @endif
      </div>
    </section>




@endsection


