<!-- 
Author : Leclercq Tom & Brunel Bastien
File : editProfil.php
Date : 21/12/2022
© 2022 Leclercq Tom & Brunel Bastien

This file allows to retrieve all informations of the current session for the editProfil view.
 -->
<?php
session_start();

include("logDatabase.php");
// If there is a connected user
if (isset($_SESSION['id'])) {
    // I get all his information
    $requser = $pdo->prepare("SELECT * FROM persons WHERE id = ?");
    $requser->execute(array($_SESSION['id']));

    $user = $requser->fetch();
    // I get all his complementaries information
    $reqInfo = $pdo->prepare("SELECT * FROM info_complementaires_clients WHERE id = ?");
    $reqInfo->execute(array($_SESSION['id']));

    $infoClient = $reqInfo->fetch();
}


view('editProfil', ['user' => $user, 'infoClient' => $infoClient]);
