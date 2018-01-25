<?php
/*
 * TRAIT :: JAVASCRIPTRESSOURCEMANAGEMENT
 * ==================================
 *
 * Trait for JavaScript is a Ressource Management for using API's
 * and their different functionalities.
 *
 * Following methods are defined:
 *
 * @method jSetTimeout
 * @method jQuery_SetParam
 * @method jQuery_addClassesTo
 * @method jQuery_DocReady
*/
namespace Dmount\HTMLSiteStructure\RessourceManagement;

trait JavaScriptRessourceManagement {

/**
 * Set Javascript timeout function
 * @param string content
 * @param timeoutParam
 */
	public function jSetTimeout(string $content=NULL, $timeoutParam=NULL){
		
		$v='';
		$v.='setTimeout(function(){'.PHP_EOL;
		$v.=$content;
		$v.='},'.$timeoutParam.');'.PHP_EOL;
		$v.=((self::USE_COMMENTS)?'/* /eof setTimeout */'.PHP_EOL:'');
		$v.='clearTimeout();'.PHP_EOL;
		return $v;
		
	}//Eof Method "jSetTimeout"

/**
 * 
 *
 * @param 
 */
	public function setjFunc(
				 string $mainAnimID = NULL,
				 string $mainAnimFunc = NULL,
				 string $animType = NULL,
				 string $content = NULL,
				 int $step = NULL
				 ) 
	{

		$arr=$this->setComments($step);

		//call jQuery extended object
		$v=$arr[0];
		$v.= '$(\''.$mainAnimID.'\').'.$mainAnimFunc.'(\''.$animType.'\',function(){'.PHP_EOL;
		$v.= "\t".$content.PHP_EOL;
		$v.= '});'.PHP_EOL;
		$v.=$arr[1];
		
		unset($bofComment,$eofComment);
		return $v;
		
	}//Eof Method "setjFunc"

/**
 * Set argument with backslashes
 * @param string param
 */
	public function jQuery_setParam(string $param=''){
		
		return '\''.$param.'\'';
		
	}//Eof Method "jQuery_setParam"

/**
 * Generates addClass from jQuery in a loop 0+n
 * @param array id
 * @param array classes
 */
	public function jQuery_addClassesTo(array $id,array $classes){
		
		$v='';
		$numClasses = count($classes);
		if($numClasses>0 && is_array($id))
		{
			for($i=0;$i<$numClasses;$i++){
				$v.= '$('.$this->jQuery_setParam($id[$i]).').addClass('.$this->jQuery_setParam($classes[$i]).');'."\n";
			}
		}
		return $v;
		
	}//Eof Method "jQuery_addClasses"

/**
 * If jQuery is used:
 *	- create the brand object
 * 	- includes the splash screen animation, if used
 *
 * @param string content
 */
	public function jQuery_DocReady(string $content=NULL){
	
		return "\t\t".'<script>'.PHP_EOL.
		       "\t\t\t".'$(document).ready(function(){'.PHP_EOL.
		       $content.PHP_EOL.
		       "\t\t\t".'});'.PHP_EOL.
		       ((self::USE_COMMENTS)?"\t\t\t".'/* /eof document.ready */'.PHP_EOL:'').
		       "\t\t".'</script>'.PHP_EOL;
		
	}//Eof Function "jQuery_DocReady"
	
}//Eof Trait "JavaScriptRessourceManagement"

?>
