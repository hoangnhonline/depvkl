<?php 
set_time_limit(0);
try {
    $pdo = new PDO( 'mysql:dbname=depvkl;host=localhost', 'root', '');
} catch (PDOException $e) {
	print('Error:'.$e->getMessage());
	die();
}
require "simple_html_dom.php";
$arrSiteLink = array(
	'redtube' => array(
			'https://www.redtube.com/redtube/teens',
			'https://www.redtube.com/redtube/squirting',
			'https://www.redtube.com/redtube/public',
			'https://www.redtube.com/redtube/japanese'
		),
	'xnxx' => array(
			'https://www.xnxx.com/search/18+virgin+sex?top',
			'https://www.xnxx.com/search/virgin?top',
			'https://www.xnxx.com/search/japanese+family?top',
			'https://www.xnxx.com/search/gay',
			'https://www.xnxx.com/search/lesbian'
		),	
	// 'xhamster' => array(
	// 		'https://xhamster.com/categories/anal',
	// 		'https://xhamster.com/tags/hot-teens',
	// 		'https://xhamster.com/categories/group-sex'
	// 	),
	'xvideos' => array(
			'https://www.xvideos.com/?k=rape%E5%BC%BA%E5%A5%B8&top',
			'https://www.xvideos.com/lang/viet_nam',
			'https://www.xvideos.com/gay',
			'https://www.xvideos.com/c/Lesbian-26',
			'https://www.xvideos.com/c/Ass-14'
		),
);
foreach($arrSiteLink as $site_name => $arrLink){
	switch ($site_name) {		
		case 'redtube':
			$arrLinkReturn = getLinkRedtube($arrLink);
			break;
		case 'xnxx':
			$arrLinkReturn = getLinkXnxx($arrLink);
			break;		
		case 'xhamster':
			$arrLinkReturn = getLinkXhamster($arrLink);
			break;
		default:
			$arrLinkReturn = getLinkXvideos($arrLink);
			break;
	}
	foreach($arrLinkReturn as $link){
		echo $link['video_id'];
		insertArticles($link);
	}
}
die;

