
@extends('admin.layout.main')
@section('content')
@include('admin.error')

<h4 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-plus"></i> {{__('adminHeading.new_product')}}</h4>
<form class="form form-horizontal" action="{{route('dashboard.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-body">

    <div class="form-group row">

      <label class="col-sm-3 form-control-label" for="category">{{__('static.category')}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
        <select name="category" class="select2 form-control block" id="category">
           @if (!$cats->isEmpty())
           @foreach ($cats as $cat)
           <option value="{{$cat->id}}" class="foem-control"
            {{old('category') == $cat->id ?'selected':''}}
            >{{$cat->name}}</option>
           @endforeach
           @else
           <option value="" class="foem-control">No Category Founded</option>
           @endif
          
        </select>
        </div>
    </div>
    </div>


    @foreach (config('translatable')['locales'] as $lang)
    <div class="form-group row">
      <label class="col-sm-3 form-control-label" for="firstName">{{__('static.name_'.$lang)}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
          <input  name="{{$lang}}[name]" class="form-control" type="text" id="name" placeholder="Type Name of Products" value="{{old($lang.'.name')}}">
          <div class="form-control-position pl-1"><i class="la la-user"></i></div>
        </div>
      </div>
    </div>
    @endforeach


    @foreach (config('translatable')['locales'] as $lang)
    <div class="form-group row">
      {{old($lang.'des')}}
      <label class="col-sm-3 form-control-label" for="des">{{__('static.description_'.$lang)}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
          <textarea id="editor_{{$lang}}"  name="{{$lang}}[des]" class="form-control" type="text" id="des" >{{old($lang.'.des')}}</textarea>
          <div class="form-control-position pl-1"><i class="la la-text"></i></div>
        </div>
      </div>
    </div>
    @endforeach



   
    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="lastName">{{__('static.stockNumber')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="stockNumber" class="form-control" type="text" id="stockNumber" placeholder="Type your Stock Number" value="{{old('stockNumber')}}">
            <div class="form-control-position pl-1"><i class="la la-quntity"></i></div>
          </div>
        </div>
      </div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label" for="price">{{__('static.purchasePrice')}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
          <input name="purchasePrice" class="form-control" type="text" id="price" placeholder="Type purchasePrice" value="{{old('purchasePrice')}}">
          <div class="form-control-position pl-1"><i class="la la-money"></i></div>
        </div>
      </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="image">{{__('static.image')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="image" class="form-control my-pond" type="file" id="image" value="{{old('image')}}">
            <div class="form-control-position pl-1"><i class="la la-image"></i></div>
          </div>
        </div>
      </div>




  </div>
  <div class="row">
    <div class="col-sm-12 mb-1">
      <button class="btn btn-info float-right" type="submit"><i class="la la-paper-plane-o"></i> {{__('adminButton.send')}} </button>
    </div>
  </div>
</form>
@endsection