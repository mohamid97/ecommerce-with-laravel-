
            @extends('admin.layout.main')
            @section('content')
            @include('admin.error')
            <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-tag"></i> {{__('adminHeading.new_categories')}} </h6>
            <form class="form form-horizontal" action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-body">


               @foreach (config('translatable')['locales'] as $lang)
            
                    <div class="form-group row">
                    <label class="col-sm-3 form-control-label" for="firstName">{{__('static.name_'.$lang)}}</label>
                    <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                        <input  name="{{$lang}}[name]" class="form-control" type="text" id="firstName" placeholder="Type Yout First Name" 
                        value="{{old($lang.'.name')}}">
                        <div class="form-control-position pl-1"><i class="la la-user"></i></div>
                        </div>
                    </div>
                    </div>
                @endforeach

             </div>

                <!-- end role -->

            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-1">
                <button class="btn btn-info float-right" type="submit"><i class="la la-paper-plane-o"></i> {{__('adminButton.send')}} </button>
                </div>
            </div>
            </form>
            @endsection