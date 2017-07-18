<?php
if(!session_id()) session_start();
require_once('defs.php');
global $conn;
global $userid;
global $vpage;
global $subpage;
global $field;

try {
    $conn = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASS);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

if (isset($_SESSION['userid']))
{
  $userid=$_SESSION['userid'];
}
else
{
  $_SESSION['userid']=$userid=0;
}

if(isset($_GET['page']))
{
  if ($_GET['page']=='logout')
  {
    $_SESSION['userid']=$userid=0;
    $_SESSION['page']=$vpage='main';
    $_SESSION['spage']=$subpage=0;
  }
  elseif ($_GET['page']=='login')
  {
    $_SESSION['userid']=$userid=1;
    $_SESSION['page']=$vpage='main';
    $_SESSION['spage']=$subpage=0;
  }
  else
  {
    $_SESSION['page']=$vpage=$_GET['page'];
    $_SESSION['spage']=$subpage=0;
  }
}
elseif (isset($_SESSION['page']))
{
  $vpage=$_SESSION['page'];
} 
else
{ 
  $_SESSION['page']=$vpage='main';
}

if(isset($_GET['spage']))
{
    $_SESSION['subpage']=$subpage=$_GET['spage'];
}
elseif (isset($_SESSION['subpage']))
{
  $subpage=$_SESSION['subpage'];
}
else
{
  $_SESSION['subpage']=$subpage=0;
}
if (isset($_SESSION['field']))
{
  $field=$_SESSION['field'];
}
else
{
  $_SESSION['field']=$field='id';
}

  

function GetName($table,$id)
{
  global $conn;
  $lek="select `name` from `".$table."` where `id`=".$id.";";
  if ($res = $conn->query($lek)->fetch())
  {
    return $res['name'];
  }
  else
    return 'unidentfied';
}

function GetLevel()
{
  global $conn;
  global $userid;
  $lek="select `level` from `users` where `id`=".$userid.";";
  if ($res = $conn->query($lek)->fetch())
  {
    return $res['level'];
  }
  else
    return '0';
}

function GetSelectList($table,$wide)
{
  $ret='<select id=u_'.$table.' style="width:'.$wide.';" required>';
  global $conn;
  global $conn;
  $lek="select `id`,`name` from ".$table." ;";
  foreach ($conn->query($lek) as $res)
  {
    $ret.= '<option value="'.$res['id'].'">'.$res['name'].'</option>';
  }
  $ret.='</select>';
  return $ret;
}

function GetSelectListDefault($table,$wide,$value)
{
  $ret='<select id=m_'.$table.' style="width:'.$wide.';" required>';
  global $conn;
  global $conn;
  $lek="select `id`,`name` from ".$table." ;";
  foreach ($conn->query($lek) as $res)
  {
    if ($res['id']==$value)
      $ret.= '<option value="'.$res['id'].'" selected>'.$res['name'].'</option>';
    else
      $ret.= '<option value="'.$res['id'].'">'.$res['name'].'</option>';
  }
  $ret.='</select>';
  return $ret;

}

function debug_to_console( $data ) 
{
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}


?>

