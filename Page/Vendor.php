<?php
/**
 * DMOUNT REC PAGE VENDOR
 * =====================
 *
 * Page Vendor is a basic library for stylesheets and javascript. 
 * First, CSS is described in single settings, categorized by API and extensions.
 * Call them all as group, switched by head or footer param. The same is used for
 * Javascript, but here I'm organize tools, too.
 *
 *	Following API's are supported:
 *		- Bootstrap
 *		- FontAwesome
 *		- jQuery
 *		- Animated
 *		- Howler
 *
 *	Following Extensions are supported:
 *		- FullPage
 *		- 
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
class dmr_PageVendor {
	
	//Usages (Boolean)
	const USE_FONTAWESOME = true;
	const USE_BOOTSTRAP = true;
	const USE_JQUERY = true;
	const USE_ANIMATED = true;
	const USE_HOWLER = true;
	
	//
	const FILE_DIR_CSS = '/assets/static/css/vendor/';
	const FILE_DIR_JS = '/assets/static/js/vendor/';
	
	const MIN_JS = '.min.js';
	const MIN_CSS = '.min.css';
	
	//
	public $detect;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct($detect){
		
		$this->detect=$detect;
		
	}//Eof Construct

/**************************************************************************

Stylesheet Library

**************************************************************************/

/**
 * 
 *
 * @param 
 */	
	public function setCSS_FontAwesome(){
		return '<link href="'.self::FILE_DIR_CSS.'fontawesome-all-5.0.1'.self::MIN_CSS.'" rel="stylesheet">';	
	}//Eof Method "setCSS_FontAwesome"

/**
 * 
 *
 * @param 
 */	
	public function setCSS_BootsTrap(){
		return '<link href="'.self::FILE_DIR_CSS.'bootstrap-4.0.0'.self::MIN_CSS.'" rel="stylesheet">';
	}//Eof Method "setCSS_BootsTrap"
	
/**
 * 
 *
 * @param 
 */	
	public function setCSS_Animated(){
		return '<link href="'.self::FILE_DIR_CSS.'animate-3.5.2'.self::MIN_CSS.'" rel="stylesheet">';	
	}//Eof Method "setCSS_Animated"

/**************************************************************************

Stylesheet Library Extensions

**************************************************************************/

/**
 * 
 *
 * @param 
 */	
	public function setExtCSS_FullPage(){
		return (self::USE_JQUERY)?'<link href="'.self::FILE_DIR_CSS.'jquery.fullpage-2.9.5'.self::MIN_CSS.'" rel="stylesheet">':'';
	}//Eof Method "setExtCss_FullPage"

/**************************************************************************

JavaScript Library

**************************************************************************/
	
/**
 * 
 *
 * @param 
 */
	public function setJS_jQuery(){
		return (self::USE_JQUERY)?'<script src="'.self::FILE_DIR_JS.'jquery-3.2.1'.self::MIN_JS.'"></script>':'';
	}//Eof Method "setJS_jQuery"

/**
 * 
 *
 * @param 
 */
	public function setJS_Tether(){
		return '<script src="'.self::FILE_DIR_JS.'tether-1.3.3'.self::MIN_JS.'"></script>';	
	}//Eof Method ""

/**
 * 
 *
 * @param 
 */	
	public function setJS_BootsTrap(){
		return '<script src="'.self::FILE_DIR_JS.'bootstrap-4.0.0'.self::MIN_JS.'"></script>';
	}//Eof Method ""

/**
 * 
 *
 * @param 
 */	
	public function setJS_FontAwesome(){
		return '<script defer src="'.self::FILE_DIR_JS.'fontawesome-all-5.0.1'.self::MIN_JS.'"></script>';
	}//Eof Method ""

/**
 * 
 *
 * @param 
 */	
	public function setJS_Howler(){
		return '<script src="'.self::FILE_DIR_JS.'howler-2.0.7.core'.self::MIN_JS.'"></script>';
	}//Eof Method ""

/**************************************************************************

JavaScript Library Extensions

**************************************************************************/

/**
 * 
 *
 * @param 
 */
	public function setExtJS_jQueryAnimateCSS(){
		return (self::USE_JQUERY)?'<script src="'.self::FILE_DIR_JS.'jquery.animate-css.js"></script>':'';
	}//Eof Method ""
 
/**
 * 
 *
 * @param 
 */	
 /**
 * 
 *
 * @param 
 */
	public function setExtJS_jQueryFullpage(){
        return (self::USE_JQUERY)?'<script src="'.self::FILE_DIR_JS.'jquery.fullpage-2.9.5'.self::MIN_JS.'"></script>':'';
	}//Eof Method ""
    	
/**
 * 
 *
 * @param 
 */	
	public function setExtJS_HowlerSpatial(){
		return (self::USE_HOWLER)?'<script src="'.self::FILE_DIR_JS.'howler-2.0.7.spatial'.self::MIN_JS.'"></script>':'';
	}//Eof Method ""

/**************************************************************************

JavaScript Tools

**************************************************************************/

/**
 * 
 *
 * @param 
 */	
	public function setJS_Modernizer(){
		return '<script src="'.self::FILE_DIR_JS.'modernizr.js"></script>';
	}//Eof Method ""
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_ImagesLoaded(){
		return '<script src="'.self::FILE_DIR_JS.'imagesloaded.pkgd.js"></script>';
	}//Eof Method ""
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_iOsOrientationChange(){
		return '<script src="'.self::FILE_DIR_JS.'ios-orientationchange-fix.js"></script>';
	}//Eof Method ""

/**************************************************************************

Grouping

**************************************************************************/

/**
 * 
 *
 * @param 
 */		
	public function setCSS_Group($typeOf=NULL){
		
		switch($typeOf)
		{
			case 'head':
				return $this->setCSS_FontAwesome().
					   $this->setCSS_BootsTrap().
					   $this->setCSS_Animated();
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
		}
		
	}//Eof Method "setJS_Group"
	
/**
 * 
 *
 * @param 
 */	
	public function setSource($typeOf=NULL){
		
		return $this->setCSS_Group($typeOf).
			   $this->setCSS_Group($typeOf.'-extend').
			   $this->setJS_Group($typeOf).
			   $this->setJS_Group($typeOf.'-extend');
		
	}//Eof Method "setSource"
	
}//Eof Class "dmr_PageVendor"

?>