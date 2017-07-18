<?php
header('Content-Type: text/html; charset=utf-8');
require_once('session.php');
ini_set("display_errors", 0);
date_default_timezone_set('Europe/London');
global $param;
$param = $_GET['param'];

switch($param)
{
  case 'AddUser':
    echo AddUser();
  break;
  case 'AddType':
    echo AddType();
  break;
  case 'AddTask':
    echo AddTask();
  break;
  case 'ViewTask':
    echo ViewTask();
  break;
  case 'ModifyTask':
    echo ModifyTask();
  break;
  case 'OrderBy':
    echo OrderBy();
  break;
  default: echo 0;		
}		
                
function AddUser()
{
  global $conn;
  $ins=$conn->prepare("INSERT INTO `users`(`name`, `pass`, `level`) VALUES (:name,:pass,:level);");
    $ins->bindParam(':name', $_GET['name']);
    $ins->bindParam(':pass', md5('default')); //just for now
    $ins->bindParam(':level', $_GET['level']);
  $ins->execute();
  debug_to_console('AddUser in work: '.$ins->debugDumpParams()); 
  
  return 'ok';
}

function AddType()
{
  global $conn;
  $ttable=$_GET['table'];
  $ins=$conn->prepare("INSERT INTO ".$ttable."(`name`) VALUES (:name);");
    $ins->bindParam(':name', $_GET['name']);
  $ins->execute();
  debug_to_console('AddType in work: '.$ins->debugDumpParams()); 
  
  return 'ok';
}

function AddTask()
{
  global $conn;
  global $userid;
  $ins=$conn->prepare("INSERT INTO `tasks`(`title`, `description`, `create_by`, `owner`, `create_time`, `status`, `deadline`, `category`) VALUES 
  (:title,:desc,:create,:owner,now(),1,:deadline,:category);");
    $ins->bindParam(':title', $_GET['title']);
    $ins->bindParam(':desc', $_GET['desc']);
    $ins->bindParam(':create', $userid);
    $ins->bindParam(':owner', $_GET['own']);
    $ins->bindParam(':deadline', $_GET['dl']);
    $ins->bindParam(':category', $_GET['cat']);
  $ins->execute();
  debug_to_console('AddTask in work: '.$ins->debugDumpParams()); 
  
  
  return 'ok';

}
           
function ViewTask()
{
  global $conn;
  $r='';
  $taskid=$_GET['id'];
  $lek="select `description`, `title`, `owner`, `deadline`, `category`,`status` from tasks where `id`=".$taskid.";";
  if ($res=$conn->query($lek)->fetch())
  {
      
      
      if ($_GET['mode']==0) //only view
      {
        $r.='<td class="left" colspan=6>';
        $r.=$res['description'];
        $r.='</td><td class="right"></td>';
      }
      elseif ($_GET['mode']==1)  //modify
      {
        $r.='<td class="left" colspan=6>';
        $r.='State<br>'.GetSelectListDefault('t_status','200px',$res['status']).'<p>';
        $r.='Title<br><input type=text id=mod_title style="width:200px;" required value="'.$res['title'].'"><p>';
        $r.='Category<br>'.GetSelectListDefault('t_category','200px',$res['category']).'<p>';
        $r.='Assign to<br>'.GetSelectListDefault('users','200px',$res['owner']).'</s><p>';
        $r.='Deadline<br><input type=date id=mod_deadline min="'.$today.'" style="width:200px;" required value="'.$res['deadline'].'"><p>';
        
        $r.='Description<br><div id=mod_desc contenteditable class=attetszo >'.$res['description'].'</div>';
        
      
      
        $r.='</td>';
        $r.='
            <td class="right"><img src="img/save.png" title="Save" alt="Save" onClick="ModifyTask('.$taskid.')" style="cursor:pointer;"></td>
        ';
      }          
      else   //more if need
      {
        $r.='<td class="left" colspan=6></td>';
        $r.='<td class="right"></td>';
      }
  }
  return $r;
}

function ModifyTask()
{
  global $conn;
  global $userid;
  $text="update `tasks` set `title`='".$_GET['title']."', 
  `description`='".$_GET['desc']."', 
  `owner`='".$_GET['own']."', 
  `deadline`='".$_GET['dl']."',
  `category`='".$_GET['cat']."'
  `status`='".$_GET['stat']."' where `id`='".$_GET['id']."';";
                                                            
  $upd=$conn->prepare("update `tasks` set `title`=:title,`description`=:desc, 
  `owner`=:owner,`deadline`=:deadline,`category`=:category,`status`=:status where `id`=:id;");
    $upd->bindParam(':title', $_GET['title']);
    $upd->bindParam(':desc', $_GET['desc']);
    $upd->bindParam(':owner', $_GET['own']);
    $upd->bindParam(':deadline', $_GET['dl']);
    $upd->bindParam(':category', $_GET['cat']);
    $upd->bindParam(':status', $_GET['stat']);
    $upd->bindParam(':id', $_GET['id']);
    
  $upd->execute();                                        
  debug_to_console('ModifyTask in work: '.$upd->debugDumpParams()); 
  return $text;

}

function OrderBy()
{
  global $field;
  $_SESSION['field']=$field=$_GET['field'];
  return 'ok';
}

?>