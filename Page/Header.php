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
namespace Dmount\SiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//Interface
require_once CORE.'Page'.DINT.'Header'.FINT;
 
class Header implements iHeader, iContent {
	
	const USE_SPLASH = true;
	const NAME_SPLASH = 'splash';
	const SUBTITLE_SPLASH = 'A BERLIN BASED WEBDEVELOPMENT, ART & MUSIC PROJECT';
	
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
		
		return '<!-- bof header -->
				<header class="container splash brand text-center">
					<h1 class="mt0">DMOUNT</h1>
					<hr class="text-black">
					<p class="text-black">WEB, ART & MUSIC PROJECT</p>
					<hr class="text-black">
				</header>
    			<!-- /eof header -->';
		
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
				return '<div id="'.$this->pageID.'" class="splash container'.$this->layout->cDepth2.'">
							<!-- bof header -->
							<header id="'.$this->pageHeaderID.'" class="container">
								<h1 id="'.$this->pageBrandID.'"></h1>
								<p id="'.$this->pageSubtitleID.'">'.self::SUBTITLE_SPLASH.'</p>
							</header>    
							<!-- /eof header -->
						</div>';
			}
			else return;
		} 
		
	}//Eof Method "setContent"
	
}//Eof Class "Header"

?>
