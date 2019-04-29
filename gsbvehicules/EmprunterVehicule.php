<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
if (count($_POST)==1)  {
  
  $vehicule = get_vehicule($_POST["btn_emprunter"], $tabErreurs);
}
if (isset($_POST["emprunteur"])) {
  $mat_visiteur = $_POST["emprunteur"];
  $date_debut = $_POST["date_debut"];
  $idVehicule = $_POST["id"];       
  emprunter($idVehicule, $mat_visiteur, $date_debut, $tabErreurs);
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if (count($_POST)==1)    {  
  // On demande à l'utilisateur qu'elle "id" il faut modifier 
  include($repVues."vEmprunterVeh.php") ;
}
include($repVues."pied.php") ;
?>
  
