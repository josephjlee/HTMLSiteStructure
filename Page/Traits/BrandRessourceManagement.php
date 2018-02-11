<?php
/*
 * TRAIT :: BRANDRESSOURCEMANAGEMENT
 * ==================================
 *
 *
*/
namespace Dmount\HTMLSiteStructure\RessourceManagement;

trait BrandRessourceManagement {
	
/**
 * 
 *
 * @param 
 */	
	public function setConfig(){
		
		/*
		* Prefix and seperator
		*/
		$s='-';
		$id=self::MAIN_NAME_ID;
		$prefixHeader='header';
		$prefixContainer='container';
		
		/*
		* Steps for tweening in splash screen (0, 1 or 2)
		* Need to fix: set configuration to splash screen
		*/
		$steps=self::STEPS;
		$mainAnimationClass='animated';
		$mainAnimationFunction='animateCss';
		
		/*
		* 
		*/
		$subtitleCssClass='subtitle';
		$subtitleAnimIntro='zoomInLeft';
		$subtitleAnimOutro='zoomOutRight';
		
		/*
		* Set configuration var for brand
		*/
		$brand='brand';//Classname & prefix for id
		$brandWidth='83';
		$brandHeight='38';
		$brandFirstAnimStep='bounceInDown';//Brand intro
		$brandSecondAnimStep='zoomOutLeft';//Brand outro after first animation tween instance
		$brandThirdAnimStep='fadeInRight';//Need to fix: actually it is not really running
		$brandTimeoutSteps=3000;//Set Timeout between tweening, when splash is used
		
		/*
		* Set id's
		*/
		$headerID=$id.$s.$prefixHeader;
		$headerContainerID=$id.$s.$prefixHeader.$s.$prefixContainer;
		$brandID=$id.$s.$brand;
		
		/*
			Configurations in splash method:
			$mainAnimID=$this->brandID;
		*/
		$use=(self::USE_SPLASH)?'true':'false';	
		$brandSplashID=(self::USE_SPLASH)?$id.$s.self::NAME_SPLASH.$s.$brand:NULL;
		
		return array('steps'=>$steps,
					 'bid'=>$brandID,
					 'hid'=>$headerID,
					 'hcid'=>$headerContainerID,
					 'cls'=>$brand,
					 'width'=>$brandWidth,
					 'height'=>$brandHeight,
					 'scls'=>$subtitleCssClass,
					 'use'=>$use,
					 'macls'=>$mainAnimationClass,
					 'mafnc'=>$mainAnimationFunction,
					 'saint'=>$subtitleAnimIntro,
					 'saout'=>$subtitleAnimOutro,
					 'ba1'=>$brandFirstAnimStep,
					 'ba2'=>$brandSecondAnimStep,
					 'ba3'=>$brandThirdAnimStep,
					 'bspid'=>$brandSplashID,
					 'bto'=>$brandTimeoutSteps);
		
	}//Eof Method "setConfig"

/**
 * 
 *
 * @param string typeOf: img, jquery-docready
 */	
	public function brand(string $typeOf='jquery-docready'){
		
		switch($typeOf){
			
			case 'img':break;
			
			case 'jquery-docready':
				
				$c='';
				$c=$this->setConfig();
				
				$subtitleClass=$c['scls'].((self::USE_SPLASH)?' '.$c['macls'].' '.$c['saint']:'');
				
				return  $this->tabs."\t\t".'var brand=new Brand('.$this->jParam($c['width']).','.$this->jParam($c['height']).','.$this->jParam($c['bid']).','.$this->jParam($c['bspid']).','.$c['use'].');'.$this->eol.
					    $this->tabs."\t\t".'var timeoutSteps='.$c['bto'].';'.$this->eol.
					    $this->jQuery_addClassesTo(array($this->brandId,$this->subtitleId),
												   array($c['cls'],$subtitleClass)).
					   (self::USE_SPLASH?$this->splash(array($c['ba1'],$c['ba2'],$c['ba3']),
					   								   array($c['bid'],$c['hid'],$c['hcid']),
													   array($c['steps'],NULL),
													   array($c['macls'],$c['mafnc'],$c['saint'],$c['saout'])):'');
													   
				break;
				
			default:
		
		}//Eof Switch
		
	}//Eof Method "brand"
	
}//Eof Trait "BrandRessourceManagement"

?>