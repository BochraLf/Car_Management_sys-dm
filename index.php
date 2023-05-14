<?php
include 'functions.php';

// Your PHP code here.

// Home Page template below.
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?=template_header('CRentals')?>

<div  >
  <div class="content" style="text-align: center ; ">
    <h1 style="font-size: 50px; margin-top: 20px; ">Car Rental Management System <br> </h1>
   
      <div class="container" style="margin-top: 80px;">
      <div>
        <p class="text-wrapper">Drive into your next Adventure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;with us</p>
        </div>
        <img src="icons/car04.png" alt="car" class="car-image">
       
       </div>
  </div>
</div>

<style>
  body{
    background-color: #BAD7E9;
  }
</style>


<?=template_footer()?>