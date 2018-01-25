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
		
		$prefixBrand='brand';
		$prefixID='page';
		$seperatorID='-';
		$subtitleCssClass='subtitle ';
		
		
		$brandID=$this->jQuery_setParam($prefixID.$seperatorID.$prefixBrand);
		$brandCssClass=$prefixBrand;
		$brandWidth=$this->jQuery_setParam('83');
		$brandHeight=$this->jQuery_setParam('38');
		
		if(self::USE_SPLASH)
		{	
			$use='true';
			$subtitleAnimClass='animated zoomInLeft';
			
			$brandFirstAnimStep='bounceInDown';
			$brandSecondAnimStep='zoomOutLeft';
			$brandThirdAnimStep='bounceInDown';
					
			$brandSplashID=$this->jQuery_setParam($prefixID.$seperatorID.self::NAME_SPLASH.$seperatorID.$prefixBrand);
			$brandTimeoutSteps=5000;
		}
		else
		{
			$use='false';
			$brandSplashID='';
		}
		
		return array('bid'=>$brandID,
					 'cls'=>$brandCssClass,
					 'width'=>$brandWidth,
					 'height'=>$brandHeight,
					 'scls'=>$subtitleCssClass,
					 'use'=>$use,
					 'sacls'=>$subtitleAnimClass,
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
				
				$=$this->setConfig();
				
				return  "\t\t\t\t".'var brand=new Brand('.$c['width'].','.$c['height'].','.$c['bid'].','.$c['bspid'].','.$c['use'].');'.PHP_EOL.
					    "\t\t\t\t".'var timeoutSteps='.$c['bto'].';'.PHP_EOL.
					    $this->jQuery_addClassesTo(array($this->pageBrandID,$this->pageSubtitleID),
												   array($c['cls'],$c['scls'].$c['sacls'])).
					   (self::USE_SPLASH?$this->splash(array($c['ba1'],$c['ba2'],$c['ba3'])):'');
				break;
				
			default:
		
		}//Eof Switch
		
	}//Eof Method "brand"
	
}//Eof Trait "BrandRessourceManagement"

?>