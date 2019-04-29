

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($unModele))
    {
?>
        <h3><?php echo $unModele;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Id</th>
          <th>Plaque</th>
          <th>Modele</th>
          <th>Prenom</th>
          
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($vehicule))
    { 
 ?>        
        <tr>

            <td><?php echo $vehicule[$i]["identi"]?></td>
            <td><?php echo $vehicule[$i]["plaque"]?></td>
            <td><?php echo $vehicule[$i]["marque"]?></td>
            <td align="right"><?php echo $vehicule[$i]["modele"]?></td> 
            </tr>   
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
