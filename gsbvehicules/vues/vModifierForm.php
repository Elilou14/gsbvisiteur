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
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les données sur le visiteur a modifier </legend>
      <label> Matricule :</label>   
      <input type="text" name="mat" value="<?php echo $lafleur["VIS_MATRICULE"]; ?>" /><br />
      <label>Nom :</label>                   
      <input type="text" name="name" value="<?php echo $lafleur["VIS_NOM"]; ?>" size="20" /><br />
      <label>Prenom :</label>
      <input type="text" name="preno" value="<?php echo $lafleur["VIS_PRENOM"]; ?>" size="10" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



