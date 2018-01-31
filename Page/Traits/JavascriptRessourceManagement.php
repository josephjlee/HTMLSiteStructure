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
		$v.='setTimeout(function(){'."\n";
		$v.=$content;
		$v.='},'.$timeoutParam.');'."\n";
		$v.=((self::USE_COMMENTS)?'/* /eof setTimeout */'."\n":'');
		$v.='clearTimeout();'."\n";
		return $v;
		
	}//Eof Method "jSetTimeout"

/**
 * 
 *
 * @param 
 */
	public function jFunc(
						  string $id = NULL,
						  string $func = NULL,
						  string $type = NULL,
						  string $content = NULL,
						  int $comment = NULL
						  ) 
	{

		$arr=$this->setComments($comment);

		//call jQuery extended object
		$v=$arr[0];
		$v.= '$(\''.$id.'\').'.$func.'(\''.$type.'\',function(){'."\n";
		$v.= $content;
		$v.= '});'."\n";
		$v.=$arr[1];
		
		unset($arr);
		return $v;
		
	}//Eof Method "jFunc"

/**
 * Set argument with backslashes
 * @param string param
 */
	public function jParam(string $param=''){
		
		return '\''.$param.'\'';
		
	}//Eof Method "jParam"

/**
 * https://api.jquery.com/remove/
 * takes elements out of the DOM
 *
 * @param string id
 */
	public function jQuery_removeElement(string $id=NULL){
		
		return '$('.$this->jParam($id).').remove();'."\n";
		
	}//Eof Method "jQuery_remElement"

/**
 * https://api.jquery.com/attr/
 * 
 *
 */
	public function jQuery_setAttributeToElement(array $arr=NULL){
	
		return '$('.$this->jParam($arr[0]).').attr('.$this->jParam($arr[1]).','.$this->jParam($arr[2]).');'."\n";
		
	}//Eof Method "jQuery_setAttrToElement"

/**
 * https://api.jquery.com/addClass/
 * Generates addClass from jQuery in a row 0+n
 * @param array id
 * @param array classes
 */
	public function jQuery_addClassesTo(array $id,array $classes){
		
		$v='';
		$numClasses = count($classes);
		if($numClasses>0 && is_array($id))
		{
			for($i=0;$i<$numClasses;$i++){
				$v.='$('.$this->jParam($id[$i]).').addClass('.$this->jParam($classes[$i]).');'."\n";
			}
		}
		return $v;
		
	}//Eof Method "jQuery_addClasses"

/**
 * Remove classes from id or class and set attribute with value in html tag
 *
 * @param array arr
 */
	public function jQuery_removeClassesAddAttributes(array $arr){
		
		$v='';
		if(is_array($arr))
		{
			foreach($arr as $key=>$value){
				$v.='$('.$this->jParam($key).').removeClass('.$this->jParam($value['removecls']).');'."\n";
				$v.='$('.$this->jParam($key).').attr(\'id\','.$this->jParam($value['id']).');'."\n";// Need to fix: set attribute name
			}
			unset($arr);
		}
		return $v;
		
	}//Eof Method "jQuery_removeClassesAddAttribute"

/**
 * Remove classes from id or class and set attribute with value in html tag
 *
 * @param array arr
 */
	public function jQuery_removeClassesEmptyElement(array $arr){
		
		$v='';
		if(is_array($arr))
		{
			foreach($arr as $key=>$value){
				$v.='$('.$this->jParam($key).').removeClass('.$this->jParam($value['removecls']).');'."\n";
				$v.='$('.$this->jParam($key).').empty();'."\n";
			}
			unset($arr);
		}
		return $v;
		
	}//Eof Method "jQuery_removeClassesAddAttribute"

/**
 * Set document.ready at the bottom of template, if jQuery is used 
 *
 * @param string content
 */
	public function jQuery_DocReady(string $content=NULL){
	
		return "\t\t".'<script>'."\n".
			   "\t\t\t".'$(document).ready(function(){'."\n".
			   $content."\n".
			   "\t\t\t".'});'."\n".
			   ((self::USE_COMMENTS)?"\t\t\t".'/* /eof document.ready */'."\n":'').
			   "\t\t".'</script>'."\n";
		
	}//Eof Function "jQuery_DocReady"
	
}//Eof Trait "JavaScriptRessourceManagement"

?>