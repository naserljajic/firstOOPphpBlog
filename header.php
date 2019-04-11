<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - My first OOP PHP blog</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://blackrockdigital.github.io/startbootstrap-clean-blog/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="https://blackrockdigital.github.io/startbootstrap-clean-blog/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">My first OOP PHP blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <li class="nav-item">
           <?php 
          		if(isset($_SESSION['username'])) {
          			echo '<a class="nav-link" href="addpost.php">Add new post</a>';
          		}else {
          			?>
            <a class="nav-link" href="post.php?id=1">Sample post</a>
            <?php
          		}
          	?>
          </li>
          
          <li class="nav-item">
          	<?php 
          		if(isset($_SESSION['username'])) {
          			echo '<a class="nav-link" href="logout.php">Logout</a>';
          		}else {
          			?>
            <a class="nav-link" href="login.php">Login</a>
            <?php
          		}
          	?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
