@include('frontend.partials.meta')
@extends('frontend.layout')
@section('content')
<div class="row">           
<div class="col-lg-12 col-md-12">     
   <?php 
    $bannerArr = DB::table('banner')->where(['object_id' => 2, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
    ?>
    <div class="container text-center">
       @if($bannerArr)
       @foreach($bannerArr as $banner)               
        @if($banner->ads_url !='')
        <a href="{{ $banner->ads_url }}">
        @endif
       <img src="{{ Helper::showImage($banner->image_url) }}" class="img-responsive" alt="under main menu banner">
       @if($banner->ads_url !='')
        </a>
        @endif
        @endforeach
       @endif
    </div>
<section id="home-main">
  @foreach($articleCateHot as $cate)
  <h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i>{!! $cate->name !!}</h2>
  <div class="row">
     <!-- ARTICLES -->
     <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row auto-clear">
          @foreach($postArr[$cate->id] as $post)
           <article class="col-lg-3 col-md-6 col-sm-4">
              <!-- POST L size -->
              <div class="post post-medium">
                 <div class="thumbr">
                    <a class="afterglow post-thumb" href="{{ route('detail', [ $post->slug, $post->id ]) }}">
                       <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                       <div class="cactus-note ct-time font-size-1"><span>{{ $post->duration }}</span></div>
                       <img class="img-responsive" src="{!! $post->image_urlxxx !!}" alt="{!! $post->title !!}">
                    </a>
                 </div>
                 <div class="infor">
                    <h4>
                       <a class="title" href="{{ route('detail', [ $post->slug, $post->id ]) }}">{!! $post->title !!}</a>
                    </h4>
                    <span class="posts-txt" title="{!! $post->title !!}"><i class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
                    <div class="ratings">
                       <i class="fa fa-star" aria-hidden="true"></i>
                       <i class="fa fa-star" aria-hidden="true"></i>
                       <i class="fa fa-star-half-o" aria-hidden="true"></i>
                       <i class="fa fa-star-o"></i>
                       <i class="fa fa-star-half"></i>
                    </div>
                 </div>
              </div>
           </article>
           @endforeach
        </div>
        <div class="clearfix spacer"></div>
     </div>                     
     
  </div>
  @endforeach
</section>
</div>
</div>
@stop