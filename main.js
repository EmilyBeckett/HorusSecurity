var CX=0;
var CY=0;



function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
var kivalasztott=0;
			function empty(x, eredeti)
			{	
			if (x.value==eredeti)
				x.value="";
			
			}
						
			function PC_showHideLayers(id, show) 
			{ 
			document.getElementById(id).style.display=show;  
			}

function formatNumber(mezo)
{
	szam=mezo.value;
	ujszam=szam.replace(/ /g,'');
	uj='';
	szamlalo=1;
	if (isNaN(ujszam))
		mezo.value=szam.substr(0,szam.length-1);
	else
	{
		szam=ujszam;
		for (i=szam.length-1;i>=0;--i)
		{
			ch=szam.substr(i,1);        //IE nem ismeri a szam[i] string elem formtumot!!!!!!
			uj=ch+uj;
			if (szamlalo==3)
			{
				uj=' '+uj;
				szamlalo=0;
			}
			szamlalo+=1;
				
		}
		mezo.value=uj;   
	}
}

function kepCsere(img)
{
	document.getElementById('nagykep').innerHTML='<img border=0 src='+img+' width=360>';
}

function flashCsere(id,img)
{
	document.getElementById('nagykep').innerHTML='<embed flashvars="vID=3882a7e949&autostart=false" wmode="transparent" src="http://automery.hu/gallery/model_'+id+'/flash/'+img+'" quality="high" bgcolor="transparent" width="360" height="236" name="guPlayer3882a7e949" align="middle" allowScriptAccess="always" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
}
														
function showScroll()
{
																																										
	alert(
	'1:'+document.body.scrollHeight+
	', 2:'+document.documentElement.scrollHeight+    //7,8
	', 3:'+document.getElementById('main_div').scrollHeight+
	', 4:'+document.scrollTop+                 //ezt érzi az IE és a FF
	', 5:'+document.documentElement.scrollTop+        //mindig 0
	', 6:'+document.getElementById('main_div').scrollTop+       //mindig 0
	', 7:'+document.body.clientHeight+
	', 8:'+document.documentElement.clientHeight+
	', 9:'+document.getElementById('main_div').style.hight);  
}														

function initMoving(target, topPosition, topLimit, btmLimit) {
 if (!target)
 return false;

 var obj = target;
 obj.initTop = topPosition;
 obj.topLimit = topLimit;
 obj.bottomLimit = parseInt(document.getElementById('main_div').scrollHeight) - btmLimit;

 
 obj.top = obj.initTop;
 obj.left = obj.initLeft;
 obj.style.top = obj.top + "px";
 obj.getTop = function() {
 return document.body.scrollTop ? document.body.scrollTop : document.documentElement.scrollTop;
 }
 
 obj.getHeight = function() {
 return document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight;
 }
 
 moveid=obj.move = setInterval(function() {
 pos = obj.getTop() + topPosition;
 // pos = obj.getTop() + obj.getHeight() / 2 - 15;
  
 if (pos > obj.bottomLimit)
 pos = obj.bottomLimit
 if (pos < obj.topLimit)
 pos = obj.topLimit

 interval = obj.top - pos;
 obj.top = obj.top - interval /5;
 obj.style.top = obj.top + "px";
 }, 50)
}

function ErtekDivCsere(tid)
{
	
	document.getElementById('div_ertek'+tid).innerHTML='<form method="post" id="frm_ertek" class="ertekeles">'+
			'<input type="hidden" name="i_id" value="'+tid+'">'+
			'<label><span class="ertekeles">Tökéletes </span><input type="radio" name="r_ertek" value="5" checked></label><br>'+
			'<label><span class="ertekeles">Nagyon jó </span><input type="radio" name="r_ertek" value="4"></label><br>'+
			'<label><span class="ertekeles">Jó </span><input type="radio" name="r_ertek" value="3"></label><br>'+
			'<label><span class="ertekeles">Elmegy </span><input type="radio" name="r_ertek" value="2"></label><br>'+
			'<label><span class="ertekeles">Nem ízlett </span><input type="radio" name="r_ertek" value="1"></label><br>&nbsp;<br>'+
			'<center><span onClick="document.getElementById(\'frm_ertek\').submit()" class="ertekeles_gomb" >Értékelem</span></center>'+
			'</form>';
}

function kepnagyit(nev,kepurl, tipus)
{
	de=document.getElementById('lebego');
	dek=document.getElementById('lebegokep');
	document.getElementById('info').style.display="none";
	document.getElementById('info2').style.display="none";
	kivalasztott=nev;
	//dek.onmousedown = click();

	//beállitások
	var myWidth = 0, myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myWidth = window.innerWidth;
    myHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
    myHeight = document.body.clientHeight;
  }
	x=myWidth / 2 - 230;
	if (x<20)
		x=20;
	y=20 ;
	if (tipus=='info')
	dek.innerHTML='<img src="'+kepurl+'" height=640 onClick="showmenu();">';
	else if (tipus=='info_dis')
	dek.innerHTML='<img src="'+kepurl+'" height=640 onClick="this.style.display=\'none\';gebi(\'info\').style.display=\'none\';">';
	else if (tipus=='toronyvalaszt')
	dek.innerHTML='<img src="'+kepurl+'" height=640 onClick="showmenutv();">';
  else
  dek.innerHTML='<img src="'+kepurl+'" height=640 onClick="showmenu2();">';
	de.style.display="block";
	de.style.zIndex="20";
	de.style.top=y + "px";
	de.style.left=x + "px";
	CX=x;
	CY=y;
	initMoving(de,y,20,20)
}

