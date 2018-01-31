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
	public function setComments(int $step=NULL)
	{
	
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
	public function setSplashID()
	{
		
		$id='page';
		$s='-';
		$pound='#';
		$spl=self::NAME_SPLASH;
		
		$this->pageId = $pound.$id.$s.$spl.$s.'container';
		$this->headerId = $pound.$id.$s.$spl.$s.'header';
		$this->subtitleId = $pound.$id.$s.$spl.$s.'subtitle';
		$this->brandId = $pound.$id.$s.$spl.$s.'brand';
		
	}//Eof Method "setSplashID"

/**
 * Call splash screen
 *
 * Up to three of steps of tweening:
 * 
 * First (default):
 *	 - select a pair of animations for brand and subtitle
 *
 * If selected more than one step, extend default with:
 *	 - set timeout for screening the brand and subtitle for a short while (recommended is 5000 ms)
 *
 * @param array animTypes
 * @param array id get brand, header and header container id
 * @param integer steps 
 * @param integer step count up step for tweening by call them self in switch
 */
	public function splash(
						   array $animations=NULL,
						   array $id=NULL,
						   array $tween=NULL,
						   array $c=NULL
						  )
	{
		/*
		* Inject var at the first call with values for maintaining the method
		*/
		if($animations !== NULL && $id !== NULL)
		{
			$this->animations=$animations;
			$this->bid=$id[0];
			$this->hid=$id[1];
			$this->hcid=$id[2];
			$this->step=$tween[1];
			$this->c=$c;
		}
		else 
		{
			/*
			* Reinject step var
			*/
			$this->step=$tween[1];
		}

		/*
		* Setting tween instance used as argument
		*/
		$tweenInstance=$this->step+1;//callback var	
		
		/*
		* Check steps, if higher than x
		*/
		if($this->step===NULL)
			$this->steps=($tween[0]>=3)?0:$tween[0];

		/*
		* Tag id, where we use the animation callback functionality
		*/
		$spl=self::NAME_SPLASH;
		$mainAnimID=$this->brandId;

		switch($this->step)
		{
			//
			case 1:
				$nextStep=($this->steps>1)?$this->splash(NULL,NULL,array(NULL,$tweenInstance)):'';
				$anim=$this->animations[1];
				$pidArr=array($mainAnimID=>array('removecls'=>$this->c[0].' '.$this->animations[0].' '.$anim),
							  $this->subtitleId=>array('removecls'=>$this->c[0].' '.$this->c[2].' '.$this->c[3]));
				$pidArr2=array($this->pageId=>array('removecls'=>$spl,'id'=>$this->hcid),
							   $mainAnimID=>array('removecls'=>$spl,'id'=>$this->bid));					  
				$content=$this->jQuery_removeClassesEmptyElement($pidArr).
						 $this->jQuery_removeClassesAddAttributes($pidArr2).
						 $this->jQuery_removeElement($this->subtitleId).
						 $this->jQuery_setAttributeToElement(array($this->headerId,'id',$this->hid)).
						 $nextStep; 
				return $this->jFunc($mainAnimID,$this->c[1],$anim,$content,$this->step);
				unset($pidArr,$pidArr2,$content);
				break;
			
			//Need to fix: step 2, to do: Optimize the step
			case 2:
				/* 
				* Fixes:
				* - put content values to step 1
				* - put pidArr to step 1 and renamed it to pidArr2
				* Old work-around (no values):
				* $anim=$this->animations[2];
				* $pidArr='';					  
				* $content='';
				* return $this->jFunc($mainAnimID,$this->c[1],$anim,$content,$this->step);
				* unset($anim,$pidArr,$content);
				*
				* If splash screen has two steps, this is the last optional callback
				* At the moment no values, may a workaround to build page
				*
				*/
				break;
			
			//
			default:
				$anim=$this->animations[0];
				unset($animations);
				if($this->steps>0)
				{
					$content=$this->jSetTimeout(
								 $this->jQuery_addClassesTo(array($this->subtitleId,$mainAnimID),
															array($this->c[0].' '.$this->c[3],
																  $this->c[0].' '.$anim)).
							 $this->splash(NULL,NULL,array(NULL,$tweenInstance)),'timeoutSteps');
				}
				else $content=$this->jQuery_addClassesTo(array($this->subtitleId,$mainAnimID),
														 array($this->c[0].' '.$this->c[3],
													  		   $this->c[0].' '.$anim));
				return $this->jFunc($mainAnimID,$this->c[1],$anim,$content,$this->step);
				
				break;
				
		}//Eof Switch
		
	}//Eof Method "splash"
	
}//Eof trait "SplashRessourceManagement"

?>