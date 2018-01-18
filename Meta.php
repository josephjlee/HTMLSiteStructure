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
namespace Dmount\SiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//Interface
require_once CORE.'Page'.DINT.'Meta'.FINT;

class Meta implements iMeta, iContent {
	
	//
	const SUBDOMAIN = 'https://static.puretechno.de';
	
	
	
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
 	public function charset(){
		
		return '<meta charset="UTF-8">';
		
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
		
        return'<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
		
	}//Eof Method "charset"
	
/**
 * 
 *
 * @param 
 */
 	public function title(){
		
        return '<title>DMOUNT</title>';
		
	}//Eof Method "title"
		
/**
 * 
 *
 * @param 
 */
 	public function manifest(){
		
       return '<!-- Manifest -->
        	   <link rel="manifest" href="site.webmanifest">';
			   
	}//Eof Method "manifest"
	
/**
 * 
 *
 * @param 
 */
	public function description(){
	
        return '<!-- SEO -->
        	    <meta name="description" content="Webdevelopment, art advising and a journey into Music">';

	}//Eof Method "description"

/**
 * 
 *
 * @param 
 */	
	public function keywords(){
		
        return '<meta name="keywords" lang="en" content="Berlin,Art,Music,Webdevelopment">';
		
	}//Eof Method "keywords"

/**
 * 
 *
 * @param 
 */
	public function apple(){
	
		return '<!-- Apple Mobile App Title, Pinned Tab (Safari), Mobile App Icon -->
        		<meta name="mobile-web-app-capable" content="yes"> 
        		<meta name="apple-mobile-web-app-title" content="d.Mount">
        		<link rel="mask-icon" sizes="any" href="'.$this->subDomain().'/assets/images/ico/favicon.svg" color="#fff">
        		<link rel="apple-touch-icon" sizes="192x192" href="'.$this->subDomain().'/assets/images/ico/apple-touch-icon-192x192.png">';
		
	}//Eof Method "apple"

/**
 * 
 *
 * @param 
 */
	public function viewport(){
		
        return '<!-- Viewport -->
        		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
		
	}//Eof Method "viewport"

/**
 * 
 *
 * @param 
 */
	public function canonical(){
		
		return '<!--- Canonical -->
        		<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].'/index.php"> ';
		
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