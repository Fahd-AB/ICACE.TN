 <?php
 error_reporting(0);
session_start ();
if( isset($_SESSION['login'])){
 
 header('Location: auther.php');
 
}  
 $req="";
$obj_client;
$req=$_GET['client_req'];
$o = json_decode($req);
$type_main = $o->{'type'};
$log = $o->{'login'};
$pwd = $o->{'pass'};
 
 if($type_main=="session"){
 
		session_start ();
		$_SESSION['login'] = $log;
		$_SESSION['pwd'] = $pwd;

		}
 
 ?>
 <html>
 <head>
  <script src="jquery-1.9.1.min.js" type="text/javascript"></script>
  <link async href="http://fonts.googleapis.com/css?family=Aguafina%20Script" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700|Merriweather:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
	
<link rel="icon" href="favicon.ico" />
 <title>ICACE - Author Login</title>
 <style>
 .carre{
margin-left:35%;
margin-right:35%;
width:30%;
min-width:300px;
height:230px;
margin-top:15%;
padding-top:1px;
text-align:center;	
background:rgba(89,188,217,1);

border-radius: 5px;
text-align:center;
}
.font1{
margin-top:0px;	
text-align:left;
font-family: 'Roboto', sans-serif;
font-size:12px;
color:#fff;
}
.fo1{
margin-top:30px;	
text-align:center;
}

input{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:200px;
padding-left:5px;
}

.buttons{
width:40%;
height:50px;
margin-left:30%;
margin-right:30%;
text-align:center;
background:#fff;
}
.button_style{
font-family: 'Roboto', sans-serif;
font-size:15px;

background:rgba(25,156,216,1);
margin-top:20px;
border: 2px solid rgba(25,156,216,1);;
padding-top:10px;
 border-radius: 4px;
text-align:center;
height:30px;
width:90px;
color:#fff;
}

.button_style:hover{
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(21,129,178,1);
border: 2px solid rgba(21,129,178,1);
border-radius: 4px;
padding-top:10px;
text-align:center;
height:30px;
width:90px;
cursor:pointer;
color:#fff;
}
html, body {
 
  padding: 0;
  margin: 0;
 
   text-align:center;
-webkit-user-select: none;
     -moz-user-select: -moz-none;
      -ms-user-select: none;
          user-select: none;

}
.a{
 text-align: center;	
    text-decoration: none;
    display: inline-block;
}
.logo1{
 cursor:pointer;
background-image: url("log.png");
background-repeat:no-repeat;
background-position: 0px 0px;
height:50px;
width:50px;
text-align: left;
margin-left:5px;
margin-top:5px;
margin-bottom:10px;

}
</style>

<script type="text/javascript">

 $(window).load(function(){
	lunch();
}); 
var liste_con;
function show(json) {
	liste_con=json;
   // alert("ok");
	}  
function lunch(){
var main='{"type":"connect"}';
$.getJSON("conn.php",{client_req:main},show);
}

function verification() {
	
 var nb=liste_con.length;
	  
	  
	 
	// alert(""+lo+" "+pw);
	 
	 var login=document.getElementById("login").value+"";
	 var pass=document.getElementById("password").value+"";
	 
	 
	 if(nb==0){
		alert("Data Base Problem !!"); 
	 }
     else if((login=="")||(pass=="")){

      alert("Please Insert Login and Password !!"); 
      }
	  
	else{
		//alert(liste_con[0].email);
		var i=0;
		var verif=false;
		var email="";
		var password="";
                var vemail="";
		var vpassword="";
        while(i<nb){
                       
			email=liste_con[i].email;
			password=liste_con[i].password;
			if((email==login)&&(password==pass)){
			verif=true;
                       	vemail=email;vpassword=password;
			}
			i++;
		}
		 if(verif==true){
      var main1='{"type":"session","login":"'+vemail+'","pass":"'+vpassword+'"}'; 
      $.getJSON("log.php",{client_req:main1} );
		document.location.href="auther.php";
		document.getElementById("login").value="";
        document.getElementById("password").value="";
	     }
		else {
                     alert("Incorrect login or password !! ")   ; 
                document.getElementById("login").value="";
        document.getElementById("password").value="";  
        }
		}
   }
function login_enter(event) {
 
    var char = event.which || event.keyCode;
  if(char==13){
   verification();
  }
}
 
</script>







  </head>
  <body bgcolor="#F9F9F9">
 <div class="carre"> 
 <div id="logo" class="logo1"  onclick="window.location='http://www.webconf.0fees.us/';"></div>
<div class="fo1">
<center><table>
<tr><td class="font1">Login :</td><td><input id="login" type="text" placeholder="Your Login Here" onFocus="reset_name();" onkeypress="login_enter(event)"></td></tr>
<tr></tr><tr></tr>
<tr><td  class="font1">Password :</td><td><input id="password" type="password" placeholder="Your Password Here" onFocus="reset_mail();" onkeypress="login_enter(event)"></td></tr>
</table>

</center>
</div>

<center><div class="button_style" type="button" onClick="verification();">Login</div></center>

</div>
  </body>
 </html>