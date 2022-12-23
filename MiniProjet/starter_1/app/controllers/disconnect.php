<!-- 
Author : Leclercq Tom & Brunel Bastien
File : disconnect.php
Date : 18/12/2022
© 2022 Leclercq Tom & Brunel Bastien

This file allows to disconnect a user.
 -->
<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: /MiniProjet/starter_1/");
?>