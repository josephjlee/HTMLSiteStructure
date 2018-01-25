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
namespace Dmount\HTMLSiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};
 
//Loading interface & traits
require_once CORE.'Page'.DINT.'Footer'.FINT;
require_once CORE.'Page'.DINT.'Splash'.FINT;
require_once CORE.'Page'.DINT.'Brand'.FINT;
require_once CORE.'Page'.DINT.'jQuery'.FINT;
require_once CORE.'Page'.DTRA.'JavascriptRessourceManagement'.FTRA;
require_once CORE.'Page'.DTRA.'BrandRessourceManagement'.FTRA;
require_once CORE.'Page'.DTRA.'SplashRessourceManagement'.FTRA;

class Footer implements iFooter, iContent, iSplash, iBrand, jQuery {
	
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
	private $animTypes=array();

	//
	public $detect;
	public $layout;
	public $vendor;

	//Trait		
	use	RessourceManagement\SplashRessourceManagement,
		RessourceManagement\BrandRessourceManagement,
		RessourceManagement\JavaScriptRessourceManagement;

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
 * Callback method for splash screen.
 * Get page id's from html body, when splash is used
 * otherwise set page id without the usage of splash
 *
 * @param 
 */
	public function getPageID(){
		
		if(self::USE_SPLASH)
		{
			$this->setSplashID();
		}
		else $this->setPageID();
		
	}//Eof Method "getPageID"

/**
 * Set page id's for header, brand and subtitle.
 * If splash is used, this method sets a pound for
 * the last tween in splash screen.
 *
 * @param 
 */
	public function setPageID(){
		
		$prefixID='page';
		$seperatorID='-';
		$pound=(!self::USE_SPLASH)?'#':'';
		$this->pageID = $pound.$prefixID.$seperatorID.'header-container';
		$this->pageHeaderID = $pound.$prefixID.$seperatorID.'header';
		$this->pageSubtitleID = $pound.$prefixID.$seperatorID.'subtitle';
		$this->pageBrandID = $pound.$prefixID.$seperatorID.'brand';
		
	}//Eof Method "setPageID"

/**
 * Set the content.
 * Returns the jQuery document.ready functionality, if used
 * and let load the sources for javascript api, extensions and tools in group
 * sorted and described in vendor class
 *
 * @param 
 */	
	public function setContent(){

		return $this->jQuery_DocReady($this->brand()).$this->vendor->setJS_Group('footer');
		
	}//Eof Method "setContent"
	
}//Eof Class "Footer"

?>