<?php
/**
 * CLASS :: NAVIGATION
 * =====================
 *
 * Class Navigation is a ...
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 */
namespace Dmount\HTMLSiteStructure;

use Dmount\Core\{
	HttpManagement\Mobile_Detect as Mobile_Detect
};

//Interface
require_once CORE.'Page'.DINT.'Navigation'.FINT;

class Navigation implements iNavigation, iContent, jQuery, iHtml {
	
	//Configuration
	const USE_COMMENTS = false;
	const USE_HTML_NAVBAR = false;
	const USE_JS_NAVBAR = false;
	
	//
	public $detect, $layout;
	
	//Trait		
	use	RessourceManagement\JavaScriptRessourceManagement,
		RessourceManagement\HtmlRessourceManagement;
	
/**
 * Construct an instance of this class
 *
 * @param 
 */
	public function __construct(
								Mobile_Detect $detect=NULL,
								Layout $layout=NULL
								)
	{
		
		$this->detect = $detect;
		$this->layout = $layout;
		$this->setPageID();
		$this->nice(2);
		
	}//Eof Construct

/**
 * 
 *
 * @param 
 */	
	public function setPageID(){
	
		$this->navigationId='page-nav';
		$this->tabContainerId='page-tab-container';
		
	}//Eof Method "setPageID"

########################################################################

/**
 * 
 *
 * @param 
 */	
	public function htmlTabs(){
	
		$str='';
		$str.='<ul class="tabs">';
		$str.='<li class="tab-link current animated bounceInDown" data-tab="tab-1"><span>Art</span></li>';
		$str.='<li class="tab-link animated bounceInDown" data-tab="tab-2"><span>Music</span></li>';
		$str.='<li class="tab-link animated bounceInDown" data-tab="tab-3"><span>Development</span></li>';
		$str.='</ul>';
		return $str;
		
	}//Eof Method "htmlTabs"

/**
 * 
 *
 * @param 
 */
	public function htmlTabContainer(){
		
		return '<div id="'.$this->tabContainerId.'"></div>';
		
	}//Eof Method "htmlTabContainer"

/**
 * 
 *
 * @param 
 */
	public function htmlTabsContent(){
		
		$str='';
		$str.='<div id="tab-1" class="tab-content current">'.$this->eol;
		$str.='Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'.$this->eol;
		$str.='</div>'.$this->eol;
		$str.='<div id="tab-2" class="tab-content">'.$this->eol;
		$str.='Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'.$this->eol;
		$str.='</div>'.$this->eol;
		$str.='<div id="tab-3" class="tab-content">'.$this->eol;
		$str.='Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'.$this->eol;
		$str.='</div>'.$this->eol;
		$str.='<div id="tab-4" class="tab-content">'.$this->eol;
		$str.='Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'.$this->eol;
		$str.='</div>'.$this->eol;
		return $str;
		
	}//Eof Method "htmlTabsContent"

/**
 * 
 *
 * @param string
 */
	public function jTabs(){
		
		//
		$pound='#';
		
		//set delay for nav sequences
		$navObjectTimeout=4500;
	
		//set content, classes and delays for tab sequences
		$tabMenu=$this->jArray(array('Connoisseur','Evolution','Vaudeville','Off Site'));
		$tabCls=$this->jArray(array('tabs','tab-link','animated bounceInDown'));
		$tabObjectTimeout=350;
		$tabContentObjTimeout=4855;
		$tabObj='';
		
		//set nav element at the last header child element and then
		//set div element inside nav element as container
		$tabObj.=$this->jQuery_Append(array('header','nav'),array($this->htmlNav(),$this->htmlTabContainer()));
										  
		//set constructor function for tabs
		$tabObj.=$this->jSetTimeout('var tabs=new Tabs('.$this->jParam($this->tabContainerId).','.$tabMenu.','.$tabCls.');'.$this->eol,$tabObjectTimeout);
		
		//set nav & tab inside of first sequence of tab build
		$tab=$this->jSetTimeout($tabObj,$navObjectTimeout);
		
		//set content inside of click event
		$eventDesc  = '';
		$eventDesc .= 'var tab_id='.$this->jQuery_Attribute(array('this','data-tab'));
		$eventDesc .= $this->jQuery_removeClassesFromElements(array('ul.tabs li'=>'current','.tab-content'=>'current'));
		$eventDesc .= $this->jQuery_addClassesTo(array('this',$pound.'+tab_id'),array('current','current'));
		
		//set click event inside of last seuqence
		$click=$this->jQuery_fClick(array($pound.$this->tabContainerId.' li', $eventDesc));
		$event=$this->jSetTimeout($click,$tabContentObjTimeout);
		
		return $tab.$event;
		
	}//Eof Method "jTabs"

/**
 * 
 *
 * @param 
 */	
	public function jTabsContent(){
		
		$str.='';
		
		$str.='<div id="tab-1" class="tab-content current">'.$this->eol;
		$str.='Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'.$this->eol;
		$str.='</div>'.$this->eol;
		$str.='<div id="tab-2" class="tab-content">'.$this->eol;
		$str.='Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'.$this->eol;
		$str.='</div>'.$this->eol;
		$str.='<div id="tab-3" class="tab-content">'.$this->eol;
		$str.='Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'.$this->eol;
		$str.='</div>'.$this->eol;
		$str.='<div id="tab-4" class="tab-content">'.$this->eol;
		$str.='Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'.$this->eol;
		$str.='</div>'.$this->eol;
		return $str;
		
	}//Eof Method "setTabContent"

########################################################################

/**
 * 
 *
 * @param 
 */
	public function htmlNav(){
		
		return '<nav id="'.$this->navigationId.'"></nav>';
		
	}//Eof Method "htmlNav"

/**
 * 
 *
 * @param 
 */
	public function htmlNavBar(){
		
		return '<!-- bof navbar --!>
				<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar'.$this->layout->cDepth2.'">
					<div class="container text-black">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
						</div>
					</div>
				</nav>
				<!-- eof navbar -->';
		
	}//Eof Method "htmlNavBar"

/**
 * 
 *
 * @param 
 */
	public function jNavBar(){
		
	}//Eof Method "jNavBar"

########################################################################

/**
 * 
 *
 * @param 
 */	
	public function setContent(){
		
		if(self::USE_HTML_NAVBAR)
		{
			return $this->htmlNavBar();
		}
		elseif(self::USE_JS_NAVBAR)
		{
			return $this->jNavBar();	
		}
		else return;
		
	}//Eof Method "setContent"
	
}//Eof Class "Navigation"

?>