<?php
/**
 * CLASS :: VENDOR
 * =====================
 *
 * Page Vendor is a basic library for stylesheets and javascript. 
 * First, CSS is described in single settings, categorized by API and extensions.
 * Call them all as group, switched by head or footer param. The same is used for
 * Javascript, but here I'm organizing the tools, too.
 *
 *	Following API's are supported:
 *		- Bootstrap (js/css)
 *		- FontAwesome (js/css)
 *		- jQuery (js)
 *		- Animated (css)
 *		- Howler (js)
 *
 *	Following Extensions are supported:
 *		- jQuery: 
 *			- FullPage (js/css)
 *			- AnimateCSS (js)
 *		- Howler:
 *			- Spatial (js)
 *
 *	Following Tools are supported:
 *		- Modernizer
 *		- ImagesLoaded
 *		- iOsOrientationchange
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */ 
namespace Dmount\HTMLSiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//require interfaces and traits
require_once CORE.'Page'.DINT.'Vendor'.FINT;
require_once CORE.'Page'.DTRA.'VendorRessourceManagement.php';

class Vendor implements iVendor {
	
	const USE_VENDOR = true;
	
	// CDN Cloud
	const USE_CDN = false;
	
	//Configurations (Boolean)
	const USE_FONTAWESOME = true;
	const USE_BOOTSTRAP = true;
	const USE_JQUERY = true;
	const USE_ANIMATE = true;
	const USE_HOWLER = true;
	
	//
	const SUBDOMAIN = 'https://static.puretechno.de';
	
	//
	const FILE_DIR_CSS = '/assets/css/vendor/';
	const FILE_DIR_JS = '/assets/js/vendor/';
	
	const MIN_JS = '.min.js';
	const MIN_CSS = '.min.css';
	
	//
	public $detect;
	
	use VendorRessourceManagement;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(Mobile_Detect $detect=NULL){
		
		$this->detect=$detect;
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */
	private function subDomain(){
		
		return self::SUBDOMAIN;
		
	}//Eof Method "setSubDomain"

/**
 * 
 *
 * @param 
 */		
	public function setCSS_Group($typeOf=NULL){
		
		switch($typeOf)
		{
			case 'head':
				return ((self::USE_FONTAWESOME)?$this->setCSS_FontAwesome():'').
					   ((self::USE_BOOTSTRAP)?$this->setCSS_BootsTrap():'').
					   ((self::USE_ANIMATE)?$this->setCSS_Animate():'');
			break;
			case 'head-extend':
				return $this->setExtCSS_FullPage();
			break;
		}
		
	}//Eof Method "setCSS_Group"

/**
 * 
 *
 * @param 
 */	
	public function setJS_Group($typeOf=NULL){
		
		switch($typeOf){
			case 'head':
				return $this->setJS_jQuery().
					   $this->setJS_Tether().
					   $this->setJS_BootsTrap().
					   $this->setJS_FontAwesome();
				break;
			
			case 'head-extend':
				
				return $this->setExtJS_jQueryAnimateCSS().
					   $this->setExtJS_jQueryFullpage();
				
				break;
				
			case 'footer':
				return $this->setJS_Howler().
					   $this->setExtJS_HowlerSpatial().
					   $this->setJS_ImagesLoaded().
					   $this->setJS_iOsOrientationChange();
				break;
			case 'footer-extend':
				return false;
				break;
		}
		
	}//Eof Method "setJS_Group"
	
/**
 * 
 *
 * @param 
 */	
	public function setSource($typeOf=NULL){
		
		if(self::USE_VENDOR)
			return $this->setCSS_Group($typeOf).
				   $this->setCSS_Group($typeOf.'-extend').
				   $this->setJS_Group($typeOf).
				   $this->setJS_Group($typeOf.'-extend');
		
	}//Eof Method "setSource"
	
}//Eof Class "Vendor"

?>