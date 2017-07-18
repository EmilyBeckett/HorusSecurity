<?php
require_once('session.php');
class task
{
	function task()
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
    global $subpage;
    global $field;
    $r='<div class="attetszo" >';
      
      if (GetLevel()==0)
      {
        debug_to_console('Non authorized'); 
        //or something else authorizing
        $r.='You are not authorized user. Please, <a href="./?page=login" title="Log in" alt="Log in" onClick="ShowWaitBox(1);">log in</a>';
      }
      else
      {
        $lek='';
        debug_to_console('Authorized');
        debug_to_console('List '.$subpage);
        switch ($subpage)
        {
          case '1':    //new task - create new and list where the status is new
            $today=date('Y-m-d');
            $r.='<h2><center>New Task</center></h2>';
            $r.='Title<br><input type=text id=new_title style="width:200px;" required><p>';
            $r.='Category<br>'.GetSelectList('t_category','200px').'<p>';
            $r.='Assign to<br>'.GetSelectList('users','200px').'</s><p>';
            $r.='Deadline<br><input type=date id=new_deadline min="'.$today.'" value="'.$today.'" style="width:200px;" required><p>';
            
            $r.='Description<br><div id=new_desc contenteditable class=attetszo ></div>';
            $r.='<h2><center><button onClick="SaveTask();">Save</button></center></h2>';
            
            $r.='<h2><center>New tasks</center></h2>';
            $lek="select `id`, `title`, `create_by`, `owner`, `deadline`, `category`,`status`,
                (select u.name from users u where u.id=`owner`) as uname from tasks where `status`=1  order by ".$field.";";

          break;
          case 2:  //done tasks
            $r.='<h2><center>Done Tasks</center></h2>';
          
            $lek="select `id`, `title`, `create_by`, `owner`, `deadline`, `category`,`status`,
            (select u.name from users u where u.id=`owner`) as uname from tasks where `status`=3  order by ".$field.";";
          
          break;
          case 3: //deleted tasks
          //There is not real delet from the database, only state change to cancelled or deleted, it depend on the t_status table 
         
            $r.='<h2><center>Deleted Tasks</center></h2>';
            
            $lek="select `id`, `title`, `create_by`, `owner`, `deadline`, `category`,`status`,
            (select u.name from users u where u.id=`owner`) as uname from tasks where `status`=5  order by ".$field.";";
               
          break;
          default: $r='something went wrong:(';
        }
        
        if ($lek)
        {
          $r.='
          <table id="normal" width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#fafafa;">
    			<tr>
    				<th onClick="OrderBy(\'uname\');">Assigned to</th>
            <th onClick="OrderBy(\'category\');">Category</th>
            <th onClick="OrderBy(\'title\');">Title</th>
            <th onClick="OrderBy(\'crate_by\');">Created</th>
            <th onClick="OrderBy(\'deadline\');">Deadline</th>
            <th onClick="OrderBy(\'status\');">State</th><th>View</th>
    			</tr>
    			';
          foreach ($conn->query($lek) as $res)
          {  
            $r.='
      			<tr>
      				<td class="left">'.$res['uname'].'</td>
                <td>'.GetName('t_category',$res['category']).'</td>
                <td>'.$res['title'].'</td>
                <td>'.GetName('users',$res['create_by']).'</td>
                <td>'.$res['deadline'].'</td>
                <td>'.GetName('t_status',$res['status']).'</td>
                <td class="right" id="view_'.$res['id'].'"><img src="img/view.png" onClick="ViewTask('.$res['id'].')" style="cursor:pointer;"></td>
      			</tr>
            <tr style="display:none;" id=task_'.$res['id'].' >
      				<td class="left" colspan=5>itt lesz valami</td>
              <td class="right"></td>
            </tr>
      			';
          }
          $r.='</table>';
        }
      }  
      $r.='</div>';
    return $r;
  }
}

?>