function HideKep()
{
	document.getElementById('lebego').style.display="none";
	document.getElementById('wnd_project_alap').style.display="none";
	clearInterval(moveid);
}

function findPosX(obj)
{
var curleft = 0;
if (obj.offsetParent)
{
while (obj.offsetParent)
{
curleft += obj.offsetLeft
obj = obj.offsetParent;
}
}
else if (obj.x)
curleft += obj.x;
return curleft;
}

function findPosY(obj)
{
var curtop = 0;
if (obj.offsetParent)
{
while (obj.offsetParent)
{
curtop += obj.offsetTop
obj = obj.offsetParent;
}
}
else if (obj.y)
curtop += obj.y;
return curtop;
}
function alertSize(kep0,kep1,kep2,kep3, ind) {
  var myWidth = 0, myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myWidth = window.innerWidth;
    myHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
    myHeight = document.body.clientHeight;
  }
  magas=document.getElementById('veg').offsetTop+10;
//  window.alert( 'Width = ' + myWidth );
//  window.alert( 'Height = ' + myHeight + 'doc: '+magas);
	if (myWidth<1442)
		myWidth=1442;
  document.getElementById('wnd_project_alap').className='wnd_takar_show';
  document.getElementById('wnd_project').className='wnd_show';
  document.getElementById('wnd_project_alap').style.height=magas+'px';
  document.getElementById('wnd_project').style.height=magas+'px';
  document.getElementById('wnd_project_alap').style.width=myWidth+'px';
  document.getElementById('wnd_project').style.width=myWidth+'px';
  //document.getElementById('wnd_project').innerHTML='<img src="http://hangszertokkeszites.hu/gallery/'+kep+'" border=0>';
  var kep='';
  switch (ind)
  {
  	case 0:
  		kep=kep0;
  		break;
  	case 1:
  		kep=kep1;
  		break;
  	case 2:
  		kep=kep2;
  		break;
  	case 3:
  		kep=kep3;
  		break;
  }
  //document.getElementById('wnd_project').style.backgroundImage='url("http://hangszertokkeszites.hu/gallery/'+kep+'")';
  top=document.getElementById('kepdoboz').offsetTop;
  left=document.getElementById('kepdoboz').offsetLeft;
  document.getElementById('wnd_project').innerHTML='<tr valign=middle><td align=center id=fixmex name=fixmex class=fixmex style="color:#ff0000;width:'+myWidth+'px;height:'+myHeight+'px;">'+
  '<div id=kepdoboz>'+
  '<div><img src="http://hangszertokkeszites.hu/gallery/'+kep+'"><div  style="position:absolute;top:'+top+'px;"><img src="img/balra.png"></div><div><img src="img/jobbra.png"></div></div></div>'+
  '</td></tr>';
}
function  ShowPic(kep, w,h)
{
  if (h>600)
  {
    //kicsinyiteni kell;
    w=Math.round(w*600/h);
    h=600;
  }
  if (w>1200)
  {
    //kicsinyíteni kell
    h=Math.round(h*1200/w);
    w=1200;
  }
	document.getElementById('nagykep').innerHTML='<img src="'+kep+'" width="'+w+'" height="'+h+'">';
  document.getElementById('nagykep').style.display='block';
}

function showmenu(e)
{
		event =e?e:event;
            x=event.clientX-CX-10;
						y=event.clientY-CY-10;
				 		de=document.getElementById('info');
				 		de.style.display="block";
				 		de.style.top=y+"px";
				 		de.style.left=x+"px";
						de.style.zIndex="30";
}
function showmenutv(e)
{
		event =e?e:event;
            x=event.clientX-CX-10;
						y=event.clientY-CY-10;
				 		de=document.getElementById('toronyvalaszt');
				 		de.style.display="block";
				 		de.style.top=y+"px";
				 		de.style.left=x+"px";
						de.style.zIndex="30";
}
function showcsatol(e)
{
		event =e?e:event;
            x=event.clientX-CX-10;
						y=event.clientY-CY-10;
				 		de=document.getElementById('lapotcsatol');
				 		de.style.display="block";
				 		de.style.top=y+"px";
				 		de.style.left=x+"px";
						de.style.zIndex="30";
}

