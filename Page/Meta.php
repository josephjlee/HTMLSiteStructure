<?php
/**
 * DMOUNT PAGE META
 * =====================
 *
 * Page Header is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//Interface
require_once CORE.'Page'.DINT.'Meta'.FINT;

class Meta implements iMeta, iContent {
	
	//Configurations (Boolean)
	const USE_COMMENTS = true;
	
	//
	public $detect;
	
/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(Mobile_Detect $detect=NULL){
		
		$this->detect = $detect;
		
	}//Eof Construct

/**
 * Placeholder method 
 *
 * @param 
 */	
	public function setPageID(){/*ACTUALLY NOT DEFINED*/}//Eof Method "setPageID"

/**
 * Return static subdomain for assets
 *
 * @param 
 */
	protected function subDomain(){return STATIC_SUBDOMAIN;}//Eof Method "setSubDomain"

/**
 * Description token from https://www.w3schools.com/tags/att_meta_charset.asp
 *
 * Specifies the character encoding for the HTML document.
 * Common values: 
 *	- UTF-8 - Character encoding for Unicode
 *	- ISO-8859-1 - Character encoding for the Latin alphabet
 * In theory, any character encoding can be used, but no browser understands all of them. 
 * The more widely a character encoding is used, the better the chance that a browser will understand it.
 * To view all available character encodings, look at IANA character sets:
 * >> http://www.iana.org/assignments/character-sets/character-sets.xhtml
 *
 * @param 
 */
 	public function charset(){
		
		$characterSet='UTF-8';
		return "\t\t".'<meta charset="'.$characterSet.'">'.PHP_EOL;
		
	}//Eof Method "charset"
	
/**
 * Check Internet Explorer compability
 * Default is edge, but should be used only for testing purpose (Microsoft recommendation)
 * >> 5 (Quirks), 7, 8, 9 (IE 9 or higher)
 * >> EmulateIE7 (or Quirks)
 * >> EmulateIE8 (or Quirks)
 * >> EmulateIE9 (or Quirks)
 * >> edge (highest possibility)
 *
 * @param 
 */
 	public function ieCompability(){
		
	$compMode='IE=edge';
        return "\t\t".'<meta http-equiv="X-UA-Compatible" content="'.$compMode.'" />'.PHP_EOL;
		
	}//Eof Method "charset"
	
/**
 * 
 *
 * @param 
 */
 	public function title(){
		
	$title='Your Pagetitle here';
        return "\t\t".'<title>'.$title.'</title>'.PHP_EOL;
		
	}//Eof Method "title"
		
/**
 * 
 *
 * @param 
 */
 	public function manifest(){
		
       return ((self::USE_COMMENTS)?"\t\t".'<!-- Manifest -->'.PHP_EOL:'').
        	  		    "\t\t".'<link rel="manifest" href="site.webmanifest">'.PHP_EOL;
			   
	}//Eof Method "manifest"
	
/**
 * 
 *
 * @param 
 */
	public function description(){
	
	$description='Put your description here';
        return "\t\t".'<!-- SEO -->'.PHP_EOL.
               "\t\t".'<meta name="description" content="'.$description.'">'.PHP_EOL;

	}//Eof Method "description"

/**
 * 
 *
 * @param 
 */	
	public function keywords(){
		
	$keywords='Keyword1, Keyword2, Keyword3';
        return "\t\t".'<meta name="keywords" lang="en" content="'.$keywords.'">'.PHP_EOL;
		
	}//Eof Method "keywords"

/**
 * 
 *
 * @param 
 */
	public function apple(){
	
		$appleMobileWebAppCapable='yes';
		$appleMobileWebAppTitle='d.Mount';
		
		return ((self::USE_COMMENTS)?"\t\t".'<!-- Apple Mobile App Title, Pinned Tab (Safari), Mobile App Icon -->'.PHP_EOL:'').
        	   			     "\t\t".'<meta name="mobile-web-app-capable" content="'.$appleMobileWebAppCapable.'">'.PHP_EOL. 
        	   			     "\t\t".'<meta name="apple-mobile-web-app-title" content="'.$appleMobileWebAppTitle.'">'.PHP_EOL.
        	   			     "\t\t".'<link rel="mask-icon" sizes="any" href="'.$this->subDomain().STATIC_IMG.'ico/favicon.svg" color="#fff">'.PHP_EOL.
        	   			     "\t\t".'<link rel="apple-touch-icon" sizes="192x192" href="'.$this->subDomain().STATIC_IMG.'ico/apple-touch-icon-192x192.png">'.PHP_EOL;
		
	}//Eof Method "apple"

/**
 * 
 *
 * @param 
 */
	public function viewport(){
		
	$width='device-width,';
	$initScale='1.0';
	$maxScale='1.0';
	$userScalable='no';
	$content='width='.$width.', initial-scale='.$initScale.', maximum-scale='.$maxScale.', user-scalable='.$userScalable.'';
        return ((self::USE_COMMENTS)?"\t\t".'<!-- Viewport -->'.PHP_EOL:'').
        	   		     "\t\t".'<meta name="viewport" content="'.$content.'">'.PHP_EOL;
		
	}//Eof Method "viewport"

/**
 * 
 *
 * @param 
 */
	public function canonical(){
		
		return ((self::USE_COMMENTS)?"\t\t".'<!--- Canonical -->'.PHP_EOL:'').
        	   			     "\t\t".'<link rel="canonical" href="https://'.$_SERVER['HTTP_HOST'].'/index.php">'.PHP_EOL;
		
	}//Eof Method "canonical"

/**
 * 
 *
 * @param 
 */
	public function setContent(){
		
		return $this->charset().
		       $this->ieCompability().
		       $this->title().
		       $this->manifest().
		       $this->description().
		       $this->keywords().
		       $this->apple().
		       $this->viewport().
		       $this->canonical();
		
	}//Eof Method "setContent"
	
}//Eof Class "Meta"

?>
