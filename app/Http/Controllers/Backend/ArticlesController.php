<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Articles;
use App\Models\MetaData;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagObjects;
use Helper, File, Session, Auth, Image;

class ArticlesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {   
        
        $cate_id = isset($request->cate_id) ? $request->cate_id : null;
        $status = isset($request->status) ? $request->status : null;

        $title = isset($request->title) && $request->title != '' ? $request->title : '';
        $site_name = isset($request->site_name) && $request->site_name != '' ? $request->site_name : '';
        
        $query = Articles::whereRaw('1');

        if( $cate_id > 0){
            $query->where('cate_id', $cate_id);
        }
         if( $status > 0){
            $query->where('status', $status);
        }
        // check editor
        if( Auth::user()->role < 3 ){
            $query->where('created_user', Auth::user()->id);
        }
        if( $title != ''){
            $query->where('title', 'LIKE', '%'.$title.'%');
        }
        if( $site_name != ''){
            $query->where('site_name', $site_name);
        }

        $items = $query->orderBy('is_hot', 'desc')->orderBy('id', 'desc')->paginate(200);
        
        $cateArr = ArticlesCate::where('status', 1)->get();
        
        return view('backend.articles.index', compact( 'items', 'cateArr' , 'title', 'cate_id','status', 'site_name' ));
    }
    public function check($image_url){
         $ch = curl_init();
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
        curl_setopt( $ch, CURLOPT_URL, $image_url );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);       
        $code =  curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $code;
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        
        $cateArr = ArticlesCate::where('status', 1)->get();
        
        $cate_id = $request->cate_id;       
         $tagArr = Tag::where('type', 1)->orderBy('id', 'desc')->get();
        return view('backend.articles.create', compact( 'cateArr', 'cate_id', 'tagArr'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
            'cate_id' => 'required',            
            'title' => 'required',            
            'slug' => 'required',
        ],
        [            
            'cate_id.required' => 'Please choose category',            
            'title.required' => 'Please input title',
            'slug.required' => 'Please input slug'            
        ]);           
        
        $dataArr['alias'] = Helper::stripUnicode($dataArr['title']);      
        
        $dataArr['created_user'] = Auth::user()->id;

        $dataArr['updated_user'] = Auth::user()->id;
        $dataArr['type'] = 1;
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;  
        $dataArr['is_gg'] = isset($dataArr['is_gg']) ? 1 : 0;
        if($dataArr['is_gg'] == 1){
            $dataArr['encode_link'] = Helper::encodeLink($dataArr['video_url']);    
        }
        
        $rs = Articles::create($dataArr);

        $object_id = $rs->id;

        $this->storeMeta( $object_id, 0, $dataArr);
        // xu ly tags
        if( !empty( $dataArr['tags'] ) && $object_id ){
            

            foreach ($dataArr['tags'] as $tag_id) {
                $model = new TagObjects;
                $model->object_id = $object_id;
                $model->tag_id  = $tag_id;
                $model->type = 1;
                $model->save();
            }
        }

        Session::flash('message', 'Success.');

        return redirect()->route('articles.index',['cate_id' => $dataArr['cate_id']]);
    }
    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = [ 'title' => $dataArr['meta_title'], 'description' => $dataArr['meta_description'], 'custom_text' => $dataArr['custom_text'], 'updated_user' => Auth::user()->id ];
        if( $meta_id == 0){
            $arrData['created_user'] = Auth::user()->id;            
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;
            
            $modelSp = Articles::find( $id );
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        }else {
            $model = MetaData::find($meta_id);           
            $model->update( $arrData );
        }              
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        
        $tagSelected = [];

        $detail = Articles::find($id);
        $detail->slug = $detail->slug ? $detail->slug : '';
        $cateArr = ArticlesCate::where('status', 1)->get();    

        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }
         $tmpArr = TagObjects::where(['type' => 1, 'object_id' => $id])->get();
        
        if( $tmpArr->count() > 0 ){
            foreach ($tmpArr as $value) {
                $tagSelected[] = $value->tag_id;
            }
        }
        
        $tagArr = Tag::where('type', 1)->get();
        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }

        return view('backend.articles.edit', compact('detail', 'cateArr', 'meta','tagSelected', 'tagArr'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[            
            'cate_id' => 'required',            
            'title' => 'required',            
            'slug' => 'required',
        ],
        [            
            'cate_id.required' => 'Please choose category',            
            'title.required' => 'Please input title',
            'slug.required' => 'Please input slug'            
        ]);       
        
        $dataArr['alias'] = Helper::stripUnicode($dataArr['title']);
        
        $dataArr['type'] = 1;
        $dataArr['updated_user'] = Auth::user()->id;
        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
        $dataArr['is_gg'] = isset($dataArr['is_gg']) ? 1 : 0;
        if($dataArr['is_gg'] == 1){
            $dataArr['encode_link'] = Helper::encodeLink($dataArr['video_url']);    
        } 
        $model = Articles::find($dataArr['id']);

        $model->update($dataArr);
        
        $this->storeMeta( $dataArr['id'], $dataArr['meta_id'], $dataArr);
        TagObjects::where(['object_id' => $dataArr['id'], 'type' => 1])->delete();
        // xu ly tags
        if( !empty( $dataArr['tags'] ) ){
                       
            foreach ($dataArr['tags'] as $tag_id) {
                $modelTagObject = new TagObjects; 
                $modelTagObject->object_id = $dataArr['id'];
                $modelTagObject->tag_id  = $tag_id;
                $modelTagObject->type = 1;
                $modelTagObject->save();
            }
        }
        Session::flash('message', 'Success.');        

        return redirect()->route('articles.edit', $dataArr['id']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = Articles::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa thành công');
        return redirect()->route('articles.index');
    }
}
