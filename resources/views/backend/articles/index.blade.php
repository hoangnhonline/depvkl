@extends('layout.backend')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Video
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'articles.index' ) }}">Video</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
      <p class="alert alert-info" >{{ Session::get('message') }}</p>
      @endif
      <a href="{{ route('articles.create') }}" class="btn btn-info btn-sm" style="margin-bottom:5px">New video</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Search</h3>
        </div>
        <div class="panel-body">
          <form class="form-inline" role="form" method="GET" id="searchForm" action="{{ route('articles.index') }}">
            <div class="form-group">
              <label for="email">Site </label>
              <select class="form-control" name="site_name" id="site_name">
                <option value="">--All--</option>                
                  <option value="xvideos" {{ 'xvideos' == $site_name ? "selected" : "" }}>xvideos</option>
                  <option value="xnxx" {{ 'xnxx' == $site_name ? "selected" : "" }}>xnxx</option>
                  <option value="redtube" {{ 'redtube' == $site_name ? "selected" : "" }}>redtube</option>
                  <option value="xhamster" {{ 'xhamster' == $site_name ? "selected" : "" }}>xhamster</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Status </label>
              <select class="form-control" name="status" id="status">
                <option value="">--All--</option>                
                  <option value="1" {{ 1 == $status ? "selected" : "" }}>Published</option>
                  <option value="2" {{ 2 == $status ? "selected" : "" }}>Draft</option>
              </select>
            </div>          
            <div class="form-group">
              <label for="email">Category </label>
              <select class="form-control" name="cate_id" id="cate_id">
                <option value="">--All--</option>
                @if( $cateArr->count() > 0)
                  @foreach( $cateArr as $value )
                  <option value="{{ $value->id }}" {{ $value->id == $cate_id ? "selected" : "" }}>{{ $value->name }}</option>
                  @endforeach
                @endif
              </select>
            </div>            
            <div class="form-group">
              <label for="email">&nbsp;&nbsp;Keyword :</label>
              <input type="text" class="form-control" name="title" value="{{ $title }}">
            </div>
            <button type="submit" class="btn btn-default btn-sm">Filter</button>
          </form>         
        </div>
      </div>
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">List ( <span class="value">{{ $items->total() }} videos )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
            {{ $items->appends( ['cate_id' => $cate_id, 'title' => $title] )->links() }}
          </div>  
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>              
              <th width="120px">Thumbnail</th>
              <th>Title</th>
              <th width="120px">Original Site</th>
              <th width="1%;white-space:nowrap">Action</th>
            </tr>
            <tbody>
            @if( $items->count() > 0 )
              <?php $i = 0; ?>
              @foreach( $items as $item )
                <?php $i ++; ?>
              <tr id="row-{{ $item->id }}">
                <td><span class="order">{{ $i }}</span></td>       
                <td>
                  <img class="img-thumbnail lazy" data-original="{{ Helper::showImage($item->image_urls)}}" width="145">
                </td>        
                <td>                  
                  <a href="{{ route( 'articles.edit', [ 'id' => $item->id ]) }}">{{ $item->title }}</a>
                  
                  @if( $item->is_hot == 1 )
                  <img class="img-thumbnail" src="{{ URL::asset('public/admin/dist/img/star.png')}}" alt="Nổi bật" title="Nổi bật" />
                  @endif

                  <p>{{ $item->description }}</p>
                </td>
                <td>{{ $item->site_name }}</td>
                <td style="white-space:nowrap"> 
                  @php
                  if(!$item->slug){
                    $item->slug = 'review';
                  }
                  @endphp
                  <a class="btn btn-default btn-sm" href="{{ route('detail', [$item->slug, $item->id ]) }}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> View</a>                 
                  <a href="{{ route( 'articles.edit', [ 'id' => $item->id ]) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>                 
                  
                  <a onclick="return callDelete('{{ $item->title }}','{{ route( 'articles.destroy', [ 'id' => $item->id ]) }}');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                  
                </td>
              </tr> 
              @endforeach
            @else
            <tr>
              <td colspan="9">No data.</td>
            </tr>
            @endif

          </tbody>
          </table>
          <div style="text-align:center">
            {{ $items->appends( ['cate_id' => $cate_id, 'title' => $title] )->links() }}
          </div>  
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
@stop
@section('javascript_page')

<script type="text/javascript">
function callDelete(name, url){  
  swal({
    title: 'Bạn muốn xóa "' + name +'"?',
    text: "Dữ liệu sẽ không thể phục hồi.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function() {
    location.href= url;
  })
  return flag;
}
$(document).ready(function(){
  $('#status, #cate_id, #site_name').change(function(){
    $('#searchForm').submit();
  });
  $('#parent_id').change(function(){
    $.ajax({
        url: $('#route_get_cate_by_parent').val(),
        type: "POST",
        async: false,
        data: {          
            parent_id : $(this).val(),
            type : 'list'
        },
        success: function(data){
            $('#cate_id').html(data).select2('refresh');                      
        }
    });
  });
  $('.select2').select2();

  $('#table-list-data tbody').sortable({
        placeholder: 'placeholder',
        handle: ".move",
        start: function (event, ui) {
                ui.item.toggleClass("highlight");
        },
        stop: function (event, ui) {
                ui.item.toggleClass("highlight");
        },          
        axis: "y",
        update: function() {
            var rows = $('#table-list-data tbody tr');
            var strOrder = '';
            var strTemp = '';
            for (var i=0; i<rows.length; i++) {
                strTemp = rows[i].id;
                strOrder += strTemp.replace('row-','') + ";";
            }     
            updateOrder("loai_sp", strOrder);
        }
    });
});
function updateOrder(table, strOrder){
  $.ajax({
      url: $('#route_update_order').val(),
      type: "POST",
      async: false,
      data: {          
          str_order : strOrder,
          table : table
      },
      success: function(data){
          var countRow = $('#table-list-data tbody tr span.order').length;
          for(var i = 0 ; i < countRow ; i ++ ){
              $('span.order').eq(i).html(i+1);
          }                        
      }
  });
}
</script>
@stop