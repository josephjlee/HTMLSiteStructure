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
namespace Dmount\HTMLSiteStructure;

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
	public function setPageID(){/*ACTUALLY NOT DEFINED*/}//Eof Method "setPageID"

/**
 * 
 *
 * @param 
 */
	public function setContent(){
		
		return "\t\t".'<!-- bof sections -->'.PHP_EOL.
				
			   "\t\t".'<!-- eof sections -->'.PHP_EOL;
		
	}//Eof Method "setContent"
	
}//Eof Class "Section"

?>