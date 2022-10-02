<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
    <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
        href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All
      rights reserved. </span>
    <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
  </p>
</footer>
<!-- BEGIN VENDOR JS-->
<!-- ckeditor-->
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor_en' ) )
      .catch( error => {
          console.error( error );
      } );
      ClassicEditor
      .create( document.querySelector( '#editor_ar' ), {
        // The language code is defined in the https://en.wikipedia.org/wiki/ISO_639-1 standard.
        language: 'ar'
    } )
      .catch( error => {
          console.error( error );
      } );
</script>
<!-- end ckeditoy -->
<script src="{{asset('assets/admin/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('assets/admin/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/admin/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/admin/app-assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
<script>
  $(function(){
  
    // First register any plugins
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

    // Turn input element into a pond
    $('.my-pond').filepond();

    // Set allowMultiple property to true
    $('.my-pond').filepond('allowMultiple', true);
  
    // Listen for addfile event
    $('.my-pond').on('FilePond:addfile', function(e) {
        console.log('file added event', e);
    });

    // Manually add a file using the addfile method
    $('.my-pond').first().filepond('addFile', 'index.html').then(function(file){
      console.log('file added', file);
    });
  
  });
</script>

</html>