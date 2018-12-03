<?php
  include("template/header.php");
?>

<a href="index.php" class="btn btn-primary ml-5">Retour à l'accueil</a>

<div class="details text-center">
    <p>Nom du véhicule : <?= $vehicle->getName();?></p>
    <p>Type du véhicule : <?= $vehicle->getType();?></p>
    <p>Marque du véhicule : <?= $vehicle->getBrand();?></p>
    <p>Poids du véhicule : <?= $vehicle->getWeight();?> kg</p>
    <p>Nombre de portes : <?= $vehicle->getDoors();?></p>  
</div>



<?php
   include("template/footer.php");
?>