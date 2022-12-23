<!-- 
Author : Leclercq Tom & Brunel Bastien
File : profil.php
Date : 18/12/2022
© 2022 Leclercq Tom & Brunel Bastien

This file allows you to retrieve all the information of the current session to show his information in his profile.
-->
<?php
session_start();

include("logDatabase.php");

if (isset($_SESSION['id'])) {
    $requser = $pdo->prepare("SELECT * FROM persons WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
}

if (isset($_GET['id']) and $_GET['id'] > 0) {
    // I get all his information
    $getid = intval($_GET['id']);
    $requser = $pdo->prepare('SELECT * FROM persons WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

if (isset($_SESSION['id'])) {
    $requser = $pdo->prepare("SELECT * FROM info_complementaires_clients WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $client = $requser->fetch();
}
if (isset($_GET['id']) and $_GET['id'] > 0) {
    // I get all his complementaries information
    $getid = intval($_GET['id']);
    $requser = $pdo->prepare('SELECT * FROM info_complementaires_clients WHERE id = ?');
    $requser->execute(array($getid));
    $infosClient = $requser->fetch();
}

view('profil', [
    'userinfo' => $userinfo,
    'infosClient' => $infosClient,
]);
