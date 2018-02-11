<?php
/**
 * DMOUNT REC PAGE THEME
 * =====================
 *
 * Page Theme is a ...
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
class dmr_PageTheme {

	//
	const FILE_DIR_CSS = '/assets/static/css/themes/';
	const FILE_DIR_JS = '/assets/static/js/themes/';

	//
	public $detect;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct($detect=NULL){
		
		$this->detect=$detect;
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */
    public function setCSS(){
	 
        return '<link href="'.self::FILE_DIR_CSS.'dmr-core-0.0.1.css" rel="stylesheet">';
		
    }//Eof Method "setCSS"

/**
 * 
 *
 * @param 
 */
	public function setJS(){
		
		return '<script src="'.self::FILE_DIR_JS.'dmr-logo-0.0.1.js"></script>';
		
	}//Eof Method "setJS"

/**
 * 
 *
 * @param 
 */	
	public function setSource(){
		
		return $this->setCSS().$this->setJS();
		
	}//Eof Method "setSource"
	
}//Eof Class "dmr_PageTheme"
?>