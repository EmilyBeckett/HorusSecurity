<?php
require_once('session.php');
class options
{
	function options()
	{
	//
	}
	function destroy()
	{
	//
	}
	function Show()//page containt
	{	
    global $conn;
    
    $r='<h2><center>Options</center></h2>';
    $r.='<div class="attetszo" >';
      
    if (GetLevel()==0)
    {
      //or something else authorizing
      $r.='You are not authorized user. Please, <a href="./?page=login" title="Log in" alt="Log in" onClick="ShowWaitBox(1);">log in</a>';
    }
    else
    {
      $r.='<p>These are the main tables. The users and the types. You can add new ones to them. You can´t modify or delete because the tasks table and the functions depend on these.</p>';
      ///Userlist
      $r.='<p>Users</p>';
      $r.='
            <table id="normal" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#fafafa;">
      			<tr>
      				<th>ID</th><th>Name</th><th>Level</th><th></th>
      			</tr>
      			';
            
      $lek="select * from users;";
      foreach ($conn->query($lek) as $res)
      {
            $r.='<tr>
      				<td class="left">'.$res['id'].'</td>
                <td>'.$res['name'].'</td>
                <td>'.GetName('t_level',$res['level']).'</td>
                <td class="right"></td>
      			</tr>
      			';
      }
      $r.='<tr>
      				<td class="left"></td>
                <td id=u_name contenteditable></td>
                <td>'.GetSelectList('t_level','98px').'</td>
                <td class="right"><img src="img/add.png" onClick="AddUser();" style="cursor:pointer;"></td>
      			</tr>
        </table>			';
      ///Level list
      $r.='<p>Levels - authority</p>';
      $r.='
            <table id="normal" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#fafafa;">
      			<tr>
      				<th>ID</th><th>Name</th><th></th>
      			</tr>
      			';
            
      $lek="select * from t_level;";
      foreach ($conn->query($lek) as $res)
      {
            $r.='<tr>
      				<td class="left">'.$res['id'].'</td>
                <td>'.$res['name'].'</td>
                <td class="right"></td>
      			</tr>
      			';
      }
      $r.='<tr>
      				<td class="left"></td>
                <td id=l_name contenteditable></td>
                <td class="right"><img src="img/add.png" onClick="AddType(\'t_level\',\'l_name\');" style="cursor:pointer;"></td>
      			</tr>
        </table>			';
       ///Category list
      $r.='<p>Categories of tasks</p>';
      $r.='
            <table id="normal" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#fafafa;">
      			<tr>
      				<th>ID</th><th>Name</th><th></th>
      			</tr>
      			';
            
      $lek="select * from t_category;";
      foreach ($conn->query($lek) as $res)
      {
            $r.='<tr>
      				<td class="left">'.$res['id'].'</td>
                <td>'.$res['name'].'</td>
                <td class="right"></td>
      			</tr>
      			';
      }
      $r.='<tr>
      				<td class="left"></td>
                <td id=c_name contenteditable></td>
                <td class="right"><img src="img/add.png" onClick="AddType(\'t_category\',\'c_name\');" style="cursor:pointer;"></td>
      			</tr>
        </table>			';
      ///Status list
      $r.='<p>Status of tasks</p>';
      $r.='
            <table id="normal" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#fafafa;">
      			<tr>
      				<th>ID</th><th>Name</th><th></th>
      			</tr>
      			';
            
      $lek="select * from t_status;";
      foreach ($conn->query($lek) as $res)
      {
            $r.='<tr>
      				<td class="left">'.$res['id'].'</td>
                <td>'.$res['name'].'</td>
                <td class="right"></td>
      			</tr>
      			';
      }
      $r.='<tr>
      				<td class="left"></td>
                <td id=s_name contenteditable></td>
                <td class="right"><img src="img/add.png" onClick="AddType(\'t_status\',\'s_name\');" style="cursor:pointer;"></td>
      			</tr>
        </table>			';  
    }
    $r.='</div>';
    return $r;
  }
}