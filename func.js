// JavaScript Document
// Emily Beckett
function ShowWaitBox(show)
{
  if (show==1)
    document.getElementById('waitbox').style.display='block';
  else document.getElementById('waitbox').style.display='none';  
}

function AreYouSave(oldal,kid)
{
  if (confirm('Are you sure? \nIf you didn´t save you can loose your data'))
    location.replace("./?page=main");
}

function AddUser()
{
  name=document.getElementById('u_name').innerHTML;
  if (name.length>0)
  {
    	var xmlHttp;
    	try
    	{
    		// Firefox, Opera 8.0+, Safari
    		xmlHttp=new XMLHttpRequest();
    	}
    	catch (e)
    	{
    		// Internet Explorer
    		try
    		{
    			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}
    		catch (e)
    		{
    			try
    			{
    				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    			}
    			catch (e)
    			{
    				alert("Your browser does not support AJAX!");
    				return false;
    			}
    		}
    	}
      method='GET';
    	url='inc/work.php';
      level=document.getElementById('u_t_level').value;
      param='?param=AddUser&name='+name+'&level='+level;
      console.log( param ); 
    	var link = url + param;
    	    
    	xmlHttp.onreadystatechange = function() { alertAddSomething(xmlHttp); };
    	xmlHttp.open(method,link,true);
    	xmlHttp.send('');
  }
  else
    alert('Give a name, please!');   
}                            

function alertAddSomething(http_request)
{
  if (http_request.readyState == 4 && http_request.status == 200 )
	{
    if (http_request.responseText!='')
    {
      location.reload();     
    }
	}
}

function AddType(table,fid)
{
  name=document.getElementById(fid).innerHTML;
  if (name.length>0)
  {
    	var xmlHttp;
    	try
    	{
    		// Firefox, Opera 8.0+, Safari
    		xmlHttp=new XMLHttpRequest();
    	}
    	catch (e)
    	{
    		// Internet Explorer
    		try
    		{
    			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}
    		catch (e)
    		{
    			try
    			{
    				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    			}
    			catch (e)
    			{
    				alert("Your browser does not support AJAX!");
    				return false;
    			}
    		}
    	}
      method='GET';
    	url='inc/work.php';
      
      param='?param=AddType&name='+name+'&table='+table;
    	var link = url + param;
      
    	console.log( param );    
    	
      xmlHttp.onreadystatechange = function() { alertAddSomething(xmlHttp); };
    	xmlHttp.open(method,link,true);
    	xmlHttp.send('');
  }
  else
    alert('Give a name, please!');   
}

function SaveTask()
{
  title=document.getElementById('new_title').value;
  desc=document.getElementById('new_desc').innerHTML;
  dl=document.getElementById('new_deadline').value;
  own=document.getElementById('u_users').value;
  cat=document.getElementById('u_t_category').value;
  if (title.trim()=='' || desc.trim()=='')
    alert('Please, give all of the details');
  else
  {
    	var xmlHttp;
    	try
    	{
    		// Firefox, Opera 8.0+, Safari
    		xmlHttp=new XMLHttpRequest();
    	}
    	catch (e)
    	{
    		// Internet Explorer
    		try
    		{
    			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}
    		catch (e)
    		{
    			try
    			{
    				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    			}
    			catch (e)
    			{
    				alert("Your browser does not support AJAX!");
    				return false;
    			}
    		}
    	}
      method='GET';
    	url='inc/work.php';
      
      param='?param=AddTask&title='+title+'&desc='+desc+'&own='+own+'&dl='+dl+'&cat='+cat;
    	var link = url + param;
    	console.log( param );     
    	xmlHttp.onreadystatechange = function() { alertAddTask(xmlHttp); };
    	xmlHttp.open(method,link,true);
    	xmlHttp.send('');
  }

}

function alertAddTask(http_request)
{
  if (http_request.readyState == 4 && http_request.status == 200 )
	{
    if (http_request.responseText!='')
    {
      location.reload();     
    }
	}
}

