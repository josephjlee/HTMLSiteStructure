<?php
/**
 * INTERFACE :: SPLASH
 * =====================
 *
 * Interface for Splash is a...
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

interface iSplash {
	
	 public function setComments(int $step=NULL);
	 public function setSplashID();
	 public function reinjectStepToDefault(array $arr1=NULL,array $arr2=NULL,string $function=NULL);
	 public function splash(array $animations=NULL,array $id=NULL,array $tween=NULL,array $c=NULL);
	
}//Eof Interface "Splash"

?>