<?php
/*
 * TRAIT :: HTMLRESSOURCEMANAGEMENT
 * ==================================
 *
 *
*/
namespace Dmount\HTMLSiteStructure\RessourceManagement;

trait HtmlRessourceManagement {

/**
 * 
 *
 * @param 
 * @return
 */	
	public function tab(int $num=NULL){
		
		$tabs='';
		for($i=0;$i<$num;$i++)
		{
			$tabs.="\t";
		}
		return $tabs;
		
	}//Eof Method "tab"
	
/**
 * 
 *
 * @param 
 * @return
 */		
	public function nice(int $num=NULL){
	
		if(defined('NICE_HTML') && NICE_HTML)
		{
			$this->tabs=$this->tab($num);
			$this->eol="\n";
		}
		elseif((defined('NICE_HTML') && !NICE_HTML) or (!defined('NICE_HTML')))
		{
			$this->tabs="";
			$this->eol="";
		}
		
	}//Eof Method "nice"

/**
 * 
 *
 * @param 
 * @return
 */		
	public function crunch(){
		
		$this->tabs="";
		$this->eol="";
		
	}//Eof Method "crunch"
	
}//Eof Trait "HtmlRessourceManagement"

?>