<?php
  include("template/header.php");
?>

<a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
<div class="details">
    <p>Nom du véhicule : <?= $dataVehicle->getName();?></p>
    <p>Type du véhicule : <?= $dataVehicle->getType();?></p>
    <p>Marque deu véhicule : <?= $dataVehicle->getBrand();?></p>
    <p>Poids du véhicule : <?= $dataVehicle->getWeight();?></p>
    <p>Nombre de portes : <?= $dataVehicle->getDoors();?></p>


        
</div>




<?php
   include("template/footer.php");
?>