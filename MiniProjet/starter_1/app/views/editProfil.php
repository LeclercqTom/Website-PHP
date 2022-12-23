<!-- 
Author : Leclercq Tom & Brunel Bastien
File : navbar.php
Date : 21/12/2022
© 2022 Leclercq Tom

This file allows you to display the form to edit your profile
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Edit Your Profile</title>
</head>

<body>      

  <div class="container rounded bg-white mt-5 mb-5">
    <button style="background-color: #5D54A4; margin-top: 10px" class="btn btn-primary profile-button" onclick="window.location.href = '/MiniProjet/starter_1/'">Exit</button>
    <?php
    if (isset($_GET['erreur'])) {
        $err = $_GET['erreur'];
        if ($err == 1)
            echo "<p style='color:red'>Your mail is empty.</p>";
        if ($err == 2)
            echo "<p style='color:red'>Your name is empty</p>";
        if ($err == 3)
            echo "<p style='color:red'>Your firstname is empty</p>";
    }
    ?>
    <div class="row">
      <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $user['lastname'] . " " . $user['firstname']; ?></span><span class="text-black-50"><?php echo $user['address'] ?></span><span> </span></div>
      </div>
      <form class="col-md-5 border-right" method="POST" action="modifProfil">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile Settings</h4>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label class="labels">Name</label>
              <input type="text" class="form-control" value="<?php echo $user['lastname']; ?> " name="lastName">
            </div>
            <div class="col-md-6">
              <label class="labels">Firstname</label>
              <input type="text" class="form-control" value="<?php echo $user['firstname'] ?>" name="firstName" >
            </div>
          </div>
          <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" value="<?php echo $infoClient['adresse'] ?>" name="adresse"></div>
          <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" value="<?php echo $user['address'] ?>" name="newEmail"></div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label class="labels">Mobile</label>
              <input class="form-control" value="<?php echo $infoClient['numeroTelephone']; ?>" name="phone">
            </div>
            <div class="col-md-6">
              <label class="labels">Phone</label>
              <input class="form-control" value="<?php echo $infoClient['numeroFixe'] ?>" name="phoneF">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Work</label><input type="text" class="form-control" value="<?php echo $infoClient['profession'] ?>" name="newWork"></div>
            <div class="col-md-12"><label class="labels">Website</label><input type="text" class="form-control" value="<?php echo $infoClient['nomSiteWeb'] ?>" name="website"></div>
            <div class="col-md-12"><label class="labels">Github</label><input type="text" class="form-control" value="<?php echo $infoClient['Github'] ?>" name="github"></div>
            <div class="col-md-12"><label class="labels">Twitter</label><input type="text" class="form-control" value="<?php echo $infoClient['Twitter'] ?>" name="twitter"></div>
            <div class="col-md-12"><label class="labels">Instagram</label><input type="text" class="form-control" value="<?php echo $infoClient['Instagram'] ?>" name="instagram"></div>
            <div class="col-md-12"><label class="labels">Facebook</label><input type="text" class="form-control" value="<?php echo $infoClient['Facebook'] ?>" name="facebook"></div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label class="labels">Password</label>
              <input type="password" class="form-control" name="newmdp1">
            </div>
            <div class="col-md-6">
              <label class="labels">Confirm password</label>
              <input type="password" class="form-control" name="newmdp2">
            </div>
          </div>
          <div class="mt-5 text-center">
            <!-- <button class="btn btn-primary profile-button" type="button" name="submit">Save Profile</button> -->
            <input style="background-color: #5D54A4" class="btn btn-primary profile-button" name="submit" value="Save Profile" type="submit">
          </div>
        </div>
      </form>
      <div class="col-md-4">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
          <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
          <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

<?php 
  include("background.php");
?>

</body>

</html>

<style>
  .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
  }

  .profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
  }

  .profile-button:hover {
    background: #7C78B8
  }

  .profile-button:focus {
    background: #7C78B8;
    box-shadow: none
  }

  .profile-button:active {
    background: #7C78B8;
    box-shadow: none
  }

  .back:hover {
    color: #682773;
    cursor: pointer
  }

  .labels {
    font-size: 11px
  }

  .add-experience:hover {
    background: #5D54A4;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
  }
</style>