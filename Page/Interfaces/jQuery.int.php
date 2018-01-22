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
	
	public function jQuery_setParam(string $param='');
	public function jQuery_addClassesTo(array $id,array $classes);
	public function jQuery_DocReady();
	
}//Eof Interface

?>