<?php

// MODIFs A FAIRE
// Ajouter en t�tes 
// Voir : jeu de caract�res � la connection

/** 
 * Se connecte au serveur de donn�es                     
 * Se connecte au serveur de donn�es � partir de valeurs
 * pr�d�finies de connexion (h�te, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */                
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='gsbvisiteurs'; // le nom de votre base de donn�es
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de donn�es.
 * Ferme la connexion au serveur de donn�es identifi�e par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function lister($categ)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";

      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
			
 
		
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $fleur[$i]['matricule']=$ligne->VIS_MATRICULE;
          $fleur[$i]['nom']=$ligne->VIS_NOM;
          $fleur[$i]['prenom']=$ligne->VIS_PRENOM;
  
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}


function ajouter($unMat, $unNom, $unPrenom,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$unMat."';";     
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    //var_dump($jeuResultat);
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la r�f�rence existe d�j� !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into visiteur (VIS_MATRICULE,VIS_NOM,VIS_PRENOM) values ('"
       .$unMat."','"
       .$unNom."','"
       .$unPrenom."');";
       echo $requete;
       
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur � �t� correctement ajout�e";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du visiteur a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}


function modifier($mat, $nom, $prenom,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE)                 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      //var_dump($jeuResultat);
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
    
      // Cr�er la requ�te de modification 
       $requete="update visiteur set VIS_PRENOM='".$prenom."' , VIS_NOM='".$nom."' where VIS_MATRICULE='".$mat."';";
       echo $requete;
       
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a �t� correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du visiteur  a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

 function supprimer($mat, $nom, $prenom,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE)                 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      //var_dump($jeuResultat);
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
    
      // Cr�er la requ�te de suppresion
       $requete="delete from visiteur  where VIS_MATRICULE='".$mat."';";
       echo $requete;
       
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le visiteur a �t� correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du visiteur  a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  
}
function listerVehicules($categ)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from vehicule";

      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
			
 
		
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $fleur[$i]['id']=$ligne ->VEH_ID;
          $fleur[$i]['plaque']=$ligne->VEH_PLAQUE;
          $fleur[$i]['marque']=$ligne->VEH_MARQUE;
          $fleur[$i]['modele']=$ligne->VEH_MODELE;
          
  
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}

function ajouterVehicule($unVEH_ID, $unVEH_PLAQUE, $unVEH_MARQUE,$unVEH_MODELE,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from vehicule";
    $requete=$requete." where VEH_ID = '".$unVEH_ID."';";     
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    //var_dump($jeuResultat);
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la r�f�rence existe d�j� !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Cr�er la requ�te d'ajout 
       $requete="insert into vehicule (VEH_ID,VEH_PLAQUE,VEH_MARQUE,VEH_MODELE) values ('"
       .$unVEH_ID."','"
       .$unVEH_PLAQUE."','"
       .$unVEH_MARQUE."','"
       .$unVEH_MODELE."');";
       echo $requete;
       
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule � �t� correctement ajout�e";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function modifierVehicules($unId, $unPlaque, $unMarque,$unModele,&$tabErr)

{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE)                 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from vehicule";
    $requete=$requete." where VEH_ID = '".$unId."';"; 
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      //var_dump($jeuResultat);
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
    
      // Cr�er la requ�te de modification 
       $requete="update vehicule set VEH_MODELE='".$unModele."' ,VEH_PLAQUE='".$unPlaque."' , VEH_MARQUE='".$unMarque."' where VEH_ID='".$unId."';";
      
        echo $requete;
       
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule a �t� correctement modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la modification du vehicule  a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
 function supprimerVehicule($unId, $unPlaque, $unMarque, $unModele,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE)                 
  {
    
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from vehicule";
    $requete=$requete." where VEH_ID= '".$unId."';"; 
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      //var_dump($jeuResultat);
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
    
      // Cr�er la requ�te de suppresion
       $requete="delete from vehicule  where VEH_ID='".$unId."';";
         echo $requete;
       
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule a �t� correctement supprimer";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la suppression du vehicule  a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
  
} 



  function rechercherVisiteur($unNom)
{  
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
                   
    $requete="select * from visiteur where VIS_NOM like '%".$unNom."%';";
        echo $requete  ;                                  
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
			
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      
      while($ligne)
      {
          $visiteur[$i]['matricule']=$ligne->VIS_MATRICULE;
          $visiteur[$i]['nom']=$ligne->VIS_NOM;
          $visiteur[$i]['prenom']=$ligne->VIS_PRENOM;
  
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }   
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
             return $visiteur;
    }
    

 function rechercherVisiteurMat($unMat)
{  
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
                   
    $requete="select * from visiteur where VIS_MATRICULE like '%".$unMat."%';";
         echo $requete ;                             
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
			
      $i = 0; 
      $ligne = $jeuResultat->fetch();       
      
      
      while($ligne)
      {
          $visiteur[$i]['matricule']=$ligne->VIS_MATRICULE;
          $visiteur[$i]['nom']=$ligne->VIS_NOM;
          $visiteur[$i]['prenom']=$ligne->VIS_PRENOM;
  
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;         
      }
  }                           
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat   
  if(isset($visiteur)) { 
  // deconnecterServeurBD($idConnexion);  
             return $visiteur; 
             } 
             else{
             echo "La recherche n'existe pas" ;
             }   
    }
    
        
    
    
