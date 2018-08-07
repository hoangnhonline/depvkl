<p class="title_tuvansanpham">Tìm kiếm</p>
<div style="width: 50%;height: 2px;background-color: red;margin-bottom: 14px;margin-left: 35px;"></div>
<form id="frm_search" action="<?php echo e(route('search')); ?>" method="GET">
   <div class="tk-rr">
      <div class="tk-ct">
         <div style="font-size:13px;color:#444;font-weight:bold;padding:10px">
         </div>
         <div class="ip-but">
            <p class="p_search_right">Chọn loại tin</p>
            <select class="seldientich lodtin" name="estate_type_id" id="estate_type_id">
               <option value="0">Loại tin</option>
               <?php foreach( $estateTypeArr as $value ): ?>
             <option value="<?php echo e($value->id); ?>"
             <?php echo e(isset($estate_type_id) && $estate_type_id == $value->id ? "selected" : ""); ?>

             ><?php echo e($value->name); ?></option>
             <?php endforeach; ?>
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Tỉnh/Thành</p>
            <select class="seldientich" name="city_id" id="city_id">
               <option value="0"> Chọn thành phố</option>
               <?php foreach($cityList as $city): ?>
               <option <?php if(isset($city_id) && $city_id == $city->id): ?> selected <?php endif; ?> value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
               <?php endforeach; ?>
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
               <?php foreach($districtList as $district): ?>
               <option <?php if(isset($district_id) && $district_id == $district->id): ?> selected <?php endif; ?> value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
               <?php endforeach; ?>
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Diện tích</p>
            <select class="seldientich" id="area_id" name="area_id">
               <option value="0">Diện tích</option>
               <?php foreach($areaList as $area): ?>
               <option <?php if(isset($area_id) && $area_id == $area->id): ?> selected <?php endif; ?> value="<?php echo e($area->id); ?>"><?php echo e($area->name); ?></option>
               <?php endforeach; ?>
            </select>
         </div>
         <div class="ip-but">
            <p class="p_search_right">Chọn giá</p>
            <select class="selgia" name="price_id" id="price_id">
               <option value="0">Mức giá</option>
               <?php foreach($priceList as $price): ?>
               <option <?php if(isset($price_id) && $price_id == $price->id): ?> selected <?php endif; ?> value="<?php echo e($price->id); ?>"><?php echo e($price->name); ?></option>
               <?php endforeach; ?>
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
         <?php if(!empty($rsAr) > 0): ?>
         <?php foreach($rsAr as $articles): ?>
         <li style="border-bottom:1px solid #ECECEC;margin-bottom:10px;">
            <div class="div_img_tt">
               <a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>"><img
                  class="img_ttnb" src="<?php echo e(Helper::showImage($articles->image_url)); ?>"
                  width="90" height="90"
                  alt="<?php echo $articles->title; ?>"></a>
               <div class="clear"></div>
            </div>
            <div class="div_tt_tt">
               <h4 style="margin-top:0px"><a class="ten_ttnb"
                  href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>"><?php echo $articles->title; ?></a>
               </h4>
               <div class="clear"></div>
               <p class="mota_tt" style="height:50px; overflow:hidden">
               <?php echo e($articles->description); ?>

               </p>
               <a class="xemtiep_tt"
                  href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>">Xem
               tiếp...</a>
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </li>
         <?php endforeach; ?>
         <?php endif; ?>
         <div class="clear"></div>
      </ul>
      <div class="clear"></div>
      <a class="xemtatca_ttnb" href="#tin-tuc.html">Xem tất cả »</a>
   </div>
   <div class="clear"></div>
</div>
