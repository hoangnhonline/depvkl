 <!-- MENU -->
<div class="row home-mega-menu ">
   <div class="col-md-12">
      <nav class="navbar navbar-default">
         <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>
         <div class="collapse navbar-collapse js-navbar-collapse megabg dropshd ">
            <ul class="nav navbar-nav">
               @foreach($articleCate as $cate)               
               <li><a href="{{ route('cate', $cate->slug) }}" title="{!! $cate->name !!}">{!! $cate->name !!}</a></li>
               @endforeach
            </ul>                    
            <div class="search-block">
               <form>
                  <input type="search" placeholder="Search">
               </form>
            </div>
         </div>
         <!-- /.nav-collapse -->
      </nav>
   </div>
</div>