function rechercherVehicule($unid)
{  
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
                   
    $requete="select * from vehicule where VEH_ID like '%".$unid."%';";
        echo $requete  ;                                  
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
			
 
		
      $i = 0;
      $ligne = $jeuResultat->fetch();
       
      
      while($ligne)
      {              
          $fleur[$i]['identi']=$ligne->VEH_ID;
          $fleur[$i]['plaque']=$ligne->VEH_PLAQUE;
          $fleur[$i]['marque']=$ligne->VEH_MARQUE;
          $fleur[$i]['modele']=$ligne->VEH_MODELE;
  
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
           return $fleur;
 
 }     
 
 

function rechercherModeleVehicule($uneMarque)
{  
  $connexion = connecterServeurBD();
  
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
                   
    $requete="select * from vehicule where VEH_MARQUE like '%".$uneMarque."%';";
        echo $requete  ;                                  
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
         
			
 
		
      $i = 0;
      $ligne = $jeuResultat->fetch();
       
      
      while($ligne)
      {              
          $vehicule[$i]['identi']=$ligne->VEH_ID;
          $vehicule[$i]['plaque']=$ligne->VEH_PLAQUE;
          $vehicule[$i]['marque']=$ligne->VEH_MARQUE;
          $vehicule[$i]['modele']=$ligne->VEH_MODELE;
  
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
           
           
           if(!isset($vehicule))$vehicule=array();
             return $vehicule; 
             
                                   
 
 }      

 function emprunter($idVehicule, $mat_visiteur, $date_debut, $tabErreurs)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
       $requete="insert into emprunter (id_vehicule,mat_visiteur,date_debut) values ('"
      .$idVehicule."','"
       .$mat_visiteur."','"
       .$date_debut."');";
       echo $requete;
       
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule  a �t� correctement emprunter";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'emprunt du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
}
function listerEmprunt($categ)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select * from emprunter";
    
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $fleur[$i]['id']=$ligne->id_vehicule;
          $fleur[$i]['mat']=$ligne->mat_visiteur;
          $fleur[$i]['dated']=$ligne->date_debut;
          $fleur[$i]['datef']=$ligne->date_fin;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;           
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}
 
 function restituer1($id_emprunt, $date_fin, $tabErreurs)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    
       
       $requete = "UPDATE emprunter SET date_fin = '".$date_fin."' where id = ".$id_emprunt." ";
       echo $requete ;
        // Lancer la requ�te d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "Le vehicule  a �t� correctement emprunter";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'emprunt du vehicule a �chou� !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
}

  function get_vehicule($unId, &$tabErreurs)
{
  $connexion = connecterServeurBD();
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {        
      $requete="select * from vehicule where VEH_ID = '".$unId."';";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {
          $fleur['id']=$ligne->VEH_ID;
          $fleur['plaque']=$ligne->VEH_PLAQUE;
          $fleur['marque']=$ligne->VEH_MARQUE;
          $fleur['modele']=$ligne->VEH_MODELE;
          

          $ligne=$jeuResultat->fetch();
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  // deconnecterServeurBD($idConnexion);
  return $fleur;
}

?>  