<?php
/**
 * CLASS :: THEME
 * =====================
 *
 * Class Theme is a ...
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
require_once CORE.'Page'.DINT.'Theme'.FINT;
 
class Theme implements iTheme {

	//
	const SUBDOMAIN = 'https://static.puretechno.de';

	//
	const FILE_CORE = 'core';
	const FILE_DIR_CSS = '/assets/css/themes/';
	const FILE_DIR_JS = '/assets/js/themes/';

	//
	public $detect;

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
		
	}//Eof Method "subDomain"

/**
 * 
 *
 * @param 
 */
    public function setCSS(){
	 
        return '<link href="'.$this->subDomain().
							 self::FILE_DIR_CSS.
							 self::FILE_CORE.'-0.0.1.css" rel="stylesheet">';
		
    }//Eof Method "setCSS"

/**
 * 
 *
 * @param 
 */
	public function setJS(){
		
		return '<script src="'.$this->subDomain().
							  self::FILE_DIR_JS.
							  self::FILE_CORE.'-0.0.1.js"></script>';
		
	}//Eof Method "setJS"

/**
 * 
 *
 * @param 
 */	
	public function setSource(){
		
		return $this->setCSS().$this->setJS();
		
	}//Eof Method "setSource"
	
}//Eof Class "Theme"
?>