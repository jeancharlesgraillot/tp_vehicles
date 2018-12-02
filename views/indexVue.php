<?php
  include("template/header.php");
?>

<form action="" method="POST" class="text-center mt-5">

<select name="type" id="myselect" class="mb-3">
  <option value="">Choisissez un type de véhicule:</option>
  <option value="car">Voiture</option>
  <option value="truck">Camion</option>
  <option value="motorbike">Moto</option>
</select><br>

<label for="brand">Marque du véhicule : </label>
<input id="brand" name="brand" type="text" placeholder="Ex: Renault" required><br>
<label for="name">Nom du véhicule : </label>
<input id="name" name="name" type="text" placeholder="Ex: Mégane" required><br>

<label for="weight">Poids du véhicule : </label>
<input id="weight" name="weight" type="number" min="1" max="10000"><br>
<label for="doors">Nombre de portes : </label>
<input id="doors" name="doors" type="number" min="0" max="10000"><br>
<input class="mt-3 btn btn-success" type="submit" name="add" value="Ajouter le véhicule">

</form>

<p class="mt-5 h3 text-center">Liste des véhicules :</p>
<p class="mb-5 text-center">(Cliquez sur le véhicule pour voir les détails)</p>

<div class="container">
  <?php
    // On liste tous les véhicules
    foreach($vehicles as $vehicle)
    {
      ?>
      <div class="row col-12 d-flex justify-content-around my-2">
        <a href="details.php?id=<?= $vehicle->getId(); ?>"class="col-2"><?= $vehicle->getType() . " " . $vehicle->getBrand() . " " . $vehicle->getName();?></a>
        <a href="index.php?remove=<?= $vehicle->getId(); ?>" class='btn btn-danger'>Supprimer</a>
        <a href="update.php?edit=<?= $vehicle->getId(); ?>" class='btn btn-primary'>Mettre à jour</a>
      </div>
      <?php
    }
  ?>
</div>

<?php
   include("template/footer.php");
?>