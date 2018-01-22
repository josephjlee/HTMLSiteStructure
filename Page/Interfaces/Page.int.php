<?php
/**
 * DMOUNT PAGE INTERFACE
 * =====================
 *
 * Page Interface is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

interface iPage {
	
	public function doctype();
	public function head();
	public function body();
	public function html();
	
}//Eof Interface "iPage"

?>