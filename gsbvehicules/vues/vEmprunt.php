
<!-- Affichage des informations sur les emprunt-->
           <form action="listeEmprunt.php" method="post">       
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
  <br>
      </caption>
      <thead>
        <tr>
          <th>id vehicule</th>
          <th>matricule visiteur</th>
          <th>date debut</th>
          <th>date fin</th>
           <th>restituer</th>
     

        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     

        <tr>
               <form action="listeEmprunt.php" method="post">                                           
            <td><?php echo $lafleur[$i]["id"]?></td>
            <td><?php echo $lafleur[$i]["mat"]?></td> 
            <td><?php echo $lafleur[$i]["dated"]?></td>     
            <td><?php echo $lafleur[$i]["datef"]?></td>
            <td><button class="btn btn-link" type="submit" name="btn_restituer" value="<?php echo $lafleur[$i]["id"]?>" href="listemprunt.php"><img src="./image/restituer.png" width="56" height="56" ></button></td> 
                 </form>    
        </tr>

<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>
  </form>





