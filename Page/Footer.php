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


class Footer implements iFooter, iContent, iSplash, iBrand, jQuery, iHtml {
	
	//Define Id's
	const MAIN_NAME_ID = 'page';
	
	//Configuration (boolean)
	const USE_COMMENTS = false;
	const USE_SPLASH = true;
	
	//Configuration (mixed values)
	const NAME_SPLASH = 'splash';
	const STEPS = 2;
	
	//Var
	public $headerContainerId;
	public $headerId; 
	public $subtitleId; 
	public $brandId;
	
	//
	private $animations=array();
	private $step;
	private $bid;
	private $hid;
	private $hcid;
	//private $step;
	private $c;
	
	//Html declarations
	private $tabs;
	private $eol;

	//Class Objects
	public $detect;
	public $layout;
	public $vendor;
	public $navigation;

	//Trait		
	use	RessourceManagement\SplashRessourceManagement,
		RessourceManagement\BrandRessourceManagement,
		RessourceManagement\JavaScriptRessourceManagement,
		RessourceManagement\HtmlRessourceManagement;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(
								Mobile_Detect $detect=NULL,
								Layout $layout=NULL,
								Vendor $vendor=NULL,
								Navigation $navigation=NULL
								)
	{
		
		$this->detect = $detect;
		$this->layout = $layout;
		$this->vendor = $vendor;
		$this->navigation = $navigation;
		
		$this->getPageID();
		$this->nice(2);
		
		$this->step=0;
		
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
 * the last two tweens in splash screen.
 *
 * @param 
 */
	public function setPageID(){
		
		$id = 'page';
		$s = '-';
		$pound = (!self::USE_SPLASH)?'#':'';
		$prefix = $pound.$id.$s;
		$this->headerContainerId = $prefix.'header'.$s.'container';
		$this->headerId = $prefix.'header';
		$this->subtitleId = $prefix.'subtitle';
		$this->brandId = $prefix.'brand';
		
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

		$jContent='';
		$jContent.=$this->brand();
		$jContent.=$this->navigation->jTabs();
		return $this->jQuery_DocReady().$this->vendor->setJS_Group('footer');
		
	}//Eof Method "setContent"
	
}//Eof Class "Footer"

?>