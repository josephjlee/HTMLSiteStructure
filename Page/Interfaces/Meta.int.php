<?php
/**
 * DMOUNT META INTERFACE
 * =====================
 *
 * Page Meta Interface is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

interface iMeta {
	
	public function charset();
	public function ieCompability();
	public function title();
	public function manifest();
	public function description();
	public function keywords();
	public function apple();
	public function viewport();
	public function canonical();
	
}//Eof Interface

?>