<?php
require_once('session.php');
class menu
{
	function menu()
	{
	//
	}
	function destroy()
	{
	//
	}
	function Show()//oldal tartalma
	{
    global $userid;
    $ret='';
    $ret.='<table width=100%>
  <tr valign=middle>
    
    <td width="100" align="center"  style="border:none;">
          <a href="./?page=main" title="Tasks" alt="Tasks" onclick="ShowWaitBox(1);" style="color:#dedede;">
        <img src="img/list48.png"><br>List</a>
    </td>
    
    <td width=100 align=center style="border:none;">
      <a  href="./?page=task&spage=1" title="Add task" alt="Add task"  onClick="ShowWaitBox(1);" style="color:#dedede;">
        <img src="img/add_task_48.png"><br>Add task</a>
    </td>
    
    <td width=100 align=center style="border:none;">
      <a  href="./?page=task&spage=2" title="Ready" alt="Ready" onClick="ShowWaitBox(1);"  style="color:#dedede;">
        <img src="img/accept48.png"><br>Done tasks</a>
    </td>
    
    <td width=100 align=center style="border:none;">
      <a  href="./?page=task&spage=3" title="Recycle" alt="Recycle" onClick="ShowWaitBox(1);"  style="color:#dedede;">
        <img src="img/bin48.png"><br>Deleted tasks</a>
    </td>
    
    <td width=100 align=center style="border:none;">
      <a  href="./?page=options" title="Options" alt="Options"  onClick="ShowWaitBox(1);" style="color:#dedede;">
        <img src="img/options.png"><br>Options</a>
    </td>
    ';
  if ($userid)
    $ret.='
    <td width=100 align=center style="padding-right:20px;border:none;">
      <a  href="./?page=logout" title="Log out" alt="Log out" onClick="ShowWaitBox(1);" style="color:#dedede;">
        <img src="img/logout.png"><br>Log out</a>
    </td>
    ';
  else
    $ret.='
    <td width=100 align=center style="padding-right:20px;border:none;">
      <a  href="./?page=login" title="Log in" alt="Log in" onClick="ShowWaitBox(1);" style="color:#dedede;">
        <img src="img/login48.png"><br>Log in</a>
    </td>
    ';
    
  $ret.='     
  </tr></table>';
  return $ret;
  }
}