<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ URL::asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->full_name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>     
    
      
      <li class="treeview {{ in_array(\Request::route()->getName(), ['articles.index', 'articles.create', 'articles.edit','articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-pencil-square-o"></i> 
          <span>Video</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li {{ in_array(\Request::route()->getName(), ['articles.edit', 'articles.index']) ? "class=active" : "" }}><a href="{{ route('articles.index') }}"><i class="fa fa-circle-o"></i> Video</a></li>
          <li {{ in_array(\Request::route()->getName(), ['articles.create']) ? "class=active" : "" }} ><a href="{{ route('articles.create', ['cate_id' => 1]) }}"><i class="fa fa-circle-o"></i> New video</a></li>
          @if(Auth::user()->role == 1)
        <li {{ in_array(\Request::route()->getName(), ['articles-cate.create', 'articles-cate.index', 'articles-cate.edit']) ? "class=active" : "" }} ><a href="{{ route('articles-cate.index') }}"><i class="fa fa-circle-o"></i> Category</a></li>      
        @endif    
        </ul>
       
      </li>      
        
      @if(Auth::user()->role == 1)
      <li {{ in_array(\Request::route()->getName(), ['banner.list', 'banner.edit', 'banner.create']) ? "class=active" : "" }}>
        <a href="{{ route('banner.list') }}">
          <i class="fa fa-file-image-o"></i> 
          <span>Banner</span>          
        </a>       
      </li>      
      @endif
      @if(Auth::user()->role == 1)
      <li {{ in_array(\Request::route()->getName(), ['settings.index', 'settings.edit']) ? "class=active" : "" }}>
        <a href="{{ route('settings.index') }}">
          <i class="fa fa-file-image-o"></i> 
          <span>Settings</span>          
        </a>       
      </li>      
      @endif
      <!--<li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<style type="text/css">
  .skin-blue .sidebar-menu>li>.treeview-menu{
    padding-left: 15px !important;
  }
</style>