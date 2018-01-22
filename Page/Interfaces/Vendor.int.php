<?php
/**
 * INTERFACE :: VENDOR
 * =====================
 *
 * Interface for Vendor Class is a 
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */ 
namespace Dmount\HTMLSiteStructure;

//Interfaces
interface iVendor {
	
	public function setCSS_FontAwesome();
	public function setCSS_BootsTrap();
	public function setCSS_Animate();
	
	public function setExtCSS_FullPage();
	
	public function setJS_jQuery();
	public function setJS_Tether();
	public function setJS_BootsTrap();
	public function setJS_FontAwesome();
	public function setJS_Howler();
	
	public function setExtJS_jQueryAnimateCSS();
	public function setExtJS_jQueryFullpage();
	public function setExtJS_HowlerSpatial();
	
	public function setJS_Modernizer();
	public function setJS_ImagesLoaded();
	public function setJS_iOsOrientationChange();
	
	public function setCSS_Group($typeOf=NULL);
	public function setJS_Group($typeOf=NULL);
	
	public function setSource($typeOf=NULL);
	
}//Eof Interface

?>