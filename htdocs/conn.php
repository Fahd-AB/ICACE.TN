 <?php
 error_reporting(0);
 
 
 $req="";
$obj_client;
$req=$_GET['client_req'];
$o = json_decode($req);
$type_main = $o->{'type'};
 
 
 
  $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");
 
 
 //$$$$$$$$$$$$$$$$$$$$$ retreive condidate list $$$$$$$$$$$$$$
 $rows = array();
 //mysql_query('SET CHARACTER SET utf8');
 $sqldata = mysql_query("SELECT * FROM condidat");
 while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;
$nb=count($rows);
 
 }
 //$$$$$$$$$$$$$$$$$$ retreive reviewer list $$$$$$$$$$$$$$$$$$
  $rows_rev = array();
 //mysql_query('SET CHARACTER SET utf8');
 $sqldata1 = mysql_query("SELECT * FROM reviewer");
 while($r1 = mysql_fetch_assoc($sqldata1)) {
  $rows_rev[] = $r1;
$nb_rev=count($rows_rev);

 }
 //$$$$$$$$$$$$$$$$$$ retreive admin  $$$$$$$$$$$$$$$$$$
  $rows_admin = array();
 //mysql_query('SET CHARACTER SET utf8');
 $sqldata7 = mysql_query("SELECT * FROM admin");
 while($r7 = mysql_fetch_assoc($sqldata7)) {
  $rows_admin[] = $r7;
 }
 if($type_main=="connectadmin"){

  print json_encode($rows_admin);
  }
 
 if($type_main=="connect"){

  print json_encode($rows);
  
 

}

 if($type_main=="connect1"){

  print json_encode($rows_rev);
  
 

}
 if($type_main=="addviewer"){

 $name = $o->{'name'};
 $email = $o->{'email'};
 
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");

$sql="insert into reviewer values('','$name','$email')";
mysql_query($sql);
   
  
 

}
 
  if($type_main=="addnews"){

 $title = $o->{'title'};
 $text = $o->{'text'};
  $date = $o->{'date'};
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");

$sql="insert into news values('','$title','$text','','$date')";
mysql_query($sql);
   
  
 

}
 
 if($type_main=="search"){
	  $email = $o->{'email'};
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");
 
 $rows = array();

 $sqldata = mysql_query("SELECT * FROM condidat where email='$email'");
 while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;

 
 }
 $nb=count($rows);
  print json_encode($rows); 
 

}
 
 if($type_main=="getreviews"){
	  $id= $o->{'id'};
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");
 
 $rows = array();

 $sqldata = mysql_query("SELECT * FROM reviews where idcon='$id'");
 while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;

 
 }
 $nb=count($rows);
  print json_encode($rows); 
 

}

 if($type_main=="getnews"){
	  $id= $o->{'id'};
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");
 
 $rows = array();

 $sqldata = mysql_query("SELECT * FROM news ");
 while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;

 
 }
 $nb=count($rows);
  print json_encode($rows); 
 

}




 if($type_main=="ins_com"){

 $conid= $o->{'con_id'};
 $text = $o->{'text'};
 
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");

$sql="insert into reviews values('','$conid','$text')";
mysql_query($sql);


}





 
 //$$$$$$$$$$$$$$$$$$ update condidat $$$$$$$$$$$$$$$$$$$
 
 
  if($type_main=="update"){
$id = $o->{'id'};
 $stat1 = $o->{'stat1'};
 $stat2 = $o->{'stat2'};
 $stat3 = $o->{'stat3'};
 $stat4 = $o->{'stat4'};
 $stat5 = $o->{'stat5'};
 $stat6 = $o->{'stat6'};
 $rev1 = $o->{'rev1'};
 $rev2 = $o->{'rev2'};
 
 
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");

$sql="update condidat set statdisp='$stat1' , statrev='$stat2', statacc='$stat3' ,stataccMinR='$stat4' ,stataccMajR='$stat5' ,statref='$stat6' , reviewer1='$rev1' ,reviewer2='$rev2' where id='$id'";
mysql_query($sql);
   
  
 

}
 
//$$$$$$$$$$$$$ insert condidat $$$$$$$$$$$ 
 
 
  if($type_main=="inser_cond"){
 $name = $o->{'name'};
 $email = $o->{'mail'};
 $lastname = $o->{'lastname'};
 $pass = $o->{'pass'}; 
 $area = $o->{'area'};
 $field = $o->{'field'};
 $abst = $o->{'abst'};
 $papertitle = $o->{'papertitle'};
 $paperlink = $o->{'paperlink'};
 
 $name1 = $o->{'name1'};
 $email1 = $o->{'mail1'};
 $lastname1 = $o->{'lastname1'};
 
 $name2 = $o->{'name2'};
 $email2 = $o->{'mail2'};
 $lastname2 = $o->{'lastname2'};
 
 $name3 = $o->{'name3'};
 $email3 = $o->{'mail3'};
 $lastname3 = $o->{'lastname3'};
 $date=$o->{'date'};
 
 $db=mysql_connect("sql207.0fees.us", "0fe_17312859", "test0000");
  mysql_select_db("0fe_17312859_website");

$sql="insert into condidat values('','$name','$email','$lastname','$pass','$paperlink','$papertitle','$area','$field','$abst','1','0','0','0','0','0','','','$name1','$lastname1','$email1','$name2','$lastname2','$email2','$name3','$lastname3','$email3','$date')";
mysql_query($sql);
   
  
 

}
 

if($type_main=="sendmail"){
  $to      = 'fahed.abdellaoui2@gmail.com';
     $subject = 'le sujet';
     $message = 'Bonjour !';
     $headers = 'From: master.gaining@gmail.com' . "\r\n" .
     'Reply-To: master.gaining@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
 }

 

 ?>