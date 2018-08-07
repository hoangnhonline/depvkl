<!DOCTYPE html>
<!-- saved from url=(0027)# -->
<html lang="vi">
   <head>
      <title>@yield('title')</title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
       <meta http-equiv="content-language" content="vi"/>
       <meta name="description" content="@yield('site_description')"/>
       <meta name="keywords" content="@yield('site_keywords')"/>
       <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
       <meta name="google-site-verification" content="IFz-d9V8jZLB1iDG8BfKsKwhPB-FkpsacHLqk5Mpyzk" />
       <meta name="wot-verification" content=""/>
       <meta property="article:author" content="https://www.facebook.com/thanhphuthinhland"/>
       <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
       <link rel="canonical" href="{{ url()->current() }}"/>        
       <meta property="og:locale" content="vi_VN" />
       <meta property="og:type" content="website" />
       <meta property="og:title" content="@yield('title')" />
       <meta property="og:description" content="@yield('site_description')" />
       <meta property="og:url" content="{{ url()->current() }}" />
       <meta property="og:site_name" content="thanhphuthinhland.vn" />
       <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
       <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
       <meta name="csrf-token" content="{{ csrf_token() }}" />
       <meta name="twitter:card" content="summary" />
       <meta name="twitter:description" content="@yield('site_description')" />
       <meta name="twitter:title" content="@yield('title')" /> 
       <meta name="norton-safeweb-site-verification" content="" />       
       <meta name="wot-verification" content=""/>
       <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
      <link rel="icon" href="{{ URL::asset('public/assets/images/favicon.ico') }}" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/files/css/index.css') }}">
      <style>        
         #bttop {
         background: url(images/top.png) no-repeat;
         width: 46px;
         height: 46px;
         position: fixed;
         bottom: 2px;
         right: 2px;
         cursor: pointer;
         display: none;
         }
         .container {
         overflow: unset !important;
         }
      </style>
      <!-- ===== Responsive CSS ===== -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/files/css/responsive.css') }}">
      <link rel="stylesheet" href="{{ URL::asset('public/assets/js/bootstrap/bootstrap.min.css') }}" >      
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/files/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/css/swal.min.css') }}">
      <script src="{{ URL::asset('public/assets/js/jquery.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <!-- ===== JS Bootstrap ===== -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <link href='files/css/animations-ie-fix.css' rel='stylesheet'>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="{{ URL::asset('public/assets/js/home.js') }}"></script>
      <script src="{{ URL::asset('public/assets/js/swal.min.js') }}"></script>
       @yield('css_page')
   </head>
   <body>
   <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=374053293006522";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
      <script>
         $(document).ready(function(){
             //$('[data-toggle="popover"]').popover();
             $('.block-user .block-content').popover({
                 placement: top,
                 trigger: 'click',
                 html : true,
                 content: function() {
                     return $('.popover').html();
                 }
             });
         });
         
      </script>
      <div class="">
         <h1 style="display:none">NHÀ ĐẤT CỦ CHI | NHÀ ĐẤT CỦ CHI</h1>
         <div class="header" id="header">
            <div class="header-top">
               <div class="">
                  <div class="row">
                     <div class="block-logo col-sm-3 col-xs-5">
                        <a href="{{ route('home') }}" title="Logo"><img src="{{ Helper::showImage($settingArr['logo']) }}" alt="Logo"></a>
                     </div>
                     <!-- /block-log -->
                     <div class="block-search col-sm-6 col-xs-7">
                     </div>
                     <!-- /block-search -->
                     <div class="block-user col-sm-3 col-xs-12">
                        @if( !Session::get('login') )
                           <div class="block-content">
                              <span class="ava-img">
                                 <img alt="user" src="{{ URL::asset('public/assets/images/icon-user.png') }}">
                              </span>
                              <div class="ava-info">
                                 <p><strong>Đăng nhập, đăng ký</strong></p>
                                 <p class="small">Tài khoản</p>
                              </div>
                           </div>
                           <div class="popover fade bottom in">
                               <div class="arrow"></div>
                               <div class="popover-content">
                                   <div class="popover-signin">
                                    <button class="btn btn-block btn-white" data-toggle="modal" data-target="#login-modal">Đăng nhập</button>
                                    <button class="btn btn-block btn-white" data-toggle="modal" data-target="#register-modal">Đăng ký tài khoản mới</button>
                                    <button class="btn btn-block login-button-fb btn-social facebook-login" >Đăng nhập với Facebook</button>                      
                                    </div>
                               </div>
                           </div><!-- /popover -->
                           @else
                           <?php 
                           $detailUser = DB::table('customers')->where('id', Session::get('userId'))->first();
                           ?>
                           <div class="block-content">
                              <span class="ava-img">
                                 <img alt="{{ Session::get('username') }}" src="{{ Session::get('avatar') ? Session::get('avatar') :  URL::asset('public/assets/images/icon-user.png') }}">
                              </span>
                              <div class="ava-info hidden-md hidden-sm hidden-xs">
                                 <p><strong>{{ Session::get('username') }}</strong></p>
                                 <p class="small">Tài khoản</p>
                              </div>
                           </div>
                           <div class="popover fade bottom in">
                                <div class="popover-content">
                                 <div class="popover-user">
                                    <div class="user-dropdown-header clearfix">
                                       <div class="user-dropdown-header-left">
                                          <img class="user-avatar-medium" src="{{ Session::get('avatar') ? Session::get('avatar') :  URL::asset('public/assets/images/icon-user.png') }}" alt="{{ Session::get('username') }}">
                                       </div>
                                       <div class="user-dropdown-header-right">
                                          <p class="name">{{ Session::get('username') }}</p>
                                          
                                       </div>
                                    </div><!-- /user-dropdown-header -->                                                           
                                    <div class="user-dropdown-links clearfix">
                                       <a class="link" href="{{ route('xem-thong-tin') }}" >Thông tin tài khoản</a>                                       
                                       <!--<a class="link" href="#">Lịch sử giao dịch</a>-->
                                    </div><!-- /user-dropdown-links -->
                                    <div class="user-dropdown-logout clearfix">
                                       <a class="btn btn-flat btn-logout" href="{{route('user-logout')}}"><i class="fa fa-power-off"></i>Đăng xuất</a>
                                    </div><!-- /user-dropdown-logout -->
                                 </div>
                                 </div>
                           </div><!-- /popover -->
                           @endif
                     </div>
                     <!-- /block-user -->
                  </div>
               </div>
            </div>
         </div>
         <div class="clear"></div>
         <div class="div_an" style="display: block;"></div>
         <div class="clear"></div>
       </div>
         <!-- Start menu -->
         @include('frontend.partials.menu')

         <!-- End menu -->
         <div class="clear"></div>
         @if($routeName == 'home')
         <div id="" >
           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                   <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                   <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               </ol>

               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                    <?php 
                    $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
                    ?>
                    <?php $i = 0; ?>
                    @foreach($bannerArr as $banner)
                    <?php $i++; ?>
                    <div class="item @if($i == 1) active @endif">
                    @if($banner->ads_url !='')
                    <a href="{{ $banner->ads_url }}" title="banner slide {{ $i }}">
                    @endif
                    <img src="{{ Helper::showImage($banner->image_url) }}" alt="banner top {{ $i }}">
                    @if($banner->ads_url !='')
                    </a>
                    @endif
                    </div>
                    @endforeach 
               </div>

               <!-- Controls -->
           

           </div>
       </div>
       @endif
        <div @if($routeName != "ky-gui" || $routeName != "detail-project") class="container block-langding" @endif>
         <div class="clear"></div>
         <div class="center">
          @if($routeName != "ky-gui" || $routeName != "detail-project")
            <div class="right">
               @include('frontend.partials.right')
            </div>
            @endif
            <div @if($routeName != "ky-gui" || $routeName != "detail-project") class="left" @endif >
               @yield('content')               
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
         <!-- Start Footer-->
         
         <!-- End footer -->
         <div class="clear"></div>
         <div class="fix_tel">
            <a href="tel:0919.356.178">
               <div class="tel">
                  <p class="fone"><i class="fa fa-phone" aria-hidden="true"></i>0919.356.178</p>
                  <div class="bor-left"></div>
                  <div class="bor-top"></div>
                  <div class="bor-right"></div>
                  <div class="bor-bottom"></div>
               </div>
            </a>
         </div>
      </div>
      <div class="footer">
            @include('frontend.partials.footer')
         </div>
      <div id="bttop" style="display: block;"></div>
      
      <!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function (e) {
        $('.menu').removeClass('menu_fix');
       $('.div_an').hide();
       $('.menu_desktop').show();
       $('.menu_chay_fix').hide();
        $(window).scroll(function (e) {
            if ($(this).scrollTop() >= 110) {
                $('.menu').addClass('menu_fix');
                $('.div_an').show();
                $('.menu_desktop').hide();
                $('.menu_chay_fix').show().addClass('menu_fix');
                ;
            } else {
                $('.menu').removeClass('menu_fix');
                $('.div_an').hide();
                $('.menu_desktop').show();
                $('.menu_chay_fix').hide();
            }
        });
        $('.nut_menu111').click(function (e) {
            $('.khung_menu12').slideToggle();
        });
    });
