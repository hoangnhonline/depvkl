<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Banner;
use App\Models\Articles;
use App\Models\ArticlesCate;
use App\Models\Account;
use App\Models\Newsletter;
use App\Models\Video;
use App\Models\Settings;
use Helper, File, Session, Auth, Hash;

class HomeController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){       


    }    
    public function getChild(Request $request){
        $module = $request->mod;
        $id = $request->id;
        $column = $request->col;
        return Helper::getChild($module, $column, $id);
    }
    public function index(Request $request)
    {  
        $articleCateHot = ArticlesCate::where('is_hot', 1)->orderBy('id', 'asc')->get();
        foreach($articleCateHot as $cate){
            $postArr[$cate->id] = Articles::where('cate_id', $cate->id)->where('status', 1)->orderBy('id', 'desc')->limit(12)->get();
        }
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $seo['title'] = $settingArr['site_title'];
        $seo['description'] = $settingArr['site_description'];

        return view('frontend.home.index', compact('articlesArr', 'socialImage', 'seo', 'articleCateHot', 'postArr'));

    }

    public function getNoti(){
        $countMess = 0;
        if(Session::get('userId') > 0){
            $countMess = CustomerNotification::where(['customer_id' => Session::get('userId'), 'status' => 1])->count();    
        }
        return $countMess;
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {
        $tu_khoa = $request->keyword;       

        $productArr = Product::where('product.alias', 'LIKE', '%'.$tu_khoa.'%')->where('so_luong_ton', '>', 0)->where('price', '>', 0)->where('estate_type.status', 1)                        
                        ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')                        
                        ->join('estate_type', 'estate_type.id', '=', 'product.estate_type_id')
                        ->select('product_img.image_url', 'product.*', 'thuoc_tinh')
                        ->orderBy('id', 'desc')->paginate(20);
        $seo['title'] = $seo['description'] =$seo['keywords'] = "Tìm kiếm sản phẩm theo từ khóa '".$tu_khoa."'";
        return view('frontend.search.index', compact('productArr', 'tu_khoa', 'seo'));
    }
    public function ajaxTab(Request $request){
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    public function contact(Request $request){        

        $seo['title'] = 'Liên hệ';
        $seo['description'] = 'Liên hệ';
        $seo['keywords'] = 'Liên hệ';
        $socialImage = '';
        return view('frontend.contact.index', compact('seo', 'socialImage'));
    }

    

    public function registerNews(Request $request)
    {

        $register = 0; 
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Account::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
           $register = 1;
        }

        return $register;
    }

}
