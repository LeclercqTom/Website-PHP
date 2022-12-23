<?php
// connect variable 
$host = "localhost";
$dbname = "php_cours2_starter1";
$username = "root";
$password = "root";

// the query to link this file to the database
$pdo = new PDO("pgsql:host=$host;port=5432; dbname=$dbname;user=$username; password=$password");