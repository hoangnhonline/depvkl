@extends('frontend.layout') 
@include('frontend.partials.meta')

@section('content')
<div class="col-md-12">
    <p class="title-home"><a>Thông tin tài khoản</a></p>
    <div class="" id="columns">
        
        <div class="row">            
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2">Cập nhật thông tin tài khoản</span>
                </h1>
                <div class="shipping-address-page">              
                <div class="row row-style-2">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                      <div class="panel-body">
                        
                        <p class="required">Vui lòng nhập đầy đủ các thông tin bên dưới cho lần đầu tiên đăng nhập.</p>
                        
                        <form class="form-horizontal bv-form" role="form" id="address-info" novalidate>
                          <button type="submit" class="bv-hidden-submit" style="width: 0px; height: 0px;"></button>
                          <div class="form-group row">
                            <label for="full_name" class="col-lg-3 control-label visible-lg-block">Họ tên <span class="required">*</span> </label>
                            <div class="col-lg-9 input-wrap has-feedback">
                                <input type="text" name="full_name" class="form-control address" id="full_name" value="{{$customer->full_name}}" placeholder="Nhập họ tên">
                               
                           </div>
                          </div>
                          <div class="form-group row">
                            <label for="telephone" class="col-lg-3 control-label visible-lg-block">Điện thoại di động <span class="required">*</span></label>
                            <div class="col-lg-9 input-wrap has-feedback">
                              <input type="tel" name="phone" class="form-control address" id="phone" value="{{$customer->phone}}" placeholder="Nhập số điện thoại">
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="cmnd" class="col-lg-3 control-label visible-lg-block">CMND <span class="required">*</span></label>
                            <div class="col-lg-9 input-wrap has-feedback">
                              <input type="text" name="cmnd" class="form-control address" id="cmnd" value="{{$customer->cmnd}}" placeholder="Nhập số CMND">
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="nghe_nghiep" class="col-lg-3 control-label visible-lg-block">Nghề nghiệp <span class="required">*</span></label>
                            <div class="col-lg-9 input-wrap has-feedback">
                              <input type="text" name="nghe_nghiep" class="form-control address" id="nghe_nghiep" value="{{$customer->nghe_nghiep}}" placeholder="">
                              </div>
                          </div>  
                          <div class="form-group row">
                            <label for="address" class="col-lg-3 control-label visible-lg-block">Địa chỉ <span class="required">*</span></label>
                            <div class="col-lg-9 input-wrap has-feedback">
                              <input type="text" name="address" class="form-control address" id="address" value="{{$customer->address}}" placeholder="">
                              </div>
                          </div>                           
                          <div class="form-group row">
                            <label for="bank_info" class="col-lg-3 control-label visible-lg-block">Tài khoản ngân hàng <span class="required">*</span></label>
                            <div class="col-lg-9 input-wrap has-feedback">
                              <textarea name="bank_info" class="form-control address" id="bank_info" placeholder="Tên ngân hàng - Chủ tài khoản - Số TK - Chi nhánh" style="height:100px">{{ $customer->bank_info }}</textarea>
                              </div>
                          </div>
                                                    
                          <div class="form-group row end">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-9">
                              <div id="btnUpdate" class="btn btn-primary btn-custom3" value="update" style="width:120px">Cập nhật</div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>                    
                  </div>
                </div>

           </div><!-- /.shipping-address-page -->
            </div>
        </div><!-- /.page-content -->
    </div>
</div>
<div class="clearfix"></div>
<style type="text/css">
  .required {
    font-weight: bold;
    color:red;
  }
</style>
@endsection


@section('javascript_page')
   <script type="text/javascript">
   
    $(document).ready(function() {
         
        $('#btnUpdate').click(function() {
            $(this).attr('disabled', '');
            validateData();
          });
        
    });

    function validateData() {
        var error = 0;
        $('#address-info input, #address-info textarea').each(function(){
            if($.trim($(this).val()) == ''){
              error++;
            }
        });       

        if(error > 0) {
          
          swal({ title: '', text: 'Vui lòng nhập đầy đủ thông tin', type: 'error' });
          $('#btnUpdate').removeAttr('disabled');
          return false;
        } else {
          $.ajax({
            url: "{{ route('update-customer') }}",
            method: "POST",
            data : $('#address-info').serialize(),
            success : function(data){
               $('#btnUpdate').removeAttr('disabled');
              swal({ title: '', text: 'Cập nhật thông tin thành công', type: 'success' });
              setTimeout(function(){
                  window.location.href="{{ route('home') }}";
              }, 3000);
              
            }
          });
        }
      }
  </script>
@endsection
