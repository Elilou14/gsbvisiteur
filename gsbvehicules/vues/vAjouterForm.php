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

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les données sur le visiteur à ajouter </legend>
    <label> Matricule : </label> <input type="text" placeholder="Entrer le matricule …"name="mat" size="10" /><br />
    <label> Nom : </label> <input type="text" placeholder="Entrer le nom …"name="name" size="10" /><br />
    <label> Prenom : </label> <input type="text" placeholder="Entrer le prenom …"name="preno" size="10" /><br />                               
    
    
    </select> 
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


