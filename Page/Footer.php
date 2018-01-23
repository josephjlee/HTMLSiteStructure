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
require_once CORE.'Page'.DINT.'jQuery'.FINT;
require_once CORE.'Page'.DINT.'Splash'.FINT;
require_once CORE.'Page'.DINT.'Brand'.FINT;
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
 * 
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
 * 
 *
 * @param 
 */	
	public function setContent(){

		return $this->jQuery_DocReady($this->brand()).$this->vendor->setJS_Group('footer');
		
	}//Eof Method "setContent"
	
}//Eof Class "Footer"

?>