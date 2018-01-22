<?php
/**
 * INTERFACE :: SPLASH
 * =====================
 *
 * Interface for Splash is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

interface iSplash {
	
	 public function setComments(int $step=NULL);
	 public function setjFunc(string $mainAnimID=NULL,string $mainAnimFunc=NULL,string $animType=NULL,string $content=NULL,int $step=NULL);
	 public function setSplashID();
	 public function splash(array $animTypes=NULL,int $steps=2,int $step=NULL);
	
}//Eof Interface "Splash"

?>