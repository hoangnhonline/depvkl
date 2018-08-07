<div class="menu_chay_fix menu_fix" style="display: block;">
   <div class="menu_chay_fix1">
      <div class="dm_tk">
         <span style="text-transform:uppercase;color:#FFF;font-size:16px;float:left;padding:24px 0px;">danh mục</span>
         <span class="nut_menu111">
            <div class="khung_menu12">
               <ul>
                  <li>
                     <a href="{{ route('danh-muc', "ban-du-an" ) }}">Bán dự án</a>                     
                  </li>
                  <li>
                     <a href="{{ route('danh-muc', "nha-le" ) }}">Nhà lẻ</a>                     
                  </li>
                  <li>
                     <a href="{{ route('danh-muc', "dat-le" ) }}">Đất lẻ</a>
                  </li>
                  <li>
                     <a href="{{ route('danh-muc', "cho-thue" ) }}">Cho thuê</a>
                     <ul>
                     </ul>
                  </li>
               </ul>
               <div class="clear"></div>
               <div class="menu_nho">
                  <a href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
                  <a href="{{ route('danh-muc', 'gioi-thieu' ) }}">Giới thiệu</a>                  
                  <a href="{{ route('news-list', 'tin-tuc') }}">Tin tức</a>
                  <a href="{{ route('contact') }}">Liên hệ</a>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
            </div>
         </span>
         <div class="khung_timkiem">
            <form action="#tim-kiem.html" method="post">
               <input type="text" name="keyword" id="keyword" class="keyword11"
                  placeholder="Nhập từ khóa tìm kiếm..." autocomplete="off">
            </form>
            <span style="background:url(images/search.png) no-repeat"></span>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="div_hotline2">
         <div class="hotline2">0919.356.178</div>
               </div>
      <div class="clear"></div>
   </div>
   <div class="clear"></div>
</div>
<div class="clear"></div>
<div class="menu menu_fix">
   <div class="menu_desktop" style="display: none;">
      <ul>
         <li><a href="{{ route('home') }}" title="Trang chủ"  @if($routeName == "home") active_trangchu @endif">trang chủ</a></li>
         <li><a href="{{ route('danh-muc', 'gioi-thieu' ) }}"  {{ isset($slug) && $slug == "gioi-thieu" ? "active_trangchu" : "" }}">giới thiệu</a></li>
         <li><a {{ isset($estate_type_id) && $estate_type_id == 2 ? "active_trangchu" : "" }}" href="{{ route('danh-muc', 'ban-du-an') }}">Bán dự án </a>
         </li>
         <li><a {{ isset($estate_type_id) && $estate_type_id == 3 ? "active_trangchu" : "" }}" href="{{ route('danh-muc', 'nha-le') }}">Nhà lẻ </a>
         </li>
         <li><a {{ isset($estate_type_id) && $estate_type_id == 7 ? "active_trangchu" : "" }}" href="{{ route('danh-muc', 'dat-le') }}">Đất lẻ </a>
         </li>
         <li><a {{ isset($estate_type_id) && $estate_type_id == 5 ? "active_trangchu" : "" }}" href="{{ route('danh-muc', 'cho-thue') }}">Cho thuê</a>
         </li>         
         <li><a href="{{ route('news-list', 'tin-tuc') }}"  @if($routeName == "news-list" || $routeName == "news-detail") active_trangchu @endif">tin tức</a></li>
         <li><a href="{{ route('contact') }}"  @if($routeName == "contact") trangchu active_trangchu @endif">liên hệ</a></li>
      </ul>
      <div class="clear"></div>
   </div>
   <div class="logo_menu">
      <div class="hotline3" style="background: url(images/phone2.png)3% no-repeat;
         font-size: 20px;font-family: utm_impact;padding: 17px 0px;padding-left: 30px;color: #fff;
         float: left;">0919.356.178
      </div>
      <span class="nut_menu111" style="float:right;">
         <div class="khung_menu12"
            style="right:-10px;width:290px;height:400px;overflow-y:auto;padding-bottom:20px;">
            <ul>
               <li style="width: 120px;margin-right: 10px;">
                  <a
                     href="#bat-dong-san/dat-nen.html" style="font-size:13px;">Đất nền</a>
                  <ul>
                  </ul>
               </li>
               <li style="width: 120px;margin-right: 10px;">
                  <a
                     href="#bat-dong-san/can-ho.html" style="font-size:13px;">Căn hộ</a>
                  <ul>
                  </ul>
               </li>
               <li style="width: 120px;margin-right: 10px;">
                  <a
                     href="#bat-dong-san/nha-xuong.html" style="font-size:13px;">Nhà xưởng</a>
                  <ul>
                  </ul>
               </li>
            </ul>
            <div class="clear"></div>
            <div class="menu_nho">
               <a href="{{ route('home') }}">Trang chủ</a>
               <a href="{{ route('danh-muc', 'gioi-thieu' ) }}">Giới thiệu</a>               
               <a href="{{ route('news-list', 'tin-tuc') }}">Tin tức</a>
               <a href="{{ route('contact') }}">Liên hệ</a>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
      </span>
      <div class="clear"></div>
   </div>
   <div class="clear"></div>
</div>