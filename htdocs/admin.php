 <?php
 error_reporting(0);
session_start ();
 if(! isset($_SESSION['login_admin'])){
 header('Location: login.php');
 
}
       
		session_start ();
		$log= $_SESSION['login_admin'];
		$pass= $_SESSION['pwd_admin'] ;

		
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
 
  
     <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
 
 <script type="text/javascript">

$(window).load(function(){
	lunch();
date_extract();


});
var liste_con;
var liste_rev;
function show(json) {
	liste_con=json;
    remplir_tab();
	}
	function show1(json) {
	liste_rev=json;
	//load_rev_list1();load_rev_list2();
	remplir();
	}
function lunch(){
	
var main='{"type":"connect"}';
$.getJSON("conn.php",{client_req:main},show);
var main1='{"type":"connect1"}';
$.getJSON("conn.php",{client_req:main1},show1);
 }

 
 
 
 
setInterval(function(){ 

date_extract();


 }, 1000); 

 
function out(){
var main='{"type":"sessiondel"}';
$.getJSON("auther.php",{client_req:main},show);
 setTimeout(function(){document.location.href="login.php";},500);
 
}
 
 
 

function date_extract() {

var currentdate = new Date(); 
var datetime = "Its: " + currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " -- " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   
 document.getElementById("timedate").innerHTML=datetime+"";
   
   
   
}

