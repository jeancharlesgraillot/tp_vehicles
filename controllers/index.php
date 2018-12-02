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

        if($vehicleManager->checkIfExist($name))
        {
            $message = "Le véhicule existe déjà !";
        }
        
        else
        {
            if ($type == 'car') {
              
            // We create a new car object and send it in database
           
            $car = new Car([
            'type'=> $type,
            'brand'=>$brand,
            'name'=> $name,
            'weight'=>$weight,
            'doors'=>$doors
            ]);

            $vehicleManager->addVehicle($car);
            
            }

            if ($type == 'truck') {
            
            // We create a new truck object and send it in database
          
            $truck = new Truck([
            'type'=> $type,
            'brand'=>$brand,
            'name'=> $name,
            'weight'=>$weight,
            'doors'=>$doors
            ]);

            $vehicleManager->addVehicle($truck);
            
            }

            if ($type == 'motorbike') {
            
            // We create a new motorbike object and send it in database
          
            $motorbike = new Motorbike([
            'type'=> $type,
            'brand'=>$brand,
            'name'=> $name,
            'weight'=>$weight,
            'doors' => 0
            ]);

            $vehicleManager->addVehicle($motorbike);
            
            }

        }
    }    
}

// Delete vehicle

if (isset($_GET['remove'])) {
    $remove = intval($_GET['remove']);        
    $vehicleManager->deleteVehicle($_GET['remove']);
}

$vehicles = $vehicleManager->getVehicles();


include "../views/indexVue.php";
 ?>