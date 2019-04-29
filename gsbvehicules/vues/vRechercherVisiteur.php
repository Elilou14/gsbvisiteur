

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($unNom))
    {
?>
        <h3><?php echo $unNom;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prenom</th>
          
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
        <tr>

            <td><?php echo $lafleur[$i]["matricule"]?></td>
            <td><?php echo $lafleur[$i]["nom"]?></td>
            <td align="right"><?php echo $lafleur[$i]["prenom"]?></td>
            </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
