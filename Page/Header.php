<?php
/**
 * CLASS :: HEADER
 * =====================
 *
 * Class Header is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//Interface
require_once CORE.'Page'.DINT.'Header'.FINT;
 
class Header implements iHeader, iContent {
	
	//
	const USE_COMMENTS = true;
	
	//
	const BRAND_TITLE_MOBILE = 'DMOUNT';
	
	//
	const USE_SPLASH = true;
	const NAME_SPLASH = 'splash';
	const SUBTITLE_SPLASH = 'A BERLIN BASED WEBDEVELOPMENT, ART & MUSIC PROJECT';//<put your subtitle here>
	const SUBTITLE_SPLASH_MOBILE = 'WEB, ART & MUSIC PROJECT';//<put your subtitle here>
	
	//
	public $pageID;
	public $pageHeaderID; 
	public $pageSubtitleID; 
	public $pageBrandID;
	
	//
	public $detect;
	public $layout;

/**
 * 
 *
 * @param 
 */	
	public function __construct(
								Mobile_Detect $detect=NULL,
								Layout $layout=NULL
								)
	{
		
		$this->detect = $detect;
		$this->layout = $layout;
		$this->setPageID();
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */	
	public function setPageID(){
		
		if(self::USE_SPLASH)
		{
			$this->pageID = 'page-splash';
			$this->pageHeaderID = 'page-splash-header';
			$this->pageSubtitleID = 'page-splash-subtitle';
			$this->pageBrandID = 'page-splash-brand';
		}
		else
		{
			$this->pageID = 'page-header-container';
			$this->pageHeaderID = 'page-header';
			$this->pageSubtitleID = 'page-subtitle';
			$this->pageBrandID = 'page-brand';
		}
		
	}//Eof Method "getPageID"

/**
 * 
 *
 * @param 
 */	
	public function setMobileContent(){
		
		return (self::USE_COMMENTS)?"\t\t".'<!-- bof header -->.'.PHP_EOL:''.
			   						"\t\t".'<header class="container splash brand text-center">'.PHP_EOL.
			   						"\t\t\t".'<h1 class="mt0">'.self::BRAND_TITLE_MOBILE.'</h1>'.PHP_EOL.
			   						"\t\t\t".'<hr class="text-black">'.PHP_EOL.
			   						"\t\t\t".'<p class="text-black">'.self::SUBTITLE_SPLASH_MOBILE.'</p>'.PHP_EOL.
			   						"\t\t\t".'<hr class="text-black">'.PHP_EOL.
			   						"\t\t".'</header>'.PHP_EOL.
    		    (self::USECOMMENTS)?"\t\t".'<!-- /eof header -->'.PHP_EOL:'';
		
	}//Eof Method "setMobileContent"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){
			
		// Exclude tablets.
		if($this->detect->isMobile()){
			
			$this->setMobileContent();
			
		} 
		else 
		{
			if(self::USE_SPLASH)
			{
				return "\t\t".'<div id="'.$this->pageID.'" class="splash container'.$this->layout->cDepth2.'">'.PHP_EOL.
					   "\t\t\t".'<!-- bof header -->'.PHP_EOL.
					   "\t\t\t".'<header id="'.$this->pageHeaderID.'" class="container">'.PHP_EOL.
					   "\t\t\t\t".'<h1 id="'.$this->pageBrandID.'"></h1>'.PHP_EOL.
					   "\t\t\t\t".'<p id="'.$this->pageSubtitleID.'">'.self::SUBTITLE_SPLASH.'</p>'.PHP_EOL.
					   "\t\t\t".'</header>'.PHP_EOL.    
					   "\t\t\t".'<!-- /eof header -->'.PHP_EOL.
					   "\t\t".'</div>'.PHP_EOL;
			}
			else return;
		} 
		
	}//Eof Method "setContent"
	
}//Eof Class "Header"

?>