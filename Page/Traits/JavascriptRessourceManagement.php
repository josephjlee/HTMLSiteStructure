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
 * Set javascript array
 * @param string content
 * @param timeoutParam
 */
	public function jArray(array $arr){
		
		$values='';
		$numArr=count($arr);
		for($i=0;$i<$numArr;$i++){
			$last=($i<$numArr-1)?',':'';
			$values.=$this->jParam($arr[$i]).$last;
		}
		$rect='['.$values.']';
		return $rect;
		
	}//Eof Method "jArray"

/**
 * Set argument with backslashes
 * @param string param
 */
	public function jParam(string $param=''){
		
		return '\''.$param.'\'';
		
	}//Eof Method "jParam"

/**
 * Set javascript timeout function
 * @param string content
 * @param timeoutParam
 */
	public function jSetTimeout(string $content=NULL, $timeoutParam=NULL){
		
		$str='';
		$str.='setTimeout(function(){'.$this->eol;
		$str.=$content;
		$str.='},'.$timeoutParam.');'.$this->eol;
		$str.=((self::USE_COMMENTS)?'/* /eof setTimeout */'.$this->eol:'');
		$str.='clearTimeout();'.$this->eol;
		return $str;
		
	}//Eof Method "jSetTimeout"

/**
 * 
 *
 * @param string id
 * @param string func
 * @param string type
 * @param string content
 * @param int comment 
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
		$v = $arr[0];
		$v.= '$('.$this->jParam($id).').'.$func.'('.$this->jParam($type).',function(){'.$this->eol;
		$v.= $content;
		$v.= '});'.$this->eol;
		$v.= $arr[1];
		
		unset($arr);
		return $v;
		
	}//Eof Method "jFunc"

########################################################################

/**
 * https://api.jquery.com/remove/
 * takes elements out of the DOM
 *
 * @param array id
 */
	public function jQuery_Append(array $arr=NULL,array $values=NULL){
		
		$v='';
		$numValues=count($values);
		if($numValues>0 && is_array($arr))
		{
			for($i=0;$i<$numValues;$i++)
			{
				$arr[$i]=($arr[$i]==='this')?$arr[$i]:$this->jParam($arr[$i]);
				$v.='$('.$arr[$i].').append('.$this->jParam($values[$i]).');'.$this->eol;
			}
		}
		return $v;
		
	}//Eof Method "jQuery_Append"

/**
 * https://api.jquery.com/attr/
 *
 * 
 * @param array $arr
 */
	public function jQuery_Attribute(array $arr=NULL){
		
		$arr[0]=($arr[0]==='this')?$arr[0]:$this->jParam($arr[0]);
		return '$('.$arr[0].').attr('.$this->jParam($arr[1]).');'.$this->eol;
		
	}//Eof Method "jQuery_Attribute"

/**
 * https://api.jquery.com/click/
 *
 * 
 * @param array $arr
 */
	public function jQuery_fClick(array $arr=NULL){
		
		$str='';
		$arr[0]=($arr[0]==='this')?$arr[0]:$this->jParam($arr[0]);
		$str.='$('.$arr[0].').click(function(){'.$this->eol;
		$str.=$arr[1];
		$str.='});'.$this->eol;
		return $str;
		
	}//Eof Method "jQuery_fClick"

/**
 * https://api.jquery.com/attr/
 * 
 * @param array $arr
 */
	public function jQuery_setAttributeToElement(array $arr=NULL){
	
		$arr[0]=($arr[0]==='this')?$arr[0]:$this->jParam($arr[0]);
		return '$('.$arr[0].').attr('.$this->jParam($arr[1]).','.$this->jParam($arr[2]).');'.$this->eol;
		
	}//Eof Method "jQuery_setAttrToElement"

/**
 * https://api.jquery.com/addClass/
 * Generates a single call to addClass from jQuery 
 * @param string id
 * @param string class
 */
	public function jQuery_addClassTo(array $arr=NULL){
		
		$arr[0]=($arr[0]==='this')?$arr[0]:$this->jParam($arr[0]);
		return '$('.$arr[0].').addClass('.$this->jParam($arr[1]).');'.$this->eol;
		
	}//Eof Method "jQuery_addClass"

/**
 * https://api.jquery.com/addClass/
 * Generates addClass from jQuery in a row 0+n
 * @param array id
 * @param array classes
 */
	public function jQuery_addClassesTo(array $id,array $classes){
		
		$v='';
		$current='';
		$numClasses = count($classes);
		if($numClasses>0 && is_array($id))
		{
			for($i=0;$i<$numClasses;$i++){
				$current=$id[$i];
				if($current==='this')
				{
					$v.='$('.$current.').addClass('.$this->jParam($classes[$i]).');'.$this->eol;
				}
				else
				{
					$search='#+';
					$searchLen=strlen($search);
					$pos=strpos($current,$search);
					if($pos!==false)
					{
						$v.='$('.$this->jParam('#').'+'.substr($current,$searchLen).').addClass('.$this->jParam($classes[$i]).');'.$this->eol;
					}
					else $v.='$('.$this->jParam($current).').addClass('.$this->jParam($classes[$i]).');'.$this->eol;
				}
			}
		}
		return $v;
		
	}//Eof Method "jQuery_addClasses"

/**
 * https://api.jquery.com/remove/
 * takes elements out of the DOM
 *
 * @param string id
 */
	public function jQuery_removeElement(string $id=NULL){
		
		$id=($id==='this')?$id:$this->jParam($id);
		return '$('.$id.').remove();'.$this->eol;
		
	}//Eof Method "jQuery_removeElement"

/**
 * https://api.jquery.com/removeClass/
 * takes elements out of the DOM
 *
 * @param string id
 */
	public function jQuery_removeClassesFromElements(array $arr=NULL){
		
		$v='';
		if(is_array($arr))
		{
			foreach($arr as $key=>$value)
			{
				$key=($key==='this')?$key:$this->jParam($key);
				$v.='$('.$key.').removeClass('.$this->jParam($value).');'.$this->eol;
			}
		}
		
		return $v;
		
	}//Eof Method "jQuery_removeClassesFromElements"

/**
 * Remove classes from id or class and set attribute with value in html tag
 *
 * @param array arr
 */
	public function jQuery_removeClassesAddAttributes(array $arr){
		
		$v='';
		if(is_array($arr))
		{
			foreach($arr as $key=>$value)
			{
				$key=($key==='this')?$key:$this->jParam($key);
				$v.='$('.$key.').removeClass('.$this->jParam($value['removecls']).');'.$this->eol;
				$v.='$('.$key.').attr(\'id\','.$this->jParam($value['id']).');'.$this->eol;// Need to fix: set attribute name
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
			foreach($arr as $key=>$value)
			{
				$key=($key==='this')?$key:$this->jParam($key);
				$v.='$('.$key.').removeClass('.$this->jParam($value['removecls']).');'.$this->eol;
				$v.='$('.$key.').empty();'.$this->eol;
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
	
		return $this->tabs.'<script>'.$this->eol.
			   ((self::USE_COMMENTS)?$this->tabs."\t".'/* /bof document.ready */'.$this->eol:'').
			   $this->tabs."\t".'$(document).ready(function(){'.$this->eol.
			   $content.$this->eol.
			   $this->tabs."\t".'});'.$this->eol.
			   ((self::USE_COMMENTS)?$this->tabs."\t".'/* /eof document.ready */'.$this->eol:'').
			   $this->tabs.'</script>'.$this->eol;
		
	}//Eof Function "jQuery_DocReady"
	
}//Eof Trait "JavaScriptRessourceManagement"

?>