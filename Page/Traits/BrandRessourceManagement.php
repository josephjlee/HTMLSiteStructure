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
		
		$brandID=$this->jQuery_setParam('page-brand');
		$brandCssClass='brand';
		$brandWidth=$this->jQuery_setParam('83');
		$brandHeight=$this->jQuery_setParam('38');
		
		$subtitleCssClass='subtitle ';
		
		if(self::USE_SPLASH)
		{	
			$use='true';
			$subtitleAnimClass='animated zoomInLeft';
			
			$brandFirstAnimStep='bounceInDown';
			$brandSecondAnimStep='zoomOutLeft';
			$brandThirdAnimStep='bounceInDown';
					
			$brandSplashID=$this->jQuery_setParam('page-splash-brand');
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
				
				$v=$this->setConfig();
				
				return 'var brand=new Brand('.$v['width'].','.$v['height'].','.$v['bid'].','.$v['bspid'].','.$v['use'].');
						var timeoutSteps='.$v['bto'].';
						'.$this->jQuery_addClassesTo(
													 array($this->pageBrandID,$this->pageSubtitleID),
													 array($v['cls'],$v['scls'].$v['sacls'])
													 ).
							(self::USE_SPLASH?$this->splash(array($v['ba1'],$v['ba2'],$v['ba3'])):'');
				break;
				
			default:
		
		}//Eof Switch
		
	}//Eof Method "brand"
	
}//Eof Trait "BrandRessourceManagement"

?>