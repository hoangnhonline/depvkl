<!DOCTYPE html>
<!-- saved from url=(0027)# -->
<html lang="vi">
   <head>
      <title>@yield('title')</title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
       <meta http-equiv="content-language" content="vi"/>
       <meta name="description" content="@yield('site_description')"/>       
       <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
       <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
       <link rel="canonical" href="{{ url()->current() }}"/>        
       <meta property="og:locale" content="vi_VN" />
       <meta property="og:type" content="website" />
       <meta property="og:title" content="@yield('title')" />
       <meta property="og:description" content="@yield('site_description')" />
       <meta property="og:url" content="{{ url()->current() }}" />
       <meta property="og:site_name" content="lotontv.com" />
       <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
       <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
       <meta name="csrf-token" content="{{ csrf_token() }}" />
       <meta name="twitter:card" content="summary" />
       <meta name="twitter:description" content="@yield('site_description')" />
       <meta name="twitter:title" content="@yield('title')" /> 
       <meta name="norton-safeweb-site-verification" content="{{ $settingArr['norton'] }}" />       
       <meta name="wot-verification" content="{{ $settingArr['wot'] }}" />
       <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
      <link rel="icon" href="{{ URL::asset('public/assets/images/favicon.ico') }}" type="image/x-icon">

      <link href="{{ URL::asset('public/assets/css/bootstrap.css') }}" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{ URL::asset('public/assets/css/screen.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('public/assets/css/animation.css') }}">
      <!--[if IE 7]>
      <link rel="stylesheet" href="css/fontello-ie7.css">
      <![endif]-->
      <link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.css') }}">
      <!--[if lt IE 8]>
      <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection">
      <![endif]-->
      <link href="{{ URL::asset('public/assets/css/lity.css') }}" rel="stylesheet">
     
       @yield('css_page')
   </head>
   <body>   
      <!-- HOME 1 -->
      <div id="home1" class="container-fluid standard-bg">
         <!-- HEADER -->
         <div class="row header-top">
            <div class="col-lg-4 col-md-6 col-sm-5 col-xs-8">
               <h1><a class="main-logo" href="{{ route('home') }}"><img src="{{ Helper::showImage($settingArr['logo']) }}" class="main-logo img-responsive" alt="lotontv.com" title="lotontv.com"></a></h1>
            </div>
            <?php 
            $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
            ?>
            <div class="col-lg-8 hidden-md text-center hidden-sm hidden-xs">
               @if($bannerArr)
               @foreach($bannerArr as $banner)               
                @if($banner->ads_url !='')
                <a href="{{ $banner->ads_url }}">
                @endif
               <img src="{{ Helper::showImage($banner->image_url) }}" class="img-responsive" alt="header banner">
               @if($banner->ads_url !='')
                </a>
                @endif
                @endforeach
               @endif
            </div>
            
         </div>
         @include('frontend.partials.menu')   
         <!-- CORE -->
         
               @yield('content')
            
      </div>               
      </div>     
      
      @include('frontend.partials.footer')      
      
      <!-- JAVA SCRIPT -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="{{ URL::asset('public/assets/js/lity.js') }}"></script>
      <script>
         $(".nav .dropdown").hover(function() {
           $(this).find(".dropdown-toggle").dropdown("toggle");
         });
      </script>      
      @yield('javascript_page')

   </body>
</html>