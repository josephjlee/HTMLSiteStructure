<?php
/**
 * CLASS :: NAVIGATION
 * =====================
 *
 * Class Navigation is a ...
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
require_once CORE.'Page'.DINT.'Navigation'.FINT;

class Navigation implements iNavigation, iContent {
	
	//Configuration
	const USE_NAVBAR = false;
	
	//
	public $detect, $layout;
	
/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(
								Mobile_Detect $detect=NULL,
								Layout $layout=NULL
								)
	{
		
		$this->detect = $detect;
		$this->layout = $layout;
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */	
	public function setPageID(){/*ACTUALLY NOT DEFINED*/}//Eof Method "setPageID"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){
		
		if(self::USE_NAVBAR)
		
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
		
	}//Eof Method "setContent"
	
}//Eof Class "dm_PageNavigation"

?>