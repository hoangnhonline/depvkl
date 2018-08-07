@extends('frontend.layout')

@include('frontend.partials.meta')
@section('content')
<article class="block block-breadcrumb">
  <ul class="breadcrumb">
    <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
    <li class="active">Liên hệ</li>
  </ul>
</article><!-- /block-breadcrumb -->
<section class="block-content ">
        <div class="block-common">  
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                
                <div class="col-sm-12 ">	
                    <h3 class="page-heading">
                        <span class="page-heading-title2">THÔNG TIN LIÊN HỆ</span>
                    </h3>               
                    <div class="content">
                        <h4 style="font-size: 17px">CÔNG TY TNHH DỊCH VỤ TƯ VẤN BẤT ĐỘNG SẢN THANH PHÚ THỊNH LAND</h4>                        
                        <p>Hotline: <span class=""> 0919.356.178</span></p>                        
                        <p>Email: <a href="mailto:bdsthanhphuthinhland@gmail.com">bdsthanhphuthinhland@gmail.com</a></p>
                    </div>
                    @if(Session::has('message'))
	                <p class="alert alert-info" >{{ Session::get('message') }}</p>
	                @endif
                    <form method="POST" action="{{ route('send-contact') }}">
                     @if (count($errors) > 0)
	                  <div class="alert alert-danger">
	                    <ul>	                       
	                        <li>Vui lòng nhập đầy đủ thông tin.</li>	                        
	                    </ul>
	                  </div>
	                @endif	
                    <div class="contact-form-box">
                        <div class="form-selector">                            
                            <textarea style="font-size:14px" class="form-control input-sm" rows="8" id="content" name="content" placeholder="Nhập nội dung bạn muốn liên hệ hoặc góp ý với THANH PHÚ THỊNH LAND">{{ old('content') }}</textarea>

                        </div>
                        <input type="hidden" name="type" value="1">                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-selector col-md-4" style="padding-left:0px;padding-top:7px;height:45px">
                            <input type="radio" name="gender" value="1" id="gender1" checked="checked"> <label for="gender1">Anh</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="2" id="gender2"> <label for="gender2">Chị</label>
                        </div>
                        <div class="form-selector col-md-8" style="padding-right:0px;height:45px">                            
                            <input type="text" placeholder="Họ và tên" class="form-control input-sm" id="full_name" name="full_name"  value="{{ old('full_name') }}" style="height:35px" />
                        </div>
                        <div class="form-selector col-md-4" style="padding-left:0px;height:45px">                            
                            <input type="text" placeholder="Số điện thoại" class="form-control input-sm" id="phone" name="phone" value="{{ old('phone') }}" style="height:35px"/>
                        </div>   
                        <div class="form-selector col-md-8" style="padding-right:0px;height:45px">                           
                            <input type="email" placeholder="Email của bạn" class="form-control input-sm" id="email" name="email" value="{{ old('email') }}" style="height:35px"/>
                        </div>
                        <div class="form-selector">
                            <button type="submit" id="btn-send-contact" class="btn">GỬI LIÊN HỆ</button>
                        </div>
                    </div>
                    </form>
                </div>
               
            </div>
        </div>

</section>
<style type="text/css">
    span.required{
        color:red;
    }
    .contact-form-box input {
        font-size: 14px;
        border: 1px solid #ccc
    }
    .form-selector{
        margin-bottom: 10px;
    }
</style>
@endsection