<div class="modal fade" id="login-modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
				<h3 class="modal-title">Đăng nhập</h3>
			</div>
			<div class="modal-body">
			    <form action="" method="post" id="login_popup_form">
			        <p class="sub-title">Đăng nhập bằng email</p>
			        <div class="form-control-wrapper" style="margin-bottom:15px">
			            <input class="form-control" id="popup-login-email" name="email" placeholder="Email" required="true" type="email" value="">
			            <div class="clearfix"></div>
			            <small data-bv-result="NOT_VALIDATED" data-bv-for="email" data-bv-validator="notEmpty" class="help-block" style="display: none;">Vui lòng nhập Email hợp lệ</small>
			        </div>
			        <div class="form-control-wrapper">
			            <input class="form-control" id="popup-login-password" name="password" placeholder="Mật khẩu" required="true" type="password">
			            <div class="clearfix"></div>
			            <small data-bv-result="NOT_VALIDATED" data-bv-for="password" data-bv-validator="notEmpty" class="help-block" style="display: none;">Vui lòng nhập Mật khẩu</small>
			        </div>
			        <div class="login-ajax-captcha" style="display:none">
		              <div id="login-popup-recaptcha"></div>
		            </div>
		            <div class="form-group" id="error_login"> <span class="help-block ajax-message"></span> </div>
			        <div class="form-control-wrapper">
			            <input class="btn btn-login-submit" id="login_popup_submit" type="button" value="Đăng nhập">
			        </div>
			    </form>
			    <!--<p class="forgot-password-link">
			        <a class="btn-link" data-dismiss="modal" data-target="#fogot-password-dialog" data-toggle="modal" href="#" id="forgot-password-button">Quên mật khẩu đăng nhập?</a>
			    </p>-->
			</div>
			<div class="modal-footer">
          <div class="forgot-password-link clearfix">                
              <div class="form-control-wrapper social-area">
                  <div class="row">
                      <div class="col-md-12">
                          <a class="btn-facebook facebook-login" href="javascript:;">
                          <i class="fa fa-facebook"></i>
                          <span class="">Đăng nhập bằng tài khoản Facebook</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          <p class="bottom-text">
              Chưa có tài khoản?
              <a class="btn-link" data-dismiss="modal" data-target="#register-modal" data-toggle="modal" href="#">Đăng ký</a>
          </p>
      </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade in" id="register-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                <h3 class="modal-title">Đăng ký</h3>
            </div>
            <div class="modal-body">
                <form action="/users" method="post" id="register_popup_form">
                    <p class="sub-title">Đăng ký bằng email</p>
                    <div class="form-control-wrapper">
                        <input class="form-control" id="popup-register-name" name="fullname" placeholder="Họ và tên" required="true" type="text" value="">
                    </div>
                    <div class="form-control-wrapper">
                        <input class="form-control" id="popup-register-email" name="email" placeholder="Email" required="true" type="email" value="">
                    </div>
                    <div class="form-control-wrapper">
                        <input class="form-control" id="popup-register-password" name="password" placeholder="Mật khẩu từ 6 đến 32 ký tự" required="true" type="password">
                    </div>
                    <div class="form-control-wrapper">
                        <input class="btn btn-login-submit" type="button" id="register_popup_submit" value="Đăng ký">
                    </div>
                </form>
            </div>
            <div class="modal-footer">  
                <div class="forgot-password-link clearfix">                
                  <div class="form-control-wrapper social-area">
                      <div class="row">
                          <div class="col-md-12">
                            <a class="btn-facebook facebook-login" href="javascript:;">
                            <i class="fa fa-facebook"></i>
                            <span>Đăng nhập bằng tài khoản Facebook</span>
                            </a>
                          </div>
                      </div>
                  </div>
              </div>              
                <p class="bottom-text">
                    Đã có tài khoản?
                    <a class="btn-link" data-dismiss="modal" data-target="#login-modal" data-toggle="modal" href="#">Đăng nhập</a>
                </p>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
<div id="editContentModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cập nhật nội dung</h4>
      </div>
      <form method="POST" action="{{ route('save-content') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" id="txtId" value="">
      <div class="modal-body">
        <textarea rows="5" class="form-control" name="content" id="txtContent"></textarea>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="btnSaveContent">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<style type="text/css">	
	#login-modal .form-control-wrapper .form-control.error, #register-modal .form-control-wrapper .form-control.error, #fogot-password-dialog .form-control-wrapper .form-control.error{
		border: 1px solid red;	
	}
</style>

<!-- Join sales modal -->
<div class="modal fade" id="join-sales-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                <h3 class="modal-title">Tham gia bán</h3>
            </div>
            <form method="POST" id="join_sale_popup_form" action="{{ route('customer-join-sale') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                      <label class="radio-inline salesDirect">
                          <input type="radio" class="" name="typeSales" value="1">Bán trực tiếp
                      </label>
                      <label class="radio-inline salesPhone">
                          <input type="radio" class="" name="typeSales" value="2">Để lại số điện thoại khách
                      </label>
                      <input type="hidden" value="" name="productId" id="productIdJoinSale">
                    </div>
                    <div id="div_phone" style="display:none">
                      <div class="form-group">
                        <label for="full_name">Họ tên khách</label>
                        <input type="" id="full_name" name="full_name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="cmnd">CMND</label>
                        <input type="" id="cmnd" name="cmnd" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="" id="phone" name="phone" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="" id="address" name="address" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="vung_quan_tam">Vùng quan tâm</label>
                        <input type="" id="vung_quan_tam" name="vung_quan_tam" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label for="nhu_cau">Nhu cầu</label>
                        <select name="nhu_cau" id="nhu_cau" class="form-control">
                          <option value="">--Chọn--</option>
                          <option value="1">Ở</option>
                          <option value="2">Đầu tư ngắn hạn</option>
                          <option value="3">Đầu tư trung hạn</option>
                          <option value="4">Đầu tư dài hạn</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="loai_bds">Loại BĐS</label>
                        <select name="loai_bds" id="loai_bds" class="form-control">
                          <option value="">--Chọn--</option>
                          <option value="1">Căn hộ</option>
                          <option value="2">Đất nền</option>
                          <option value="3">Biệt thự</option>
                          <option value="4">Nhà lẻ</option>
                          <option value="5">Khác</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="collapseSuccess" class="hide">
                        <div class="alert alert-success" role="alert">Yêu cầu của bạn đã được gửi đi! </div>
                    </div>
                    <button id="btnSaveJoinSales" class="btn btn-primary" type="button" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseSuccess">
                        Gửi yêu cầu
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <input type="reset" name="" id="btnReset" style="display:none;">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- End join sales /.modal -->
<style type="text/css">
  #join_sale_popup_form .form-group{
    margin-bottom: 3px !important;
  }
</style>