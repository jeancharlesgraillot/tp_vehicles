<?php
  include("template/header.php");
?>

<a href="index.php" class="btn btn-primary ml-5">Retour accueil</a>

<form action="" method="POST" class="text-center">

<select name="type" id="myselect" class="mb-3" required>
  <option value="" disabled>Choisissez un type de véhicule:</option>
  <option value="car">Voiture</option>
  <option value="truck">Camion</option>
  <option value="motorbike">Moto</option>
</select><br>

<label for="brand">Marque du véhicule : </label>
<input id="brand" name="brand" type="text" placeholder=<?= $vehicle->getBrand();?> required><br>
<label for="name">Nom du véhicule : </label>
<input id="name" name="name" type="text" placeholder=<?= $vehicle->getName();?> required><br>

<label for="weight">Poids du véhicule : </label>
<input id="weight" name="weight" type="number" min="1" max="10000" placeholder=<?= $vehicle->getWeight();?> required><br>
<label for="doors">Nombre de portes : </label>
<input id="doors" name="doors" type="number" min="0" max="10000" placeholder=<?= $vehicle->getDoors();?> required><br>
<input class="mt-3 btn btn-success" type="submit" name="add" value="Mettre à jour le véhicule">

</form>




<?php
   include("template/footer.php");
?>