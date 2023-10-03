<?php
//conection
  // $user = "root";
  // $host = "db";
  // $password = "12345";
  // $port = "3306";
  // $dbname = "learn_maths";

  
  // //set dsn
  // $dsn = 'mysql:host ='. $host .';dbname='. $dbname;
  
  // //create a PDO instance
  // $pdo = new PDO($dsn, $user, $password);
  // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

 
  // echo $dbname . " - name<br>";
  // echo $host . " - host<br>";
  // echo $port . " - port<br>";
  // echo $user . " - user<br>";
  // echo $password . " - passwd<br>";
  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learn_maths";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else {
  //echo "Connected successfully";
}


// $user = "root";
//   $host = "db";
//   $password = "12345";
//   $port = "3306";
//   $dbname = "learn_maths";

  
//   //set dsn
//   $dsn = 'mysql:host ='. $host .';dbname='. $dbname;
  
//   //create a PDO instance
//   $pdo = new PDO("mysql:db;dbname=learn_maths", '12345', 'root');
//   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

 
//   echo $dbname . " - name<br>";
//   echo $host . " - host<br>";
//   echo $port . " - port<br>";
//   echo $user . " - user<br>";
//   echo $password . " - passwd<br>";




?>