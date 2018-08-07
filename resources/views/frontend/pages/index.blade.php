@extends('frontend.layout') 
  
@include('frontend.partials.meta')
@section('content')
<h1 class="title-home">{{ $detailPage->title }}</h1>
<div class="clear"></div>
<div class="khung_sanpham">
    <div class="noidung" style="text-align:justify;padding:10px;"><?php echo $detailPage->content; ?></div>
    <div class="clear"></div>
</div>
@endsection
  