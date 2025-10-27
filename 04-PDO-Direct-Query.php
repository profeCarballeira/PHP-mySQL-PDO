<?php
$servername = "localhost";
$username = "wuser";
$password = "abc123.";
$myDB = "world";

//REMEMBER: keywords in SQL ar not CASESENSITIVE. OBJECT NAMES (tables, rows...) ARE
try {
  //1. Open
  $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  //2. Process
  //$sql = "SELECT * from city";
  //$sql = "SELECT Name, Population FROM city WHERE CountryCode ='ESP'";
  //$sql = "SELECT Name, Population  FROM city WHERE CountryCode = (select Code from country where name like 'Spain')";
  //$sql = "SELECT city.Name, city.Population FROM city, country WHERE city.CountryCode=country.Code AND country.Name='Spain'";
  $sql = "SELECT city.Name, city.Population FROM city INNER JOIN country ON city.CountryCode=country.Code WHERE country.Name='Spain'";
  $result = $conn->query($sql);

  foreach ( $result as $row) {
    echo $row["Name"] . " " . $row["Population"] . "<br>";
  }
  

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//3. Close
$conn = null;
?>