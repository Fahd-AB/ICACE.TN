<?php

require_once 'Classes.php';







class noeud
{

    public $contenu;
    public $suivant;
    
    

    function __construct($contenu)
    {
        $this->contenu = $contenu;
        $this->suivant = NULL;
    }
    
    function afficher_noeud()
    {
        return $this->contenu;
    }
}






class liste
{
    private $tete;
    private $queue;
    private $taille;
    
    
   
    function __construct()
    {
        $this->tete = NULL;
        $this->queue = NULL;
        $this->taille = 0;
    }

    public function est_vide()
    {
        return ($this->tete == NULL);
    }
    
    public function inserer_tete($contenu,$c)
    {
        $nouveau = new noeud($contenu);
        $nouveau->suivant = $this->tete;
        $this->tete = &$nouveau;
        
        if($this->queue == NULL)
            $this->queue = &$nouveau;
            
        $this->taille++;
    }
    
    public function inserer_queue($contenu,$c)
    {  $table="";
	   $val=Array();
        if($this->tete != NULL)
        {
            $nouveau = new noeud($contenu);
            $this->queue->suivant = $nouveau;
            $nouveau->suivant = NULL;
            $this->queue = &$nouveau;
            $this->taille++;
        }
        else
        {
            $this->inserer_tete($contenu);
        }
//++++++++test si instance of client+++++++++ 		
if($contenu instanceof client)
{
$table="condidat";
$cli_id=$contenu->getid();

$exist=$c->afficher($table,"id=".$cli_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getfirstname();
		$val[2]=$contenu->getlastname();
		$val[3]=$contenu->getemail();
		$val[4]=$contenu->getpassword();
		$val[5]=$contenu->getarticles();
	 
		
		}
 
}
//++++++++test si instance of administrateur+++++++++ 		
if($contenu instanceof administrateur)
{
$table="admin";
$cli_id=$contenu->getid();

$exist=$c->afficher($table,"id=".$cli_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getname();
		$val[2]=$contenu->getemail();
		$val[3]=$contenu->getlogin();
		$val[4]=$contenu->getpassword();
		
		}
 
}
//++++++++test si instance of news+++++++++
if($contenu instanceof news)
{
$table="news";
$count_id=$contenu->getid();

$exist=$c->afficher($table,"id=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getid();
		$val[1]=$contenu->gettitle();
		$val[2]=$contenu->gettext_n();
		$val[2]=$contenu->getdate_n();
		
		}
 
}
//+++++++++++++test si instance of reviewer+++++
 if($contenu instanceof reviewer)
{
 
$table="reviewers";
$count_id=$contenu->getemail();

$exist=$c->afficher($table,"email=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getname();
		$val[2]=$contenu->getemail();
		$val[3]=$contenu->getarticles_in_charge();
 
		
		}
}
 //+++++++++++++test si instance of review+++++
 if($contenu instanceof review)
{
 
$table="employe";
$count_id=$contenu->getemail();

$exist=$c->afficher($table,"email=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getid_article();
		$val[2]=$contenu->gettext_rev();
 
		
		}
}
//+++++++++++++test si instance of article+++++
 if($contenu instanceof article)
{
 
$table="employe";
$count_id=$contenu->getemail();

$exist=$c->afficher($table,"email=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getfirst_author_first_name();
		$val[2]=$contenu->getfirst_author_last_name();
		$val[3]=$contenu->getfirst_author_email();
		$val[4]=$contenu->getsecond_author_first_name();
		$val[5]=$contenu->getsecond_author_last_name();
		$val[6]=$contenu->getsecond_author_email();
		$val[7]=$contenu->getthird_author_first_name();
		$val[8]=$contenu->getthird_author_last_name();
		$val[9]=$contenu->getthird_author_email();
		$val[10]=$contenu->getfourth_author_first_name();
		$val[11]=$contenu->getfourth_author_last_name();
		$val[12]=$contenu->getfourth_author_email();
		$val[13]=$contenu->getstatus();
		$val[14]=$contenu->getreviewer1();
		$val[15]=$contenu->getreviewer2();
		$val[16]=$contenu->getreviews();
		$val[17]=$contenu->getarea();
		$val[18]=$contenu->getfield();
		$val[19]=$contenu->gettitle();
		$val[20]=$contenu->getabstract_();
		$val[21]=$contenu->getfile_link();
		$val[22]=$contenu->getdate_soumission();
 

		}
}
//+++++++++++++Commit insert in data base+++++
 
        if(count($val)!=0)
		{
		$result=$c->insert($table,$val);	
		}
		
    
}
   
	
	
	
    public function supprimer_tete()
    {  
        $temp = $this->tete;
        $this->tete = $this->tete->suivant;
        if($this->tete != NULL)
            $this->taille--;
         $nouveau_tete=$this->tete;
        return $nouveau_tete;
    }
    
    public function supprimer_queue()
    {
        if($this->tete != NULL)
        {
            if($this->tete->suivant == NULL)
            {
                $this->tete = NULL;
                $this->taille--;
            }
            else
            {
                $precedent = $this->tete;
                $courant = $this->tete->suivant;
                
                while($courant->suivant != NULL)
                {
                    $precedent = $courant;
                    $courant = $courant->suivant;
                }
                
                $precedent->suivant = NULL;
                $this->taille--;
            }
        }
    }
    
    public function supprimer_noeud($cle,$tab,$con,$c)
    {
        $courant = $this->tete;
        $precedent = $this->tete;
        $result;
	   
        while($courant->contenu != $cle)
        {
            if($courant->suivant == NULL)
                return NULL;
            else
            {
                $precedent = $courant;
                $courant = $courant->suivant;
            }
        }

        if($courant == $this->tete)
         {
              if($this->taille == 1)
               {
                  $this->queue = $this->tete;
               }
               $this->tete = $this->tete->suivant;
        }
        else
        {
            if($this->queue == $courant)
            {
                 $this->queue = $precedent;
             }
            $precedent->suivant = $courant->suivant;
        }
        $this->taille--;  
		
		$result=$c->supp($tab,$con);
	
		
		return $result;
    }
    
	
	
	
    public function recherche($cle)
    {
        $courant = $this->tete;
        while($courant->contenu != $cle)
        {
            if($courant->suivant == NULL)
                return null;
            else
                $courant = $courant->suivant;
        }
        return $courant->contenu;
    }
    
	
	
	
    public function noeud_contenu($position)
    {
        if($position <= $this->count)
        {
            $courant = $this->tete;
            $pos = 1;
            while($pos != $position)
            {
                if($courant->suivant == NULL)
                    return null;
                else
                    $courant = $courant->suivant;
                    
                $pos++;
            }
            return $courant->contenu;
        }
        else
            return NULL;
    }
    
	
	
    public function liste_taille()
    {
        return $this->taille;
    }
    
	
    public function afficher_liste()
    {
        $l = array();
        $courant = $this->tete;
        
        while($courant != NULL)
        {
            array_push($l, $courant->afficher_noeud());
            $courant = $courant->suivant;
        }
        return $l;
    }
    
  
	public function modifier_objet($tab,$champ,$nv_val,$cond,$c){
	    $result=$c->modifier($tab,$champ,$nv_val,$cond);
	}
	
	
}

 
?>