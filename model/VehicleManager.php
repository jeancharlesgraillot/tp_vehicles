<?php

declare(strict_types = 1);

class VehicleManager{

    private $_db;


    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */ 
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */ 
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }


    public function getVehicles()
    {
        // Array declaration
        $arrayOfVehicles = [];

        $query = $this->getDB()->prepare('SELECT * FROM vehicles');
        $query->execute();
        $dataVehicles = $query->fetchAll(PDO::FETCH_ASSOC);

        // At each loop, we create a new vehicle object wich is stocked in our array $arrayOfCharacters
        foreach ($dataVehicles as $dataVehicle) {
            if ($dataVehicle['type'] == 'car') {
                $arrayOfVehicles[] = new Car($dataVehicle);
            }
            elseif ($dataVehicle['type'] == 'truck') {
                $arrayOfVehicles[] = new Truck($dataVehicle);
            }
            elseif ($dataVehicle['type'] == 'motorbike') {
                $arrayOfVehicles[] = new Motorbike($dataVehicle);
            }
            
        }

        // Return of the array on which we could loop to list all vehicles
        return $arrayOfVehicles;
    }


    public function getVehicle($info)
    {
        $vehicle;
        $query = $this->getDB()->prepare('SELECT * FROM vehicles WHERE id = :id');
        $query->bindValue('id', $info, PDO::PARAM_INT);
        $query->execute();
        

        // $dataCharacter is an associative array which contains informations of a vehicle
        $dataVehicle = $query->fetch(PDO::FETCH_ASSOC);

        // We create a new Vehicle object with the associative array $dataCharacter and we return it
        if ($dataVehicle['type'] == 'car') {
            $vehicle = new Car($dataVehicle);
            return $vehicle;
        }
        elseif ($dataVehicle['type'] == 'truck') {
            $vehicle = new Truck($dataVehicle);
            return $vehicle;
        }
        elseif ($dataVehicle['type'] == 'motorbike') {
            $vehicle = new Motorbike($dataVehicle);
            return $vehicle;
        }
        
    }

        /**
     * Add vehicle into DB
     *
     * @param Vehicle $vehicle
     */
    public function addVehicle(Vehicle $vehicle)
    {
        $query = $this->getDb()->prepare('INSERT INTO vehicles(type, brand, name, weight, doors) VALUES (:type, :brand, :name, :weight, :doors)');
        $query->bindValue('type', $vehicle->getType(), PDO::PARAM_STR);
        $query->bindValue('brand', $vehicle->getBrand(), PDO::PARAM_STR);
        $query->bindValue('name', $vehicle->getName(), PDO::PARAM_STR);
        $query->bindValue('weight', $vehicle->getWeight(), PDO::PARAM_INT);
        $query->bindValue('doors', $vehicle->getDoors(), PDO::PARAM_INT);
        $query->execute();

    }

        /**
     * Check if vehicle exists or not
     *
     * @param string $name
     * @return boolean
     */
    public function checkIfExist(string $name)
    {
        $query = $this->getDb()->prepare('SELECT * FROM vehicles WHERE name = :name');
        $query->bindValue('name', $name, PDO::PARAM_STR);
        $query->execute();

        // If there's an entry with that name, that's it exists
        if ($query->rowCount() > 0)
        {
            return true;
        }
        
        // Else, it doesn't exist
        return false;
    }

        /**
     * Update vehicle's data 
     *
     * @param Vehicle $vehicle
     */
    public function updateVehicle($edit)
    {
        $query = $this->getDb()->prepare('UPDATE vehicles SET type = :type, brand = :brand, name = :name, weight = :weight, doors = :doors WHERE id = :id');
        $query->bindValue('id', $edit, PDO::PARAM_INT);
        $query->bindValue('type', $_POST['type'], PDO::PARAM_STR);
        $query->bindValue('brand', $_POST['brand'], PDO::PARAM_STR);
        $query->bindValue('name', $_POST['name'], PDO::PARAM_STR);
        $query->bindValue('weight', $_POST['weight'], PDO::PARAM_INT);
        $query->bindValue('doors', $_POST['doors'], PDO::PARAM_INT);
        $query->execute();
    }

        /**
     * Delete vehicle from DB
     *
     * @param Vehicle $vehicle
     */
    public function deleteVehicle($remove)
    {

        $query = $this->getDb()->prepare('DELETE FROM vehicles WHERE id = :id');
        $query->bindValue('id', $remove, PDO::PARAM_INT);
        $query->execute();
    }

}

?>