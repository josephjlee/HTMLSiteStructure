<?php

class dmr_PageHeader {
	
	//
	public $pageIntro, $pageIntroID, $pageSVGBrandID;
	
	//
	public $detect, $layout;

/**
 * 
 *
 * @param 
 */	
	public function __construct($detect=NULL,$layout=NULL){
		
		$this->detect = $detect;
		$this->layout = $layout;
		
		$this->setID();
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */	
	public function setID(){
		
		$this->pageIntroID = 'page-intro';
		$this->pageIntroHeaderID = 'page-intro-header';
		$this->pageSVGBrandID = 'page-svg-brand';
		
	}//Eof Method "setID"

/**
 * 
 *
 * @param 
 */	
	public function setMobileContent(){
		
		return '<!-- bof header -->
				<header class="container logo text-center">
					<h1 class="mt0">DMOUNT RECORDS</h1>
					<hr class="text-black">
					<p class="text-black">ART & MUSIC PROJECT</p>
					<hr class="text-black">
				</header>
    			<!-- /eof header -->';
		
	}//Eof Method "setMobileContent"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){
			
		// Exclude tablets.
		if($this->detect->isMobile()){
			
			$this->setMobileContent();
			
		} 
		else 
		{
			return '<div id="'.$this->pageIntroID.'" class="container pt50 mt0">
						<!-- bof header -->
						<header id="'.$this->pageIntroHeaderID.'" class="container mt100 text-center'.$this->layout->cDepth2.'">
							<h1 id="'.$this->pageSVGBrandID.'" class="logo mt100 mb0 pb0"></h1>
							<hr class="mt10 text-black">
							<p class="fal fa-lg animated zoomInLeft">A BERLIN BASED ART & MUSIC PROJECT</p>
							<hr class="mt-2 text-black">
						</header>    
						<!-- /eof header -->
					</div>';
		} 
		
	}//Eof Method "setContent"
	
}//Eof Class "dmr_PageHeader"

?>