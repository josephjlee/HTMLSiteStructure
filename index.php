<?php
/**
 * DMOUNT CONTENT MANAGEMENT SYSTEM
 * =====================
 *
 * Start processing the website
 *
 * @author     Original author: Salvatore Gonda <salvatore.gonda@web.de>       
 *
 * @version    0.0.1
 * @constant   CORE => define path to core library
 * @constant   CMS =>  define core file
 * @require	   cms.php
 * @call	   dm_Page
 *
 */
define('CORE',$_SERVER['DOCUMENT_ROOT'].'/core/');
define('CMS','cms.php');
require_once CORE.CMS;
new Dmount\HTMLSiteStructure\Page($meta,$vendor,$theme,$preloader,$header,$navigation,$sections,$layout,$footer);
?>