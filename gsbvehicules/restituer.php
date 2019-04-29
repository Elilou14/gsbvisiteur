<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
if (isset($_POST["btn_restituer"]))  {
  // On affiche le formulaire en récupérant le véhicule
  $vehicule = get_emprunt($_POST["btn_restituer"], $tabErreurs);
}

if (isset($_POST["restituer_final"])) {
	$id_emprunt = $_POST['id_emprunt'];
	$date_fin = $_POST["date_fin"];
	restituer1($id_emprunt, $date_fin, $tabErreurs);
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if (count($_POST)==1)    {  
	include($repVues."vRestituer.php");
} else {
  header("Location: listemprunt.php");
}
include($repVues."pied.php") ;
?>
  
