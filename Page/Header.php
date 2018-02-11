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
	
	//Define constant brand values
	const BRAND_TITLE_MOBILE = 'DMOUNT';
	
	//Define constant splash values
	const USE_SPLASH = true;
	const NAME_SPLASH = 'splash';
	
	//Define constant subtitle values
	const USE_RANDOM_SUBTITLE = true;
	const SUBTITLE_SPLASH = 'A BERLIN BASED WEBDEVELOPMENT, ART & MUSIC PROJECT';//<put your subtitle here>
	const SUBTITLE_SPLASH_MOBILE = 'WEB, ART & MUSIC PROJECT';//<put your subtitle here>
	
	//
	public $headerContainerId;
	public $headerId; 
	public $subtitleId; 
	public $brandId;
	
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
 * @return string
 */	
	public function getRandomSubtitle(array $arr){
		
		$a=$arr;
		$str=$a[mt_rand(0,count($a)-1)];
		return $str;
		
	}//Eof Method "getRandomSubtitle"

/**
 * 
 *
 * @param 
 */	
	public function setPageID(){
		
		$id='page';
		$s='-';
		$spl=self::NAME_SPLASH;
		if(self::USE_SPLASH)
		{
			$this->headerContainerId = $id.$s.$spl.$s.'container';
			$this->headerId = $id.$s.$spl.$s.'header';
			$this->subtitleId = $id.$s.$spl.$s.'subtitle';
			$this->brandId = $id.$s.$spl.$s.'brand';
		}
		else
		{
			$this->headerContainerId = $id.$s.'header'.$s.'container';
			$this->headerId = $id.$s.'header';
			$this->subtitleId = $id.$s.'subtitle';
			$this->brandId = $id.$s.'brand';
		}
		
	}//Eof Method "getPageID"

/**
 * 
 *
 * @param 
 */	
	public function setMobileContent(){
		
		return (self::USE_COMMENTS)?"\t\t".'<!-- bof header -->.'."\n":''.
			   						"\t\t".'<header class="container splash brand text-center">'."\n".
			   						"\t\t\t".'<h1 class="mt0">'.self::BRAND_TITLE_MOBILE.'</h1>'."\n".
			   						"\t\t\t".'<hr class="text-black">'."\n".
			   						"\t\t\t".'<p class="text-black">'.self::SUBTITLE_SPLASH_MOBILE.'</p>'."\n".
			   						"\t\t\t".'<hr class="text-black">'."\n".
			   						"\t\t".'</header>'."\n".
    		    (self::USE_COMMENTS)?"\t\t".'<!-- /eof header -->'."\n":'';
		
	}//Eof Method "setMobileContent"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){
			
		// Exclude tablets.
		if($this->detect->isMobile())
		{
			
			$this->setMobileContent();
			
		} 
		else 
		{
			if(self::USE_SPLASH)
			{
				$arrSubtitles=array('BERLIN BASED ART ADVISING','BERLIN BASED TECHNO','BERLIN BASED WEB DEVELOPMENT');
				$randomSubtitle=$this->getRandomSubtitle($arrSubtitles);
				$subtitle=(self::USE_RANDOM_SUBTITLE)?$randomSubtitle:self::SUBTITLE_SPLASH;
				return "\t\t".'<div id="'.$this->headerContainerId.'" class="splash container'.$this->layout->cDepth2.'">'."\n".
					   "\t\t\t".'<!-- bof header -->'."\n".
					   "\t\t\t".'<header id="'.$this->headerId.'" class="container">'."\n".
					   "\t\t\t\t".'<h1 id="'.$this->brandId.'"></h1>'."\n".
					   "\t\t\t\t".'<p id="'.$this->subtitleId.'">'.$subtitle.'</p>'."\n".
					   "\t\t\t".'</header>'."\n".    
					   "\t\t\t".'<!-- /eof header -->'."\n".
					   "\t\t".'</div>'."\n";
			}
			else return;
		} 
		
	}//Eof Method "setContent"
	
}//Eof Class "Header"

?>