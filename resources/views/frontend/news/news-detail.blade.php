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
                   <div class="embed-responsive embed-responsive-16by9 video-embed-box">
                      <iframe src="https://www.youtube.com/embed/Ikkfwnq4Uss"  class="embed-responsive-item"></iframe>
                   </div>
                   <h2 class="title main-head-title">Kiss me if I’m wrong but Dinosaurs still exist? Right?s</h2>
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
                      <i class="fa fa-clock-o"></i>March 16. 2017
                      </span>
                      <span class="meta-i">
                      <i class="fa fa-eye"></i>1,347,912 views
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
                   <div class="share-input">
                      <input type="text" value="https://www.youtube.com/watch?v=Ikkfwnq4Uss" name="share-input">
                      <span class="fa fa-chain sharelinkicon"></span>
                   </div>
                </div>
                <div class="clearfix spacer"></div>
                <!-- DETAILS -->
                <div class="video-content">
                   <h2 class="title main-head-title">Video Details</h2>
                   <p>
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                   </p>
                   <p>
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                   </p>
                </div>
                <div class="clearfix spacer"></div>
                <!-- MAIN ROLL ADVERTISE BOX -->
                <a href="http://themeforest.net/user/orcasthemes/portfolio?ref=orcasthemes" class="banner-md">
                <img src="img/banners/banner-xl.jpg" class="img-responsive" alt="Buy Now Muvee Reviews Bootstrap HTML5 Template" title="Buy Now Muvee Reviews Bootstrap HTML5 Template">
                </a>
             </article>
          
            <!-- COMMENTS -->
            <section id="comments">
                <h2 class="title">leave comment</h2>
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
                    </div><!-- Status Upload  -->
                </div><!-- Widget Area -->
                
                
                <div class="row comment-posts">
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo" src="img/thumbs/thumb-review.jpg" alt="Comment User Avatar">
                        </div>
                    </div>

                    <div class="col-sm-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>John Doe</strong> <span class="pull-right">commented 5 days ago</span>
                            </div>
                            <div class="panel-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo" src="img/thumbs/thumb-review.jpg" alt="Comment User Avatar">
                        </div>
                    </div>

                    <div class="col-sm-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>John Doe</strong> <span class="pull-right">commented 5 days ago</span>
                            </div>
                            <div class="panel-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
                            </div>
                        </div>
                    </div>
                </div>

            </section>
          
          </div>
          <!-- VIDEO SIDE BANNERS -->
          <div class="col-lg-4 hidden-md hidden-sm">
             <!-- MAIN ROLL ADVERTISE BOX -->
             <a href="http://themeforest.net/user/orcasthemes/portfolio?ref=orcasthemes" class="video-right-banner">
             <img src="img/banners/banner-400x400.jpg" class="img-responsive" alt="Buy Now Muvee Reviews Bootstrap HTML5 Template" title="Buy Now Muvee Reviews Bootstrap HTML5 Template">
             </a>
             <a href="http://themeforest.net/user/orcasthemes/portfolio?ref=orcasthemes" class="video-right-banner">
             <img src="img/banners/banner-400x400.jpg" class="img-responsive" alt="Buy Now Muvee Reviews Bootstrap HTML5 Template" title="Buy Now Muvee Reviews Bootstrap HTML5 Template">
             </a>
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
                         <a class="post-thumb" href="https://www.youtube.com/watch?v=Ikkfwnq4Uss" data-lity>
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
  	
@endsection