 <?php
 error_reporting(0);
session_start ();
 if(! isset($_SESSION['login'])){
 header('Location: log.php');
 
}
       
		session_start ();
		$log= $_SESSION['login'];
		$pass= $_SESSION['pwd'] ;

		
$req="";
$obj_client;
$req=$_GET['client_req'];
$o = json_decode($req);
$type_main = $o->{'type'};
 
 
 if($type_main=="sessiondel"){
 
		session_start ();
                session_unset();
                session_destroy();

		}
 		
 
 ?>
 
 
 
 <html>
 <head>
 
 <script src="jquery-1.9.1.min.js" type="text/javascript"></script>
 
  <link async href="http://fonts.googleapis.com/css?family=Aguafina%20Script" rel="stylesheet" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700|Merriweather:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
 <link rel="icon" href="favicon.ico" />

 <script type="text/javascript">

$(window).load(function(){
	lunch();
date_extract();


});
var liste_con;
var liste_reviews;
function show(json) {
	liste_con=json;
	 document.getElementById("auther_name").innerHTML+=liste_con[0].name+" "+liste_con[0].lastname+"";
	 
    remplir_tab();
getreviews();
	}
	
function lunch(){
var mail_con='<?php echo $log ?>';	
var main='{"type":"search","email":"'+mail_con+'"}';
$.getJSON("conn.php",{client_req:main},show);

 }

 
 
 
 
setInterval(function(){ 

date_extract();


 }, 1000); 

 
function date_extract() {

var currentdate = new Date(); 
var datetime = "Its: " + currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " -- " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   
 document.getElementById("timedate").innerHTML=datetime+"";
   
   
   
}




/********tableau*****/

function delete_all_tab(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau1").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau1").deleteRow(-1);
tel--;
j++;
}
//supp_contacts();
}



function delete_tab(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau1").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau1").deleteRow(-1);
tel--;
j++;
}
}

function remplir_tab(){
var arrayLignes = document.getElementById("tableau1").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab();
}
else{
delete_tab();
ajouterLigne_tab();
}
}
 
function getreviews(){

var id=liste_con[0].id;
var main='{"type":"getreviews","id":"'+id+'"}';
$.getJSON("conn.php",{client_req:main},show_reviews);
 


}
function show_reviews(json) {
	liste_reviews=json;
      var sizereviews=liste_reviews.length;
      var textrev="";
     textrev=liste_reviews[0].comment;
      if((sizereviews!=0)&&(textrev!=""))  {
	 document.getElementById("textreview").innerHTML=textrev;
	} 
 
	}












 










 





 

function ajouterLigne_tab()
{ 

 

var i=0;

	
var gstatus=""; //general status

      
	  
	 var title=liste_con[i].papertitle; 
	 var area=liste_con[i].area; 
	 var field=liste_con[i].field;
	 var s1=liste_con[i].statdisp;
	 var s2=liste_con[i].statrev;
	 var s3=liste_con[i].statacc;
	 var s4=liste_con[i].stataccMinR;
	 var s5=liste_con[i].stataccMajR;
	 var s6=liste_con[i].statref;
         var date_sub=liste_con[i].date;
           if(s1==1){gstatus="Submitted"}
           if(s2==1){gstatus="Under Reviewing"}      
           if(s3==1){gstatus="Accepted"}   	 
           if(s4==1){gstatus="Accepted with Minimum Review"}
           if(s5==1){gstatus="Accepted with Major Review"}
           if(s6==1){gstatus="Declined"}
 
 
 	var tableau = document.getElementById("tableau1");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+title+"</div>"; 

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+area+"</div>";

 
	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+field+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<div>"+date_sub+"</div>";
	
	var colonne5 = ligne.insertCell(4);
	colonne5.innerHTML += "<div>"+gstatus+"</div>";
	
	
}
function out(){
var main='{"type":"sessiondel"}';
$.getJSON("auther.php",{client_req:main},show);
 setTimeout(function(){document.location.href="log.php";},500);
 
}



</script>
 
 
 </head>
 <title>ICACE - Admin </title>
 <style>
 
 
 textarea{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:200px;
width:400px;
padding-left:5px;
resize:none;
margin-top:20px;

}
 
 
 input{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:200px;
padding-left:5px;
}
 .increase {
    width:12px;
    height:12px;
	display: inline-block;
}
.carre{
margin-left:15%;
margin-right:15%;
width:70%;
min-width:500px;
height:500px;
margin-top:5%;
text-align:center;	
background-color:rgba(249,249,249,1);
border: 1px solid #BFE5FF;
border-radius: 5px;
text-align:center;
overflow:hidden;
}
.carre1{
margin-left:10px;
width:180px;;
min-width:180px;
height:100px;
margin-top:-502px;
text-align:center;	
background-color:rgba(249,249,249,1);
border: 1px solid #BFE5FF;
border-radius: 5px;
text-align:center;
 padding-top:4px;
}
.font1{
margin-top:23px;	
text-align:center;
color:rgba(12,12,50,1);
font-family: 'Roboto', sans-serif;
font-size:12px;
}
.fo1{
margin-top:90px;	
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
width:100%;
height:50px;
padding-top:10px; 

text-align:center;

background:rgba(89,188,217,1);
   
}
.button_style{
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(25,156,216,1);
float:right;
margin-right:20px;
border-radius: 4px;
padding-top:10px;
text-align:center;
height:30px;
width:90px;

color:#fff;
}

