<?php
      $type=$_GET['type'];
	  $namecl=$_GET['namecl'];
	  $topic=$_GET['topic'];
	  $filelink=$_GET['filelink'];
	  $pass=$_GET['pass'];
      $to=$_GET['to'];
 $to1=$_GET['to1'];
     

      ?>
<html>
    <head>
<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
       <title></title>

       <script type="text/javascript">
 function sendMail_other(name,text,destination) {
    $.ajax({
      type: 'POST',
      url: 'https://mandrillapp.com/api/1.0/messages/send.json',
      data: {
        'key': 'ViGfWjXVxKSZJespIVh-mw',
        'message': {
          'from_email': 'service@icace.tk',
          'to': [
              {
                'email': destination,
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
     // alert(adress+" "+text); // console.log(response); 
// if you're into that sorta thing
     });
}
function sendMail_admin(name,text) {
    $.ajax({
      type: 'POST',
      url: 'https://mandrillapp.com/api/1.0/messages/send.json',
      data: {
        'key': 'ViGfWjXVxKSZJespIVh-mw',
        'message': {
          'from_email': 'service@icace.tk',
          'to': [
              {
                'email': 'fahed.abdellaoui2@gmail.com',
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
     // alert(adress+" "+text); // console.log(response); 
// if you're into that sorta thing
     });
}

 
   function sendad(){
           var text1="Hello ,Dear Webmaster of ICACE SOUSSE 2017 :<br> A new condidate had just submitted his request to join ICACE SOUSSE 2017 please acess the webmaster space to review the submission from <a href='www.webconf.0fees.us/login.php'>here</a>.<br> With Gratitude.<br><br> www.webconf.0fees.us <br>";
          var name="master";
          sendMail_admin(name,text1);
}
function sendre(namecl,topic,filelink,dest,dest1){
           var text="Hello ,Dear Our Reviewer :<br> You are selected by the Administrator of ICACE SOUSSE 2017 to review The Article of : <br><br><br> Mr : "+namecl+" <br><br><br>The Main Topic of the Article is : "+topic+"<br>You Can Find the file link <a href='http://www.webconf.0fees.us/a/"+filelink+"'>here</a> . Please Contact the Administrator for more details.<br><br><br>With Gratitude.<br><br>Administrator of www.webconf.0fees.us <br>";
	    var name="master";
          sendMail_other(name,text,dest);
setTimeout(function(){sendMail_other(name,text,dest1);},2000); 
}
function sendcl(namecl,pass,dest){
              var text2="Hello ,Dear Condidate of ICACE SOUSSE 2017 <br> <br> Mr : "+namecl+" :<br><br>  Your request to join ICACE SOUSSE 2017 has been sucessfully submitted, you can visit your personal space by clicking the login button on the home page of the website or just by clicking <a href='www.webconf.0fees.us/log.php'>here</a>.<br><br>Login : "+dest+"<br><br>Password : "+pass+" <br><br> With Gratitude.<br><br> www.webconf.0fees.us <br>";
          var name="master";
           sendMail_other(name,text2,dest);
          setTimeout(function(){sendad();},2000); 
}








     <?php


  
    sleep(2);

if( $type=="sendadmin"){
    echo "sendad()";
 
 }
 if( $type=="sendreviewer"){
    echo "sendre('$namecl','$topic','$filelink','$to','$to1')";
 
 }
 if( $type=="sendclient"){
    echo "sendcl('$namecl','$pass','$to')";

 
 }

      ?>
       </script>

    </head>
    <body>
  
    </body>
</html>