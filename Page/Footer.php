<?php
/**
 * DMOUNT REC PAGE FOOTER
 * =====================
 *
 * Page Footer is a
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
class dmr_PageFooter {
	
	//
	public $detect;
	public $layout;
	public $vendor;

/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct($detect=NULL,$layout=NULL,$vendor=NULL){
		
		$this->detect = $detect;
		$this->layout = $layout;
		$this->vendor = $vendor;
		
		$this->setID();
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */
	public function setID(){
		
		$this->pageIntroID = '#page-intro';
		$this->pageIntroHeaderID = '#page-intro-header';
		$this->pageSVGBrandID = '#page-svg-brand';
		
	}//Eof Method "setID"

/**
 * 
 *
 * @param 
 */
	public function jQuery_DocReady(){
		
		return '<script>
				$(document).ready(function(){
					const pageSVGBrand=new dmrLogo;
					$(\''.$this->pageSVGBrandID.'\').animateCss(\'bounceInDown\',function(){
						setTimeout(function(){						
							$(\''.$this->pageSVGBrandID.'\').addClass(\'animated zoomOutLeft\');
							$(\''.$this->pageSVGBrandID.'\').animateCss(\'zoomOutLeft\',function(){
								$(\''.$this->pageSVGBrandID.'\').append(\'<p id="page-brand-text" class="fal fa-xs animated bounceInDown">DMOUNT RECORDS</p>\');
								$(\''.$this->pageSVGBrandID.'\').animateCss(\'bounceInDown\',function(){
									
									$(\''.$this->pageSVGBrandID.'\').empty();
									$(\''.$this->pageIntroID.'\').removeClass(\'pt50 mt0\');
									$(\''.$this->pageIntroHeaderID.'\').removeClass(\'mt100\');
									$(\''.$this->pageSVGBrandID.'\').removeClass(\'logo mt100 mb0 pb0\');
									
									$(\'#page-brand-text\').removeClass(\'animated bounceInDown zoomOutLeft\');
									
								});/* /eof animateCSS 3*/
								
								$(\''.$this->pageSVGBrandID.'\').removeClass(\'animated bounceInDown zoomOutLeft\');
								
							});/* /eof animateCSS 2*/
	
						},5000);/* /eof setTimeout*/
						clearTimeout();
					});/* /eof animateCSS 1*/
				});/* /eof document.ready*/
    			</script>';
		
	}//Eof Function "jQuery_DocReady"

/**
 * 
 *
 * @param 
 */	
	public function setContent(){

		return $this->jQuery_DocReady().$this->vendor->setJS_Group('footer');
		
	}//Eof Method "setContent"
	
}//Eof Class "dmr_PageFooter"

?>