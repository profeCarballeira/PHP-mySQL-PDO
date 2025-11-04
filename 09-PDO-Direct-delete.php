<?php
$servername = "localhost";
$username = "wuser";
$password = "abc123.";
$myDB = "world";

//REMEMBER: keywords in SQL ar not CASESENSITIVE. OBJECT NAMES (tables, rows...) ARE

try {
  //1.Open
  $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  //2.Process
  //DELETE FROM city WHERE `city`.`ID` = 4084"
  //$sql = "DELETE FROM city WHERE ID= 4083";
  //senence to delete AFGanistan country
  $sql = "DELETE FROM country WHERE Code = 'AFG'";
  //it's no possible because of restrictions
  
  $num = $conn->exec($sql);

  echo "Number of deleted records: " . $num;
  
  }
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
//3.Close
$conn = null;
?>