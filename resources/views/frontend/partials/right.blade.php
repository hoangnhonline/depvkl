<p class="title_tuvansanpham">Tìm kiếm</p>
<div style="width: 50%;height: 2px;background-color: red;margin-bottom: 14px;margin-left: 35px;"></div>
<form id="frm_search" action="{{ route('search') }}" method="GET">
   <div class="tk-rr">
      <div class="tk-ct">
         <div style="font-size:13px;color:#444;font-weight:bold;padding:10px">
         </div>
         <div class="ip-but">
            <p class="p_search_right">Chọn loại tin</p>
            <select class="seldientich lodtin" name="estate_type_id" id="estate_type_id">
               <option value="0">Loại tin</option>
               @foreach( $estateTypeArr as $value )
             <option value="{{ $value->id }}"
             {{ isset($estate_type_id) && $estate_type_id == $value->id ? "selected" : "" }}
             >{{ $value->name }}</option>
             @endforeach
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Tỉnh/Thành</p>
            <select class="seldientich" name="city_id" id="city_id">
               <option value="0"> Chọn thành phố</option>
               @foreach($cityList as $city)
               <option @if(isset($city_id) && $city_id == $city->id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Quận/Huyện</p>
            <select class="seldientich" name="district_id" id="district_id">
               <option value="0">Quận/ Huyện</option>
               <?php 
               if(isset($city_id)){
               $districtList = App\Models\District::where('city_id', $city_id)->get();
               }
               ?>
               @foreach($districtList as $district)
               <option @if(isset($district_id) && $district_id == $district->id) selected @endif value="{{ $district->id }}">{{ $district->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Diện tích</p>
            <select class="seldientich" id="area_id" name="area_id">
               <option value="0">Diện tích</option>
               @foreach($areaList as $area)
               <option @if(isset($area_id) && $area_id == $area->id) selected @endif value="{{ $area->id }}">{{ $area->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Chọn giá</p>
            <select class="selgia" name="price_id" id="price_id">
               <option value="0">Mức giá</option>
               @foreach($priceList as $price)
               <option @if(isset($price_id) && $price_id == $price->id) selected @endif value="{{ $price->id }}">{{ $price->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="ip-but" style="text-align: center;">            
            <input id="btnSearch" type="submit" class="btn_search_right" value="Tìm kiếm">
         </div>
      </div>
   </div>
</form>
<div class="an_mb">
   <p class="title_tuvansanpham">Tin tức nổi bật</p>
   <div style="width: 50%;height: 2px;background-color: red;margin-bottom: 14px;margin-left: 35px;"></div>
   <div class="clear"></div>
   <div class="tinnoibat">
      <ul class="scroller1">
         <?php 
         $rsAr = DB::table('articles')->where('status', 1)->orderBy('is_hot', 'desc')->orderBy('id', 'desc')->limit(3)->get();
         //dd($rsAr);
         ?>
         @if(!empty($rsAr) > 0)
         @foreach($rsAr as $articles)
         <li style="border-bottom:1px solid #ECECEC;margin-bottom:10px;">
            <div class="div_img_tt">
               <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}"><img
                  class="img_ttnb" src="{{ Helper::showImage($articles->image_url) }}"
                  width="90" height="90"
                  alt="{!! $articles->title !!}"></a>
               <div class="clear"></div>
            </div>
            <div class="div_tt_tt">
               <h4 style="margin-top:0px"><a class="ten_ttnb"
                  href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">{!! $articles->title !!}</a>
               </h4>
               <div class="clear"></div>
               <p class="mota_tt" style="height:50px; overflow:hidden">
               {{ $articles->description }}
               </p>
               <a class="xemtiep_tt"
                  href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}">Xem
               tiếp...</a>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </li>
         @endforeach
         @endif
         <div class="clear"></div>
      </ul>
      <div class="clear"></div>
      <a class="xemtatca_ttnb" href="#tin-tuc.html">Xem tất cả »</a>
   </div>
   <div class="clear"></div>
</div>
