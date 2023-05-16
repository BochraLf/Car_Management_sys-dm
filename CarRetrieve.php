<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
  $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
  $stmt = $pdo->prepare("SELECT * FROM car WHERE brand ='".$brand. "'"); 
  $stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<?=template_header('Car')?>

<div class="content read create update ">
  <h2>Read Contacts</h2>

  <form action="CarRetrieve.php" method="post">
    <label for="brand">Insert the brand that you want to select </label>
    <div >
    <input type="text" name="brand" placeholder="For example: MERCEDES or AUDI" id="brand">
    <i class="fas fa-search"></i>
  </div>
    <input type="submit" value="See the results">
  </form>
  <table>

  <thead>
    <tr>
      <td>Brand</td>
      <td>Model</td>
      <td>Price</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $car): ?>
    <tr>
      <br>
      <td><?=$car['brand']?></td>
      <td><?=$car['model']?></td>
      <td><?=$car['priceByDay']?></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
  </table>
</div>


<?=template_footer()?>