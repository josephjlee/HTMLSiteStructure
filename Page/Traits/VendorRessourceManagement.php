<?php
/*
 * TRAIT :: VENDORRESSOURCEMANAGEMENT
 * ==================================
 *
 *
*/
namespace Dmount\HTMLSiteStructure\RessourceManagement;

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
		
		$s='-';
		$version='5.0.1';
		$name='fontawesome-all'.$s.$version.self::MIN_CSS;
		$str='';
		if(self::USE_CDN)
		{
			$str='<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome'.self::MIN_CSS.'" rel="stylesheet">';	
		}
		else $str='<link href="'.$this->cannonical(STATIC_CSS).$name.'" rel="stylesheet">';
		
		return (self::USE_FONTAWESOME)?$this->tabs.$str.$this->eol:'';
						 	
	}//Eof Method "setCSS_FontAwesome"

/**
 * 
 *
 * @param 
 */	
	public function setCSS_BootsTrap(){
		
		$s='-';
		$version='4.0.0';
		$name='bootstrap'.$s.$version.self::MIN_CSS;
		$str='';
		if(self::USE_CDN)
		{
			$str='<link href="https://maxcdn.bootstrapcdn.com/bootstrap/'.$version.'/css/bootstrap'.self::MIN_CSS.'" rel="stylesheet">';
		}
		else $str='<link href="'.$this->cannonical(STATIC_CSS).$name.'" rel="stylesheet">';
		
		return (self::USE_BOOTSTRAP)?$this->tabs.$str.$this->eol:'';
							 
	}//Eof Method "setCSS_BootsTrap"
	
/**
 * 
 *
 * @param 
 */	
	public function setCSS_Animate(){
		
		$s='-';
		$version='3.5.2';
		$name='animate'.$s.$version.self::MIN_CSS;
		$str='';
		if(self::USE_CDN)
		{
			$str='<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/'.$version.'/animate'.self::MIN_CSS.'" rel="stylesheet" >';
		}
		else $str='<link href="'.$this->cannonical(STATIC_CSS).$name.'" rel="stylesheet">';
		
		return (self::USE_ANIMATE)?$this->tabs.$str.$this->eol:'';
						   
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
		
		$s='-';
		$version='2.9.5';
		$name='jquery.fullpage'.$s.$version.self::MIN_CSS;
		$str='<link href="'.$this->cannonical(STATIC_CSS).$name.'" rel="stylesheet">';
		return (self::USE_JQUERY && self::USE_FULLPAGE)?$this->tabs.$str.$this->eol:'';
	
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
		
		$s='-';
		$version='3.2.1';
		$name='jquery'.$s.$version.self::MIN_JS;
		$str='';
		if(self::USE_CDN)
		{
			$str='<script src="https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery'.self::MIN_JS.'"></script>';	
		}
		else $str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		
		return (self::USE_JQUERY)?$this->tabs.$str.$this->eol:'';
												 
	}//Eof Method "setJS_jQuery"

/**
 * 
 *
 * @param 
 */
	public function setJS_Tether(){
		
		$s='-';
		$version='1.3.3';
		$name='tether'.$s.$version.self::MIN_JS;
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_JQUERY)?$this->tabs.$str.$this->eol:'';
						 	
	}//Eof Method "setJS_Tether"

/**
 * 
 *
 * @param 
 */	
	public function setJS_BootsTrap(){
		
		$s='-';
		$version='4.0.0';
		$name='bootstrap'.$s.$version.self::MIN_JS;
		$str='';
		if(self::USE_CDN)
		{
			$str='<script src="https://maxcdn.bootstrapcdn.com/bootstrap/'.$version.'/js/bootstrap'.self::MIN_JS.'" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
		}
		else $str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		
		return (self::USE_BOOTSTRAP)?$this->tabs.$str.$this->eol:'';
							  
	}//Eof Method "setJS_BootsTrap"

/**
 * 
 *
 * @param 
 */	
	public function setJS_FontAwesome(){
		
		$s='-';
		$version='5.0.1';
		$name='fontawesome-all'.$s.$version.self::MIN_JS;
		$str='<script defer src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_FONTAWESOME)?$this->tabs.$str.$this->eol:'';
									
	}//Eof Method "setJS_FontAwesome"

/**
 * 
 *
 * @param 
 */	
	public function setJS_Howler(){
		
		$s='-';
		$version='2.0.7';
		$name='howler'.$s.$version.'.core'.self::MIN_JS;
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_HOWLER)?$this->tabs.$str.$this->eol:'';
							 
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
		
		$s='-';
		$version='3.5.2';
		$name='jquery.animate'.$s.$version.'.js';
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_JQUERY && self::USE_ANIMATEJS)?$this->tabs.$str.$this->eol:'';
																		 
	}//Eof Method "setExtJS_jQueryAnimateCSS"

 /**
 * 
 *
 * @param 
 */
	public function setExtJS_jQueryFullpage(){
	
		$s='-';
		$version='2.9.5';
		$name='jquery.fullpage'.$s.$version.self::MIN_JS;
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
        return (self::USE_JQUERY && self::USE_FULLPAGE)?$this->tabs.$str.$this->eol:'';
																			   
	}//Eof Method "setExtJS_jQueryFullpage"
    	
/**
 * 
 *
 * @param 
 */	
	public function setExtJS_HowlerSpatial(){
	
		$s='-';
		$version='2.0.7';
		$name='howler'.$s.$version.'.spatial'.self::MIN_JS;
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_HOWLER && self::USE_SPATIAL)?$this->tabs.$str.$this->eol:'';																	  
												 
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
		
		$name='modernizr.js';
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_MODERNIZER)?$this->tabs.$str.$this->eol:'';
		
	}//Eof Method "setJS_Modernizer"
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_ImagesLoaded(){
		
		$name='imagesloaded.pkgd.js';
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_IMAGESLOADED)?$this->tabs.$str.$this->eol:'';
							  
	}//Eof Method "setJS_ImagesLoaded"
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_iOsOrientationChange(){
		
		$name='ios-orientationchange-fix.js';
		$str='<script src="'.$this->cannonical(STATIC_JS).$name.'"></script>';
		return (self::USE_IOS_ORIENTATIONCHANGE)?$this->tabs.$str.$this->eol:'';
		
	}//Eof Method "setJS_iOsOrientationChange"
	
}//Eof trait "VendorRessourceManagement"

?>