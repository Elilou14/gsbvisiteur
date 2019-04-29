<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  

$uneMarque=lireDonneePost("unDes", "");

if (count($_POST)==0)                                                                                              
{
  $etape = 1;
}
else
{
  $etape = 2;
  $vehicule = rechercherModeleVehicule($uneMarque);
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php"); 
  // On demande à l'utilisateur qu'elle "id" il faut supprimer 
if (count($_POST)==0) include($repVues."vRechercherFormVehModele.php");
if (count($_POST)==1) include($repVues."vRechercherVehiculeModele.php");

include($repVues."pied.php") ;
?>