$(document).ready(function (e) {
    $('.menu_1').click(function (e) {
        $('.menu_mobile').show();
    });
    $('.btn_close,.div_dong_menu').click(function (e) {
        $('.menu_mobile').slideUp();
    });
    $('.caret').click(function (e) {
        if ($('.caret').attr('class') == 'caret') {
            $(this).addClass('caret1');
        } else {
            $(this).removeClass('caret1');
        }
        $(this).siblings('ul').slideToggle();
    });
});
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#bttop').fadeIn();
        }
        else {
            $('#bttop').fadeOut();
        }
    });
    $('#bttop').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
});
function searchProduct() {
   document.frm_search.submit();
}
</script>
@yield('javascript_page')
<script type="text/javascript">
  $(document).ready(function(){
     $('#city_id').change(function(){                 
          $.ajax({
            url : '{{ route('get-child') }}',
            data : {
              mod : 'district',
              col : 'city_id',
              id : $('#city_id').val()
            },
            type : 'POST',
            dataType : 'html',
            success : function(data){
              $('#district_id').html(data);              
            }
          })
        
      });
     $('#btnSearch').click(function(){    
        if($('#estate_type_id').val() == ''){
          swal({ title: '', text: 'Vui lòng chọn loại bất động sản.', type: 'error' });
          return false;
        }   
      });
  });
</script>
@include('frontend.partials.modal')
<input type="hidden" id="route-ajax-login-fb" value="{{route('ajax-login-by-fb')}}">
   <input type="hidden" id="fb-app-id" value="{{ env('FACEBOOK_APP_ID') }}">
   <input type="hidden" id="route-auth-login-ajax" value="{{ route('auth-login-ajax') }}">
   <input type="hidden" id="route-register-customer-ajax" value="{{ route('register-customer-ajax') }}">
   <input type="hidden" id="route-register-newsletter" value="{{ route('register.newsletter') }}">
   <input type="hidden" id="route-customer-join-sale-ajax" value="{{ route('customer-join-sale')  }}">
   </body>
</html>