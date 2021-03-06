@extends('layout.backend')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cài đặt site
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('settings.index') }}">Cài đặt</a></li>
      <li class="active">Cập nhật</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">   
    <form role="form" method="POST" action="{{ route('settings.update') }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Cập nhật</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}

            <div class="box-body">
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if(Session::has('message'))
              <p class="alert alert-info" >{{ Session::get('message') }}</p>
              @endif
                 <!-- text input -->
                <div class="form-group">
                  <label>Tên site <span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="site_name" id="site_name" value="{{ $settingArr['site_name'] }}">
                </div>
                
                <div class="form-group">
                  <label>Verify WOT</label>
                  <input type="text" class="form-control" name="wot" id="wot" value="{{ $settingArr['wot'] }}">
                </div>
                <div class="form-group">
                  <label>Verify Norton</label>
                  <input type="text" class="form-control" name="norton" id="norton" value="{{ $settingArr['norton'] }}">
                </div>
                <div class="form-group">
                  <label>Title footer</label>
                  <input type="text" class="form-control" name="title_footer" id="title_footer" value="{{ $settingArr['title_footer'] }}">
                </div>
                
                <div class="form-group">
                  <label>Content on footer</label>
                  <textarea class="form-control" rows="3" name="content_footer" id="content_footer">{{ $settingArr['content_footer'] }}</textarea>
                </div>
                
                <div class="form-group">
                  <label>Code google analystic </label>
                  <input type="text" class="form-control" name="google_analystic" id="google_analystic" value="{{ $settingArr['google_analystic'] }}">
                </div>   
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Logo </label>    
                  <div class="col-md-9">
                    <img id="thumbnail_logo" src="{{ $settingArr['logo'] ? Helper::showImage($settingArr['logo']) : URL::asset('public/assets/admin/dist/img/img.png') }}" class="img-logo" width="150" >
                 
                    <button class="btn btn-default btn-sm btnSingleUpload" data-set="logo" data-image="thumbnail_logo" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
                  <div style="clear:both"></div>
                </div>
               
                
                <div style="clear:both"></div> 
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Banner ( og:image ) </label>    
                  <div class="col-md-9">
                    <img id="thumbnail_banner" src="{{ $settingArr['banner'] ? Helper::showImage($settingArr['banner']) : URL::asset('public/assets/admin/dist/img/img.png') }}" class="img-banner" width="200">
                 
                    <button class="btn btn-default btn-sm btnSingleUpload" data-set="banner" data-image="thumbnail_banner" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
                  <div style="clear:both"></div>
                </div>
                <div style="clear:both"></div>            
                 
            </div>                        
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-sm">Lưu</button>         
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label>Meta title <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="site_title" id="site_title" value="{{ $settingArr['site_title'] }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption <span class="red-star">*</span></label>
                <textarea class="form-control" rows="4" name="site_description" id="site_description">{{ $settingArr['site_description'] }}</textarea>
              </div>
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="4" name="custom_text" id="custom_text">{{ $settingArr['custom_text'] }}</textarea>
              </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>
<input type="hidden" name="logo" id="logo" value="{{ $settingArr['logo'] }}"/>

<input type="hidden" name="banner" id="banner" value="{{ $settingArr['banner'] }}"/>

    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop
@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function(){
      var editor = CKEDITOR.replace( 'cty_info',{
          language : 'vi',
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}",
          height : 300
      });
      var editor2 = CKEDITOR.replace( 'gioi_thieu_so_luoc',{
          language : 'vi',
          filebrowserBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=files') }}",
          filebrowserImageBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=images') }}",
          filebrowserFlashBrowseUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/browse.php?type=flash') }}",
          filebrowserUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=files') }}",
          filebrowserImageUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=images') }}",
          filebrowserFlashUploadUrl: "{{ URL::asset('public/admin/dist/js/kcfinder/upload.php?type=flash') }}",
          height : 300
      });
      $('#btnUploadLogo').click(function(){        
        $('#file-logo').click();
      });
      $('#btnUploadFavicon').click(function(){        
        $('#file-favicon').click();
      });
      $('#btnUploadBanner').click(function(){        
        $('#file-banner').click();
      });
      var files = "";
      $('#file-logo').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_logo').attr('src',$('#upload_url').val() + response.image_path);
                $( '#logo' ).val( response.image_path );
                $( '#logo_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
      var filesFavicon = '';
      $('#file-favicon').change(function(e){
         filesFavicon = e.target.files;
         
         if(filesFavicon != ''){
           var dataForm = new FormData();        
          $.each(filesFavicon, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_favicon').attr('src',$('#upload_url').val() + response.image_path);
                $('#favicon').val( response.image_path );
                $( '#favicon_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
      
      var filesBanner = '';
      $('#file-banner').change(function(e){
         filesBanner = e.target.files;
         
         if(filesBanner != ''){
           var dataForm = new FormData();        
          $.each(filesBanner, function(key, value) {
             dataForm.append('file', value);
          });
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_banner').attr('src',$('#upload_url').val() + response.image_path);
                $('#banner').val( response.image_path );
                $( '#banner_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });

    });
    
</script>
@stop
