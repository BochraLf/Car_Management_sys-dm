
<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $immat = isset($_POST['immat']) && !empty($_POST['immat']) && $_POST['immat'] != 'auto' ? $_POST['immat'] : NULL;
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $model = isset($_POST['model']) ? $_POST['model'] : '';
    $priceByDay = isset($_POST['priceByDay']) ? $_POST['priceByDay'] : '';



    // Move the uploaded logo file to the desired location

    try {
        $stmt = $pdo->prepare('INSERT INTO car (immat, brand, model, priceByDay) VALUES (?, ?, ?, ?);');
        $stmt->execute([$immat, $brand, $model, $priceByDay]);

        $msg = 'Created Successfully!';
    } catch (Exception $e) {
        // Handle any exceptions/errors that occurred during the file upload or database insertion
        $msg = 'Error: ' . $e->getMessage();
    }
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<?=template_header('Car')?>

<div class="content update">
  <h2>Insert New Car</h2>
  <form action="CarCreate.php" method="post" enctype="multipart/form-data">
    <label for="immat">immat of the car:</label>
    <input type="text" name="immat" placeholder="For exemple: 000009" id="immat">

    <label for="brand">Brand:</label>
    <input type="text" name="brand" placeholder="For example: MERCEDES" id="brand">

    <label for="model">Model:</label>
    <input type="text" name="model" placeholder="For example: X1 " id="model">

    <label for="priceByDay">Price By Day:</label>
    <input type="text" name="priceByDay" placeholder="Start from 00000DA" id="priceByDay">
   
    <input type="submit" value="Add new Car">
  </form>

  <?php if ($msg): ?>
  <p><?=$msg?></p>
  <?php endif; ?>

</div>
<style>



</style>
<?=template_footer()?>