@extends('admin.layout.main')
@section('content')
@include('admin.error')
<h5>{{__('adminHeading.new_category')}}</h5>
<form class="form form-horizontal form-bordered" method="post" action="{{route('dashboard.categories.update' , $category->id)}}">
   @csrf
   {{ method_field('PUT') }} 
    <div class="form-body">

        @foreach (config('translatable')['locales'] as $lang)
            
        <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="firstName">{{__('static.name_'.$lang)}}</label>
        <div class="col-sm-9">
            <div class="position-relative has-icon-left">
            <input  name="{{$lang}}[name]" class="form-control" type="text" id="firstName" placeholder="Type Yout First Name" 
            value="{{$category->translate($lang)->name}}">
            <div class="form-control-position pl-1"><i class="la la-user"></i></div>
            </div>
        </div>
        </div>
    @endforeach

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