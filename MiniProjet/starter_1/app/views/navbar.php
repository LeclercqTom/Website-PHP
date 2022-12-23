<!-- 
Author : Leclercq Tom & Brunel Bastien
File : navbar.php
Date : 18/12/2022


This file allows you to display the navigation bar
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand"><?php $user; ?></a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/MiniProjet/starter_1/">Home</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">About One</a></li>
                                    <li><a href="#">About Two</a></li>
                                    <li><a href="#">About Three</a></li>
                                    <li><a href="#">About Four</a></li>
                                    <li><a href="#">About Five</a></li>
                                    <li><a href="#">About Six</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Welcome</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="search" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <?php

                            if ($user != null) {

                            ?>

                                <li><a href="profil?id=<?php echo $_SESSION['id']; ?>"><span class="glyphicon glyphicon-user"></span> <?php echo $user['firstname'] ?>'s Profile</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Sign Up <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="login">Login</a></li>
                                        <li><a href="register">Sign Up</a></li>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
<style>
    #login-dp {
        min-width: 250px;
        padding: 14px 14px 0;
        overflow: hidden;
        background-color: rgba(255, 255, 255, .8);
    }

    #login-dp .help-block {
        font-size: 12px
    }

    #login-dp .bottom {
        background-color: rgba(255, 255, 255, .8);
        border-top: 1px solid #ddd;
        clear: both;
        padding: 14px;
    }

    #login-dp .social-buttons {
        margin: 12px 0
    }

    #login-dp .social-buttons a {
        width: 49%;
    }

    #login-dp .form-group {
        margin-bottom: 10px;
    }

    .btn-fb {
        color: #fff;
        background-color: #3b5998;
    }

    .btn-fb:hover {
        color: #fff;
        background-color: #496ebc
    }

    .btn-tw {
        color: #fff;
        background-color: #55acee;
    }

    .btn-tw:hover {
        color: #fff;
        background-color: #59b5fa;
    }

    @media(max-width:768px) {
        #login-dp {
            background-color: inherit;
            color: #fff;
        }

        #login-dp .bottom {
            background-color: inherit;
            border-top: 0 none;
        }
    }
</style>