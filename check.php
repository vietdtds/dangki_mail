<?php
include('randomHash.php');
include('configs.php');
$hash = generateRandomString();
$id = $_GET['id'];
$conn = connectDB();
$sql = "UPDATE `demophpmailer` SET `role`= 1,`hash`='$hash' WHERE user_id = $id ";
$stsm = $conn->query($sql);
if (isset($_POST['btnAccept']) && $_POST['btnAccept']) {
}

?>

<form action="<?= $_SERVER['PHP_SELF'] . '?id=2' ?>" method="post">
  <h1>Xác minh tài khoản</h1>
  <button type="submit" name="btnAccept">Accept</button>
</form>