@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="row">
    <!-- VIDEO POSTS -->    
    <div id="single-video-right-sidebar-wrapper" class="col-lg-10 col-md-8">
       <div class="row">
          <!-- VIDEO SINGLE POST -->
          <div class="col-lg-8 col-md-12 col-sm-12">
             <!-- POST L size -->
             <article class="post-video">
                <!-- VIDEO INFO -->
                <div class="video-info">
                   <!-- 16:9 aspect ratio -->
                   <div class="">
                      <div id="videos">
                        <div class="hero-unit" style="position:relative"> 
                          <video id='videoPlayer' style="position:relative" preload='metadata' controls poster="" style="border: 1px solid; background: black;">
                                    <source id="mp4Source" src="{{ $video_url }}" type="video/mp4">               
                                </video>        
                            </div>
                      </div><!-- end #video-->
                   </div>
                   <h2 class="title main-head-title">{!! $detail->title !!}</h2>
                   <div class="metabox">
                      <span class="meta-i">
                      <i class="fa fa-thumbs-up" aria-hidden="true"></i>20.895
                      </span>
                      <span class="meta-i">
                      <i class="fa fa-thumbs-down" aria-hidden="true"></i>3.981
                      </span>
                      <span class="meta-i">
                      <i class="fa fa-user"></i><a href="#" class="author" title="John Doe">John Doe</a>
                      </span>
                      <span class="meta-i">
                      <i class="fa fa-clock-o"></i>{{ date('Y/m/d', strtotime($detail->updated_at)) }}
                      </span>
                      <span class="meta-i">
                      <i class="fa fa-eye"></i>1,347,912 lượt xem
                      </span>
                      <div class="ratings">
                         <i class="fa fa-star" aria-hidden="true"></i>
                         <i class="fa fa-star" aria-hidden="true"></i>
                         <i class="fa fa-star-half-o" aria-hidden="true"></i>
                         <i class="fa fa-star-o"></i>
                         <i class="fa fa-star-half"></i>
                      </div>
                   </div>
                   <ul class="social">
                      <li class="social-facebook"><a href="#" class="fa fa-facebook social-icons"></a></li>
                      <li class="social-google-plus"><a href="#" class="fa fa-google-plus social-icons"></a></li>
                      <li class="social-twitter"><a href="#" class="fa fa-twitter social-icons"></a></li>
                      <li class="social-youtube"><a href="#" class="fa fa-youtube social-icons"></a></li>
                      <li class="social-rss"><a href="#" class="fa fa-rss social-icons"></a></li>
                   </ul>
                   <!-- <ul class="footer-tags">
                      <li><a href="#">videos</a></li>
                      <li><a href="#">premium</a></li>
                      <li><a href="#">hair</a></li>
                      <li><a href="#">beauty</a></li>
                      <li><a href="#">ranking</a></li>
                      <li><a href="#">lifestyle</a></li>
                      <li><a href="#">sport</a></li>
                      <li><a href="#">money</a></li>
                      <li><a href="#">comments</a></li>
                   </ul> -->
                   <div class="share-input">
                      <input type="text" value="{{ url()->current() }}">
                      <span class="fa fa-chain sharelinkicon"></span>
                   </div>
                </div>
                <div class="clearfix spacer"></div>
                <!-- DETAILS -->                
                <div class="video-content">
                   <h2 class="title main-head-title">Nội dung</h2>
                   {!! $detail->content !!}
                   </p>
                </div>
                <div class="clearfix spacer"></div>
                <!-- MAIN ROLL ADVERTISE BOX -->
                <?php 
                 $bannerArr = DB::table('banner')->where(['object_id' => 6, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
                 ?>
                
                  @if($bannerArr)
                  @foreach($bannerArr as $banner)               
                   @if($banner->ads_url !='')
                   <a href="{{ $banner->ads_url }}" class="banner-md">
                   @endif
                  <img src="{{ Helper::showImage($banner->image_url) }}" class="img-responsive" alt="detail page under content banner">
                  @if($banner->ads_url !='')
                   </a>
                   @endif
                   @endforeach
                  @endif                 
               
             </article>
          
            <!-- COMMENTS -->
            <!-- <section id="comments">
                <h2 class="title">Bình luận</h2>
                <div class="widget-area">
                    <div class="status-upload">
                        <form>
                            <textarea placeholder="Your comment goes here" ></textarea>
                            <div class="comment-box-control">
                                <ul>
                                    <li><a title="" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
                                    <li><a title="" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                                    <li><a title="" data-placement="bottom" data-original-title="Smile"><i class="fa fa-smile-o"></i></a></li>
                                </ul>
                                <button type="submit" class="btn pull-right"><i class="fa fa-share"></i> post comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                <div class="row comment-posts">
                   
                </div>

            </section> -->
          
          </div>          
           <?php 
           $bannerArr = DB::table('banner')->where(['object_id' => 5, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
           ?>
          <div class="col-lg-4 hidden-md hidden-sm">
            
              @if($bannerArr)
              @foreach($bannerArr as $banner)
              <div style="margin-bottom: 10px;">               
               @if($banner->ads_url !='')
               <a href="{{ $banner->ads_url }}" class="video-right-banner">
               @endif
              <img src="{{ Helper::showImage($banner->image_url) }}" class="img-responsive" alt="detail page sidebar banner">
              @if($banner->ads_url !='')
               </a>
               @endif
               </div>
               @endforeach
              @endif
              
           </div>
       </div>
       <div class="clearfix spacer"></div>
       <div class="row">
          <!-- RELATED VIDEOS -->
          <div class="col-lg-12 col-md-12 col-sm-12 related-videos">
             <h2 class="icon"><i class="fa fa-trophy" aria-hidden="true"></i>Phim cùng chủ đề</h2>
             <div class="row auto-clear">
             	@foreach($otherArr as $post)
                <article class="col-lg-3 col-md-6 col-sm-4">
                   <!-- POST L size -->
                   <div class="post post-medium">
                      <div class="thumbr">
                         <a class="post-thumb" href="{{ route('detail', [ $post->slug, $post->id ]) }}">
                            <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                            <div class="cactus-note ct-time font-size-1"><span>{{ $post->duration }}</span></div>
                            <img class="img-responsive" src="{{ $post->image_url }}" alt="{!! $post->title !!}">
                         </a>
                      </div>
                      <div class="infor">
                         <h4>
                            <a class="title" href="{!! route('detail', [ $post->slug, $post->id ]) !!}">{!! $post->title !!}</a>
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
    </div>
    <!-- SIDEBAR -->
    <div class="col-lg-2 col-md-4 hidden-sm hidden-xs">
       <aside class="dark-bg">
          <article>
             <h2 class="icon"><i class="fa fa-gears" aria-hidden="true"></i>DANH MỤC</h2>
             <ul class="sidebar-links">
                @foreach($articleCate as $cate)
                <li class="fa fa-chevron-right"><a href="{{ route('cate', $cate->slug) }}">{!! $cate->name !!}</a><span>{{ $cate->articles->count() }}</span></li>
                @endforeach                
             </ul>
          </article>         
          <div class="clearfix spacer"></div>
          <article>
             <h2 class="icon"><i class="fa fa-tag" aria-hidden="true"></i>tags</h2>
             <ul class="footer-tags">
                <li><a href="#">videos</a></li>
                <li><a href="#">premium</a></li>
                <li><a href="#">hair</a></li>
                <li><a href="#">beauty</a></li>
                <li><a href="#">ranking</a></li>
                <li><a href="#">lifestyle</a></li>
                <li><a href="#">sport</a></li>
                <li><a href="#">money</a></li>
                <li><a href="#">comments</a></li>
             </ul>
          </article>
       </aside>
    </div>
</div>
@stop
@section('javascript_page')
<script type="text/javascript">
$(document).ready(function(){  
    var video = $("#videoPlayer");
    var windowObj = $(window);
    function onResizeWindow() {
      resizeVideo(video[0]);
    }
    function onLoadMetaData(e) {
      resizeVideo(e.target);
    }
    function resizeVideo(videoObject) {
      var percentWidth = videoObject.clientWidth * 100 / videoObject.videoWidth;
      var videoHeight = videoObject.videoHeight * percentWidth / 100;
      video.height(videoHeight);
    }
    video.on("loadedmetadata", onLoadMetaData);
    windowObj.resize(onResizeWindow);
  }
);
</script> 	
@stop