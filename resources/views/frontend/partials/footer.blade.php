<!-- BOTTOM BANNER -->
<?php 
 $bannerArr = DB::table('banner')->where(['object_id' => 3, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
 ?>
<div id="bottom-banner" class="container text-center">
    @if($bannerArr)
    @foreach($bannerArr as $banner)               
     @if($banner->ads_url !='')
     <a href="{{ $banner->ads_url }}" class="banner-xl">
     @endif
    <img src="{{ Helper::showImage($banner->image_url) }}" class="img-responsive" alt="footer banner">
    @if($banner->ads_url !='')
     </a>
     @endif
     @endforeach
    @endif
 </div>
<!-- FOOTER -->
<div id="footer" class="container-fluid footer-background">
   <div class="container">
      <footer>    
         <div class="row copyright-bottom text-center">
            <div class="col-md-12 text-center">
              
               <p>{!! $settingArr['title_footer'] !!}</p>
               {!! $settingArr['content_footer'] !!}
            </div>
         </div>
      </footer>
   </div>
</div>