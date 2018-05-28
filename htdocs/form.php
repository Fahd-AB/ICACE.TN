 <?php 
error_reporting(0); 
$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
 $tmp_name = $_FILES['file']['tmp_name'];
 
      
 $extension=strtolower(substr($name,strpos($name,'.')+1));
 
if(isset($name))
{// sleep(2);
	if(!empty($name))
	{ 
	    $location='a/';

				if(move_uploaded_file($tmp_name,$location.$name))
				{
					 
                                  
				} else{}

    
						 
	
	 
    }

}

?>


<html>
 <head>
  <script src="jquery-1.9.1.min.js" type="text/javascript"></script>
	<link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>

 <title></title>
 <style>
 
  textarea{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:70px;
width:300px;
padding-left:5px;
resize:none;
margin-top:0px;

}
 
 
.t_input{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:160px;
padding-left:5px;
}
.t_input1{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:300px;
padding-left:5px;
}
.title{
	
margin-top:23px;
margin-bottom:23px;
text-align:center;
color:rgba(30,115,190,1);
font-family: 'Roboto', sans-serif;
font-size:27px;
}
.buttons{
width:40%;
height:50px;
margin-left:30%;
margin-right:30%;
text-align:center;

}
.button_style{
font-family: 'Roboto', sans-serif;
font-size:15px;
margin-left:30px;
background:rgba(25,156,216,1);
margin-top:20px;
border: 2px solid rgba(25,156,216,1);;
padding-top:4px;
 border-radius: 4px;
text-align:center;
height:44px;
width:92px;
color:#fff;
}

