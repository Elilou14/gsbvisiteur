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
      <legend>Entrez les données sur le vehicule a modifier </legend>
      <select>
      <label> Identifiant:</label>   
      <input type="text" name="id" value="<?php echo $lafleur["unVEH_ID"]; ?>" /><br />
      </select>
      <label>Plaque :</label>                   
      <input type="text" name="plaque" value="<?php echo $lafleur["unVEH_PLAQUE"]; ?>" size="20" /><br />
      <label>Marque :</label>
      <input type="text" name="marque" value="<?php echo $lafleur["unVEH_MARQUE"]; ?>" size="10" /><br />
      <label>Modele :</label>
      <input type="text" name="modele" value="<?php echo $lafleur["unVEH_MODELE"]; ?>" size="10" /><br />
    
        
    </fieldset>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



