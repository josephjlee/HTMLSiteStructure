<?php
//Error Handling
error_reporting(E_ALL);
ini_set("display_errors", "on");

//Define Paths
define('DOCROOT',$_SERVER['DOCUMENT_ROOT']);
define('PATH_LOGS',DOCROOT.'/logs/');
define('PATH_STATIC',DOCROOT.'/static/');
define('PATH_WEBSERVICE',DOCROOT.'/webservice/');

//define Core-Path, if it's not already defined, f.e.: index.php
if(!defined('CORE'))
	define('CORE',DOCROOT.'/core/');

//Define Interfaces global dirname and fileending
define('DINT','/Interfaces/');
define('FINT','.int.php');

//Define Traits
define('DTRA','/Traits/');
define('FTRA','.php');

//Define Static Ressources
define('STATIC_SSL',true);
$staticSSL=(STATIC_SSL)?'https://':'http://';
define('STATIC_SUBDOMAIN',$staticSSL.'static.puretechno.de');
define('STATIC_IMG','/assets/images');
define('STATIC_CSS','/assets/css');
define('STATIC_JS','/assets/js');

//Include and instantiate classes

//Vendor Classes
require_once CORE.'/Http/Mobile_Detect.php'; $detect = new Dmount\Core\HttpManagement\Mobile_Detect;

require_once CORE.'/Page/Page.php'; 

?>
