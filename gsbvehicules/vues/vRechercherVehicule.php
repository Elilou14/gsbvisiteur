

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($unid))
    {
?>
        <h3><?php echo $unid;?></h3>
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
    while($i < count($fleur))
    { 
 ?>     
        <tr>

            <td><?php echo $fleur[$i]["identi"]?></td>
            <td><?php echo $fleur[$i]["plaque"]?></td>
            <td><?php echo $fleur[$i]["marque"]?></td>
            <td align="right"><?php echo $fleur[$i]["modele"]?></td> 
            </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
