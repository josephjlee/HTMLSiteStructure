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
namespace Dmount\HTMLSiteStructure;

//Interface
require_once CORE.'Page'.DINT.'Content'.FINT;
require_once CORE.'Page'.DINT.'Page'.FINT;
require_once CORE.'Page'.DINT.'Html'.FINT;
require_once CORE.'Page'.DINT.'jQuery'.FINT;

//Trait
require_once CORE.'Page'.DTRA.'HtmlRessourceManagement'.FTRA;
require_once CORE.'Page'.DTRA.'JavascriptRessourceManagement'.FTRA;
require_once CORE.'Page'.DTRA.'BrandRessourceManagement'.FTRA;
require_once CORE.'Page'.DTRA.'SplashRessourceManagement'.FTRA;

//Page Config & Meta
require_once CORE.'Page/Meta.php'; $meta = new Meta($detect);
require_once CORE.'Page/Vendor.php'; $vendor = new Vendor();
require_once CORE.'Page/Layout.php'; $layout = new Layout($detect);
require_once CORE.'Page/Theme.php'; $theme = new Theme($detect);
//Page Content
require_once CORE.'Page/Preloader.php'; $preloader = new Preloader($detect,$layout);
require_once CORE.'Page/Header.php'; $header = new Header($detect,$layout);
require_once CORE.'Page/Navigation.php'; $navigation = new Navigation($detect,$layout);
require_once CORE.'Page/Sections.php'; $sections = new Sections($detect,$layout);
require_once CORE.'Page/Footer.php'; $footer = new Footer($detect,$layout,$vendor,$navigation);

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
 * Placeholder method
 *
 * @param 
 */	
	public function setPageID(){/*ACTUALLY NOT DEFINED*/}//Eof Method "setPageID"

/**
 * 
 *
 * @param 
 */		
	public function doctype(){
		
		return '<!doctype html>'.PHP_EOL;

	}//Eof Method "doctype"
	
/**
 * 
 *
 * @param 
 */	
	public function browserUpgrade(){
		
		return "\t\t".'<!--[if lte IE 9]>'.PHP_EOL.
			   "\t\t".'<p class="browserupgrade">'.PHP_EOL.
			   "\t\t\t".'You are using an <strong>outdated</strong> browser. '.PHP_EOL.
			   "\t\t\t".'Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.'.PHP_EOL.
			   "\t\t".'</p>'.PHP_EOL.
			   "\t\t".'<![endif]-->'.PHP_EOL;
		
	}//Eof Method "browserUpgrade"


/**
 * 
 *
 * @param 
 */	
	public function head(){
	
		return "\t".'<head>'.PHP_EOL.
				$this->meta->setContent().
				$this->vendor->setSource('head').
				$this->theme->setSource().
				$this->vendor->setJS_Modernizer().
				"\t".'<head>'.PHP_EOL;
				
	}//Eof Method "head"

/**
 * 
 *
 * @param 
 */		
	public function body(){
	
		$classes="color--scheme font--scheme";
	
		return "\t".'<body class="'.$classes.'">'.PHP_EOL.
				$this->browserUpgrade().
				$this->preloader->setContent().
				$this->header->setContent().
				$this->navigation->setContent().
				$this->sections->setContent().
				$this->layout->setContent().
				$this->footer->setContent().
				"\t".'</body>'.PHP_EOL;
		
	}//Eof Method "body"

/**
 * 
 *
 * @param 
 */		
	public function html(){
		
		return '<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""><![endif]-->'.PHP_EOL.
			   '<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""><![endif]-->'.PHP_EOL.
			   '<!--[if IE 8]><html class="no-js lt-ie9" lang=""><![endif]-->'.PHP_EOL.
			   '<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->'.PHP_EOL.
				$this->head().$this->body().
			   '</html>';
		
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