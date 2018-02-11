<?php

class dmr_PageSections {
	
	//
	public $detect, $layout;
	
/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct($detect,$layout){
		
		$this->detect = $detect;
		$this->layout = $layout;
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */
	public function setContent(){
		
		return '<!-- bof sections --!>
				
				<!-- eof sections -->';
		
	}//Eof Method "setContent"
	
}//Eof Class "dmr_PageSection"

?>