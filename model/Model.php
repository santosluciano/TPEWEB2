<?php

  class Model
  {
    protected $db;

    function __construct()
    {
      try {
        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=db_celulares;charset=utf8'
        , 'root', '');
      } catch (PDOException $e) {
        $this->buildDDBBfromFile('db_celulares','schema.sql');
      }
    }
    public function buildDDBBfromFile($dbname,$dbfile)
    {
      try {
        $this->db = new PDO('mysql:host=localhost', 'root', '');
        $this->db->exec('CREATE DATABASE IF NOT EXISTS '.$dbname); //Creacion SQL
        $this->db->exec('USE '.$dbname); //Sentencia para usar por defecto la BBDD
        $queries = $this->loadSQLSchema($dbfile); //Cargar el archivo de texto
        $i = 0; // Ejecuto todos los queries
        while ($i < count($queries) && strlen($this->db->errorInfo()[2]) == 0)
        {
          $this->db->exec($queries[$i]);
          echo $queries[$i];
          $i++;
        }
      } catch (Exception $e) {
        echo $e;
      }
    }
    public function loadSQLSchema($dbfile){
      $querys = fopen("database/$dbfile", "r+");
      $sql = "";
      while (!feof($querys)) {
        $linea = fgets($querys);
        $sql .= $linea;
      }
      fclose($querys);
      $querys = explode(";", $sql);
      return $querys;
    }
  }
 ?>
