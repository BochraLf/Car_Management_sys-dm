<?php
include 'functions.php';

// Your PHP code here.

// Home Page template below.
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?=template_header('CRentals')?>

<div  >
  <div class="content" style="text-align: center ; ">
   
      <div class="container" style="margin-top: 80px;">
      <div>
        <p class="text-wrapper" > Drive Into Your Next Adventure With CRentals</p>
        <a href="CarRead.php" class="acceder">View Car's catalogue </a>
        <br>
        <a href="RentalCreate.php" class="acceder">Start a Rental </a>
        <br>
        <a href="ClientCreate.php" class="acceder">Start with us </a>

        </div>
        <img src="icons/car04.png" alt="car" class="car-image">
       
       </div>

  </div>
</div>

<style>
  body{
    background-color: #ededed ;
    color: #383838;
  }
  h1 {
  font-family: 'Montserrat', sans-serif;
}
</style>


<?=template_footer()?>