<!-- 
Author : Leclercq Tom & Brunel Bastien
File : LogDatabase.php
Date : 22/12/2022
© 2022 Leclercq Tom & Brunel Bastien

This file allows to connect each file to the database
-->
<?php
// connect variable 
$host = "localhost";
$dbname = "php_cours2_starter1";
$username = "root";
$password = "root";

// the query to link this file to the database
$pdo = new PDO("pgsql:host=$host;port=5432; dbname=$dbname;user=$username; password=$password");