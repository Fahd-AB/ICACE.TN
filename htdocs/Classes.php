<?php
//error_reporting (0);




//+++++++++++++++++++++++ Classe Connexion +++++++++++++++++++++++++
class connexion{
var $db;
function connexion(){
error_reporting(0);
$db=mysql_connect("localhost", "root", "");
mysql_select_db("mobilenetwork");

}
//affiche
function afficher($table,$condition){
$rows = array();

if($condition==""){
mysql_query('SET CHARACTER SET utf8');
$sqldata = mysql_query("SELECT * FROM $table");
while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;
}
}
else{
mysql_query('SET CHARACTER SET utf8');
$sqldata = mysql_query("SELECT * FROM $table WHERE $condition");
while($r = mysql_fetch_assoc($sqldata)) {
  $rows[] = $r;
}
}

return $rows;
}
//insertion

function insert($table,$valeurs){
$vals="";
$i=0; 
//print_r($valeurs);
$taille=count($valeurs);
$almost=$taille-1;
while($i<$taille){
if($i==$almost){
$vals = $vals."'".$valeurs[$i]."'";
}
else{
$vals = $vals."'".$valeurs[$i]."'".",";
}
$i++;

}
mysql_query('SET CHARACTER SET utf8mb4');
$sql="INSERT INTO $table values($vals)";
$res=mysql_query($sql);
return $res;
}

// delete
function supp($table,$condition){
if($condition==""){
$sql="DELETE FROM $table";
}
else{
$sql="DELETE FROM $table WHERE $condition";
}

$res=mysql_query($sql);
return $res;
}
//update
function modifier($table,$champ,$valeur,$condition){
if($champ=="1")
{
$sql="UPDATE $table SET  $valeur  WHERE $condition";
}
else if($condition==""){
$sql="UPDATE $table SET $champ = '$valeur' ";
}
else{
$sql="UPDATE $table SET $champ = '$valeur' WHERE $condition";
}
$res=mysql_query($sql);
return $res;
}
//fermutre
function fermer(){
mysql_close($db);
}
}


//++++++++++++++++++++++++++++ Classe Client +++++++++++++++++++++++++

class client{
var $id;
var $firstname;
var $lastname;
var $email;
var $password;
var $articles; // listes des articles envoyées
 




function client($id_personne,$first_name,$last_name,$email,$password,$articles){
$this->id = $id_personne;
$this->firstname = $first_name;
$this->lastname = $last_name;
$this->email = $email;
$this->password = $adresse;
$this->articles = $articles;
 
}
 public function getid() {
        return $this->id;
    }

    public function setid($id_personne) {
        $this->id = $id_personne;
    }
public function getfirstname() {
        return $this->firstname;
    }

    public function setfirstname($first_name) {
        $this->firstname = $first_name;
    }
public function getlastname() {
        return $this->lastname;
    }

    public function setlastname($last_name) {
        $this->lastname = $last_name;
    }	
public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }		
public function getpassword() {
        return $this->password;
    }

    public function setpassword($password) {
        $this->password = $password;
    }	
public function getarticles() {
        return $this->articles;
    }

    public function setarticles($articles) {
        $this->articles = $articles;
    }	

	
}
//++++++++++++++++++++++++++class administrateur+++++++++++++++++++++++++++++
class administrateur{
var $id;
var $name;
var $email;
var $login;
var $password;

function administrateur($id,$name,$email,$login,$password){
$this->id = $id;
$this->name = $name;
$this->email = $cost;
$this->login = $login;
$this->password = $password;

}
 public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }
public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }	
public function getlogin() {
        return $this->login;
    }

    public function setlogin($login) {
        $this->login = $login;
    }	
public function getpassword() {
        return $this->password;
    }

    public function setpassword($password) {
        $this->password = $password;
    }	
	
}
//++++++++++++++++class news++++++
class news{
var $id;
var $title;
var $text_n;
var $date_n;


function news($id,$title,$text_n,$date_n){
$this->id = $id;
$this->title = $title;
$this->text_n = $text_n;
$this->date_n = $date_n;
 
}
public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
 public function gettitle() {
        return $this->title;
    }

    public function settitle($title) {
        $this->title = $title;
    }
public function gettext_n() {
        return $this->text_n;
    }

    public function settext_n($text_n) {
        $this->text_n = $text_n;
    }
public function getdate_n() {
        return $this->date_n;
    }

    public function setdate_n($date_n) {
        $this->date_n = $date_n;
    }	
	
}
//++++++++++++++++class reviewer++++++
class reviewer{
var $id;
var $name;
var $email;
var $articles_in_charge;
 

function reviewer($id,$name,$email,$articles_in_charge){
$this->id = $id;
$this->name = $name;
$this->email = $email;
$this->articles_in_charge = $articles_in_charge;
}

 public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }
public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }	
public function getarticles_in_charge() {
        return $this->articles_in_charge;
    }

    public function setarticles_in_charge($articles_in_charge) {
        $this->articles_in_charge = $articles_in_charge;
    }	
	
}

//++++++++++++++++++++++ Class review ++++++++++++++

class review{
var $id;
var $id_article;
var $text_rev;
 
 

function review($id,$id_article,$text_rev){
$this->id = $id;
$this->id_article = $id_article;
$this->text_rev = $text_rev;
}

 public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
public function getid_article() {
        return $this->id_article;
    }

    public function setid_article($id_article) {
        $this->id_article = $id_article;
    }
public function gettext_rev() {
        return $this->text_rev;
    }

    public function settext_rev($text_rev) {
        $this->text_rev = $text_rev;
    }	
 
	
}

//++++++++++++++++++++++++ Class article ++++++++++++++++++++

