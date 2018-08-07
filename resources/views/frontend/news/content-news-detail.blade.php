@include('frontend.partials.meta')
@section('content')
<style type="text/css">
    .block-news-new-content img {
        max-width: 100% !important;
        height: auto !important;
    }
    .block-news-new-detail{
        padding: 5px;
    }
</style>
<section class="row" style="padding: 10px">
<article class="block-breadcrumb-page">
    <ul class="breadcrumb"> 
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>  
        <li>
            <a href="{{ route('news-list', $cateDetail->slug) }}">{!! $cateDetail->name !!}</a>
        </li>    
        <li class="active">{!! $detail->title !!}</li>
    </ul>
</article>
    <article class="block block-cate-news-detail block-news-new-detail">
        <h1 class="title-home">{!! $detail->title !!}</h1>
        <div class="nd-time">{!! date('d-m-Y H:i', strtotime($detail->created_at)) !!}</div>        
        <h2>{!! $detail->description !!}</h2>
        <div class="block-news-new-content">
            <?php echo preg_replace('/(\<img[^>]+)(style\=\"[^\"]+\")([^>]+)(>)/', '${1}${3}${4}', $detail->content);  ?>
        </div><!-- /block-news-new-content -->
        
    </article><!-- /block-news-new-detail -->
    @if($tagSelected)
    <?php $countTag = count($tagSelected);?>
    <article class="block block-news-with-region">
        <u>Tags</u>:
        <?php $i = 0; ?>
        @foreach($tagSelected as $tag)
        <?php $i++; ?>
        <a href="{{ route('tag', $tag->slug) }}">{!! $tag->name !!}</a>@if($i< $countTag), @endif
        @endforeach     
    </article>
    @endif
    <article class="block block-all-news-new">
        <div class="block-title block-title-common">
            <h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> Các tin mới nhất</h3>
        </div>
        <div class="block-contents">
            <div class="all-news-new-list">
                <div class="row">
                    @if( $otherArr )
                    @foreach( $otherArr as $articles)
                    <div class="col-sm-6 col-xs-12">
                        <div class="all-news-new-item clearfix">
                            <div class="all-news-new-img">
                                <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                                    <img  src="{{ Helper::showImageThumb($articles->image_url, 2) }}" alt="{!! $articles->title !!}" style="height:80px !important; width:120px !important; "> 
                                </a>
                            </div>
                            <div class="all-news-new-info" style="height:77px !important">
                                <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                                    {!! $articles->title !!}
                                </a>
                            </div>
                        </div>
                    </div><!-- /col-sm-6 col-xs-12 --> 
                    @endforeach
                    @endif
                </div>                
            </div>
        </div>
    </article><!-- /block-news-with-region -->

</section><!-- /block-site-left -->

@endsection