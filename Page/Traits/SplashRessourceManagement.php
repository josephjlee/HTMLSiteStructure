<?php
/*
 * TRAIT :: SPLASHRESSOURCEMANAGEMENT
 * ==================================
 *
 *
 * possible Options for animated classes:
 *
 * - bounce, flash, pulse, rubberBand, shake, headShake, swing, tada
 *   wobble, jello, bounceIn, bounceInDown, bounceInLeft, bounceInRight, 
 *	bounceInUp, bounceOut, bounceOutDown, bounceOutLeft, bounceOutRight,
 *	bounceOutUp, fadeIn, fadeInDown, fadeInDownBig, fadeInLeft, fadeInLeftBig, 
 *	fadeInRight, fadeInRightBig, fadeInUp, fadeInUpBig, fadeOut, fadeOutDown, 
 *	fadeOutDownBig, fadeOutLeft, fadeOutLeftBig, fadeOutRight, fadeOutRightBig,
 *	fadeOutUp, fadeOutUpBig, flipInX, flipInY, flipOutX, flipOutY, lightSpeedIn, 
 *	lightSpeedOut, rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, 
 *	rotateInUpRight, rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, 
 *	rotateOutUpRight, hinge, jackInTheBox, rollIn, rollOut, zoomIn, zoomInDown, zoomInLeft, 
 *	zoomInRight, zoomInUp, zoomOut, zoomOutDown, zoomOutLeft, zoomOutRight, zoomOutUp, slideInDown,
 *	slideInLeft, slideInRight, slideInUp, slideOutDown, slideOutLeft, slideOutRight, slideOutUp
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
			$bofComment='/* bof splash-step-'.$step.' */';
			$eofComment='/* /eof splash-step-'.$step.' */';
			return array($bofComment,$eofComment);
		}
		
	}//Eof Method "setComments"*/

/**
 * 
 *
 * @param 
 */
	public function setjFunc(
							  string $mainAnimID = NULL,
							  string $mainAnimFunc = NULL,
							  string $animType = NULL,
							  string $content = NULL,
							  int $step = NULL
							  ) 
	{

		$arr=$this->setComments($step);

		//call jQuery extended object
		$v=$arr[0];
		$v.='$(\''.$mainAnimID.'\').'.$mainAnimFunc.'(\''.$animType.'\',function(){';
		$v.=$content;
		$v.='});';
		$v.=$arr[1];
		
		unset($bofComment,$eofComment);
		return $v;
		
	}//Eof Method "setjFunc"

/**
 * 
 *
 * @param 
 */
	public function setSplashID(){
		
		$this->pageID = '#page-'.self::NAME_SPLASH;
		$this->pageHeaderID = '#page-'.self::NAME_SPLASH.'-header';
		$this->pageSubtitleID = '#page-'.self::NAME_SPLASH.'-subtitle';
		$this->pageBrandID = '#page-'.self::NAME_SPLASH.'-brand';
		
	}//Eof Method "setSplashID"

/**
 * 
 *
 * @param 
 */
	public function splash(array $animTypes=NULL, int $steps=2, int $step=NULL){
	
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
				if($steps>1)
					$nextStep=$this->splash(NULL,2,2);
				$animType=$this->animTypes[1];
				$content='$(\''.$this->pageBrandID.'\').removeClass(\''.$mainAnimClass.' '.$this->animTypes[0].' '.$brandAnimOutro.'\');
						  $(\''.$this->pageBrandID.'\').empty();
						  $(\''.$this->pageSubtitleID.'\').removeClass(\''.$mainAnimClass.' zoomInLeft '.$subtitleAnimOutro.'\');
						  $(\''.$this->pageSubtitleID.'\').empty();
						  '.$nextStep;  
				return $this->setjFunc($mainAnimID,$mainAnimFunc,$animType,$content,$step);
				break;
				
			case 2:
				$animType=$this->animTypes[2];
				$content='$(\''.$this->pageID.'\').removeClass(\'splash\');
						  $(\''.$this->pageID.'\').attr(\'id\',\'page-header-container\');
						  $(\''.$this->pageBrandID.'\').removeClass(\'splash\');
						  $(\''.$this->pageBrandID.'\').attr(\'id\',\'page-brand\');
						  $(\''.$this->pageSubtitleID.'\').remove(); 
						  $(\''.$this->pageHeaderID.'\').attr(\'id\',\'page-header\');'; 
				return $this->setjFunc($mainAnimID,$mainAnimFunc,$animType,$content,$step);
				break;
				
			default:
				//
				$this->animTypes=$animTypes;
				unset($animTypes);
				$animType=$this->animTypes[0];
				$content='setTimeout(function(){
						  '.$this->jQuery_addClassesTo(array($this->pageSubtitleID,$this->pageBrandID),
						  							   array($mainAnimClass.' '.$subtitleAnimOutro,
													   		 $mainAnimClass.' '.$brandAnimOutro)).
															 $this->splash(NULL,2,1).'
						  },timeoutSteps);/* /eof setTimeout*/
						  clearTimeout();';
				return $this->setjFunc($mainAnimID,$mainAnimFunc,$animType,$content,$step);
				break;
		}//Eof Switch
		
	}//Eof Method "set"
	
}//Eof trait "SplashRessourceManagement"

?>