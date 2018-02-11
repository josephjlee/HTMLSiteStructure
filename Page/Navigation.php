<?php

class dmr_PageNavigation {
	
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
	
	public function setContent(){
		
		return '<!-- bof navbar --!>
				
				<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar'.$this->layout->cDepth2.'">
					<div class="container text-black">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
						</div>
					</div>
				</nav>
				
				<!-- eof navbar -->';
		
	}//Eof Method "setBar"
	
}//Eof Class "dmr_PageNavigation"

?>