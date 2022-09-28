@include('admin.layout.header');
@include('admin.layout.sidebar');
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          @yield('content')
        </div>
    </div>
</div>

@include('admin.layout.footer');


