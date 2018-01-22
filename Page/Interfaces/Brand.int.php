<?php
/**
 * INTERFACE :: BRAND
 * =====================
 *
 * Interface for Brand is a ...
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

interface iBrand {
	
	public function setConfig();
	public function brand(string $typeOf='jquery-docready');
	
}//Eof Interface "iBrand"

?>