function ViewTask(id,mode=0)    // 0 - only view, 1 - modify
{
    	var xmlHttp;
    	try
    	{
    		// Firefox, Opera 8.0+, Safari
    		xmlHttp=new XMLHttpRequest();
    	}
    	catch (e)
    	{
    		// Internet Explorer
    		try
    		{
    			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}
    		catch (e)
    		{
    			try
    			{
    				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    			}
    			catch (e)
    			{
    				alert("Your browser does not support AJAX!");
    				return false;
    			}
    		}
    	}
      method='GET';
    	url='inc/work.php';
      
      param='?param=ViewTask&id='+id+'&mode='+mode;
    	var link = url + param;
    	console.log( param );     
    	xmlHttp.onreadystatechange = function() { alertViewTask(xmlHttp,id,mode); };
    	xmlHttp.open(method,link,true);
    	xmlHttp.send('');
  
}

function alertViewTask(http_request,id,mode)
{
  if (http_request.readyState == 4 && http_request.status == 200 )
	{
    if (http_request.responseText!='')
    {
      document.getElementById('view_'+id).innerHTML='<img src="img/left.png" onClick="CloseUp('+id+','+mode+');" style="cursor:pointer;">';
      document.getElementById('task_'+id).innerHTML=http_request.responseText;
      document.getElementById('task_'+id).style.display='table-row';     
    }
	}
}

function CloseUp(id,mode)
{
  console.log( 'CloseUp - '+id+' - '+mode ); 
  document.getElementById('task_'+id).style.display='none';
  document.getElementById('task_'+id).innerHTML='';
  document.getElementById('view_'+id).innerHTML='<img src="img/view.png" onClick="ViewTask('+id+','+mode+')" style="cursor:pointer;">';
}  

function ModifyTask(id)
{
  title=document.getElementById('mod_title').value;
  desc=document.getElementById('mod_desc').innerHTML;
  dl=document.getElementById('mod_deadline').value;
  own=document.getElementById('m_users').value;
  cat=document.getElementById('m_t_category').value;
  stat=document.getElementById('m_t_status').value;
  if (title=='' || desc=='')
    alert('Please, give all of the details');
  else
  {
    	var xmlHttp;
    	try
    	{
    		// Firefox, Opera 8.0+, Safari
    		xmlHttp=new XMLHttpRequest();
    	}
    	catch (e)
    	{
    		// Internet Explorer
    		try
    		{
    			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}
    		catch (e)
    		{
    			try
    			{
    				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    			}
    			catch (e)
    			{
    				alert("Your browser does not support AJAX!");
    				return false;
    			}
    		}
    	}
      method='GET';
    	url='inc/work.php';

      param='?param=ModifyTask&id='+id+'&title='+title+'&desc='+desc+'&own='+own+'&dl='+dl+'&cat='+cat+'&stat='+stat;
    	console.log( param );       
      var link = url + param;
    	    
    	xmlHttp.onreadystatechange = function() { alertModifyTask(xmlHttp,id); };
    	xmlHttp.open(method,link,true);
    	xmlHttp.send('');
  }
}

function alertModifyTask(http_request,id)
{
  if (http_request.readyState == 4 && http_request.status == 200 )
	{
    if (http_request.responseText!='')
    {
      location.reload();            
    }
	}
}                        

function OrderBy(field)
{
  
    	var xmlHttp;
    	try
    	{
    		// Firefox, Opera 8.0+, Safari
    		xmlHttp=new XMLHttpRequest();
    	}
    	catch (e)
    	{
    		// Internet Explorer
    		try
    		{
    			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}
    		catch (e)
    		{
    			try
    			{
    				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    			}
    			catch (e)
    			{
    				alert("Your browser does not support AJAX!");
    				return false;
    			}
    		}
    	}
      method='GET';
    	url='inc/work.php';

      param='?param=OrderBy&field='+field;
    	console.log( param );       
      var link = url + param;
    	    
    	xmlHttp.onreadystatechange = function() { alertOrderBy(xmlHttp); };
    	xmlHttp.open(method,link,true);
    	xmlHttp.send('');
}

function alertOrderBy(http_request)
{
  if (http_request.readyState == 4 && http_request.status == 200 )
	{
    if (http_request.responseText!='')
    {
      location.reload();            
    }
	}
}                        
