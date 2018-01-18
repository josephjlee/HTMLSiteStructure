<?php
/**
 * CLASS :: FOOTER
 * =====================
 *
 * Class Footer is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\SiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};
 
//Loading interface & traits
require_once CORE.'Page'.DINT.'Footer'.FINT;
require_once CORE.'Page'.DTRA.'ScreenRessourceManagement'.FTRA;

class Footer implements iFooter, iContent {
	
	//Configuration
	const USE_COMMENTS = false;
	const USE_SPLASH = true;
	const NAME_SPLASH = 'splash';
	
	//
	public $pageID;
	public $pageHeaderID; 
	public $pageSubtitleID; 
	public $pageBrandID;

	//
	public $detect;
	public $layout;
	public $vendor;

	//Trait
	use ScreenRessourceManagement;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(
								Mobile_Detect $detect=NULL,
								Layout $layout=NULL,
								Vendor $vendor=NULL
								)
	{
		
		$this->detect = $detect;
		$this->layout = $layout;
		$this->vendor = $vendor;
		
		$this->getPageID();
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */
	public function getPageID(){
		
		if(self::USE_SPLASH)
		{
			$this->pageID = '#page-'.self::NAME_SPLASH;
			$this->pageHeaderID = '#page-'.self::NAME_SPLASH.'-header';
			$this->pageSubtitleID = '#page-'.self::NAME_SPLASH.'-subtitle';
			$this->pageBrandID = '#page-'.self::NAME_SPLASH.'-brand';
		}
		else $this->setPageID();
		
	}//Eof Method "getPageID"

/**
 * 
 *
 * @param 
 */
	public function setPageID(){
		
		$pound=(!self::USE_SPLASH)?'#':'';
		$this->pageID = $pound.'page-header-container';
		$this->pageHeaderID = $pound.'page-header';
		$this->pageSubtitleID = $pound.'page-subtitle';
		$this->pageBrandID = $pound.'page-brand';
		
	}//Eof Method "setPageID"

/**
 * If jQuery is used:
 *	- create the brand object
 * 	- includes the splash screen animation, if used
 *
 * @param 
 */
	public function jQuery_DocReady(){
		
		return '<script>
				$(document).ready(function(){
					var pageBrand=new Brand;
					var timeoutSteps=5000;
					$(\''.$this->pageBrandID.'\').addClass(\'brand\');
					$(\''.$this->pageSubtitleID.'\').addClass(\'subtitle fal fa-lg animated zoomInLeft\');
					'.(self::USE_SPLASH?$this->setScreen():'').'
				});/* /eof document.ready */
    			</script>';
		
	}//Eof Function "jQuery_DocReady"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){

		return $this->jQuery_DocReady().$this->vendor->setJS_Group('footer');
		
	}//Eof Method "setContent"
	
}//Eof Class "Footer"

?>