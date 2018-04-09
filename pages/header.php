
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Car Inventory</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Jura:100,300,400,500,600,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
      <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/main.css" rel="stylesheet" type="text/css">
      
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->       
  </head><!--/head-->

  <body>
  <nav>
    <div class="ui fixed inverted menu" id="menu">
      <div class="ui container">
        <a href="index.php" class="header item">
          <img class="logo" src="assets/images/log.png" alt="Brand Image">
            Inventory
        </a>
        <a href="<?php $_SERVER['PHP_SELF']; ?>?page=manufacturer" class="item">Manufacturer</a>
        <a href="<?php $_SERVER['PHP_SELF']; ?>?page=model" class="item">Model</a>
        <a href="<?php $_SERVER['PHP_SELF']; ?>?page=inventory" class="item">Inventory</a>
      </div>
    </div> 
  </nav>

  

