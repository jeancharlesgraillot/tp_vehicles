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

// We connect database
$db = Database::DB();
// We instance $vehicleManager object with our PDO object
$vehicleManager = new VehicleManager($db);

$vehicle = $vehicleManager->getVehicle($_GET['id']);

include "../views/detailsVue.php";
?>