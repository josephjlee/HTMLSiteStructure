<?php
/*
 * TRAIT :: SPLASHRESSOURCEMANAGEMENT
 * ==================================
 *
 * Methods to build a Splash Screen for landing page
 * Used with animated css classes. All options are described down below. 
 * Needs only a brand and a subtitle.
 * Has up to three steps of tweening.
 *
 * possible Options for animated classes:
 *
 * - bounce, flash, pulse, rubberBand, shake, headShake, swing, tada
 *   wobble, jello, bounceIn, bounceInDown, bounceInLeft, bounceInRight, 
 *	 bounceInUp, bounceOut, bounceOutDown, bounceOutLeft, bounceOutRight,
 *	 bounceOutUp, fadeIn, fadeInDown, fadeInDownBig, fadeInLeft, fadeInLeftBig, 
 *	 fadeInRight, fadeInRightBig, fadeInUp, fadeInUpBig, fadeOut, fadeOutDown, 
 *	 fadeOutDownBig, fadeOutLeft, fadeOutLeftBig, fadeOutRight, fadeOutRightBig,
 *	 fadeOutUp, fadeOutUpBig, flipInX, flipInY, flipOutX, flipOutY, lightSpeedIn, 
 *	 lightSpeedOut, rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, 
 *	 rotateInUpRight, rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, 
 *	 rotateOutUpRight, hinge, jackInTheBox, rollIn, rollOut, zoomIn, zoomInDown, zoomInLeft, 
 *	 zoomInRight, zoomInUp, zoomOut, zoomOutDown, zoomOutLeft, zoomOutRight, zoomOutUp, slideInDown,
 *	 slideInLeft, slideInRight, slideInUp, slideOutDown, slideOutLeft, slideOutRight, slideOutUp
 *
*/
namespace Dmount\HTMLSiteStructure\RessourceManagement;

trait SplashRessourceManagement {

/**
 * Helper util for comments around at the splash object
 *
 * @param 
 */
	public function setComments(int $step=NULL){
	
		if(self::USE_COMMENTS)
		{
			//set comments
			if($step === NULL)
				$step = 'default';
			$bofComment='/* bof '.self::NAME_SPLASH.'-step-'.$step.' */';
			$eofComment='/* /eof '.self::NAME_SPLASH.'-step-'.$step.' */';
			return array($bofComment,$eofComment);
		}
		
	}//Eof Method "setComments"*/

/**
 * 
 *
 * @param 
 */
	public function setSplashID(){
		
		$prefixID='page';
		$seperatorID='-';
		$pound='#';
		$this->pageID = $pound.$prefixID.$seperatorID.self::NAME_SPLASH;
		$this->pageHeaderID = $pound.$prefixID.$seperatorID.self::NAME_SPLASH.$seperatorID.'header';
		$this->pageSubtitleID = $pound.$prefixID.$seperatorID.self::NAME_SPLASH.$seperatorID.'subtitle';
		$this->pageBrandID = $pound.$prefixID.$seperatorID.self::NAME_SPLASH.$seperatorID.'brand';
		
	}//Eof Method "setSplashID"

/**
 * Call splash screen, select
 *
 * @param array animTypes
 * @param integer step
 * @param integer steps
 */
	public function splash(array $animTypes=NULL, int $steps=2, int $step=NULL){
	
		$prefixID='page';
		$seperatorID='-';
	
		//define main animation
		$mainAnimClass = 'animated';
		$mainAnimFunc = 'animateCss';
		$mainAnimID = $this->pageBrandID;
		
		$brandAnimOutro = 'zoomOutLeft';
		$subtitleAnimOutro = 'zoomOutRight';
		
		if($steps>=3)
			$steps=0;
			
		switch($step)
		{
			case 1:
				unset($content);
				if($steps>1)
					$nextStep=$this->splash(NULL,2,2);
				$animType=$this->animTypes[1];
				$content='$(\''.$this->pageBrandID.'\').removeClass(\''.$mainAnimClass.' '.$this->animTypes[0].' '.$brandAnimOutro.'\');'.PHP_EOL.
						 '$(\''.$this->pageBrandID.'\').empty();'.PHP_EOL.
						 '$(\''.$this->pageSubtitleID.'\').removeClass(\''.$mainAnimClass.' zoomInLeft '.$subtitleAnimOutro.'\');'.PHP_EOL.
						 '$(\''.$this->pageSubtitleID.'\').empty();'.PHP_EOL.
						 $nextStep;  
				return $this->setjFunc($mainAnimID,$mainAnimFunc,$animType,$content,$step);
				break;
				
			case 2:
				unset($content);
				$animType=$this->animTypes[2];
				$content='$(\''.$this->pageID.'\').removeClass(\''.self::NAME_SPLASH.'\');'.PHP_EOL.
						 '$(\''.$this->pageID.'\').attr(\'id\',\''.$prefixID.$seperatorID.'header'.$seperatorID.'container\');'.PHP_EOL.
						 '$(\''.$this->pageBrandID.'\').removeClass(\''.self::NAME_SPLASH.'\');'.PHP_EOL.
						 '$(\''.$this->pageBrandID.'\').attr(\'id\',\''.$prefixID.$seperatorID.'brand\');'.PHP_EOL.
						 '$(\''.$this->pageSubtitleID.'\').remove();'.PHP_EOL.
						 '$(\''.$this->pageHeaderID.'\').attr(\'id\',\''.$prefixID.$seperatorID.'header\');'.PHP_EOL;
				return $this->setjFunc($mainAnimID,$mainAnimFunc,$animType,$content,$step);
				break;
				
			default:
				//
				$this->animTypes=$animTypes;
				unset($animTypes);
				$animType=$this->animTypes[0];
				$content=$this->jSetTimeout($this->jQuery_addClassesTo(array($this->pageSubtitleID,$this->pageBrandID),
						  							 	   			   array($mainAnimClass.' '.$subtitleAnimOutro,
													   	   	     			 $mainAnimClass.' '.$brandAnimOutro)).PHP_EOL.
														   	     	   $this->splash(NULL,2,1),'timeoutSteps');
				return $this->setjFunc($mainAnimID,$mainAnimFunc,$animType,$content,$step);
				break;
		}//Eof Switch
		
	}//Eof Method "splash"
	
}//Eof trait "SplashRessourceManagement"

?>