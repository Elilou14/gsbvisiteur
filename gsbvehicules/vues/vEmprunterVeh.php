<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les données sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("Le prix doit être positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<?php 
if (isset($message))
  {
?>
    <div class="container"><?php echo $message ?> </div>
<?php
  }
?>
 
<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="EmprunterVehicule.php" method=post>
    <fieldset>
      <legend>Entrez les données a propos de l'emprunt </legend>
      <input type="hidden" name="id" value="<?php echo $vehicule["id"]; ?>" /><br />
      
      <label>Plaque :</label>
      <input type="text" name="plaque" value="<?php echo $vehicule["plaque"]; ?>" size="20" readonly/><br />
      
      <label>Marque :</label>
      <input type="text" name="marque" value="<?php echo $vehicule["marque"]; ?>" size="10" readonly/><br />
      
      <label>Modele :</label>
      <input type="text" name="modele" value="<?php echo $vehicule["modele"]; ?>" size="10" readonly/><br />
      
      <label>Matricule emprunteur :</label>
      <input type="text" name="emprunteur" size="10" /><br />
      
      <label>Date d'emprunt:</label>
      <input type="date" name="date_debut" /><br />   
 
      
    </fieldset>
    <button type="submit" class="btn btn-primary">Emprunter</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>


