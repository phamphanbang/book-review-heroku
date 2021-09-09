
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
@include('admin.config.headerjs')

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layout.header')
    <base href="{{asset('')}}">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.menu')
      
      <div class="main-panel">
        <div class="content-wrapper">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
          @endif
          @if (Session::has('message'))
          <div class="flash alert-info">
            <p class="panel-body">
                {{ __(Session::get('message')) }}
            </p>
          </div>
        @endif
      <!-- partial -->
      @yield('content1')
      @yield('js')
      </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
@include('admin.layout.footer')

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('admin.config.footerjs')

  <!-- End custom js for this page-->
</body>

</html>

