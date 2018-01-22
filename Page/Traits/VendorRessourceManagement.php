<?php

namespace Dmount\HTMLSiteStructure;

trait VendorRessourceManagement {

/**************************************************************************

Stylesheet Library

**************************************************************************/

/**
 * 
 *
 * @param 
 */	
	public function setCSS_FontAwesome(){
		
		return '<link href="'.$this->subDomain().
							 self::FILE_DIR_CSS.
							 'fontawesome-all-5.0.1'.
							 self::MIN_CSS.'" rel="stylesheet">';
							 	
	}//Eof Method "setCSS_FontAwesome"

/**
 * 
 *
 * @param 
 */	
	public function setCSS_BootsTrap(){
		
		if(self::USE_CDN)
		{
			return '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap'.self::MIN_CSS.'" rel="stylesheet">';
		}
		else return '<link href="'.$this->subDomain().
							 	  self::FILE_DIR_CSS.
							 	  'bootstrap-4.0.0'.
							 	  self::MIN_CSS.'" rel="stylesheet">';
							 
	}//Eof Method "setCSS_BootsTrap"
	
/**
 * 
 *
 * @param 
 */	
	public function setCSS_Animate(){
		
		if(self::USE_CDN)
		{
			return '<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate'.self::MIN_CSS.'" rel="stylesheet" >';
		}
		else return '<link href="'.$this->subDomain().
								  self::FILE_DIR_CSS.
								  'animate-3.5.2'.
								  self::MIN_CSS.'" rel="stylesheet">';
								   
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
		
		return (self::USE_JQUERY)?'<link href="'.$this->subDomain().
												self::FILE_DIR_CSS.
												'jquery.fullpage-2.9.5'.
												self::MIN_CSS.'" rel="stylesheet">':'';
	
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
		
		return (self::USE_JQUERY)?'<script src="'.$this->subDomain().
												 self::FILE_DIR_JS.
												 'jquery-3.2.1'.
												 self::MIN_JS.'"></script>':'';
												 
	}//Eof Method "setJS_jQuery"

/**
 * 
 *
 * @param 
 */
	public function setJS_Tether(){
		
		return '<script src="'.$this->subDomain().
							 self::FILE_DIR_JS.
							 'tether-1.3.3'.
							 self::MIN_JS.'"></script>';
							 	
	}//Eof Method "setJS_Tether"

/**
 * 
 *
 * @param 
 */	
	public function setJS_BootsTrap(){
		
		return '<script src="'.$this->subDomain().
							  self::FILE_DIR_JS.
							  'bootstrap-4.0.0'.
							  self::MIN_JS.'"></script>';
							  
	}//Eof Method "setJS_BootsTrap"

/**
 * 
 *
 * @param 
 */	
	public function setJS_FontAwesome(){
		return '<script defer src="'.$this->subDomain().self::FILE_DIR_JS.'fontawesome-all-5.0.1'.self::MIN_JS.'"></script>';
	}//Eof Method "setJS_FontAwesome"

/**
 * 
 *
 * @param 
 */	
	public function setJS_Howler(){
		return '<script src="'.$this->subDomain().self::FILE_DIR_JS.'howler-2.0.7.core'.self::MIN_JS.'"></script>';
	}//Eof Method "setJS_Howler"

/**************************************************************************

JavaScript Library Extensions

**************************************************************************/

/**
 * 
 *
 * @param 
 */
	public function setExtJS_jQueryAnimateCSS(){
		return (self::USE_JQUERY)?'<script src="'.$this->subDomain().
												 self::FILE_DIR_JS.
												 'jquery.animate-3.5.2.js"></script>':'';
	}//Eof Method "setExtJS_jQueryAnimateCSS"

 /**
 * 
 *
 * @param 
 */
	public function setExtJS_jQueryFullpage(){
        return (self::USE_JQUERY)?'<script src="'.$this->subDomain().
												 self::FILE_DIR_JS.
												 'jquery.fullpage-2.9.5'.
												 self::MIN_JS.'"></script>':'';
	}//Eof Method "setExtJS_jQueryFullpage"
    	
/**
 * 
 *
 * @param 
 */	
	public function setExtJS_HowlerSpatial(){
		return (self::USE_HOWLER)?'<script src="'.$this->subDomain().
												 self::FILE_DIR_JS.
												 'howler-2.0.7.spatial'.
												 self::MIN_JS.'"></script>':'';
												 
	}//Eof Method "setExtJS_HowlerSpatial"

/**************************************************************************

JavaScript Tools

**************************************************************************/

/**
 * 
 *
 * @param 
 */	
	public function setJS_Modernizer(){
		
		return '<script src="'.$this->subDomain().
							  self::FILE_DIR_JS.
							  'modernizr.js"></script>';
		
	}//Eof Method "setJS_Modernizer"
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_ImagesLoaded(){
		
		return '<script src="'.$this->subDomain().
							  self::FILE_DIR_JS.
							  'imagesloaded.pkgd.js"></script>';
							  
	}//Eof Method "setJS_ImagesLoaded"
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_iOsOrientationChange(){
		
		return '<script src="'.$this->subDomain().
							  self::FILE_DIR_JS.
							  'ios-orientationchange-fix.js"></script>';
		
	}//Eof Method "setJS_iOsOrientationChange"
	
}//Eof trait "VendorRessourceManagement"

?>