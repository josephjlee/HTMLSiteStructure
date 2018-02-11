<?php
/**
 * DMOUNT REC PAGE PRELOADER
 * =====================
 *
 * Page Preloader is a ...
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
class dmr_PagePreloader {
	
	//
	public $detect, $layout;
	
/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct($detect=NULL,$layout=NULL){
		
		$this->detect = $detect;
		$this->layout = $layout;
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */
	public function setContent(){
		
		return '<!-- bof preloader --!>
				
				<!-- eof preloader -->';
		
	}//Eof Method "setContent"
	
}//Eof Class "dmr_PagePreloader"

?>