<?php

$username = 'root';
$password = 'root';
$dsn = 'mysql:host=localhost; dbname=Coupe';

try {

  $conn = new PDO($dsn, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

  echo "Fail to connect to the database ".$e->getMessage();

}

?>
