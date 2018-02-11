<?php
/**
 * CLASS :: PRELOADER
 * =====================
 *
 * Class Preloader is a ...
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
require_once CORE.'Page'.DINT.'Preloader'.FINT;
 
class Preloader implements iPreloader, iContent {
	
	//
	const USE_COMMENTS = true;
	
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
 * Placeholder method
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
		
		return "\t\t".'<!-- bof preloader -->'.PHP_EOL.
				
			   "\t\t".'<!-- eof preloader -->'.PHP_EOL;
		
	}//Eof Method "setContent"
	
}//Eof Class "Preloader"

?>