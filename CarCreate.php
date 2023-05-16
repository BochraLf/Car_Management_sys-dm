



<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $immat = isset($_POST['immat']) && !empty($_POST['immat']) && $_POST['immat'] != 'auto' ? $_POST['immat'] : NULL;
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $model = isset($_POST['model']) ? $_POST['model'] : '';
    $priceByDay = isset($_POST['priceByDay']) ? $_POST['priceByDay'] : '';

    $logoName = $_FILES['logo']['name'];
    $logoTmpName = $_FILES['logo']['tmp_name'];
    $logoPath = 'icons/' . $logoName;

    // Move the uploaded logo file to the desired location
    move_uploaded_file($logoTmpName, $logoPath);

    try {
        $stmt = $pdo->prepare('INSERT INTO car (immat, brand, model, priceByDay, logoPath) VALUES (?, ?, ?, ?, ?);');
        $stmt->execute([$immat, $brand, $model, $priceByDay, $logoPath]);

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
    <input type="text" name="immat" placeholder="000099" id="immat">

    <label for="brand">Brand:</label>
    <input type="text" name="brand" placeholder="For example: MERCEDES or AUDI" id="brand">

    <label for="model">Model:</label>
    <input type="text" name="model" placeholder="For example: X1 or Q3" id="model">

    <label for="priceByDay">Price By Day:</label>
    <input type="text" name="priceByDay" placeholder="00000" id="priceByDay">
    
    <label for="logo">Logo:</label>
    <input type="file" name="logo" id="logo">
   
    <input type="submit" value="Add new Car">
  </form>

  <?php if ($msg): ?>
  <p><?=$msg?></p>
  <?php endif; ?>

</div>
<style>
#logo {
  /* Your custom styles here */
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 8px 12px;
  color: #555;
}

/* Optional: Style when the file input has a selected file */
#logo::file-selector-button {
  /* Your custom styles here */
  background-color: #DBDFEA;
  border-color: #999;
  padding: 6px 10px;
  border-radius: 10px;
  color: #555;
}
</style>
<?=template_footer()?>