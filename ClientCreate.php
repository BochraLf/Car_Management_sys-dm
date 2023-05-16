<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $idClient = isset($_POST['idClient']) && !empty($_POST['idClient']) && $_POST['idClient'] != 'auto' ? $_POST['idClient'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $fName = isset($_POST['fName']) ? $_POST['fName'] : '';
    $lName = isset($_POST['lName']) ? $_POST['lName'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $street = isset($_POST['street']) ? $_POST['street'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $job = isset($_POST['job']) ? $_POST['job'] : '';
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO client (idClient,fName	,lName,phone,street,city,job) VALUES (?,?, ?, ?, ?, ?,?);');
    $stmt->execute([$idClient, $fName, $lName, $phone, $street,$city,$job]);
    // Output message
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Client ')?>

<div class="content update">
  <h2> Insert New Client</h2>
  <form action="ClientCreate.php" method="POST">
    
    <label for="idClient">idClient</label>
    <input type="text" name="idClient" placeholder="For example : 00001" id="idClient">

    <label for="fName">first Name :</label>
    <input type="text" name="fName" placeholder="For example : Bochra" id="fName">

    <label for="lName">last Name</label>
    <input type="text" name="lName" placeholder="For example : Lafifi" id="lName">

    <label for="phone">phone</label>
    <input type="text" name="phone" placeholder="For example : 0112233445" id="phone">

    <label for="street">street</label>
    <input type="text" name="street" placeholder="For example : ELHarrach" id="street">

    <label for="city">city</label>
    <input type="text" name="city" placeholder="For example : Alger" id="city">

    <label for="job">job</label>
    <input type="text" name="job" placeholder="For example : Data Analyst" id="job">

    

    <input type="submit" value="Add Client">

  </form>

  <?php if ($msg): ?>
  <p><?=$msg?></p>
  <?php endif; ?>

</div>

<?=template_footer()?>