<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Articles;
use App\Helpers\simple_html_dom;
use App\Models\MetaData;

use Helper, File, Session, Auth;
use Mail;

class NewsController extends Controller
{
    public function newsList(Request $request)
    {
        $slug = $request->slug;
        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $cateDetail = ArticlesCate::where('slug' , $slug)->first();

        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesArr = Articles::where('cate_id', $cateDetail->id)->where('status', 1)->orderBy('id', 'desc')->paginate(36);
        
        $hotArr = Articles::where( ['cate_id' => $cateDetail->id, 'is_hot' => 1] )->orderBy('id', 'desc')->limit(5)->get();
        $seo['title'] = $cateDetail->meta_title ? $cateDetail->meta_title : $cateDetail->title;
        $seo['description'] = $cateDetail->meta_description ? $cateDetail->meta_description : $cateDetail->title;
        $seo['keywords'] = $cateDetail->meta_keywords ? $cateDetail->meta_keywords : $cateDetail->title;
        $socialImage = $cateDetail->image_url;       
        return view('frontend.news.index', compact('title', 'hotArr', 'articlesArr', 'cateDetail', 'seo', 'socialImage'));
    }      

     public function newsDetail(Request $request)
    { 
        $id = $request->id;

        $detail = Articles::find($id);
        if($detail->is_gg == 1 && $detail->encode_link != null){                
          
            $decodeLink = Helper::decodeLink($detail->encode_link);
            //dd($decodeLink);
            $tmp = Helper::getPhotoGoogle( $decodeLink);
            
            $video_url = (isset($tmp['720p']) && $tmp['720p'] != '' ) ? $tmp['720p'] : $tmp['360p'];            
            $poster_url = $detail->image_url;
                
        }elseif($detail->site_name == 'redtube'){

            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
            curl_setopt( $ch, CURLOPT_URL, $detail->video_url );
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
             
            $result = curl_exec($ch);            
            $tmp = explode('"videoUrl":"', $result);
            if(isset($tmp[2])){
                $tmp = explode('"},{"', $tmp[2]);
                if($tmp[0]){
                    $video_url = str_replace("\/", "/", $tmp[0]);                    
                }
            }           
            curl_close($ch);
            $crawler = new simple_html_dom();
            // Load HTML from a string
            $crawler->load($result);
            $poster_url = str_replace("eGJF8f", "eaAaGwFb", $crawler->find('meta[property="og:image"]', 0)->content);          
        }else{
                $ch = curl_init();
            curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
            curl_setopt( $ch, CURLOPT_URL, $detail->video_url );
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            //if(strpos($origin_url, 'xvideos') > 0 || strpos($origin_url, 'xnxx.com') > 0){
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3');    
            //}      
            $result = curl_exec($ch);            
            
            curl_close($ch);
            $htmlGet = new simple_html_dom();                
            $htmlGet->load($result);  
            //if(strpos($origin_url, 'xvideos') > 0){ 
              
            $tmp1 = explode("setVideoUrlHigh('", $result);
            
            if(isset($tmp1[1])){
                $tmp2 = explode("');", $tmp1[1]);         
            }else{                        
                $tmp1 = explode("setVideoUrlLow('", $result);
                if(isset($tmp1[1])){                                
                    $tmp2 = explode("');", $tmp1[1]);         
                }else{
                    echo "Your link does not support, please try another link.";die;
                }
            }  
            $video_url = $tmp2[0];
            $tmpThumb = explode("setThumbUrl('", $result);
            if(isset($tmpThumb[1])){
                $tmpThum2 = explode("');", $tmpThumb[1]);         
                $poster_url = str_replace('thumbslll','thumbs169lll',$tmpThum2[0]);
            }  
        }
              
        //}
        if( $detail ){           
           
            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $hotArr = Articles::where( ['cate_id' => $detail->cate_id, 'is_hot' => 1] )->where('id', '<>', $id)->where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
            $otherArr = Articles::where( ['cate_id' => $detail->cate_id] )->where('id', '<>', $id)->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
            if( $detail->meta_id > 0){
               $seo = MetaData::find( $detail->meta_id )->toArray();
               $seo['title'] = $seo['title'] ? $seo['title'] : $detail->title;
            }else{
                $seo['title'] = $seo['description'] = $seo['keywords'] = $detail->title;
            }   
            $socialImage = $detail->image_url; 
            $cateDetail = ArticlesCate::find($detail->cate_id);
           
            return view('frontend.news.news-detail', compact('title',  'hotArr', 'detail', 'otherArr', 'seo', 'socialImage', 'cateDetail', 'video_url', 'poster_url'));
        }else{
            return view('erros.404');
        }
    }
}

