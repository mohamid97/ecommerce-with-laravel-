
@extends('admin.layout.main')
@section('content')
@include('admin.error')
<h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i> Contact Us</h6>
<form class="form form-horizontal" action="{{route('dashboard.clients.store')}}" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-body">
    <div class="form-group row">
      <label class="col-sm-3 form-control-label" for="firstName">{{__('static.firstName')}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
          <input  name="firstName" class="form-control" type="text" id="firstName" placeholder="Type client first name" value="{{old('firstName')}}">
          <div class="form-control-position pl-1"><i class="la la-user"></i></div>
        </div>
      </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="lastName">{{__('static.lastName')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="lastName" class="form-control" type="text" id="lastName" placeholder="Type client lastname" value="{{old('lastName')}}">
            <div class="form-control-position pl-1"><i class="la la-user"></i></div>
          </div>
        </div>
      </div>
    <div class="form-group row">
      <label class="col-sm-3 form-control-label" for="inputEmail1">{{__('static.email')}}</label>
      <div class="col-sm-9">
        <div class="position-relative has-icon-left">
          <input name="email" class="form-control" type="email" id="inputEmail1" placeholder="john@example.com" value="{{old('email')}}">
          <div class="form-control-position pl-1"><i class="la la-envelope-o"></i></div>
        </div>
      </div>
    </div>



    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="password">{{__('static.password')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="password" class="form-control" type="password" id="password" placeholder="Type your password" >
            <div class="form-control-position pl-1"><i class="la la-lock"></i></div>
          </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-3 form-control-label" for="password_confirmation">{{__('static.password_confirmation')}}</label>
        <div class="col-sm-9">
          <div class="position-relative has-icon-left">
            <input name="password_confirmation" class="form-control" type="password" id="password_confirmation" placeholder="Type your password">
            <div class="form-control-position pl-1"><i class="la la-lock"></i></div>
          </div>
        </div>
    </div>


    <!-- strat role -->

    <div class="row match-height">
      <div class="col-lg-12">
        <div class="mb-1">
          <h5 class="mb-0">{{__('static.role')}}</h5>
        </div>
           @php
            $rolesType = ['users' , 'products' , 'categories'];    
            $privilg = ['create' , 'read' , 'update' , 'delete'];
            $counter = 0;
           @endphp
        <!-- start model of role [ user -category - ....]  will make loop-->
          @foreach ($rolesType  as $role)
          @php $counter ++;@endphp
          <div id="{{$role. ($counter+2)}}" role="tablist" aria-multiselectable="true">
            <div class="card collapse-icon accordion-icon-rotate">
              <div id="{{$role . ($counter +30)}}" class="card-header bg-success">
                <a data-toggle="collapse" data-parent="#{{$role.($counter+2)}}" href="#{{$role}}" aria-expanded="true"
                aria-controls="{{$role}}" class="card-title lead white">{{__('adminRole.'.$role.'_role')}}</a>
              </div>
              <div id="{{$role}}" role="tabpanel" aria-labelledby="{{$role . ($counter +30)}}" class="card-collapse collapse"
              aria-expanded="true">
                <div class="card-content">
                  <div class="card-body">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          @foreach ($privilg as $priv)
                          <fieldset class="radio">
                            <label>
                              <input type="checkbox" name="roles[]" value="{{$role}}_{{$priv}}"> {{__('adminRole.'.$priv) }}
                            </label>
                          </fieldset>     
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <br>    
          @endforeach
 <!----- end the loop ---> 



          </div>
        </div>
      </div>

    </div>

    <!-- end role -->

  </div>
  <div class="row">
    <div class="col-sm-12 mb-1">
      <button class="btn btn-info float-right" type="submit"><i class="la la-paper-plane-o"></i> Send </button>
    </div>
  </div>
</form>
@endsection