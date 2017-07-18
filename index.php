<?php
///////////////////////////////////
///////////////////////////////////
//////   Emilia Nyeste  ///////////
//////      alias       ///////////
//////   Emily Beckett  ///////////
///////////////////////////////////
///////////////////////////////////
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('Europe/London');
require_once('inc/session.php');
require_once('inc/menu.php');
global $vpage;
require_once('inc/'.$vpage.'.php');

$actpage = new $vpage;
$menu = new menu;

////////setup page///////
$content=BHEAD;
$content.=SCRIPTS;
$content.=TITLE;
$content.=EHEAD;
$content.=BBODY;
$content.=BMENU;
$content.=$menu->Show();
$content.=EMENU;
$content.=BCCOL;
$content.=$actpage->Show();
$content.=ECCOL;
$content.=EBODY;
$content.=EHTML;
$content.=VEGE;
echo $content;
?>