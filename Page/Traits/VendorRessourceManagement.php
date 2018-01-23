<?php
/*
 * TRAIT :: BRANDRESSOURCEMANAGEMENT
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
		
		if(self::USE_CDN)
		{
			return '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome'.self::MIN_CSS.'" rel="stylesheet">';	
		}
		else return (self::USE_FONTAWESOME)?'<link href="'.$this->subDomain().
							 						  	   STATIC_CSS.self::FILE_DIR.
							 						  	   'fontawesome-all-5.0.1'.
							 						  	   self::MIN_CSS.'" rel="stylesheet">':'';
							 	
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
		else return (self::USE_BOOTSTRAP)?'<link href="'.$this->subDomain().
							 	  						 STATIC_CSS.self::FILE_DIR.
							 	  						 'bootstrap-4.0.0'.
							 	  						 self::MIN_CSS.'" rel="stylesheet">':'';
							 
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
		else return (self::USE_BOOTSTRAP)?'<link href="'.$this->subDomain().
								  					     STATIC_CSS.self::FILE_DIR.
								  					     'animate-3.5.2'.
								  					     self::MIN_CSS.'" rel="stylesheet">':'';
								   
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
		
		return (self::USE_JQUERY && self::USE_FULLPAGE)?'<link href="'.$this->subDomain().
																	  STATIC_CSS.self::FILE_DIR.
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
		
		if(self::USE_CDN)
		{
			return '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery'.self::MIN_JS.'"></script>';	
		}
		else return (self::USE_JQUERY)?'<script src="'.$this->subDomain().
												 	   STATIC_JS.self::FILE_DIR.
												 	   'jquery-3.2.1'.
												 	   self::MIN_JS.'"></script>':'';
												 
	}//Eof Method "setJS_jQuery"

/**
 * 
 *
 * @param 
 */
	public function setJS_Tether(){
		
		return (self::USE_JQUERY)?'<script src="'.$this->subDomain().
							 					 STATIC_JS.self::FILE_DIR.
							 					 'tether-1.3.3'.
							 					 self::MIN_JS.'"></script>':'';
							 	
	}//Eof Method "setJS_Tether"

/**
 * 
 *
 * @param 
 */	
	public function setJS_BootsTrap(){
		
		if(self::USE_CDN)
		{
			return '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap'.self::MIN_JS.'" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';
		}
		else return (self::USE_BOOTSTRAP)?'<script src="'.$this->subDomain().
							  						 	  STATIC_JS.self::FILE_DIR.
							  						 	  'bootstrap-4.0.0'.
							  						 	  self::MIN_JS.'"></script>':'';
							  
	}//Eof Method "setJS_BootsTrap"

/**
 * 
 *
 * @param 
 */	
	public function setJS_FontAwesome(){
		
		return (self::USE_FONTAWESOME)?'<script defer src="'.$this->subDomain().
															 STATIC_JS.self::FILE_DIR.
															 'fontawesome-all-5.0.1'.
															 self::MIN_JS.'"></script>':'';
									
	}//Eof Method "setJS_FontAwesome"

/**
 * 
 *
 * @param 
 */	
	public function setJS_Howler(){
		
		return (self::USE_HOWLER)?'<script src="'.$this->subDomain().
							 					  STATIC_JS.self::FILE_DIR.
							 					  'howler-2.0.7.core'.
							 					  self::MIN_JS.'"></script>':'';
							 
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
		
		return (self::USE_JQUERY && self::USE_ANIMATEJS)?'<script src="'.$this->subDomain().
												 						 STATIC_JS.self::FILE_DIR.
												 						 'jquery.animate-3.5.2.js"></script>':'';
	}//Eof Method "setExtJS_jQueryAnimateCSS"

 /**
 * 
 *
 * @param 
 */
	public function setExtJS_jQueryFullpage(){
        return (self::USE_JQUERY && self::USE_FULLPAGE)?'<script src="'.$this->subDomain().
												 						STATIC_JS.self::FILE_DIR.
												 						'jquery.fullpage-2.9.5'.
												 						self::MIN_JS.'"></script>':'';
	}//Eof Method "setExtJS_jQueryFullpage"
    	
/**
 * 
 *
 * @param 
 */	
	public function setExtJS_HowlerSpatial(){
		return (self::USE_HOWLER && self::USE_SPATIAL)?'<script src="'.$this->subDomain().
												 				 	  STATIC_JS.self::FILE_DIR.
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
		
		return (self::USE_MODERNIZER)?'<script src="'.$this->subDomain().
							  				   		 STATIC_JS.self::FILE_DIR.
							  				   		 'modernizr.js"></script>':'';
		
	}//Eof Method "setJS_Modernizer"
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_ImagesLoaded(){
		
		return (self::USE_IMAGESLOADED)?'<script src="'.$this->subDomain().
							  					 	   STATIC_JS.self::FILE_DIR.
							  					 	   'imagesloaded.pkgd.js"></script>':'';
							  
	}//Eof Method "setJS_ImagesLoaded"
	
/**
 * 
 *
 * @param 
 */	
	public function setJS_iOsOrientationChange(){
		
		return (self::USE_IOS_ORIENTATIONCHANGE)?'<script src="'.$this->subDomain().
							  							 	     STATIC_JS.self::FILE_DIR.
							  							 	     'ios-orientationchange-fix.js"></script>':'';
		
	}//Eof Method "setJS_iOsOrientationChange"
	
}//Eof trait "VendorRessourceManagement"

?>