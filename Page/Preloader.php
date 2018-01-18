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
namespace Dmount\SiteStructure;
 
use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};
 
//Interface
require_once CORE.'Page'.DINT.'Preloader'.FINT;
 
class Preloader implements iPreloader, iContent {
	
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
		
		return '<!-- bof preloader --!>
				
				<!-- eof preloader -->';
		
	}//Eof Method "setContent"
	
}//Eof Class "dm_PagePreloader"

?>
