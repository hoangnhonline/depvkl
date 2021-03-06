<?php
namespace App\Helpers;
use App\Helpers\simple_html_dom;
use App\Models\Account;
use App\Models\CounterValues;
use App\Models\CounterIps;
use DB, Image, Session;

class Helper
{
    public static $privateKey = 'enilnohngnaoh';

    public static function shout(string $string)
    {
        return strtoupper($string);
    }
    
    public static function getChild($table, $column, $parent_id){
        $listData = DB::table($table)->where($column, $parent_id)->get();
        if($table == 'ward'){
            echo '<option value="">Phường/Xã</option>';
        }elseif($table == 'street'){
            echo '<option value="">Đường/Phố</option>';
        }elseif($table == "estate_type"){
             echo '<option value="">Loại bất động sản</option>';
        }elseif($table == 'price'){
            echo '<option value="">Mức giá</option>';
        }elseif($table == 'district'){
            echo '<option value="">Quận/Huyện</option>';
        }else{            
            echo '<option value="">Dự án</option>';
        }
        if(!empty(  (array) $listData  )){
            
            foreach($listData as $data){
                echo "<option value=".$data->id.">".$data->name."</option>";
            }
        }
    }
    public static function getNextOrder($table){
        return DB::table($table)->max('display_order') + 1;
    }
    public static function getRole($id){
        $role = "";
        switch ($id) {
            case 1:
                $role = "Admin";
                break;
            case 2:
                $role = "CSKH";
                break;
            case 3:
                $role = "PR";
                break;
            case 4:
                $role = "CS CTV";
                break;
            case 5:
                $role = "CTV";
                break;
            
            default:
                $role = "Sản phẩm";
                break;
        }
        return $role;
    }
    public static function getPriceId($price, $price_unit_id, $type){
        $rs = Price::where('value_from', '<=', $price)
                    ->where('value_to', '>=', $price)
                    ->where('price_unit_id', $price_unit_id)
                    ->where('type', $type)
                    ->first();
        if($rs){
            return $rs->id;    
        }else{
            return 0;
        }        
    }
    public static function getAreaId($area){
        $rs = Area::where('value_from', '<=', $area)
                    ->where('value_to', '>=', $area)                   
                    ->first();
        if($rs){
            return $rs->id;    
        }else{
            return 0;
        }
        
    }
    public static function showImage($image_url, $type = 'original'){

        //return strpos($image_url, 'http') === false ? config('moigioi.upload_url') . $type . '/' . $image_url : $image_url;        
        return strpos($image_url, 'http') === false ? env('APP_URL') . $image_url : $image_url;        

    }
    public static function showImageThumb($image_url, $object_type = 1, $folder = ''){             
        // type = 1 : original 2 : thumbs
        //object_type = 1 : product, 2 :article  3: project          
        $tmpArrImg = explode('/', $image_url);                       
        
        if(strpos($image_url, 'http') === false){
            if($object_type == 1){
                $image_url = config('moigioi.upload_url_thumbs').end($tmpArrImg);   
                return $image_url;
            }elseif($object_type == 2){
                $image_url = config('moigioi.upload_url_thumbs').'articles/'.end($tmpArrImg);   
                return $image_url;
            }else{
                return env('APP_URL') . $folder. $image_url;
            }    
        }else{
            return $image_url;
        }
        
    }
    public static function showImageThumb2($image_url, $object_type = 1, $folder = ''){             
        // type = 1 : original 2 : thumbs
        //object_type = 1 : product, 2 :article  3: project          
        $tmpArrImg = explode('/', $image_url);
                        
        $image_url = config('moigioi.upload_url_thumbs_2').end($tmpArrImg);           
        if(strpos($image_url, 'http') === false){
            if($object_type == 1){
                return env('APP_URL') . $folder. $image_url;
            }elseif($object_type == 2){
                return env('APP_URL') . $folder. $image_url;
            }else{
                return env('APP_URL') . $folder. $image_url;
            }    
        }else{
            return $image_url;
        }
        
    }
    public static function showImageThumb3($image_url, $object_type = 1, $folder = ''){             
        // type = 1 : original 2 : thumbs
        //object_type = 1 : product, 2 :article  3: project          
        $tmpArrImg = explode('/', $image_url);
                        
        $image_url = config('moigioi.upload_url_thumbs_3').end($tmpArrImg);           
        if(strpos($image_url, 'http') === false){
            if($object_type == 1){
                return env('APP_URL') . $folder. $image_url;
            }elseif($object_type == 2){
                return env('APP_URL') . $folder. $image_url;
            }else{
                return env('APP_URL') . $folder. $image_url;
            }    
        }else{
            return $image_url;
        }
        
    }
    public static function seo(){
        $seo = [];
        $arrTmpSeo = DB::table('info_seo')->get();
        $arrSeo = $arrUrl = [];
        foreach($arrTmpSeo as $tmpSeo){
          $arrSeo[$tmpSeo->url] = ['title' => $tmpSeo->title, 'description' => $tmpSeo->description, 'keywords' => $tmpSeo->keywords, 'image_url' => $tmpSeo->image_url];
          $arrUrl[] = $tmpSeo->url;

        }
        if(in_array(url()->current(), $arrUrl)){
          $seo = $arrSeo[url()->current()];
        }
        if(empty($seo)){
          $seo['title'] = $seo['description'] = $seo['keywords'] = "Trang chủ NhaDat";
        }      
        return $seo;
    }
     public static function curl($url) {
         $url = trim($url);
         $ch = @curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         $head[] = "Connection: keep-alive";
         $head[] = "Keep-Alive: 300";
         $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
         $head[] = "Accept-Language: en-us,en;q=0.5";
         curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
         curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
         curl_setopt($ch, CURLOPT_TIMEOUT, 60);
         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
         $page = curl_exec($ch);
         curl_close($ch);
         return $page;
    }
    public static function getPhotoGoogle($link){
        $get = self::curl($link);
        $data = explode('url\u003d', $get);
        unset($data[0]);
            $linkDownload = [];
        foreach($data as $d){            
            if(strpos($d, 'video%2Fmp4')){
                $tmpUrl = urldecode($d);
                $tmpArr = explode("\u0026itag", $tmpUrl);
                if(strpos($tmpArr[0], 'm37')){
                    $linkDownload['1080p'] = $tmpArr[0];
           
                }elseif(strpos($tmpArr[0], 'm22')){
                    $linkDownload['720p'] = $tmpArr[0];
            
                }elseif(strpos($tmpArr[0], 'm18')){
                    $linkDownload['360p'] = $tmpArr[0];
                }
            }
        }       
        return $linkDownload;
    }
    public static function getName( $id, $table){
        $rs = DB::table($table)->where('id', $id)->first();

        return $rs ? $rs->name : "";
    }
    public static function calDayDelivery( $city_id ){
        
        $tmp = City::find($city_id);

        $region_id = $tmp->region_id;        
        $endDay = $region_id == 1 ? time() + 8*3600*24 : time() + 9*3600*24;
        $arrDate = self::createDateRangeArray(date('Y-m-d'), date('Y-m-d', $endDay));        
        return $arrDate;
    }

