<!-- 
Author : Leclercq Tom & Brunel Bastien
File : index.php
Date : 18/12/2022
© 2022 Leclercq Tom

This file allows to retrieve all informations of the current session for the index view.
-->
<?php
session_start();
include("LogDatabase.php");
$user = null;
// If there is a connected user
if (isset($_SESSION['id'])) {

    // I get all his information
    $requser = $pdo->prepare("SELECT * FROM persons WHERE id = ?");
    $requser->execute(array($_SESSION['id']));

    $user = $requser->fetch();
}


view('index', ['user' => $user]);