class article{
 var $id;
 var $first_author_first_name;
 var $first_author_last_name;
 var $first_author_email;
 var $second_author_first_name;
 var $second_author_last_name;
 var $second_author_email;
 var $third_author_first_name;
 var $third_author_last_name;
 var $third_author_email;
 var $fourth_author_first_name;
 var $fourth_author_last_name;
 var $fourth_author_email;
 var $status;
 var $reviewer1;
 var $reviewer2;
 var $reviews;
 var $area;
 var $field;
 var $title;
 var $abstract_;
 var $file_link;
 var $date_soumission;

function article($id,$first_author_first_name,$first_author_last_name,$first_author_email,
$second_author_first_name,$second_author_last_name,$second_author_email,$third_author_first_name,$third_author_last_name,$third_author_email,
$fourth_author_first_name,$fourth_author_last_name, $fourth_author_email,$status,$reviewer1,$reviewer2,$reviews,$area,$field,$title,$abstract,$file_link,$date_soumission){
$this->id = $id;
$this->first_author_first_name = $first_author_first_name;
$this->first_author_last_name = $first_author_last_name;
$this->first_author_email = $first_author_email;
$this->second_author_first_name = $second_author_first_name;
$this->second_author_last_name = $second_author_last_name;
$this->second_author_email = $second_author_email;
$this->third_author_first_name = $third_author_first_name;
$this->third_author_last_name = $third_author_last_name;
$this->third_author_email = $third_author_email;
$this->fourth_author_first_name = $fourth_author_first_name;
$this->fourth_author_last_name = $fourth_author_last_name;
$this->fourth_author_email = $fourth_author_email;
$this->status = $status;
$this->reviewer1 = $reviewer1;
$this->reviewer2 = $reviewer2;
$this->reviews = $reviews;
$this->area = $area;
$this->field = $field;
$this->title = $title;
$this->abstract_ = $abstract;
$this->file_link = $file_link;
$this->date_soumission = $date_soumission;
}

 public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
public function getfirst_author_first_name() {
        return $this->first_author_first_name;
    }

    public function setfirst_author_first_name($first_author_first_name) {
        $this->first_author_first_name = $first_author_first_name;
    }
public function getfirst_author_last_name() {
        return $this->first_author_last_name;
    }

    public function setfirst_author_last_name($first_author_last_name) {
        $this->first_author_last_name = $first_author_last_name;
    }
public function getfirst_author_email() {
        return $this->first_author_email;
    }
public function setfirst_author_email($first_author_email) {
        $this->first_author_email = $first_author_email;
    }

	
	
	
	
public function getsecond_author_first_name() {
        return $this->second_author_first_name;
    }

    public function setsecond_author_first_name($second_author_first_name) {
        $this->second_author_second_name = $second_author_first_name;
    }
public function getsecond_author_last_name() {
        return $this->second_author_last_name;
    }

    public function setsecond_author_last_name($second_author_last_name) {
        $this->second_author_last_name = $second_author_last_name;
    }
public function getsecond_author_email() {
        return $this->second_author_email;
    }

    public function setsecond_author_email($second_author_email) {
        $this->second_author_email = $second_author_email;
    }

	
	
public function getthird_author_first_name() {
        return $this->third_author_first_name;
    }

    public function setthird_author_first_name($third_author_first_name) {
        $this->third_author_second_name = $third_author_first_name;
    }
public function getthird_author_last_name() {
        return $this->third_author_last_name;
    }

    public function setthird_author_last_name($third_author_last_name) {
        $this->third_author_last_name = $third_author_last_name;
    }
public function getthird_author_email() {
        return $this->third_author_email;
    }

    public function setthird_author_email($third_author_email) {
        $this->third_author_email = $third_author_email;
    }
	



public function getfaurth_author_first_name() {
        return $this->faurth__author_first_name;
    }

    public function setfaurth__author_first_name($faurth__author_first_name) {
        $this->faurth__author_second_name = $faurth__author_first_name;
    }
public function getfaurth__author_last_name() {
        return $this->faurth__author_last_name;
    }

    public function setfaurth__author_last_name($faurth__author_last_name) {
        $this->faurth__author_last_name = $faurth__author_last_name;
    }
public function getfaurth__author_email() {
        return $this->third_author_email;
    }

    public function setfaurth__author_email($faurth__author_email) {
        $this->faurth__author_email = $faurth__author_email;
    }
	
	
public function getstatus() {
        return $this->status;
    }

    public function setstatus($status) {
        $this->status = $status;
    }	
public function getreviewer1() {
        return $this->reviewer1;
    }

    public function setreviewer1($reviewer1) {
        $this->reviewer1 = $reviewer1;
    }
public function getreviewer2() {
        return $this->reviewer2;
    }

    public function setreviewer2($reviewer2) {
        $this->reviewer2 = $reviewer2;
    }	




public function getreviews() {
        return $this->reviews;
    }

    public function setreviews($reviews) {
        $this->reviews = $reviews;
    }	
public function getarea() {
        return $this->area;
    }

    public function setarea($area) {
        $this->area = $area;
    }
public function getfield() {
        return $this->field;
    }

    public function setfield($field) {
        $this->field = $field;
    }		


	
	
	public function gettitle() {
        return $this->title;
    }

    public function settitle($title) {
        $this->title = $title;
    }	
public function getabstract() {
        return $this->abstract_;
    }

    public function setabstract($abstract) {
        $this->abstract_ = $abstract;
    }
public function getfile_link() {
        return $this->file_link;
    }

    public function setfile_link($file_link) {
        $this->file_link = $file_link;
    }		
public function getdate_soumission() {
        return $this->date_soumission;
    }

    public function setdate_soumission($date_soumission) {
        $this->date_soumission = $date_soumission;
    }			

	
}







?>