function home_menu() {
document.getElementById("home_b").style.display = 'block';
document.getElementById("news_b").style.display = 'none';
document.getElementById("viewers_b").style.display = 'none';
document.getElementById("edit_b").style.display = 'none';
lunch();

}
function news_menu() {
document.getElementById("news_b").style.display = 'block';
document.getElementById("home_b").style.display = 'none';
document.getElementById("viewers_b").style.display = 'none';
document.getElementById("edit_b").style.display = 'none';
}
function viewers_menu() {
document.getElementById("viewers_b").style.display = 'block';
document.getElementById("home_b").style.display = 'none';
document.getElementById("news_b").style.display = 'none';
document.getElementById("edit_b").style.display = 'none';
}
function edit_menu() {
document.getElementById("edit_b").style.display = 'block';
document.getElementById("viewers_b").style.display = 'none';
document.getElementById("home_b").style.display = 'none';
document.getElementById("news_b").style.display = 'none';
load_names();
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
 

// extraire la liste des reviewer



function load_rev_list1(x){
var result="";
var taille_liste_rev=liste_rev.length;
 
var menu_option="<select name='reviewerlist' id='reviewerlist1"+x+"' onchange=''><option value=''>---</option>";
var j=0;

while(j<taille_liste_rev){

//alert(liste_rev[j].name+"");

menu_option+="<option>"+liste_rev[j].name+"</option>";
j++;
}

result=menu_option+"</select>";


return result;

}
function remplir(){
	
	var taii=liste_con.length;
//alert(taii);

trm=0;
while(trm<taii){
var r1=liste_con[trm].reviewer1;
var r2=liste_con[trm].reviewer2;
document.getElementById("rev"+trm+"1").innerHTML=load_rev_list1(trm);
document.getElementById("rev"+trm+"2").innerHTML=load_rev_list2(trm);

$(function() {
    var temp1=r1; 
	var temp2=r2; 
    $("#reviewerlist1"+trm).val(temp1);
	$("#reviewerlist2"+trm).val(temp2);
});

 trm++
}
	
}



function load_rev_list2(x){
var result="";
var taille_liste_rev=liste_rev.length;

var menu_option="<select name='reviewerlist' id='reviewerlist2"+x+"' onchange=''><option value=''>---</option>";
var j=0;

while(j<taille_liste_rev){

//alert(liste_rev[j].name+"");

menu_option+="<option  >"+liste_rev[j].name+"</option>";
j++;
}

result=menu_option+"</select>";
return result;
}











var currentname="";
var currentmaintopic="";
var currentfile="";
var currentrev1="";
var currentrev2="";
var currentemail1="";
var currentemail2="";

function get_name_subj(idc)
{ var i=0;
  var j=0;
  var l1=liste_rev.length;
  var l=liste_con.length;
  currentname="";
  currentmaintopic="";
  currentfile="";
  currentrev1="";
  currentrev2="";
  currentemail1="";
  currentemail2="";
	for(i=0;i<l;i++){
	if(liste_con[i].id==idc){
		currentname=liste_con[i].name+" "+liste_con[i].lastname;
		currentmaintopic=liste_con[i].area;
		currentfile=liste_con[i].file;
		currentrev1=liste_con[i].reviewer1;
		currentrev2=liste_con[i].reviewer2;
		for(j=0;j<l1;j++){
			if(liste_rev[j].name==currentrev1){
		      currentemail1=liste_rev[j].email;
			}
			if(liste_rev[j].name==currentrev2){
		      currentemail2=liste_rev[j].email;
			}
		}
		
	}
	}
	//alert(idc+" "+currentname+" "+currentmaintopic+" "+currentfile+" "+currentemail1+" "+currentemail2);
}	


 






function reply_click(clicked_id)
{
   
	
	var lineid=info[clicked_id];//id de condidat à mettre à jour
	
	
	 var stat=document.getElementById("s"+clicked_id);
	
	 var val=stat.options[stat.selectedIndex].value;
	
	var rev1 = document.getElementById("reviewerlist1"+clicked_id).value+"";
	var rev2 = document.getElementById("reviewerlist2"+clicked_id).value+"";
	 get_name_subj(lineid);
	
	
	if((rev1==rev2)||(rev1=="")||(rev2=="")||(rev1==" ")||(rev2==" ")||(rev1=="---")||(rev2=="---")){
		alert("Error : Please verify your reviewers !!");
	}
	 
	else {
		var stat1;
		var stat2;
		var stat3;
		var stat4;
		var stat5;
		var stat6;
		if(val=="Submitted"){stat1=1;stat2=0;stat3=0;stat4=0;stat5=0;stat6=0;}
		if(val=="Under Reviewing"){stat1=0;stat2=1;stat3=0;stat4=0;stat5=0;stat6=0;}
		if(val=="Accepted"){stat1=0;stat2=0;stat3=1;stat4=0;stat5=0;stat6=0;}
		if(val=="Accepted with Minimum Review"){stat1=0;stat2=0;stat3=0;stat4=1;stat5=0;stat6=0;}
		if(val=="Accepted with Major Review"){stat1=0;stat2=0;stat3=0;stat4=0;stat5=1;stat6=0;}
		if(val=="Declined"){stat1=0;stat2=0;stat3=0;stat4=0;stat5=0;stat6=1;}
		var id_c=lineid;
		// alert(stat1);
		 
		
		var main12='{"type":"update","stat1":"'+stat1+'","stat2":"'+stat2+'","stat3":"'+stat3+'","stat4":"'+stat4+'","stat5":"'+stat5+'","stat6":"'+stat6+'","rev1":"'+rev1+'","rev2":"'+rev2+'","id":"'+id_c+'"}';
        $.getJSON("conn.php",{client_req:main12});
          //      sendMail1();



		alert("Ok done ,An Email Will be send to the Reviewers !!");

 var typeS="sendreviewer"; 
 var filelinkS=currentfile;
 var topicS=currentmaintopic;
 var nameclS=currentname;
 var emailS=currentemail1;
 var email1S=currentemail2;
 var passwordS="x";
 var url="http://icace.tk/send.php?type="+encodeURIComponent(typeS)+"&namecl="+encodeURIComponent(nameclS)+"&topic="+encodeURIComponent(topicS)+"&filelink="+encodeURIComponent(filelinkS)+"&pass="+encodeURIComponent(passwordS)+"&to="+encodeURIComponent(emailS)+"&to1="+encodeURIComponent(email1S);
 document.getElementById("contents").innerHTML="<iframe src="+url+"></iframe>";
 document.getElementById("contents").style.display = 'none';


		//var text="Hello ,Dear Our Reviewer :<br> You are selected by the Administrator of ICACE SOUSSE 2017 to review The Article of : <br><br><br> Mr : "+currentname+" <br><br><br>The Main Topic of the Article is : "+currentmaintopic+"<br>You Can Find the file link <a href='#'>here</a> . Please Contact the Administrator for more details.<br><br><br>With Gratitude.<br><br>Administrator of www.webconference.0fees.us <br>";
		// $.get("icace.tk/emails.php");
                //sendMail1();
               // sendMail(rev1,currentemail1,text); 
		//sendMail(rev2,currentemail2,text); 
		
	}
	
	
	
	
    //var strUser = rev1.selectedIndex.value+"";
	//alert(rev1);
}


function sendMail1() {
  var main='{"type":"sendadmin"}';
$.getJSON("www.icace.tk/emails.php",{client_req:main});
}


//send email for each reviewer

function sendMail(name,adress,text) {
    $.ajax({
      type: 'POST',
      url: 'https://mandrillapp.com/api/1.0/messages/send.json',
      data: {
        'key': 'GfKpQ8AP1H0LgztXIzaHiA',
        'message': {
          'from_email': 'service@webconf.0fees.us',
          'to': [
              {
                'email': adress,
                'name': name,
                'type': 'to'
              }
            ],
          'autotext': 'true',
          'subject': 'ICACE SOUSSE 2017',
          'html': text
        }
      }
     }).done(function(response) {
     // alert(adress+" "+text); // console.log(response); // if you're into that sorta thing
     });
}
	





var info=[];

function ajouterLigne_tab()
{ 

var ta=liste_con.length;

var i=0;

	
 while(i<ta){
	 //alert(mat_con[0][0]);
     var id=liste_con[i].id;
	 var name=liste_con[i].name;
	 var email=liste_con[i].email;
	 var file=liste_con[i].file;
	 var s1=liste_con[i].statdisp;
	 var s2=liste_con[i].statrev;
	 var s3=liste_con[i].statacc;
	 var s4=liste_con[i].stataccMinR;
	 var s5=liste_con[i].stataccMajR;
	 var s6=liste_con[i].statref;
	 var r1=liste_con[i].reviewer1;
	 var r2=liste_con[i].reviewer2;
	 info[i]=id;
      var r1;
       if(s1==1){r1="Submitted";}
       if(s2==1){r1="Under Reviewing";}
       if(s3==1){r1="Accepted";}
       if(s4==1){r1="Accepted with Minimum Review";}
       if(s5==1){r1="Accepted with Major Review";}
       if(s6==1){r1="Declined";}
 	var tableau = document.getElementById("tableau1");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+id+"</div>";//on y met le contenu de titre

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+name+"</div>";

	var date = new Date();
	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+email+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<div><a href='a/"+file+"'>"+file+"</a></div>";
	
	var colonne5 = ligne.insertCell(4);
	colonne5.innerHTML += "<div style='text-align:center;'><select id='s"+i+"'><option>Submitted</option><option>Under Reviewing</option><option>Accepted</option><option>Accepted with Minimum Review</option><option>Accepted with Major Review</option><option>Declined</option></select></div>";
	
	var colonne6 = ligne.insertCell(5);
	colonne6.innerHTML += "<div id='rev"+i+"1'> </div>";

	
	var colonne7 = ligne.insertCell(6);
	colonne7.innerHTML += "<div id='rev"+i+"2'> </div>";
	
	
	var colonne8 = ligne.insertCell(7);
	colonne8.innerHTML += "<div ><div class='button_table' type='button' id='"+i+"'  onClick='reply_click(this.id)'>Save</div></div>";
     
$(function() {
    var temp1=r1;  
    $("#s"+i).val(temp1); 
          });
     
	i++;
	}
		 //alert (info);	
}


function add_rev(){
	
var name_rev=document.getElementById("name_r").value;
var mail_rev=document.getElementById("email_r").value;
if((name_rev!="")&&(mail_rev!="")&&((mail_rev.indexOf("@")>=0)&&(mail_rev.indexOf(".")>=0))){
var main='{"type":"addviewer","name":"'+name_rev+'","email":"'+mail_rev+'"}';
$.getJSON("conn.php",{client_req:main});
document.getElementById("name_r").value="";
document.getElementById("email_r").value="";
alert("Sucess !!!");
}
else{
	alert("Error !!!");
	
	}
}

function add_enter(event) {
 
    var char = event.which || event.keyCode;
  if(char==13){
   add_rev();
  }
}




function add_news(){
var title_news=document.getElementById("news_title").value;	
var text_news=document.getElementById("news_text").value;
 var currentdate = new Date(); 
var datetime = "" + currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " - " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   

if((title_news!="")&&(text_news!="")){
var main='{"type":"addnews","title":"'+title_news+'","text":"'+text_news+'","date":"'+datetime+'"}';
$.getJSON("conn.php",{client_req:main});
document.getElementById("news_title").value="";
document.getElementById("news_text").value="";
alert("News Posted Thank you !!!");
}
else{
	alert("Fill the News Text !!!");
	
	}
}

function add_enter_news(event) {
 
    var char = event.which || event.keyCode;
  if(char==13){
   add_news();
  }
}



// extraires les noms des  condidats dans la page edit reviews 
function load_names(){
	
var result="";
var menu_option1="<select name='conlist' id='conlist' onchange=' '><option value=''>---</option>";
//alert(menu_option1);
 
 var nbcon=liste_con.length;
 
	var i=0;



while(i<nbcon){

menu_option1+="<option value="+liste_con[i].id+" >"+liste_con[i].name+" : "+liste_con[i].email+"</option>";
i++;
}

result=menu_option1+"</select>";
 
document.getElementById("con_name").innerHTML=result;
		
	
}
 
function sub_rev(){
	
	var name_con = document.getElementById("conlist");
	 var val=name_con.options[name_con.selectedIndex].value;
   
	var text_rev = document.getElementById("rev_text").value+"";
      if((val==0)||(text_rev =="")){
      alert("Missing Data !!");
       }
    else{
      alert("Ok Done !!");
      var main14='{"type":"ins_com","con_id":"'+val+'","text":"'+text_rev +'"}';
        $.getJSON("conn.php",{client_req:main14});

	 }
	
}


</script>
 
 
 </head>
 <title>ICACE - Admin</title>
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
overflow:scroll;
}
.carre7{
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
scroll:none;
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
font: normal 40px/1 "Aguafina Script", Helvetica, sans-serif;
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
 padding-top:15px;
text-align:center;

background:rgba(89,188,217,1);
   
}
.button_style{
	display: inline-block;

font-family: 'Roboto', sans-serif;
font-size:17px;
background:rgba(89,188,217,1);

 padding-top:4px;
text-align:center;
height:23px;
width:110px;
color:#fff;
}