.button_style:hover{
background:rgba(21,129,178,1);
 cursor:pointer;
font-family: 'Roboto', sans-serif;
font-size:15px;

 
border-radius: 4px;
 
text-align:center;
height:30px;
width:90px;

color:#fff;
}




.button_table{
	display: inline-block;

background:rgba(30,115,190,1);
 
border: 2px solid rgba(30,115,190,1);
 padding-top:2px;
text-align:center;
height:15px;
width:34px;
color:#fff;
}

.button_table:hover{
display: inline-block;
background:#fff;
border: 2px solid rgba(30,115,190,1);
padding-top:2px;
text-align:center;
height:15px;
width:34px;
cursor:pointer;
color:rgba(30,115,190,1);
}












html, body {
 
  padding: 0;
  margin: 0;

}
.a{
 text-align: center;	
    text-decoration: none;
    display: inline-block;
}


.CSSTable {
	margin:4px;padding:0px;
	width:99%;
	
	
	
}
.CSSTable table{
    border-spacing: 0;
	width:100%;
	height:100%;

}

.CSSTable tr:hover td{
	background-color:#ffffff;
		

}
.CSSTable td{
	vertical-align:middle;
	background:-o-linear-gradient(bottom, #e5e5e5 5%, #ffffff 100%);
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e5e5e5), color-stop(1, #ffffff) ); 
	background:-moz-linear-gradient( center top, #e5e5e5 5%, #ffffff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#e5e5e5", endColorstr="#ffffff");
	background: -o-linear-gradient(top,#e5e5e5,ffffff);
	border:1px solid #ffffff;
	text-align:left;
	padding:9px;
	font-size:11px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;

}
.CSSTable tr:last-child td{
	border-width:0px 1px 0px 0px;
}
.CSSTable tr td:last-child{
	border-width:0px 0px 1px 0px;
}
.CSSTable tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTable tr:first-child td{
		background:-o-linear-gradient(bottom, #1E73BE 5%, #1E73BE 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1E73BE), color-stop(1, #1E73BE) );
	background:-moz-linear-gradient( center top, #1E73BE 5%, #1E73BE 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#1E73BE", endColorstr="#1E73BE");	background: -o-linear-gradient(top,#1E73BE,1E73BE);

	background:rgba(89,188,217,1);
	border:0px solid #ffffff;
	text-align:center;
	border-width:0px 0px 1px 1px;
	 
font-family: 'Roboto', sans-serif;
font-size:15px;
	color:#ffffff;
}
.CSSTable tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #1E73BE 5%, #1E73BE 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1E73BE), color-stop(1, #1E73BE) );
	background:-moz-linear-gradient( center top, #1E73BE 5%, #1E73BE 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#1E73BE", endColorstr="#1E73BE");	background: -o-linear-gradient(top,#1E73BE,1E73BE);

	background:rgba(89,188,217,1);
}
.CSSTable tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTable tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}



.buttons1{
width:200px;
height:50px;
margin-left:40%;
margin-right:40%;
text-align:center;

}
.button_style1{
margin-left:40px;
background:rgba(30,115,190,1);
margin-top:20px;
border: 2px solid rgba(30,115,190,1);
padding-top:4px;
text-align:center;
height:23px;
width:110px;
color:#fff;
}

.button_style1:hover{
background:none;
border: 2px solid rgba(30,115,190,1);
padding-top:4px;
text-align:center;
height:23px;
width:110px;
cursor:pointer;
color:rgba(30,115,190,1);
}

.font1{
margin-top:13px;	
text-align:center;
color:rgba(30,115,190,1);
font-family: 'Roboto', sans-serif;
font-size:27px;

}
.font2{
margin-top:13px;
margin-bottom:13px;	
text-align:center;
color:#000;
font-family: 'Roboto', sans-serif;
font-size:17px;

}
.font3{
margin-top:13px;
margin-bottom:13px;	
text-align:center;
color:#000;
font-family: 'Roboto', sans-serif;
font-size:15px;

}
.logo1{
float:left;
background-image: url("log1.png");
background-repeat:no-repeat;
background-position: 0px 0px;
height:45px;
width:45px;
text-align: left;
margin-left:20px;
 


}
.title_f{
	padding-top:7px;
float:left;
height:45px;
width:45px;
text-align: left;
margin-left:20px;
color:#fff;
font-family: 'Roboto', sans-serif;
font-size:23px;	
}
 </style>
 <body bgcolor="#f9f9f9">
 
 <div class="buttons">
 <div id="logo" class="logo1"></div><div class="title_f">ICACE</div>
 <div  class="button_style"type="button" onClick="out();"> Logout</div>
 
 </div>
<div class="carre" id="home_b"> 
<div class="font1"><div id="auther_name">Author : Mr / Mrs </div></div>
								<div class="CSSTable">
									<table id="tableau1" border=1 >
										<thead>
											<tr>
												<td>Title</td>
												<td>Area</td>
												<td>Field</td>
												<td>Date of Submission</td>
												<td>Status</td>
												 
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
<div class="font1" style="text-align:left;padding-left:4px;">Reviews :</div>
<div class="font3" style="text-align:left;padding-left:10px;" id="textreview">Sorry no reviews for the moment.</div>
</div>











 <div class="carre1"><div class="font2" style="margin-bottom:1px;"> Welcome Author </div><br> 
 <div name="timedate" id="timedate" class="font3"> </div>
 </div>
 
 </body>
 </html>	