<?php
define('MYSQL_HOST','host');
define('MYSQL_USER','dbuser');
define('MYSQL_PASS','password');
define('MYSQL_DB','db');

define ('BHEAD','
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <script type="text/javascript" src="inc/jquery.js"></script>
  <script  src="inc/colResizable-1.6.js"></script>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  
			<link href="pc_style.css" rel="stylesheet" type="text/css">
      <link href="main.css" rel="stylesheet" type="text/css">
             ');


define ('SCRIPTS','
			<script type="text/javascript">
	$(function(){	

	
		$("#normal").colResizable({
			liveDrag:true, 
			gripInnerHtml:"<div class=\'grip\'></div>", 
			draggingClass:"dragging", 
            resizeMode:\'fit\'
        });
        
        $("#flex").colResizable({
            liveDrag:true, 
            gripInnerHtml:"<div class=\'grip\'></div>", 
            draggingClass:"dragging", 
            resizeMode:\'flex\'
        });


      $("#overflow").colResizable({
          liveDrag:true, 
          gripInnerHtml:"<div class=\'grip\'></div>", 
          draggingClass:"dragging", 
          resizeMode:\'overflow\'
      });
        

      $("#disabled").colResizable({
          liveDrag:true, 
          gripInnerHtml:"<div class=\'grip\'></div>", 
          draggingClass:"dragging", 
          resizeMode:\'overflow\',
          disabledColumns: [2]
      });

        
    });	
  </script>
			<script type="text/javascript" src="inc/AC_RunActiveContent.js"></script>
			<SCRIPT language="JavaScript1.2" src="inc/func.js" type="text/javascript"></SCRIPT>
			
			');
      
define ('TITLE','<title>Task manager</title>
			'
	);

define ('EHEAD','
			</head>
			');
define ('BBODY','<body class=body_bg align=center >

				<table id=main_div class="main_table" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr height="100%" valign=top>
				<td align=left id="bal_oldal">
  			<div class="main">');
//menu begin
define ('BMENU',' 
  <div class=menu_div>
');

//menu end
define ('EMENU','
  </div>
');

define ('BCCOL','
			
	  	<div class=tartalom>
	    <!-- inen jön az oldalanként változó tartalom-->');
	  		 
		  	
define('ECCOL','</div>');


define ('EBODY','
	
  ');
define ('EHTML','</div>
		</td></tr></table>
    
    ');
define('VEGE','    
    <div class="waitbox" id="waitbox"></div>
    
		</body></html>

');
    
?>
