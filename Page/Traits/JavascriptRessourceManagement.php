<?php
/*
 * TRAIT :: JAVASCRIPTRESSOURCEMANAGEMENT
 * ==================================
 *
 * Trait for JavaScript is a Ressource Management for using API's
 * and their different functionalities.
*/
namespace Dmount\HTMLSiteStructure\RessourceManagement;

trait JavaScriptRessourceManagement {

/**
 * Setting arguments with backslashes
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
				$v.='$('.$this->jQuery_setParam($id[$i]).').addClass('.$this->jQuery_setParam($classes[$i]).');';
			}
		}
		return $v;
		
	}//Eof Method "jQuery_addClasses"

/**
 * If jQuery is used:
 *	- create the brand object
 * 	- includes the splash screen animation, if used
 *
 * @param 
 */
	public function jQuery_DocReady(string $content=NULL){
	
		return '<script>$(document).ready(function(){'.$content.'});/* /eof document.ready */</script>';
		
	}//Eof Function "jQuery_DocReady"
	
}//Eof Trait "JavaScriptRessourceManagement"

?>