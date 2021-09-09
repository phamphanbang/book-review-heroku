<!DOCTYPE html>
<html lang="en" class="no-js">
   <head>
      <!-- Basic need -->
      <title>Open Pediatrics</title>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <link rel="profile" href="#">
      <!--Google Font-->
      <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
      <!-- Mobile specific meta -->
      <meta name=viewport content="width=device-width, initial-scale=1">
      <meta name="format-detection" content="telephone-no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- CSS files -->
      <!--preloading-->
      <div id="preloader">
         <img class="logo" src="images/logo1.png" alt="" width="119" height="58">
         <div id="status">
            <span></span>
            <span></span>
         </div>
      </div>
      <base href="{{asset('')}}">
   </head>
   <body>
      @include('users.layouts.header')
      <!-- END | Header -->
      @yield('content')
      <!--end of latest new v1 section-->
      <!-- footer section-->
      @include('users.layouts.footer')
      <!-- end of footer section-->
      @include('users.config.homejs')
      @yield('js')
   </body>
   <!-- index14:58-->
</html>