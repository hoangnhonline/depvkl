@include('frontend.partials.meta')
@section('content')
<div>
<img style="width: 97%; padding-bottom: 12px;" src="/public/uploads/images/quy-trinh.jpg"/>
</div>
<p class="title-home">Sản Phẩm Có Hoa Hồng Cao Nhất</p>
<div class="clear"></div>
@foreach($commission as $comm)
<div class="product ">
      <div class="hinhsp">	
         <a href="{{ route('chi-tiet', [$comm->slug_loai, $comm->slug, $comm->id]) }}"><img
            class="img_trung" src="{{ Helper::showImageThumb($comm->image_url) }}"
            alt="{!! $comm->title !!}" style="height: 198.587px;"></a>
        <!--<a class="chitiet" href="{{ route('chi-tiet', [$comm->slug_loai, $comm->slug, $comm->id]) }}">Chi tiết</a>-->
         @if(!in_array($comm->id, $joinedProductArrId))
         <a class="tham-gia-ban" data-id="{{ $comm->id }}" href="javascript:;" data-toggle="modal" @if (!Session::get('login')) data-target="#login-modal" @else data-target="#join-sales-modal" @endif>Tham gia bán</a>
         @endif
         <div class="clear"></div>
      </div>
     <a class="tensp" href="{{ route('chi-tiet', [$comm->slug_loai, $comm->slug, $comm->id]) }}">{!! $comm->title !!}<img src="/public/uploads/images/hot.gif"/></a>
	
  
      
         <p class="giagoc"><span
            style="color:#1060EB;">{!! $comm->price_text !!}</span></p>     
      
         <p class="size_chatlieu">Hoa hồng :
            <span style="color: #e91e1e; font-weight: bold;">{{ number_format($comm->hoa_hong_ctv*$comm->hoa_hong*$comm->price/100/100) }}</span>
         </p>
      
      <div class="clear"></div>
   </div> 
@endforeach
@foreach($estateTypeList as $et)
<p class="title-home"><a>{!! $et->name !!}</a></p>
<div class="clear"></div>
<?php 
//dd($productArr[$et->id]);
?>
@if($productArr[$et->id]->count() > 0)
<div>
   
   @foreach($productArr[$et->id] as $pro)
   <?php //dd($pro); ?>
   <div class="product ">
      <div class="hinhsp">
         <a href="{{ route('chi-tiet', [$pro->slug_loai, $pro->slug, $pro->id]) }}"><img
            class="img_trung" src="{{ Helper::showImageThumb($pro->image_url) }}"
            alt="{!! $pro->title !!}" style="height: 198.587px;"></a>
        <!--<a class="chitiet" href="{{ route('chi-tiet', [$pro->slug_loai, $pro->slug, $pro->id]) }}">Chi tiết</a>-->
         @if(!in_array($pro->id, $joinedProductArrId))
         <a class="tham-gia-ban" data-id="{{ $pro->id }}" href="javascript:;" data-toggle="modal" @if (!Session::get('login')) data-target="#login-modal" @else data-target="#join-sales-modal" @endif>Tham gia bán</a>
         @endif
         <div class="clear"></div>
      </div>
     <a class="tensp" href="{{ route('chi-tiet', [$pro->slug_loai, $pro->slug, $pro->id]) }}">{!! $pro->title !!}</a>     
      
         <p class="giagoc"><span
            style="color:#1060EB;">{!! $pro->price_text !!}</span></p>     
      
         <p class="size_chatlieu">Hoa hồng :
            <span style="color: #e91e1e; font-weight: bold;">{{ number_format($pro->hoa_hong_ctv*$pro->hoa_hong*$pro->price/100/100) }}</span>
         </p>
      
      <div class="clear"></div>
   </div> 
   @endforeach  
   
   <div class="phantrang">
      <a href="{{ route('danh-muc', $pro->slug_loai ) }}">Xem thêm</a>
   </div>
   <div class="clear"></div>
</div>
@else
<p style="padding-left: 20px">Đang cập nhật.</p>
@endif
<div class="clearfix" style="margin-bottom: 20px;"></div>
@endforeach
@stop