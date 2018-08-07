@include('frontend.partials.meta')
@section('content')
<p class="title-home">{{ $detailPage->title }}</p>
<div class="clear"></div>
<div class="khung_sanpham">
    <div class="noidung" style="font-size:16px;line-height:25px;text-align:justify;padding:10px;"><?php echo $detailPage->content; ?></div>
    <div class="clear"></div>
</div>
@stop