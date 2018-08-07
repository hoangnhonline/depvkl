<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div>
<img style="width: 97%; padding-bottom: 12px;" src="/public/uploads/images/quy-trinh.jpg"/>
</div>
<p class="title-home">Sản Phẩm Có Hoa Hồng Cao Nhất</p>
<div class="clear"></div>
<?php foreach($commission as $comm): ?>
<div class="product ">
      <div class="hinhsp">	
         <a href="<?php echo e(route('chi-tiet', [$comm->slug_loai, $comm->slug, $comm->id])); ?>"><img
            class="img_trung" src="<?php echo e(Helper::showImageThumb($comm->image_url)); ?>"
            alt="<?php echo $comm->title; ?>" style="height: 198.587px;"></a>
        <!--<a class="chitiet" href="<?php echo e(route('chi-tiet', [$comm->slug_loai, $comm->slug, $comm->id])); ?>">Chi tiết</a>-->
         <?php if(!in_array($comm->id, $joinedProductArrId)): ?>
         <a class="tham-gia-ban" data-id="<?php echo e($comm->id); ?>" href="javascript:;" data-toggle="modal" <?php if(!Session::get('login')): ?> data-target="#login-modal" <?php else: ?> data-target="#join-sales-modal" <?php endif; ?>>Tham gia bán</a>
         <?php endif; ?>
         <div class="clear"></div>
      </div>
     <a class="tensp" href="<?php echo e(route('chi-tiet', [$comm->slug_loai, $comm->slug, $comm->id])); ?>"><?php echo $comm->title; ?><img src="/public/uploads/images/hot.gif"/></a>
	
  
      
         <p class="giagoc"><span
            style="color:#1060EB;"><?php echo $comm->price_text; ?></span></p>     
      
         <p class="size_chatlieu">Hoa hồng :
            <span style="color: #e91e1e; font-weight: bold;"><?php echo e(number_format($comm->hoa_hong_ctv*$comm->hoa_hong*$comm->price/100/100)); ?></span>
         </p>
      
      <div class="clear"></div>
   </div> 
<?php endforeach; ?>
<?php foreach($estateTypeList as $et): ?>
<p class="title-home"><a><?php echo $et->name; ?></a></p>
<div class="clear"></div>
<?php 
//dd($productArr[$et->id]);
?>
<?php if($productArr[$et->id]->count() > 0): ?>
<div>
   
   <?php foreach($productArr[$et->id] as $pro): ?>
   <?php //dd($pro); ?>
   <div class="product ">
      <div class="hinhsp">
         <a href="<?php echo e(route('chi-tiet', [$pro->slug_loai, $pro->slug, $pro->id])); ?>"><img
            class="img_trung" src="<?php echo e(Helper::showImageThumb($pro->image_url)); ?>"
            alt="<?php echo $pro->title; ?>" style="height: 198.587px;"></a>
        <!--<a class="chitiet" href="<?php echo e(route('chi-tiet', [$pro->slug_loai, $pro->slug, $pro->id])); ?>">Chi tiết</a>-->
         <?php if(!in_array($pro->id, $joinedProductArrId)): ?>
         <a class="tham-gia-ban" data-id="<?php echo e($pro->id); ?>" href="javascript:;" data-toggle="modal" <?php if(!Session::get('login')): ?> data-target="#login-modal" <?php else: ?> data-target="#join-sales-modal" <?php endif; ?>>Tham gia bán</a>
         <?php endif; ?>
         <div class="clear"></div>
      </div>
     <a class="tensp" href="<?php echo e(route('chi-tiet', [$pro->slug_loai, $pro->slug, $pro->id])); ?>"><?php echo $pro->title; ?></a>     
      
         <p class="giagoc"><span
            style="color:#1060EB;"><?php echo $pro->price_text; ?></span></p>     
      
         <p class="size_chatlieu">Hoa hồng :
            <span style="color: #e91e1e; font-weight: bold;"><?php echo e(number_format($pro->hoa_hong_ctv*$pro->hoa_hong*$pro->price/100/100)); ?></span>
         </p>
      
      <div class="clear"></div>
   </div> 
   <?php endforeach; ?>  
   
   <div class="phantrang">
      <a href="<?php echo e(route('danh-muc', $pro->slug_loai )); ?>">Xem thêm</a>
   </div>
   <div class="clear"></div>
</div>
<?php else: ?>
<p style="padding-left: 20px">Đang cập nhật.</p>
<?php endif; ?>
<div class="clearfix" style="margin-bottom: 20px;"></div>
<?php endforeach; ?>
<?php $__env->stopSection(); ?>