@extends('frontend.layout') 
  

@include('frontend.partials.meta')
  

@section('content')
<style>
    .title_sanpham {
        text-transform: uppercase;
        color: #1060EB;
        font-size: 18px;
        background: url(../../public/assets/images/icon_tintuc1.png) left no-repeat;
        display: block;
        text-indent: 35px;
        float: left;
        margin-bottom: 22px;
    }

    .khung_sanpham {
        border: 1px solid rgba(204, 204, 204, 0.44);
        background: #fff;
        margin-bottom: 20px;
    }
</style>
<style>
    .xemtiep:hover {
        color: #0C6 !important;
        box-shadow: 0px 0px 20px -5px #AD63C3 inset;
    }

    .ten_tintuc1:hover {
        color: #F00 !important;
        transition: all 0.5s;
    }

    .img_hover:hover {
        opacity: 0.5;
    }

    @media screen and (max-width: 650px) {
        .div_img {
            width: 100% !important;
        }

        .div_thongtin {
            width: 100% !important;
        }
    }
</style>
<section class="row">
<article class="block-breadcrumb-page">
    <ul class="breadcrumb"> 
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>            
        <li class="active">{!! $cateDetail->name !!}</li>
    </ul>
</article>
</section>
<p class="title_sanpham">TIN TỨC</p>
<div class="clear"></div>
<div class="khung_sanpham">
    <div style="padding:20px 20px;">
        @foreach( $articlesArr as $articles )        
        <div style="margin-bottom:20px;border-bottom:1px dashed rgba(204, 204, 204, 0.43);padding-bottom:20px;">
            <div class="div_img"
                 style="width:40%;height:auto;float:left;vertical-align: middle;text-align: center;display: table-cell;">
                <div class="hinhsp hinhsp_108">
                    <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}"
                       title="{!! $articles->title !!}"><img
                                class="img_hover img_trung img_trung_108"
                                src="{{ Helper::showImage($articles->image_url) }}"
                                alt="{!! $articles->title !!}"
                                style="width: 100%; height: 250.733px;"></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="div_thongtin" style="width:55%;height:auto;float:right;">
                <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}"
                   title="{!! $articles->title !!}"><p class="ten_tintuc1"
                                                                           style="text-transform: uppercase;color: #1060EB;font-size: 15px;line-height: 25px;">
                        {!! $articles->title !!}</p></a>
                <p style="font-size: 16px;line-height:25px;color: #766E6E;margin:10px 0px;">{!! $articles->description !!}</p>
                <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" class="xemtiep"
                   style="background:#1060EB;float:left;color:#FFF;font-size:12px;padding: 5px 10px;border-radius: 5px;">Xem
                    tiếp</a>
            </div>
            <div class="clear"></div>
        </div>
        @endforeach

       

        <div class="clear"></div>

    </div>
    <div class="clear"></div>
</div>


@endsection
  @section('javascript_page')
  
@endsection