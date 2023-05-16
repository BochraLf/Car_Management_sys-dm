<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['rentalID'])) {
    if (!empty($_POST)) {
        $rentalID = isset($_POST['rentalID']) ? $_POST['rentalID'] : NULL;
        $locDate = isset($_POST['locDate']) ? $_POST['locDate'] : '';
        $sDate = isset($_POST['sDate']) ? $_POST['sDate'] : '';
        $eDate = isset($_POST['eDate']) ? $_POST['eDate'] : '';
        $rentalType = isset($_POST['rentalType']) ? $_POST['rentalType'] : '';
        $immat = isset($_POST['immat']) ? $_POST['immat'] : '';
        $idClient = isset($_POST['idClient']) ? $_POST['idClient'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE rental SET rentalID = ?, locDate = ?, sDate = ?, eDate = ?, rentalType = ?, immat = ?, idClient = ? WHERE rentalID = ?');
        $stmt->execute([$rentalID, $locDate, $sDate, $eDate, $rentalType, $immat, $idClient, $_GET['rentalID']]);
        $msg = 'Updated Successfully!';
    }
    $stmt = $pdo->prepare('SELECT * FROM rental WHERE rentalID = ?');
    $stmt->execute([$_GET['rentalID']]);
    $rental = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$rental) {
        exit('Rental doesn\'t exist with that rentalID!');
    }
} else {
    exit('No rentalID specified!');
}
?>
<?=template_header('Rental')?>

<div class="content update">
  <h2>Update rental #<?=$rental['rentalID']?></h2>
  <form action="RentalUpdate.php?rentalID=<?=$rental['rentalID']?>" method="post">
    <label for="rentalID">rentalID</label>
    <input type="text" name="rentalID" placeholder="000016" value="<?=$rental['rentalID']?>" id="rentalID">

    <label for="locDate">locDate</label>
    <input type="text" name="locDate" placeholder="01/01/2001" value="<?=$rental['locDate']?>" id="locDate">

    <label for="sDate">sDate</label>
    <input type="text" name="sDate" placeholder="01/01/2001" value="<?=$rental['sDate']?>" id="sDate">

    <label for="eDate">eDate</label>
    <input type="text" name="eDate" placeholder="01/01/2001" value="<?=$rental['eDate']?>" id="eDate">

    <label for="rentalType">rentalType</label>
    <input type="text" name="rentalType" placeholder="WD / VD" value="<?=$rental['rentalType']?>" id="rentalType">

    <label for="immat">Immat of the car</label>
    <input type="text" name="immat" placeholder="00001" value="<?=$rental['immat']?>" id="immat">

    <label for="idClient">idClient</label>
    <input type="text" name="idClient" placeholder="00001" value="<?=$rental['idClient']?>" id="idClient">

    <input type="submit" value="Update">
  </form>
  <?php if ($msg): ?>
  <p><?=$msg?></p>
  <?php endif; ?>
</div>

<?=template_footer()?>