<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
// Number of records to show on each page
// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
  $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
  $stmt = $pdo->prepare("SELECT * FROM car WHERE brand ='".$brand. "'"); 
  $stmt->execute();
// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of contacts, this is so we can determine whether there should be a next and previous button



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
      <td>Logo</td>
      <td>Brand</td>
      <td>Model</td>
      <td>Price</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $car): ?>
    <tr>
      <br>
      <td><img src="<?=$car['logoPath']?>" alt="Logo" class="logo-image"></td>
      <td><?=$car['brand']?></td>
      <td><?=$car['model']?></td>
      <td><?=$car['priceByDay']?></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
  </table>
</div>


<?=template_footer()?>