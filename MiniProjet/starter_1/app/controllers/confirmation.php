
<?php

$host = "localhost";
$dbname = "php_cours2_starter1";
$username = "root";
$password = "root";



if (isset($_GET['user'])) {
    $connexion = new PDO("pgsql:host=$host;port=5432; dbname=$dbname;user=$username; password=$password");
    $a = $_GET['user'];
    $sql = "UPDATE persons SET verify = (true) WHERE address='$a';";
    $result = $connexion->prepare($sql);
    $result->execute();

    echo 'validation de session pour = ' . $_GET['user'];

    
}else {
    echo 'probleme';
}
?>