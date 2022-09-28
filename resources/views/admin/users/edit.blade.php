@extends('admin.layout.main')
@section('content')
@include('admin.error')
<h5>Edit User</h5>
<form class="form form-horizontal form-bordered" method="post" action="{{route('dashboard.users.update' , $user->id)}}">
   @csrf
   {{ method_field('PUT') }} 
    <div class="form-body">
      <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput1">First Name</label>
        <div class="col-md-9">
          <input type="text" id="projectinput1" class="form-control" value="{{$user->firstName}}"
          name="firstName">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput2">Last Name</label>
        <div class="col-md-9">
          <input type="text" id="projectinput2" class="form-control" value="{{$user->lastName}}" name="lastName">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
        <div class="col-md-9">
          <input type="text" id="projectinput3" class="form-control" value="{{$user->email}}" name="email">
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
                              <input  {{ $user->hasPermission($role."_".$priv) ?'checked' :''}} 
                              type="checkbox" name="roles[]" value="{{$role}}_{{$priv}}"> {{__('adminRole.'.$priv) }}
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