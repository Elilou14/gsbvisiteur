<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unId=lireDonneePost("id", "");
$unPlaque=lireDonneePost("plaque", "");
$unMarque=lireDonneePost("marque", "");
$unModele=lireDonneePost("modele", "");
$lafleur =0;

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  modifierVehicules($unId, $unPlaque, $unMarque, $unModele,$tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vModifierFormVEH.php") ; 
include($repVues."pied.php") ;
?>
  
