<?php
include 'conn.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM platelet_donor_details where donor_id={$donor_id}";
$result=mysqli_query($conn,$sql);

header("Location: platelet_donor_list.php");

mysqli_close($conn);

 ?>
