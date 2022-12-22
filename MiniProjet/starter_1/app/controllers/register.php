<!-- 
Author : Leclercq Tom & Brunel Bastien
File : register.php
Date : 18/12/2022
© 2022 Leclercq Tom

This file allows you to retrieve all the information of the current session to show his information in his profile.
-->
<?php
session_start();
// connect variable
$host = "localhost";
$dbname = "php_cours2_starter1";
$username = "root";
$password = "root";
$user = null;

// the query to link this file to the database
$pdo = new PDO("pgsql:host=$host;port=5432; dbname=$dbname;user=$username; password=$password");
// If there is a connected user
    if(isset($_SESSION['id'])) 
{
    // I get all his information
   $requser = $pdo->prepare("SELECT * FROM persons WHERE id = ?");
   $requser->execute(array($_SESSION['id']));

   $user = $requser->fetch();
}


view('register', ['user' => $user]);
