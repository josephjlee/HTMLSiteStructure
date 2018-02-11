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

class Meta implements iMeta, iContent, iHtml {
	
	//Configurations (Boolean)
	const USE_COMMENTS = true;
	const USE_IE_COMPABILITY = true;
	const USE_MANIFEST = true;
	const USE_APPLE = true;
	const USE_VIEWPORT = true;
	const USE_CANNONICAL = true;
	
	//Html declarations
	private $tabs;
	private $eol;
	
	//
	public $detect;

	use RessourceManagement\HtmlRessourceManagement;
	
/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(Mobile_Detect $detect=NULL){
		
		$this->detect = $detect;
		$this->nice(2);
		
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
		return $this->tabs.'<meta charset="'.$characterSet.'">'.$this->eol;
		
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
		
		if(self::USE_IE_COMPABILITY)
		{
			$compMode='IE=edge';
        	return $this->tabs.'<meta http-equiv="X-UA-Compatible" content="'.$compMode.'" />'.$this->eol;
		}
		
	}//Eof Method "charset"
	
/**
 * 
 *
 * @param 
 */
 	public function title(){
		
		$title='DMOUNT';
        return $this->tabs.'<title>'.$title.'</title>'.$this->eol;
		
	}//Eof Method "title"
		
/**
 * 
 *
 * @param 
 */
 	public function manifest(){
		
		if(self::USE_MANIFEST)
		{
       		return ((self::USE_COMMENTS)?$this->tabs.'<!-- Manifest -->'.$this->eol:'').
        	  							 $this->tabs.'<link rel="manifest" href="site.webmanifest">'.$this->eol;
		}
			   
	}//Eof Method "manifest"
	
/**
 * 
 *
 * @param 
 */
	public function description(){
	
		$description='Webdevelopment, art advising and a journey into Music"';
        return $this->tabs.'<!-- SEO -->'.$this->eol.
        	   $this->tabs.'<meta name="description" content="'.$description.'">'.$this->eol;

	}//Eof Method "description"

/**
 * 
 *
 * @param 
 */	
	public function keywords(){
		
		$keywords='Berlin,Art,Music,Webdevelopment';
        return $this->tabs.'<meta name="keywords" lang="en" content="'.$keywords.'">'.$this->eol;
		
	}//Eof Method "keywords"

/**
 * 
 *
 * @param 
 */
	public function apple(){
	
		if(self::USE_APPLE)
		{
			$appleMobileWebAppCapable='yes';
			$appleMobileWebAppTitle='d.Mount';
		
			return ((self::USE_COMMENTS)?$this->tabs.'<!-- Apple Mobile App Title, Pinned Tab (Safari), Mobile App Icon -->'.$this->eol:'').
										 $this->tabs.'<meta name="mobile-web-app-capable" content="'.$appleMobileWebAppCapable.'">'.$this->eol. 
										 $this->tabs.'<meta name="apple-mobile-web-app-title" content="'.$appleMobileWebAppTitle.'">'.$this->eol.
										 $this->tabs.'<link rel="mask-icon" sizes="any" href="'.$this->subDomain().STATIC_IMG.'ico/favicon.svg" color="#fff">'.$this->eol.
										 $this->tabs.'<link rel="apple-touch-icon" sizes="192x192" href="'.$this->subDomain().STATIC_IMG.'ico/apple-touch-icon-192x192.png">'.$this->eol;
		}
		
	}//Eof Method "apple"

/**
 * 
 *
 * @param 
 */
	public function viewport(){
		
		if(self::USE_VIEWPORT)
		{
			$width='device-width,';
			$initScale='1.0';
			$maxScale='1.0';
			$userScalable='no';
			$content='width='.$width.', initial-scale='.$initScale.', maximum-scale='.$maxScale.', user-scalable='.$userScalable.'';
			return ((self::USE_COMMENTS)?$this->tabs.'<!-- Viewport -->'.$this->eol:'').
										 $this->tabs.'<meta name="viewport" content="'.$content.'">'.$this->eol;
		}
		
	}//Eof Method "viewport"

/**
 * 
 *
 * @param 
 */
	public function canonical(){
		
		if(self::USE_CANNONICAL)
		{
			return ((self::USE_COMMENTS)?$this->tabs.'<!--- Canonical -->'.$this->eol:'').
										 $this->tabs.'<link rel="canonical" href="https://'.$_SERVER['HTTP_HOST'].'/index.php">'.$this->eol;
		}
		
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