<?php
/**
 * INTERFACE :: JQUERY
 * =====================
 *
 * Interface for jQuery is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

interface jQuery {
	
	/*
	* Javascript 
	*/
	public function jArray(array $arr);
	public function jSetTimeout(string $content=NULL,$timeoutParam=NULL);
	public function jFunc(string $id=NULL,string $func=NULL,string $type=NULL,string $content=NULL,int $comment=NULL); 
	public function jParam(string $param='');
	
	/*
	*
	*/
	public function jQuery_Append(array $arr=NULL,array $values=NULL);
	public function jQuery_fClick(array $arr=NULL);
	public function jQuery_removeElement(string $id=NULL);
	public function jQuery_setAttributeToElement(array $arr=NULL);
	public function jQuery_addClassTo(array $arr=NULL);
	public function jQuery_addClassesTo(array $id,array $classes);
	public function jQuery_removeClassesFromElements(array $arr=NULL);
	public function jQuery_removeClassesAddAttributes(array $arr);
	public function jQuery_removeClassesEmptyElement(array $arr);
	public function jQuery_DocReady();
	
}//Eof Interface

?>