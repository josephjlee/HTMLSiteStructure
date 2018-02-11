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
namespace Dmount\HTMLSiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//Interface
require_once CORE.'Page'.DINT.'Theme'.FINT;
 
class Theme implements iTheme, iHtml {

	//
	const THEME_VERSION = '0.0.1';
	const THEME_NAME = 'default';

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
		
		$this->detect=$detect;
		$this->nice(2);
		
	}//Eof Construct

/**
 * Return static subdomain for assets
 *
 * @return 
 */
	protected function subDomain(){return STATIC_SUBDOMAIN;}//Eof Method "subDomain"

/**
 * Return cannonical default dir -and filename for theme
 *
 * @return  
 */
	protected function cannonical(string $str=NULL){return $this->subDomain().$str.self::THEME_NAME.THEME_FILE.'-'.self::THEME_VERSION;}//Eof Method "cannonical"

/**
 * 
 *
 * @return 
 */
    public function setCSS(){
	 
        return $this->tabs.'<link href="'.$this->cannonical(THEME_CSS).'.css" rel="stylesheet">'.$this->eol;
		
    }//Eof Method "setCSS"

/**
 * 
 *
 * @return 
 */
	public function setJS(){
		
		return $this->tabs.'<script src="'.$this->cannonical(THEME_JS).'.js"></script>'.$this->eol;
		
	}//Eof Method "setJS"

/**
 * 
 *
 * @return 
 */	
	public function setSource(){
		
		return $this->setCSS().$this->setJS();
		
	}//Eof Method "setSource"
	
}//Eof Class "Theme"
?>