<!-- ////////////////////////////////////////////////////////////////////////////-->

  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="container">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
          <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
              href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All
            rights reserved. </span>
          <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
        </p>
      </div>
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


  </body>
  
  </html>