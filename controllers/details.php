<?php

function loadClass($classname)
{
    if(file_exists('../model/'. $classname.'.php'))
    {
        require '../model/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('loadClass');

// On se connecte à la base de données
$db = Database::DB();
// On instancie un objet $vehicleManager grâce à notre objet PDO
$vehicleManager = new VehicleManager($db);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $vehicleManager->getVehicle($_GET['id']);
}





$vehicle = $vehicleManager->getVehicle($_GET['id']);


include "../views/detailsVue.php";
?>