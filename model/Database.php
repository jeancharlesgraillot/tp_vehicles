<?php

/**
 * Class to connect to the data base
 * 
 * @return PDO $db 
 */
class Database
{

// connection settings
const HOST  = "localhost";
const DBNAME = "vehicles_site"; // votre base de données
const LOGIN = "root"; // votre login
const PWD = "Strawberry591peaches"; // votre mot de passe

  /**
   * Function to connect to the DB
   *
   * @return PDO $db
   */
  static public function DB()
  {
    $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::DBNAME , self::LOGIN, self::PWD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
    return $db;
  }

}