function getLinkRedtube($arrLink){
	$linkArr=array();
	foreach($arrLink as $url){		

		echo "<h4>".$url."</h4>";
		$ch = curl_init();
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
      	
        curl_close($ch);
        // Create a DOM object
        $crawler = new simple_html_dom();
        // Load HTML from a string
        $crawler->load($result);
		$domain = "https://www.redtube.com";
		foreach ($crawler->find(".videoblock_list") as $div){
			$video_url = $domain.$div->find('.video_title', 0)->find('a', 0)->href;
			$check = checkLinkExist($video_url);
			if($check == 0){
				// get id video
				$tmp = explode("_",$div->attr['id']);
				$videoID = $tmp['1'];
			
				if($videoID > 0){					
					if($div->find('.video_title', 0)->find('a', 0)){							
							$linkArr[$videoID]['video_id'] = $videoID;
							
							$timeText = trim($div->find('.duration', 0)->plaintext);
							
							$linkArr[$videoID]['duration'] = trim(substr($timeText, 5));		
							$linkArr[$videoID]['video_url'] = 	$video_url;						
							$thumnailUrl = str_replace("eGJF8f", "eaAaGwFb", $div->find('a.video_link img', 0)->attr['data-thumb_url']);						

							$linkArr[$videoID]['image_url'] = $thumnailUrl;
							// get title
							$linkArr[$videoID]['title'] = $div->find('.video_title', 0)->find('a', 0)->plaintext;
							$linkArr[$videoID]['site_name'] = 'redtube';
							$linkArr[$videoID]['status'] = 2;
							
					}
				}
			}			
						
		}
		
		$crawler->clear(); //lenh xoa cache Dom, neu khong co ham nay thi bo nho ram se day
		unset($crawler);
	}
	return $linkArr;
}
function getLinkXvideos($arrLink) {	
	$linkArr=array();
	foreach($arrLink as $url){	
		$k = 0;	
		echo "<h4>".$url."</h4>";
		$ch = curl_init();
	    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
	    curl_setopt( $ch, CURLOPT_URL, $url );
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $result = curl_exec($ch);
	  //	var_dump($result);die;
	    curl_close($ch);
	    // Create a DOM object
	    $crawler = new simple_html_dom();
	    // Load HTML from a string
	    $crawler->load($result);
		$domain = "http://www.xvideos.com";
		foreach ($crawler->find(".thumb-block") as $div){
			//var_dump( $div->innertext);die;
				// get id video
			$video_url = $domain.$div->find('p', 0)->find('a',0)->href;
			
			$check = checkLinkExist($video_url);
			if($check == 0){
				$tmp = explode("_",$div->attr['id']);
				$videoID = $tmp['1'];
				if($videoID > 0){
					if($div->find('p', 0)->find('a',0)){
						
						$linkArr[$videoID]['video_id'] = $videoID;
						$linkArr[$videoID]['duration'] = trim($div->find('span.duration', 0)->plaintext);	
						$linkArr[$videoID]['video_url'] = $video_url;
						// get thumnail 
						$thumnailUrl = $div->find('.thumb', 0)->find('img', 0)->attr['data-src'];
						$linkArr[$videoID]['image_url'] = str_replace("thumbs169", "thumbsll", $thumnailUrl);		
						// get title
						$linkArr[$videoID]['title'] = $div->find('p', 0)->find('a',0)->plaintext;		
						$linkArr[$videoID]['site_name'] = 'xvideos';
						$linkArr[$videoID]['status'] = 2;		
						
					}
				}
			
			}
						
		}
		
		$crawler->clear(); //lenh xoa cache Dom, neu khong co ham nay thi bo nho ram se day
		unset($crawler);
	}
	return $linkArr;
}
function getLinkXnxx($arrLink) {	
	$linkArr=array();
	foreach($arrLink as $url){	
		$k = 0;	
		echo "<h4>".$url."</h4>";
		$ch = curl_init();
	    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
	    curl_setopt( $ch, CURLOPT_URL, $url );
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $result = curl_exec($ch);
	  //	var_dump($result);die;
	    curl_close($ch);
	    // Create a DOM object
	    $crawler = new simple_html_dom();
	    // Load HTML from a string
	    $crawler->load($result);
		$domain = "https://www.xnxx.com";
		foreach ($crawler->find(".thumb-block") as $div){
			//var_dump( $div->innertext);die;
				// get id video
			$video_url = $domain.$div->find('p', 0)->find('a',0)->href;
			
			$check = checkLinkExist($video_url);
			if($check == 0){
				$tmp = explode("_",$div->attr['id']);
				$videoID = $tmp['1'];
				if($videoID > 0){
					if($div->find('p', 0)->find('a',0)){
						$timeText =  trim($div->find('span.duration', 0)->plaintext);
						$timeText = str_replace("(", "", $timeText);
						$timeText = str_replace(")", "", $timeText);
						$linkArr[$videoID]['video_id'] = $videoID;
						$linkArr[$videoID]['duration'] = $timeText;	
						$linkArr[$videoID]['video_url'] = $video_url;
						// get thumnail 
						$thumnailUrl = $div->find('.thumb', 0)->find('img', 0)->attr['data-src'];
						$linkArr[$videoID]['image_url'] = str_replace("thumbs169xnxx", "thumbs169xnxxlll", $thumnailUrl);		
						// get title
						$linkArr[$videoID]['title'] = $div->find('p', 0)->find('a',0)->plaintext;		
						$linkArr[$videoID]['site_name'] = 'xnxx';
						$linkArr[$videoID]['status'] = 2;		
						
					}
				}
			}
						
		}
		
		$crawler->clear(); //lenh xoa cache Dom, neu khong co ham nay thi bo nho ram se day
		unset($crawler);
	}
	return $linkArr;
}
function getLinkXhamster($arrLink) {	
	$linkArr=array();
	foreach($arrLink as $url){	
		$k = 0;	
		echo "<h4>".$url."</h4>";
		$ch = curl_init();
	    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
	    curl_setopt( $ch, CURLOPT_URL, $url );
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    $result = curl_exec($ch);
	  //	var_dump($result);die;
	    curl_close($ch);
	    // Create a DOM object
	    $crawler = new simple_html_dom();
	    // Load HTML from a string
	    $crawler->load($result);
		$domain = "https://www.xnxx.com";
		foreach ($crawler->find(".thumb-block") as $div){
			//var_dump( $div->innertext);die;
				// get id video
			$video_url = $domain.$div->find('p', 0)->find('a',0)->href;
			
			$check = checkLinkExist($video_url);
			if($check == 0){
				$tmp = explode("_",$div->attr['id']);
				$videoID = $tmp['1'];
				if($videoID > 0){
					if($div->find('p', 0)->find('a',0)){
						$timeText =  trim($div->find('span.duration', 0)->plaintext);
						$timeText = str_replace("(", "", $timeText);
						$timeText = str_replace(")", "", $timeText);
						$linkArr[$videoID]['video_id'] = $videoID;
						$linkArr[$videoID]['duration'] = $timeText;	
						$linkArr[$videoID]['video_url'] = $video_url;
						// get thumnail 
						$thumnailUrl = $div->find('.thumb', 0)->find('img', 0)->attr['data-src'];
						$linkArr[$videoID]['image_url'] = str_replace("thumbs169xnxx", "thumbs169xnxxlll", $thumnailUrl);		
						// get title
						$linkArr[$videoID]['title'] = $div->find('p', 0)->find('a',0)->plaintext;		
						$linkArr[$videoID]['site_name'] = 'xnxx';
						$linkArr[$videoID]['status'] = 2;		
						
					}
				}
			}
						
		}
		
		$crawler->clear(); //lenh xoa cache Dom, neu khong co ham nay thi bo nho ram se day
		unset($crawler);
	}
	return $linkArr;
}
function insertArticles($data){
	try{			
		global $pdo;
		$smt = $pdo->prepare('INSERT INTO articles (title, site_name, image_url, video_url, video_id, status,duration) VALUES (?, ?, ?, ?, ?, ?, ?)' );
		$smt->bindParam(1, $data['title'], PDO::PARAM_STR);			
		$smt->bindParam(2, $data['site_name'], PDO::PARAM_STR);
		$smt->bindParam(3, $data['image_url'], PDO::PARAM_STR);
		$smt->bindParam(4, $data['video_url'], PDO::PARAM_STR);
		$smt->bindParam(5, $data['video_id'], PDO::PARAM_STR);
		$smt->bindParam(6, $data['status'], PDO::PARAM_STR);			
		$smt->bindParam(7, $data['duration'], PDO::PARAM_STR);			
		$smt->execute();
	}
	catch(Exception $e)
	{
		//print_r($e->getMessage());
	}
}
function checkLinkExist($video_url){
	try{
		global $pdo;
		$smt = $pdo->prepare("SELECT id FROM articles 
								WHERE video_url = ?	");			
		$smt->bindParam(1, $video_url, PDO::PARAM_STR);
		$smt->execute();
		$result = $smt->fetch(PDO::FETCH_ASSOC);

		return !empty($result) ? $result['id'] : 0;	
	}
	catch(Exception $e)
	{
		
	}
}
?>