.button_style:hover{
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(21,129,178,1);
border: 2px solid rgba(21,129,178,1);
border-radius: 4px;
padding-top:4px;
text-align:center;
height:44px;
width:92px;
cursor:pointer;
color:#fff;
}
.dropdown{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:300px;
padding-left:5px;
 outline: none;	
}
 .fileup{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:300px;;
padding:3px;
 }
 
 
 .button_up{
display: inline-block;
margin-left:0px;
background:rgba(30,115,190,1);
margin-top:0px;
border: 2px solid rgba(30,115,190,1);
padding-top:4px;
text-align:center;
height:23px;
width:110px;
color:#fff;
}
  
  .upload_button{
display:inline-block;
background-image: url("3.png");
background-repeat:no-repeat;
 color:#F9F9F9;
 background-position: 2px 0px;
  width: 40px;
  height: 30px;
 float: left;
  cursor: pointer;
  
  -webkit-border-radius: 0px;
  border-radius: 0px; 
}

 
 .invisible{
	 display:none;
	 width:0px;
	 height:0px;
 } 
  
  .ctr{
	  width:300px;
	  height:30px;
	  margin-top:-15px;
	  max-height:30px;
	 overflow:hidden;
	  text-align:left;
	  border: 1px solid #BFE5FF;
      border-radius: 5px;
  }
  .field_n{
	  display:inline-block;
	  width:154px;
	  float: left;
	 text-align:left;
	  height:30px;
	   margin-left:3px;
	   padding-left:2px;
	   padding-top:8px;
	  background:#f9f9f9;
	  overload:none;
	  color:rgba(30,115,190,1);
      font-size:12px;
	  
  }
   
  .champ_style
{
font-family: 'Roboto', sans-serif;
font-size:17px;
color:rgba(30,115,190,1)
}
   .champ_style_interne
{
font-family: 'Roboto', sans-serif;
font-size:17px;
color:#000;
}
.stylediv{
	display : none; 
	 
 } 
  </style>
   <script type="text/javascript">
   $(document).ready(function(){
     var intervalfunc=function(){
		 $('#file').html($('#file').val());
		 
		 
	 };
	  $('#new_btn').on('click',function(){
		  
		   $('#file').click();
		   setInterval(intervalfunc,1);
		   return false;
	  });


});

   
		function get_filename(obj) {

		var file = obj.value+"";
		
       document.getElementById('namefield').innerHTML+=file;
 

		}
   
   
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Lel9hcTAAAAABpzXiFR3MPeANNvdRjOU3KfcL7u'
        });
      };
	  
	  function submit_req() {
		
		  var name=document.getElementById("name").value+"";
		  var lastname=document.getElementById("lastname").value+"";
		  var mail=document.getElementById("email").value+"";
		  //$$$$$$$$$
		  var name1=document.getElementById("name1").value+"";
		  var lastname1=document.getElementById("lastname1").value+"";
		  var mail1=document.getElementById("email1").value+"";
		  //$$$$$$$$$
		  var name2=document.getElementById("name2").value+"";
		  var lastname2=document.getElementById("lastname2").value+"";
		  var mail2=document.getElementById("email2").value+"";
		  //$$$$$$$$$
		  var name3=document.getElementById("name3").value+"";
		  var lastname3=document.getElementById("lastname3").value+"";
		  var mail3=document.getElementById("email3").value+"";
		  //$$$$$$$$$
		  
		  
		  //var adress=document.getElementById("adress").value+"";
		  var area=document.getElementById("area").value+"";
		  var field=document.getElementById("field").value+"";
		  var abst=document.getElementById("abstract").value+"";
		  var papertitle=document.getElementById("ptitle").value+"";
		    
		  var paperlink=document.getElementById("file").value+"";
	 
		  var filename=paperlink.substr(12);
		   
		   var currentdate = new Date(); 
                   var datetime = "" + currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " - " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   
                   
		 
		   
		   
		   if((name=="")||(mail=="")||(lastname=="")||(area=="")||(abst=="")||(papertitle=="")||(paperlink=="")||(field=="")){
			  alert("Error ,Please Insert All Data !!");    
		   }
		   else if((mail.indexOf("@")<0)&&(mail.indexOf(".")<0))
		   {
			   alert("Error ,invalid Email !!");    
		   }
                
		   else {  
                                var rand=Math.floor((Math.random()*1000)+1)+"";
				var pass=name+rand;
                                 
				 var filelinkS="x"; 
				 var topicS="x"; 
				 var nameclS=name; 
				 var emailS=mail;
				 var passwordS=pass;
				
			  
				
			   var main222='{"type":"inser_cond","name":"'+name+'","pass":"'+pass+'","mail":"'+mail+'","lastname":"'+lastname+'","area":"'+area+'","field":"'+field+'","abst":"'+abst+'","papertitle":"'+papertitle+'","paperlink":"'+filename+'","name1":"'+name1+'","lastname1":"'+lastname1+'","email1":"'+email1+'","name2":"'+name2+'","lastname2":"'+lastname2+'","email2":"'+email2+'","name3":"'+name3+'","lastname3":"'+lastname3+'","email3":"'+email3+'","date":"'+datetime+'"}';
                          $.getJSON("conn.php",{client_req:main222});
			 
			   
			 
  
		   
                               var typeS="sendclient";
			        var urlS="http://icace.tk/send.php?type="+encodeURIComponent(typeS)+"&namecl="+encodeURIComponent(nameclS)+"&topic="+encodeURIComponent(topicS)+"&filelink="+encodeURIComponent(filelinkS)+"&pass="+encodeURIComponent(passwordS)+"&to="+encodeURIComponent(emailS);
          
                                 document.getElementById("contents").innerHTML="<iframe src="+urlS+"></iframe>";
                                 document.getElementById("contents").style.display = 'none';
                            
                                  setTimeout(function(){   document.getElementById("uploadform").submit(); alert("Ok done Thanks !!");},3000); 
                         
 
		   }
		   
		   
	 
	  
	  }
	  
	
	
	  
    </script>
  </head>
  <body bgcolor="#F9F9F9">
  
  <center>
  <div style="height:2px;">
   </div>
  <div class="title">Submit Your Request :</div>
  <table cellspacing="7" cellpadding="0">
     <tr><td class="champ_style">First Author &nbsp;&nbsp;</td><td class="champ_style_interne">First Name :*&nbsp;</td><td><input class="t_input" id="name" type="text" placeholder="Your First Name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Last Name :*&nbsp;</td><td><input class="t_input" id="lastname" type="text" placeholder="Your Last name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Email :*&nbsp;</td><td><input class="t_input"  id="email" type="text" placeholder="Your Email Here" onFocus="" onkeypress="submit_enter(event)"></td></tr>
	 <tr><td class="champ_style">Second Author &nbsp;&nbsp;</td><td class="champ_style_interne">First Name :&nbsp;</td><td><input class="t_input" id="name1" type="text" placeholder="Your First Name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Last Name :&nbsp;</td><td><input class="t_input" id="lastname1" type="text" placeholder="Your Last name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Email :&nbsp;</td><td><input class="t_input"  id="email1" type="text" placeholder="Your Email Here" onFocus="" onkeypress="submit_enter(event)"></td></tr>
	 <tr><td class="champ_style">Third Author &nbsp;&nbsp;</td><td class="champ_style_interne">First Name :&nbsp;</td><td><input class="t_input" id="name2" type="text" placeholder="Your First Name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Last Name :&nbsp;</td><td><input class="t_input" id="lastname2" type="text" placeholder="Your Last name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Email :&nbsp;</td><td><input class="t_input"  id="email2" type="text" placeholder="Your Email Here" onFocus="" onkeypress="submit_enter(event)"></td></tr>
	 <tr><td class="champ_style">Fourth Author &nbsp;&nbsp;</td><td class="champ_style_interne">First Name :&nbsp;</td><td><input class="t_input" id="name3" type="text" placeholder="Your First Name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Last Name :&nbsp;</td><td><input class="t_input" id="lastname3" type="text" placeholder="Your Last name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; Email :&nbsp;</td><td><input class="t_input"  id="email3" type="text" placeholder="Your Email Here" onFocus="" onkeypress="submit_enter(event)"></td></tr>
	 </table>
 <table cellspacing="5">	 
	 <tr><td class="champ_style">Article &nbsp;&nbsp;</td><td class="champ_style_interne">Title :*&nbsp;</td><td><input class="t_input1"  id="ptitle" type="text" placeholder="Your Article Title Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style_interne">&nbsp; File :*&nbsp;</td><td>
	  <form id="uploadform"action="form.php" method="POST" enctype="multipart/form-data">
	     <input type="file" name="file" id="file" class="invisible" onchange="get_filename(this);"><br><br>  
		  <div name="contour" id="contiur" class="ctr"> 
		  <div class="upload_button"  name="new_btn" id="new_btn" ></div><div name="namefield" id="namefield" class="field_n"> </div>
		  </div>
	 </td></tr>
	  <tr><td class="champ_style">Research Domain &nbsp;&nbsp;</td><td class="champ_style_interne">Area :*&nbsp;</td><td>
	  <select class="dropdown" id="area">
	 <option>Select</option>
	 <option>Computer Theories and Algorithms</option>
	 <option>Cloud Computing</option>
	 <option>Computer Architecture and Embedded Systems</option>
	 <option>Computer Graphics, Vision and Multimedia</option>
	 <option>Computer Network and Communication</option>
	 <option>Computer Simulation and Modeling</option>
	 <option>Database Technology and Data Warehousing</option>
	 <option>Distributed and Parallel Computing</option>
	 <option>Computer Ethics Issues</option>
	 <option>Grid Computing and Mobile Technology</option>
	 <option>Computer applications in Physical Educations</option>
	 <option>Information Retrieval and Knowledge Management</option>
	 <option>Cryptography and Information Security</option>
	 <option>Digital Watermarking and Steganography</option>
	 <option>Internet and Web Applications</option>
	 <option>E-Technology: E-Learning and E-Commerce</option>
	 <option>Artificial Intelligence and Machine Learning</option>
	 <option>Natural Language Processing</option>
	 <option>Pattern Recognition and Image Processing</option>
	 <option>Software Engineering</option>
	 <option>Human¬ Computer Interaction</option>
	 <option>Computer Arts and Design</option>
	 <option>Other</option>
	 </select>
	 </td><td class="champ_style_interne">&nbsp; Field :*&nbsp;</td><td>
	 <select class="dropdown" id="field">
	 <option>Select</option>
	 <option>Computer Theories and Algorithms</option>
	 <option>Cloud Computing</option>
	 <option>Computer Architecture and Embedded Systems</option>
	 <option>Computer Graphics, Vision and Multimedia</option>
	 <option>Computer Network and Communication</option>
	 <option>Computer Simulation and Modeling</option>
	 <option>Database Technology and Data Warehousing</option>
	 <option>Distributed and Parallel Computing</option>
	 <option>Computer Ethics Issues</option>
	 <option>Grid Computing and Mobile Technology</option>
	 <option>Computer applications in Physical Educations</option>
	 <option>Information Retrieval and Knowledge Management</option>
	 <option>Cryptography and Information Security</option>
	 <option>Digital Watermarking and Steganography</option>
	 <option>Internet and Web Applications</option>
	 <option>E-Technology: E-Learning and E-Commerce</option>
	 <option>Artificial Intelligence and Machine Learning</option>
	 <option>Natural Language Processing</option>
	 <option>Pattern Recognition and Image Processing</option>
	 <option>Software Engineering</option>
	 <option>Human¬ Computer Interaction</option>
	 <option>Computer Arts and Design</option>
	 <option>Other</option>
	 </select> 
	 </td></tr>
	 <tr>
	 <td>&nbsp; &nbsp;</td><td class="champ_style">Abstract :*&nbsp;</td><td><textarea id="abstract" placeholder="Your Abstract Here ..."></textarea></td><td>&nbsp; &nbsp;</td><td><div id="html_element" style="margin-top:7px;"></div></td>
	 </tr>
	 
	 
   </table>
  <center>
  
  
    </form>
         <input type="button" class="button_style" value="Submit" onClick="submit_req();">


    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
  <div class="contentWrapper" id="contents" class="stylediv"></div>
 <div class="contentWrapper" id="contents1" class="stylediv"></div>
  </body>
 </html>