.button_style:hover{
display: inline-block;
background:rgba(89,188,217,1);

padding-top:4px;
text-align:center;
height:23px;
width:110px;
cursor:pointer;
color:rgba(30,115,190,1);
}




.button_table{
	display: inline-block;
font-family: 'Roboto', sans-serif;
font-size:10px;
background:rgba(25,156,216,1);
 
border-radius: 4px;
 padding-top:2px;
text-align:center;
height:15px;
width:34px;
color:#fff;
}

.button_table:hover{
display: inline-block;
background:#fff;
background:rgba(21,129,178,1);
padding-top:2px;
text-align:center;
height:15px;
width:34px;
font-family: 'Roboto', sans-serif;
font-size:10px;
cursor:pointer;
color:#fff;
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
	font-family: 'Roboto', sans-serif;
    font-size:13px;
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
	font-size:10px;
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
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(25,156,216,1);
margin-top:20px;
border-radius: 4px;
padding-top:10px;
text-align:center;
height:30px;
width:90px;
color:#fff;
}

.button_style1:hover{
background:rgba(21,129,178,1);
font-family: 'Roboto', sans-serif;
font-size:15px;

padding-top:10px;
text-align:center;
height:30px;
width:90px;
cursor:pointer;
color:#fff;
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
.logo1{
float:left;
background-image: url("log1.png");
background-repeat:no-repeat;
background-position: 0px 0px;
height:45px;
width:45px;
text-align: left;
margin-left:20px;
 padding-bottom:15px;


}
.title_f{
	padding-top:1px;
float:left;
height:45px;
width:45px;
text-align: left;
margin-left:20px;
color:#fff;
font-family: 'Roboto', sans-serif;
font-size:23px;	
}
.button_style_logout{
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

.button_style_logout:hover{
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
.font3{
margin-top:13px;
margin-bottom:13px;	
text-align:center;
color:#000;
font-family: 'Roboto', sans-serif;
font-size:15px;

}
.champ_style
{
font-family: 'Roboto', sans-serif;
font-size:17px;
color:rgba(30,115,190,1)
}
 .stylediv{
	display : none; 
	 
 }
 </style>
 <body bgcolor="#f9f9f9">
 
 <div class="buttons">
 <div class="button_style" type="button" onClick="home_menu();">Home</div>
 <div class="button_style" type="button" onClick="news_menu();">News</div>
 <div class="button_style" type="button" onClick="viewers_menu();">Reviewers</div>
 <div class="button_style" type="button" onClick="edit_menu();">Edit Reviews</div>
<div  class="button_style_logout"type="button" onClick="out();"> Logout</div>
 <div id="logo" class="logo1"></div><div class="title_f">ICACE</div>
 </div>
<div class="carre" id="home_b"> 
<div class="font1">Home</div>
								<div class="CSSTable">
									<table id="tableau1" border=1 >
										<thead>
											<tr>
												<td>Id</td>
												<td>Name</td>
												<td>Email</td>
												<td>File</td>
												<td>Status(submitted,reviewed,accepted)</td>
												<td>Reviewer 1</td>
												<td>Reviewer 2</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div>
<div class="carre7" style="display :none;" id="news_b"> 
<div class="font1" style="margin-bottom:20px;">News</div>

 
<center>
<div class="font2">Post the news below</div>

<table>
<tr><td><div class="champ_style">Title :</div>  </td><td><input id="news_title" style="width:400px;" type="text" placeholder="New Title Here"   onkeypress="add_enter_news(event)"></td></tr>
<tr></tr><tr></tr>
<tr><td> <div class="champ_style">Text :</div>  </td><td><textarea id="news_text" placeholder="Type the text of the news hrere ..."   onkeypress="add_enter_news(event)"></textarea></td></tr>
</table></center>




<div class="buttons1"><div class="button_style1" type="button" onClick="add_news();">Post</div></div>

</div>



<div class="carre7" style="display :none;" id="edit_b"> 
<div class="font1" style="margin-bottom:20px;">Edit Reviews</div>

 
<center>
<div class="font2">Post the Review below</div>

<table>
<tr><td><div class="champ_style">Name : </div> </td><td><div id="con_name" name="con_name"></div></td></tr>
<tr></tr><tr></tr>
<tr><td><div class="champ_style">Review : </div> </td><td><textarea id="rev_text" placeholder="Type the text of the review hrere ..."   onkeypress="add_enter_news(event)"></textarea></td></tr>
</table></center>




<div class="buttons1"><div class="button_style1" type="button" onClick="sub_rev();">Submit</div></div>

</div>














<div class="carre7" style="display :none;" id="viewers_b"> 
<div class="font1">Reviewers</div>

<div class="fo1">

<center>
<div class="font2">Add a New Reviewer</div>

<table>
<tr><td><div class="champ_style">Name :</div></td><td><input id="name_r" type="text" placeholder="Name Here"   onkeypress="add_enter(event)"></td></tr>
<tr></tr><tr></tr>
<tr><td><div class="champ_style">Email :</div></td><td><input id="email_r" type="text" placeholder="Email Here"  onkeypress="add_enter(event)"></td></tr>
</table></center>
</div>
<div class="buttons1"><div class="button_style1" type="button" onClick="add_rev();">Add</div></div>

</div>










 <div class="carre1"><div class="font2" style="margin-bottom:1px;">Welcome Admin</div><br>
 <div name="timedate" id="timedate"class="font3"> </div>
 </div>
 <div id="contents" class="stylediv"></div>
 </body>
 </html>