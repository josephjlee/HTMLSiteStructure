<?php
/**
 * CLASS :: LAYOUT
 * =====================
 *
 * Class Layout is a ...
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
require_once CORE.'Page'.DINT.'Layout'.FINT;

class Layout implements iLayout, iContent {

	//Usages
	const USE_LAYOUT_CONTAINER = false;
	const USE_CONTENT_DEPTH = false;
	
	//
	public $contentDepth = true;
	
	//
	public $cDepth1, $cDepth2;
	
	//
	public $detect;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(Mobile_Detect $detect=NULL){
		
		$this->detect=$detect;
		$this->getMobileOption();
		$this->setContentDepth();
		
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
	public function getMobileOption(){
		
		
		$this->contentDepth=($this->detect->isMobile())?false:true;
		
	}//Eof Method "getMobileOption"

/**
 * 
 *
 * @param 
 */
	public function setContentDepth(){

		if(self::USE_CONTENT_DEPTH) {
			
			if($this->contentDepth){
				$this->cDepth1=' content-depth-1';
				$this->cDepth2=' content-depth-2';
			}
			else
			{
				$this->cDepth1='';
				$this->cDepth2='';	
			}
		}
		else 
		{
			$this->cDepth1='';
			$this->cDepth2='';
		}
		
	}//Eof Method "setContentDepth"

/**
 * 
 *
 * @param 
 */
	public function setContent(){
		
		// Exclude tablets.
		if($this->detect->isMobile())
		{
		
		}
		else
		{
			if(self::USE_LAYOUT_CONTAINER && self::USE_CONTENT_DEPTH)
				return '
				<!-- bof layout -->
				<div class="layout-container-0">
		
				</div>
				<div class="layout-container-1">
		
				</div>
				<!-- /eof layout -->';
		}
		
	}//Eof Method "setContent"

}//Eof Class "Layout" 

?>