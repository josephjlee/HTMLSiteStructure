<?php
/**
 * CLASS :: PAGE
 * =====================
 *
 * Page is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\SiteStructure;

//Interface
require_once CORE.'Page'.DINT.'Content'.FINT;
require_once CORE.'Page'.DINT.'Page'.FINT;

//Page Config & Meta
require_once CORE.'Page/Meta.php'; $meta = new Meta($detect);
require_once CORE.'Page/Vendor.php'; $vendor = new Vendor($detect);
require_once CORE.'Page/Layout.php'; $layout = new Layout($detect);
require_once CORE.'Page/Theme.php'; $theme = new Theme($detect);
//Page Content
require_once CORE.'Page/Preloader.php'; $preloader = new Preloader($detect,$layout);
require_once CORE.'Page/Header.php'; $header = new Header($detect,$layout);
require_once CORE.'Page/Navigation.php'; $navigation = new Navigation($detect,$layout);
require_once CORE.'Page/Sections.php'; $sections = new Sections($detect,$layout);
require_once CORE.'Page/Footer.php'; $footer = new Footer($detect,$layout,$vendor);


class Page implements iPage, iContent {
	
	public $meta,$vendor,$theme,$preloader,$header,$navigation,$sections,$layout,$footer;

/**
 * Construct an instance of this class
 *
 * @param 
 */	
	public function __construct(
								Meta $meta,
								Vendor $vendor,
								Theme $theme,
								Preloader $preloader,
								Header $header,
								Navigation $navigation,
								Sections $sections,
								Layout $layout,
								Footer $footer
								)
	{
		
		$this->meta = $meta;
		$this->vendor = $vendor;
		$this->theme = $theme;
		$this->preloader = $preloader;
		$this->header = $header;
		$this->navigation = $navigation;
		$this->sections = $sections;
		$this->layout = $layout;
		$this->footer = $footer;
	
		$this->setContent();
	
	}//Eof Construct

/**
 * 
 *
 * @param 
 */		
	public function doctype(){
		
		return '<!doctype html>';

	}//Eof Method "doctype"
	
/**
 * 
 *
 * @param 
 */	
	public function browserUpgrade(){
		
		return '<!--[if lte IE 9]>
				<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
				<![endif]-->';
		
	}//Eof Method "browserUpgrade"


/**
 * 
 *
 * @param 
 */	
	public function head(){
	
		return '<head>'.
				$this->meta->setContent().
				$this->vendor->setSource('head').
				$this->theme->setSource().
				$this->vendor->setJS_Modernizer().
				'<head>';
				
	}//Eof Method "head"

/**
 * 
 *
 * @param 
 */		
	public function body(){
	
		return '<body class="color--scheme font--scheme">
				'.$this->browserUpgrade().
				  $this->preloader->setContent().
				  $this->header->setContent().
				  $this->navigation->setContent().
				  $this->sections->setContent().
				  $this->layout->setContent().
				  $this->footer->setContent().'
				</body>';
		
	}//Eof Method "body"

/**
 * 
 *
 * @param 
 */		
	public function html(){
		
		return '<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""><![endif]-->
				<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""><![endif]-->
				<!--[if IE 8]><html class="no-js lt-ie9" lang=""><![endif]-->
				<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
				'.$this->head().$this->body().'
				</html>';
		
	}//Eof Method "html"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){
		
		echo $this->doctype().$this->html();
		
	}//Eof Method "setContent"
	
}//Eof Class "Page"

?>
