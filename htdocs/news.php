 <html>
 <head>
  <script src="jquery-1.9.1.min.js" type="text/javascript"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
   <title></title>
   
  <script type="text/javascript">
  $(window).load(function(){
	lunch();
});
var liste_news;
 
function show(json) {
	liste_news=json;
    list();
	}
	 
function lunch(){
	
var main='{"type":"getnews"}';
$.getJSON("conn.php",{client_req:main},show);
 
 }

 
  function list(){
	 var size=liste_news.length;
	 var result="";
	 var i=0;
	 while(i<size){
		result+="<div id='content' name='content' ><div id='title' class='font1'>"+liste_news[i].title+" "+liste_news[i].date+"</div><div id='text' class='font4' style='padding-left:10px;'>"+liste_news[i].massage+"</div></div>";
		
		i++;
	 }
	 if(size!=0){
		 
		 document.getElementById("content").innerHTML=result;
	 }
    }
   </script>
   <style>
   .font3{
margin-top:13px;
margin-bottom:13px;	
text-align:center;
color:#000;
font-family: 'Roboto', sans-serif;
font-size:15px;

}
 .font4{
margin-top:13px;
margin-bottom:13px;	
text-align:left;
color:#999999;
font-family: 'Roboto', sans-serif;
font-size:17px;

}  
 .font1{
margin-top:13px;
margin-bottom:13px;	
text-align:left;
color:rgba(89,188,217,1);
font-family: 'Roboto', sans-serif;
font-size:20px;

}  
   
   </style>
    </head>
  <body bgcolor="#F9F9F9">
 <div id="content" name="content" class="font3">Sorry There is no news for the moment !</div>
  </body>
 </html>