@extends('admin.layout.main')
@section('content')
@include('admin.error')
<h5>{{__('adminHeading.product')}}</h5>
<form class="form form-horizontal form-bordered" method="post" action="{{route('dashboard.products.update' , $product->id)}}">
   @csrf
   {{ method_field('PUT') }} 
   <div class="form-body">

    <div class="form-group row">

      <label class="col-sm-3 form-control-label" for="category">{{__('static.product')}}</label>
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
          <input  name="{{$lang}}[name]" class="form-control" type="text" id="name" placeholder="Type Name of Products" value="{{$product->translate($lang)->name}}">
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
          <textarea id="editor_{{$lang}}"  name="{{$lang}}[des]" class="form-control" type="text" id="des" >{{$product->translate($lang)->des}}</textarea>
          <div class="form-control-position pl-1"><i class="la la-text"></i></div>
        </div>
      </div>
    </div>
    @endforeach



   
    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="lastName">{{__('static.stockNumber')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="stockNumber" class="form-control" type="text" id="stockNumber" placeholder="Type your Stock Number" value="{{$product->stockNumber}}">
            <div class="form-control-position pl-1"><i class="la la-quntity"></i></div>
          </div>
        </div>
      </div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label" for="price">{{__('static.purchasePrice')}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
          <input name="purchasePrice" class="form-control" type="text" id="price" placeholder="Type purchasePrice" value="{{$product->purchasePrice}}">
          <div class="form-control-position pl-1"><i class="la la-money"></i></div>
        </div>
      </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="image">{{__('static.image')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="image" class="form-control" type="file" id="image" value="{{old('image')}}">
            <div class="form-control-position pl-1"><i class="la la-image"></i></div>
          </div>
        </div>
      </div>




  </div>




    </div>
    <div class="form-actions">
      <button type="button" class="btn btn-warning mr-1">
        <i class="ft-x"></i> Cancel
      </button>
      <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> Save
      </button>
    </div>
  </form>
@endsection