    public static function parseThuVN($time){
        $thu = '';
        $day = date('D', $time );
        switch ($day) {
            case 'Mon':
                $thu = "Thứ hai";
                break;
            case 'Tue':
                $thu = "Thứ ba";
                break;
            case 'Wed':
                $thu = "Thứ tư";
                break;
            case 'Thu':
                $thu = "Thứ năm";
                break;
            case 'Fri':
                $thu = "Thứ sáu";
                break;
            case 'Sat':
                $thu = "Thứ bảy";
                break;
            case 'Sun':
                $thu = "Chủ nhật";
                break;               
        }
        return $thu;
           
    }
    public static function getDateFromRange($strDateFrom,$strDateTo)
    {
        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom)
        {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
            while ($iDateFrom<$iDateTo)
            {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange,date('Y-m-d',$iDateFrom));
            }
        }
        return $aryRange;
    }
    public static function view($object_id, $object_type){
        $rs = CounterValues::where(['object_id' => $object_id, 'object_type' => $object_type])->first();
        if($rs){
            return $rs->all_value;
        }else{
            return 0;
        }
    }
    public static function counter( $object_id, $object_type){
        // ip-protection in seconds
        $counter_expire = 600;

        // ignore agent list
        $counter_ignore_agents = array('bot', 'bot1', 'bot3');

        // ignore ip list
        //$counter_ignore_ips = array('127.0.0.2', '127.0.0.3');
        $counter_ignore_ips = [];
        // get basic information
        $counter_agent = $_SERVER['HTTP_USER_AGENT'];
        $counter_ip = $_SERVER['REMOTE_ADDR']; 
        $counter_time = time();

        $ignore = false; 
           
        // get counter information   
        $rs1 = CounterValues::where(['object_id' => $object_id, 'object_type' => $object_type])->first();   

        // fill when empty
        if (!$rs1)
        {   

            $tmpArr = [
                'object_id' => $object_id,
                'object_type' => $object_type,
                'day_id' => date("z"),
                'day_value' => 1,
                'all_value' => 1
            ];
          CounterValues::create($tmpArr);
          $rs1 = CounterValues::where(['object_id' => $object_id, 'object_type' => $object_type])->first();
          
          $ignore = true;
        }   
        
        $day_id = $rs1->day_id;
        $day_value = $rs1->day_value;
        $all_value = $rs1->all_value;
        // check ignore lists
        $length = sizeof($counter_ignore_agents);
        for ($i = 0; $i < $length; $i++)
        {
          if (substr_count($counter_agent, strtolower($counter_ignore_agents[$i])))
          {
             $ignore = true;
             break;
          }
        }

        $length = sizeof($counter_ignore_ips);
        for ($i = 0; $i < $length; $i++)
        {
          if ($counter_ip == $counter_ignore_ips[$i])
          {
             $ignore = true;
             break;
          }
        }

        
        // delete free ips
        if ($ignore == false)
        {           
            $time = time();
            CounterIps::where(['object_id' =>$object_id, 'object_type' => $object_type, 'ip' => $counter_ip])->whereRaw("$time-visit >= $counter_expire")->delete();
        }
 
        // check for entry
        if ($ignore == false)
        {
            $rs2 = CounterIps::where(['ip' => $counter_ip, 'object_id' => $object_id, 'object_type' => $object_type])->get();
          
          if ( $rs2->count() > 0)
          {
            $modelCouterIps = CounterIps::where('ip', $counter_ip)->where(['object_id' => $object_id, 'object_type' => $object_type]);
            $modelCouterIps->update(['visit' => time()]);   
            $ignore = true;          
          }
          else
          {
             // insert ip
             CounterIps::create(['ip' => $counter_ip, 'visit' => time(), 'object_id' => $object_id, 'object_type' => $object_type]);
          }       
        }
        // add counter
        if ($ignore == false)
        {
          // day
          if ($day_id == date("z")) 
          {
             $day_value++; 
          }
          else 
          {
             $day_value = 1;
             $day_id = date("z");
          }
          // all
          $all_value++; 

        $modelCouterValues = CounterValues::where(['object_id' => $object_id, 'object_type' => $object_type]);
        $modelCouterValues->update([
                'day_id' => $day_id,
                'day_value' => $day_value,
                'all_value' => $all_value
        ]);
         
        }
    }
    public static function createDateRangeArray($strDateFrom, $strDateTo) {
       
      $arrDate= $arrReturn = array();

      $iDateFrom= self::parseDate( $strDateFrom );
      $iDateTo= self::parseDate( $strDateTo );

      if ($iDateTo>=$iDateFrom) {
        $arrDate[] = date('Y-m-d',$iDateFrom);

        while ($iDateFrom<$iDateTo) {
          $iDateFrom += 86400; // add 24 hours
          $arrDate[] = date('Y-m-d',$iDateFrom);
        }
      }
      
        unset( $arrDate[0] );
        
        $endDay = self::parseDate($arrDate[count($arrDate)]);
      
        $thuEndDay = date('D', $endDay);
        if($thuEndDay == "Sat"){
            $endDay += 3*86400;   
            $fromDay = $endDay-86400;
        }elseif($thuEndDay == "Sun"){
            $endDay += 2*86400; 
            $fromDay = $endDay-86400;  
        }else{
            foreach( $arrDate as $date){

                $day = date('D', strtotime($date) );
                
                if( $day == 'Sat' || $day == 'Sun'){
                        $endDay += 86400;                    
                }       

                $fromDay = $endDay-86400;
            }
        }        
        $arrReturn['fromdate'] = self::parseThuVN($fromDay).", ".date('d/m/Y', $fromDay);
        $arrReturn['todate'] = self::parseThuVN($endDay).", ".date('d/m/Y', $endDay);
       
      return $arrReturn;
    }
    public static function parseDate($strDate){
        return mktime(1,0,0,substr($strDate,5,2), substr($strDate,8,2),substr($strDate,0,4));
    }
    public static function checkNgayNghi($arrDate){
        unset( $arrDate[0] );
        foreach( $arrDate as $date){
                echo $date;
                echo "<br>";
        }
    }
    public static function calCod($so_tien, $city_id){
        $cod = 0;
        if($so_tien < 3000000){
            if($city_id != 294){ // hcm
                $cod = round($so_tien/100);   
            }
        }else{
            $cod = round($so_tien/100);   
        }
        return $cod;
    }
    public static function phiVanChuyen($kg, $city_id, $district_id){        
        $phi = 0;
        if( $city_id == 294){ // HCM => tinh theo 
            if(in_array($district_id, [492,495,496,502,503,504,505,506,507])){ // ngoai_thanh, huyen xa khac
                $phi = 27000;
            }else{
                $phi = 22000;
            }
            if( $kg > 2){
                $phi_them = 0;                
                $so_kg_them = $kg - 2;
                $phi_them = ceil($so_kg_them/0.5) * 3000;             
                $phi += $phi_them;
            }
        }else{ // cac tinh thanh khac ngoai HCM
            $region_type = self::checkRegion($city_id);            
            if( $kg > 2){
                if( $region_type == 1){//cung mien                    
                    $phi = 64000;
                    $gia_them = 6000;
                }elseif( $region_type == 2){ //lien mien
                    $phi = 82000;
                    $gia_them = 10000;
                }else{ // cach mien
                    $phi = 87000;
                    $gia_them = 13000;
                }
                $phi_them = 0;
                $so_kg_them = $kg - 2;
                $phi_them = ceil($so_kg_them/0.5) * $gia_them;
                $phi += $phi_them;
            }else{                             
                
                if( 0 < $kg && $kg <= 0.5 ){                    
                    if( $region_type == 1){//cung mien                    
                        $phi = 25000;
                    }elseif( $region_type == 2){ //lien mien
                        $phi = 29000;
                    }else{ // cach mien
                        $phi = 32000;
                    }
                }elseif( 0.5 < $kg && $kg <= 1 ){                    
                    if( $region_type == 1){//cung mien                    
                        $phi = 30000;
                    }elseif( $region_type == 2){ //lien mien
                        $phi = 35000;
                    }else{ // cach mien
                        $phi = 40000;
                    }
                }elseif( 1 < $kg && $kg <= 1.5){                    
                    if( $region_type == 1){//cung mien                    
                        $phi = 42000;
                    }elseif( $region_type == 2){ //lien mien
                        $phi = 54000;
                    }else{ // cach mien
                        $phi = 55000;
                    }
                }elseif( 1.5 < $kg && $kg <= 2){                    
                    if( $region_type == 1){//cung mien                    
                        $phi = 54000;
                    }elseif( $region_type == 2){ //lien mien
                        $phi = 68000;
                    }else{ // cach mien
                        $phi = 71000;
                    }
                }elseif( 2 < $kg && $kg <= 3){                    
                    if( $region_type == 1){//cung mien                    
                        $phi = 64000;
                    }elseif( $region_type == 2){ //lien mien
                        $phi = 82000;
                    }else{ // cach mien
                        $phi = 87000;
                    }
                }
            }
        }
        
        return $phi;
    }
    public static function checkRegion($city_id){
        $detailCity = City::find($city_id);
        return $detailCity->region_id;
    }
   

    public static function uploadPhoto($file, $base_folder = '', $date_dir=false){
    
        $return = [];

        $basePath = '';

        $basePath = $base_folder ? $basePath .= $base_folder ."/" : $basePath = $basePath;

        $basePath = $date_dir == true ? $basePath .= date('Y/m/d'). '/'  : $basePath = $basePath;        
        
        $desPath = config('moigioi.upload_path'). $basePath;
        $desThumbsPath = config('moigioi.upload_thumbs_path'). $basePath;
        //set name for file
        $fileName = $file->getClientOriginalName();
        
        $tmpArr = explode('.', $fileName);

        // Get image extension
        $imgExt = array_pop($tmpArr);

        // Get image name exclude extension
        $imgNameOrigin = preg_replace('/(.*)(_\d+x\d+)/', '$1', implode('.', $tmpArr));        

        $imgName = str_slug($imgNameOrigin, '-');
        
        $imgName = $imgName."-".time();

        $newFileName = "{$imgName}.{$imgExt}";
       //var_dump($desPath, $newFileName);die;
        if( $file->move($desPath, $newFileName) ){            
            $imagePath = $basePath.$newFileName;
            $return['image_name'] = $newFileName;
            $return['image_path'] = $imagePath;
        }

        return $return;
    }

    public static function changeFileName($str) {
        $str = self::stripUnicode($str);
        $str = str_replace("?", "", $str);
        $str = str_replace("&", "", $str);
        $str = str_replace("'", "", $str);
        $str = str_replace("  ", " ", $str);
        $str = trim($str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
        $str = str_replace(" ", "-", $str);
        $str = str_replace("---", "-", $str);
        $str = str_replace("--", "-", $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('"', "", $str);
        $str = str_replace(":", "", $str);
        $str = str_replace("(", "", $str);
        $str = str_replace(")", "", $str);
        $str = str_replace(",", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace("%", "", $str);
        $str = str_replace("“", "", $str);
        $str = str_replace("”", "", $str);
        return $str;
    }

    public static function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '' => '?',
            '-' => '/'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }
    public static function encodeLink($string){
        $returnString = "";
        $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
        $charsLength = count($charsArray);
        $stringArray = str_split($string);
        $keyArray = str_split(hash('sha256',self::$privateKey));
        $randomKeyArray = array();
        while(count($randomKeyArray) < $charsLength){
            $randomKeyArray[] = $charsArray[rand(0, $charsLength-1)];
        }
        for ($a = 0; $a < count($stringArray); $a++){
            $numeric = ord($stringArray[$a]) + ord($randomKeyArray[$a%$charsLength]);
            $returnString .= $charsArray[floor($numeric/$charsLength)];
            $returnString .= $charsArray[$numeric%$charsLength];
        }
        $randomKeyEnc = '';
        for ($a = 0; $a < $charsLength; $a++){
            $numeric = ord($randomKeyArray[$a]) + ord($keyArray[$a%count($keyArray)]);
            $randomKeyEnc .= $charsArray[floor($numeric/$charsLength)];
            $randomKeyEnc .= $charsArray[$numeric%$charsLength];
        }
        return $randomKeyEnc.hash('sha256',$string).$returnString;
    }
    public static function decodeLink($string){
        $returnString = "";
        $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
        $charsLength = count($charsArray);
        $keyArray = str_split( hash( 'sha256', self::$privateKey ));
        $stringArray = str_split(substr($string, ( $charsLength * 2 ) + 64));
        $sha256 = substr( $string, ( $charsLength * 2 ), 64);
        $randomKeyArray = str_split( substr( $string, 0, $charsLength*2 ));
        $randomKeyDec = array();
        if(count($randomKeyArray) < 132) return false;
        for ($a = 0; $a < $charsLength*2; $a+=2){
            $numeric = array_search($randomKeyArray[$a],$charsArray) * $charsLength;
            $numeric += array_search($randomKeyArray[$a+1],$charsArray);
            $numeric -= ord($keyArray[floor($a/2)%count($keyArray)]);
            $randomKeyDec[] = chr($numeric);
        }
        for ($a = 0; $a < count($stringArray); $a+=2){
            $numeric = array_search($stringArray[$a],$charsArray) * $charsLength;
            $numeric += array_search($stringArray[$a+1],$charsArray);
            $numeric -= ord($randomKeyDec[floor($a/2)%$charsLength]);
            $returnString .= chr($numeric);
        }
        if(hash('sha256',$returnString) != $sha256){
            return false;
        }else{
            return $returnString;
        }
    }
}