<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Hash;
use App\Models\Settings;
use App\Models\ArticlesCate;
use App\Models\Articles;
use App\Models\District;
use App\Models\CustomLink;
use App\Models\Import;
use App\Models\Menu;
use Session;

class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Call function composerSidebar
		$this->composerMenu();	
		
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Composer the sidebar
	 */
	private function composerMenu()
	{		
		view()->composer( '*' , function( $view ){			
			
	        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
	        $articleCate = ArticlesCate::orderBy('display_order', 'desc')->get();     

        	$routeName = \Request::route()->getName();
        	//import
        	$tmp = Import::first();
        	if($tmp->date_import != date('Y-m-d')){        		
	        	foreach($articleCate as $cate){        		
	        		$list = Articles::where('cate_id', $cate->id)->where('status', 0)->limit(2)->get();
	        		foreach($list as $ar){
	        			$ar->update(['status'=> 1]);
	        		}
	        	}
	        	$tmp->update(['date_import' => date('Y-m-d')]);
        	}
			$view->with( ['settingArr' => $settingArr, 
			'articleCate' => $articleCate,
			'routeName' => $routeName
			] );			
		});
	}
	
}
