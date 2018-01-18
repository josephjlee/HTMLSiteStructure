<?php
/**
 * CLASS :: SECTIONS
 * =====================
 *
 * Class Sections is a ...
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
require_once CORE.'Page'.DINT.'Sections'.FINT;

class Sections implements iSections, iContent {
	
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
	public function setContent(){
		
		return '<!-- bof sections --!>
				
				<!-- eof sections -->';
		
	}//Eof Method "setContent"
	
}//Eof Class "Section"

?>