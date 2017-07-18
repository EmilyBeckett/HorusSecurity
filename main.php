<?php
require_once('session.php');
class main
{
	function main()
	{
	//
	}
	function destroy()
	{
	//
	}
	function Show()//page containt
	{	
    global $userid;
    global $conn;
    global $field;
    $r='';
    if (GetLevel()==0)
    {
      debug_to_console('Main page without login!');
      //or something else authorizing
      $r='<div class="attetszo" >';
      $r.='You are not authorized user. Please, <a href="./?page=login" title="Log in" alt="Log in" onClick="ShowWaitBox(1);">log in</a>';
      $r.='</div>';
    }
    else
    { 
      debug_to_console('Main page with login! Authorized level:'.GetLevel().' and Userid: '.$userid);   
       $r.='<h2><center>Tasks</center></h2>';
        $r.='
        <table id="normal" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#fafafa;">
  			<tr>
  				<th onClick="OrderBy(\'uname\');">Assigned to</th><th onClick="OrderBy(\'category\');">Category</th>
          <th onClick="OrderBy(\'title\');">Title</th><th onClick="OrderBy(\'create_by\');">Created</th>
          <th onClick="OrderBy(\'deadline\');">Deadline</th><th onClick="OrderBy(\'status\');">Status</th><th>Modify</th>
  			</tr>
  			';
        $lek="select `id`, `title`, `create_by`, `owner`, `deadline`, `category`, `status`, 
        (select u.name from users u where u.id=`owner`) as uname from tasks order by `".$field."` limit 100;";  //there can be any filter, order, limit
        
        
      
        foreach ($conn->query($lek) as $res)
        {    
          debug_to_console('id: '.$res['id']); 
          $r.='
    			<tr>
    				<td class="left">'.$res['uname'].'</td>
              <td>'.GetName('t_category',$res['category']).'</td>
              <td>'.$res['title'].'</td>
              <td>'.GetName('users',$res['create_by']).'</td>
              <td>'.$res['deadline'].'</td>
              <td>'.GetName('t_status',$res['status']).'</td>
              <td class="right" id="view_'.$res['id'].'"><img src="img/view.png" onClick="ViewTask('.$res['id'].',1)" style="cursor:pointer;"></td>
    			</tr>
          <tr style="display:none;" id=task_'.$res['id'].' >
      				<td class="left" colspan=6>itt lesz valami</td>
              <td class="right"></td>
          </tr>
    			';
        }
        $r.='</table>';
    }
    return $r;
  }
}