function showmenu2(e)
{
		event =e?e:event;
            x=event.clientX-CX-10;
						y=event.clientY-CY-10;
				 		de=document.getElementById('info2');
				 		de.style.display="block";
				 		de.style.top=y+"px";
				 		de.style.left=x+"px";
						de.style.zIndex="30";
}

function lebegoHide()
{
		
		document.getElementById('lebego').style.display="none";
}

function gebi(id)
{
	return document.getElementById(id);
}

function Showbox (id,mode)
{
	de= gebi(id);
  if (mode==1)
    de.style.display="block";
  else
    de.style.display="none";
}

function ShowHideBox()
{
	de= gebi('onlinebox');
  if 
    (de.style.display=="block") de.style.display="none";
  else
    de.style.display="block";

}




function rightclick() {
    var rightclick;
    var e = window.event;
      rightclick = (e.which === 3 || e.button === 2);
    return rightclick; // true or false, you can trap right click here by if comparison
}

function ShowRightClick()
{
  if (rightclick())
  {
    document.getElementById('alertbox').style.display='block';
    document.getElementById('alertok').style.display='block';
  }                    
}
var MyTorro;
function Tologat(mit, jobbra, le)
{
  MyTorro = setInterval(function(){ TologatLepes(mit, jobbra, le) }, 1000);
}

function StopTologat() {
    clearInterval(MyTorro);
}
function TologatLepes(mit, jobbra, le)
{
   var o=gebi(mit);
   posy = o.style.top.slice(0,-2);
   posx = o.style.left.slice(0,-2);
   alert(posx+' . '+posy)
   difx=jobbra-posx;
   dify=le-posy;
   tavolsag=Math.sqrt(difx*difx+dify*dify);
   lepesszam=tavolsag/5;
   if (tavolsag>5)
   {
     posx=posx+Math.round(difx/lepesszam);
     posy=posy+Math.round(dify/lepesszam);
     
     bottomLimit=o.style.height.slice(0,-2);
     topLimit=0; 
     leftLimit=0;
     rightLimit=o.style.width.slice(0,-2);
     if (posy > bottomLimit)
     posy = bottomLimit;
     if (posy < topLimit)
     posy = topLimit;
     if (posx > rightLimit)
     posx = rightLimit;
     if (posx < leftLimit)
     posx = leftLimit;
     o.style.top = posy + "px";
     o.style.left = posx + "px";
     
   }
   else
   StopTologat(); 
}

function Nagyit(kep)
{
  document.getElementById('mozgokep').innerHTML='<img src="'+kep+'" height=460>';
  document.getElementById('mozgokep').style.display='block';
}
function NagyitVege()
{
  document.getElementById('mozgokep').innerHTML='';
  document.getElementById('mozgokep').style.display='none';
}

function openChat() 
{
  window.open("inc/chat.php", "", "width=200, height=300");
}

function uploadChange(){
        $('input[type="submit"]').click();
    }
    
function BiztosNemMent(oldal,kid)
{
  if (confirm('Mentettél?'))
    location.replace("./?oldal="+oldal+"#box"+kid);
}

// Get the modal

// Get the image and insert it inside the modal - use its "alt" text as a caption
function ShowModal(kid,src)
{
  modal = document.getElementById('myModal'+kid);
  modalImg = document.getElementById("img"+kid);

    modal.style.display = "block";
    modalImg.src = src;
}
var eredeti='';
function MentEv(obj)
{
  eredeti=obj.value;    
}
function TesztEv(obj,event)
{
      var x = event.which || event.keyCode;
    if ((x==13)||(x==8)||(x==46)||(x>47 && x<58) || (x>95 && x<106))
    {
      //oké
    }
    else 
    {
      obj.value=eredeti;
     // alert(x);
    }
     /*
  alert (obj.value);
    if (Number.IsNaN(obj.value))
    {
      alert('Hibás évszám!');
    }
    else
    {
      if (obj.value>3000) alert('Hibás évszám!');
    }
    */
    
}
function ShowWeddingDate(obj)
{
  if (obj.checked)
  {
    gebi('td_esk').style.display='table-cell';
  }
  else
  {
    gebi('td_esk').style.display='none';
  
  }
}
var red=127;
var blue=127;
var green=127;
function changeRed(r)
{
    red=r;
      gebi('change').style.backgroundColor=' rgb('+red+', '+green+', '+blue+')';
}
function changeGreen(g)
{
  green=g;
      gebi('change').style.backgroundColor=' rgb('+red+', '+green+', '+blue+')';
}
function changeBlue(b)
{
  blue=b;
      gebi('change').style.backgroundColor=' rgb('+red+', '+green+', '+blue+')';
}

function szinez(mit,mire)
{
  var obj=gebi(mit);
  obj.style.backgroundColor=mire;
  obj.style.borderColor=mire;
}

function kifest(ev,ho)
{
  alert(gebi('ovk'+ev+ho).innerHTML);
  if (gebi('ovk'+ev+ho).innerHTML>gebi('otk'+ev+ho).innerHTML)
  gebi('ovk'+ev+ho).style.backgroundColor='#ff0000';
}