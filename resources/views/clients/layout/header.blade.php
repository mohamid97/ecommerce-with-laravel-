<!DOCTYPE html>
<html class="loading" lang="{{App::getLocale()}}" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  @yield('title')


  @if (App::getLocale() == "ar")
  <link rel="apple-touch-icon" href="{{asset('assets/admin/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/app-assets/images/ico/favicon.ico')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;700&family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css-rtl/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css-rtl/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css-rtl/charts/jquery-jvectormap-2.0.3.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/style.css')}}">
  <!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/owl.css')}}">
  <!-- start mohamed hamed style -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/clients/css/m-Hamed.css')}}">

  @else
  <link rel="apple-touch-icon" href="{{asset('assets/admin/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/charts/morris.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- owl slider -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/owl.css')}}">

  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/style.css')}}">
  <!-- END Custom CSS-->
  <!-- start mohamed hamed style -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/clients/css/m-Hamed.css')}}">

  @endif

</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
  data-col="2-columns">


  <!-- fixed navbar dark-->
  <nav class="header-navbar navbar-expand-sm navbar navbar-with-menu navbar-dark navbar-fixed navbar-shadow border-grey border-darken-2">
    <div class="navbar-wrapper">

      <div class="navbar-container content">
        <div id="navbar-mobile1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link active" href="#">{{__('client.home')}}</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
              aria-haspopup="true" aria-expanded="false">{{__('client.categories')}}</a>
              <div class="dropdown-menu">
               @if (!$cats->isEmpty())
                  @foreach ($cats as $cat)
                  <a class="dropdown-item" href="{{route('categories' , $cat->id)}}">{{$cat->name}}</a>
                  @endforeach   
               @else
                <a href="#"> No Categories Here</a> 
               @endif    
  
              </div>
            </li>

            <li class="nav-item"><a class="nav-link disabled" href="#">{{__('client.contactUs')}}</a></li>
           <li class="nav-item">
            <form method="get" action="{{route('search')}}" class="d-flex nav-link" role="search" style="padding: 0.8rem .1rem" >
              <input  name="headerSearch" class="form-control me-2" type="search" placeholder="{{__('client.headerSearch')}}" aria-label="Search">
              <button class="btn btn-primary" type="submit" style="margin: 0 .2rem"><i class="la la-search-plus"></i>{{__('client.search')}}</button>
            </form>
           </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="la la-shopping-cart la-bg"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                </li>
                <li class="scrollable-container media-list w-100 ps-container ps-theme-dark" data-ps-id="11f02208-288c-a1fe-b967-a4f0ef6e2cc2">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">You have new order!</h6>
                        <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading red darken-1">99% Server load</h6>
                        <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                        <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Complete the task</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Generate monthly report</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: -8px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-eg"></i><span
                class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
              </a>
       
              @endforeach

            </div>
          </li>
            
            <li class="dropdown dropdown-user nav-item">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                <span class="avatar avatar-online">
                  <img src="{{asset('assets/admin/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span>
                <h6 class="user-name white"> John Doe</h6><i class="caret"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item"><i class="ft-user"></i> Edit Profile</a>
                <a href="#" class="dropdown-item"><i class="ft-mail"></i> My Inbox</a>
                <a href="#" class="dropdown-item">
                  <i class="ft-check-square"></i> Task</a>
                <a href="#" class="dropdown-item"><i class="ft-message-square"></i> Calender</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>