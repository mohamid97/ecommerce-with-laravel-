@include('admin.layout.header')
<div class="container">
  <form class="form form-horizontal striped-labels form-bordered">
    <div class="form-body">
      <h4 class="form-section"><i class="la la-user"></i> Personal Info</h4>
      <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput1">First Name</label>
        <div class="col-md-9">
          <input type="text" id="projectinput1" class="form-control" placeholder="First Name"
          name="fname">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput2">Last Name</label>
        <div class="col-md-9">
          <input type="text" id="projectinput2" class="form-control" placeholder="Last Name"
          name="lname">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
        <div class="col-md-9">
          <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">
        </div>
      </div>
      <div class="form-group row last">
        <label class="col-md-3 label-control" for="projectinput4">Contact Number</label>
        <div class="col-md-9">
          <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone">
        </div>
      </div>

      <div class="form-group row last">
        <label class="col-md-3 label-control" for="projectinput4"></label>
        <div class="col-md-9">
          <button type="submit" class="btn btn-primary">{{__('auth.login')}}</button>
        </div>
      </div>

      

    </div>

  </form>
</div>

  @include('admin.layout.footer')