@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="row">    
   
    <div class="col-lg-12 col-md-12">
       <!-- BREADCRUMB -->
       <ol class = "breadcrumb">
          <li><a href="{{ route('home') }}">Trang chủ</a></li>          
          <li class = "active">Tag : '{{ $detail->name }}'</li>
       </ol>
       <!-- CATEGORY GRID -->
       <section id="category">
          <div class="row auto-clear">
             <!-- RELATED VIDEOS -->
             <div class="col-lg-12 col-md-12 col-sm-12 category-video-grid">
                <h1 class="icon"><i class="fa fa-trophy" aria-hidden="true"></i>Tag : '{{ $detail->name }}'</h1>
                <!-- VIDEO POSTS ROW -->
                <div class="row">
                  
                    @foreach( $articlesArr as $post )
                   <article class="col-lg-3 col-md-6 col-sm-4">
                      <!-- POST L size -->
                      <div class="post post-medium">
                         <div class="thumbr">
                            <a class="afterglow post-thumb" href="{{ route('detail', [ $post->slug, $post->id ]) }}">
                               <span class="play-btn-border" title="Play"><i class="fa fa-play-circle headline-round" aria-hidden="true"></i></span>
                               <div class="cactus-note ct-time font-size-1"><span>{{ $post->duration }}</span></div>
                               <img class="img-responsive" src="{!! $post->image_url !!}" alt="{!! $post->title !!}">
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
          <div class="row pagi text-center">
             {{ $articlesArr->links() }}
          </div>
       </section>
    </div>       

    </div>
@stop
@section('javascript_page')
  
@stop