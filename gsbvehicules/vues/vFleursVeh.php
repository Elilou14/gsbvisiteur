

<!-- Affichage des informations sur les fleurs-->
          <form action="EmprunterVehicule.php" method="post">
<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
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
              <th>emprunter</th>
          
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
        <tr>

            <td><?php echo $lafleur[$i]["id"]?></td>
            <td><?php echo $lafleur[$i]["plaque"]?></td>
            <td><?php echo $lafleur[$i]["marque"]?></td>
            <td align="right"><?php echo $lafleur[$i]["modele"]?></td> 
            <td><button class="btn btn-link" type="submit" name="btn_emprunter" value="<?php echo $lafleur[$i]["id"]?>" href="EmprunterVehicule.php"><img src="./images/cars.png" width="56" height="56" ></button></td>     
            </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
