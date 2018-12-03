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

// We connect to the database
$db = Database::DB();
// We instance an object $vehicleManager with our PDO object
$vehicleManager = new VehicleManager($db);

if (isset($_GET['edit'])) {
    
    $edit = intval($_GET['edit']);

    if (isset($_POST['type']) && !empty($_POST['type'])
    && isset($_POST['brand']) && !empty($_POST['brand']) 
    && isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['weight']) && !empty($_POST['weight'])
    && isset($_POST['doors']) && !empty($_POST['doors'])) 
    {

        $type = htmlspecialchars($_POST['type']);
        $brand = htmlspecialchars($_POST['brand']);
        $name = htmlspecialchars($_POST['name']);
        $weight = htmlspecialchars($_POST['weight']);
        $doors = htmlspecialchars($_POST['doors']);

        if (isset($_POST['add'])) 
        {

            $vehicleManager->updateVehicle($edit);
            header('Location: index.php');

        }    
    }
}

$vehicle = $vehicleManager->getVehicle($_GET['edit']);

include "../views/updateVue.php";
?>