<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://bootswatch.com/slate/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css" />
  <link rel="stylesheet" href="<?php echo base_url('css/mystyle.css')?>"/>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
    <a class="navbar-brand" href="#"><img src="
    <?php echo base_url('css/logo.jpg')?>
    "></img></a>
  </div>
  <div class="navbar-collapse collapse navbar-ex1-collapse">
  <?php
    if(isset($_SESSION['username'])){
      echo '<ul class="nav navbar-nav">';
      echo '<li class="';
      if($this->uri->uri_string() == 'movies/listmovies') { echo 'active'; }
      echo '"><a href="';
      echo site_url('movies/listmovies');
      echo '"><span class="glyphicon glyphicon-search" id="logIcon"></span>  Movie Search</a></li>';
      echo '<li class="';
      if($this->uri->uri_string() == 'movies/addmovie') { echo 'active'; }
      echo '"><a href="';
      echo site_url('movies/addmovie');
      echo '"><span class="glyphicon glyphicon-plus" id="logIcon"></span>  Add a Movie</a></li>';
      echo '</ul>';
      echo '<ul class="nav navbar-nav navbar-right">';
      echo '<li class="';
      if($this->uri->uri_string() == 'user/editprofile') { echo 'active'; }
      echo '"><a href="';
      echo site_url('user/editprofile');
      echo '"><span class="glyphicon glyphicon-user" id="logIcon"></span>  My Profile</a></li>';
      echo '<li><a href="';
      echo site_url('user/logoutuser');
      echo '"><span class="glyphicon glyphicon-log-out" id="logIcon"></span>  Logout ('.$_SESSION['username'].')</a></li>';
    } else {
      echo '<ul class="nav navbar-nav navbar-right">';
      echo '<li><a href="';
      echo site_url('user/loginuser');
      echo '"><span class="glyphicon glyphicon-log-in" id="logIcon"></span>  Login</a></li>';
      echo '<li><a href="';
      echo site_url('user/registeruser');
      echo '">Register</a></li>';
      echo '</ul>';
    }
  ?>
  </div>
</nav>
<div class="container">
