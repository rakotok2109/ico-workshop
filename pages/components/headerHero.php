<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICO</title>
    <link rel="icon" href="/ressources/images/ICO_Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/5563162149.js" crossorigin="anonymous"></script>



</head>
<body>
<!-- <div class="container-main-header"> -->

    <!-- <div class="container-logo-regle"> -->
        <!-- <div class="logo-ico"> -->
            <!-- <img src="../ressources/images/ICO-template-logo.png" alt="logo-ICO"> -->
        <!-- </div> -->
        <!-- <div class="navigation-regle-du-jeu"> -->
            <!-- <a href="regleDuRegle.php">Règle du Jeu</a> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->


<div class="">
<?php include (__DIR__ . '/navbar.php'); ?>
      <!-- Section Héros -->
      <div class="relative w-100 h-[800px] bg-cover bg-center" style="background-image: url('../ressources/images/logo.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-6xl font-[Chaloops]">ICO : L'or ou rien !</h1>
            <p class="mt-4 text-xl">Prêt à démasquer les traîtres et remporter le trésor ?</p>
            <p class="mt-4 text-xl">Que vous soyez un capitaine intrépide ou
un pirate perfide,

une seule règle compte :

ramenez l'or... ou coulez avec votre

honneur !</p>
            <a href="../pages/jeu/index.php" class="mt-6 px-6 py-3 bg-[#EF4B4B] text-white rounded-lg font-bold hover:bg-red-700 transition">Découvrir les règles</a>
        </div>
    </div>
</div>
</body>