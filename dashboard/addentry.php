<?php
include_once('config.php');
if(isset($_POST['submit'])){
  $entry2=$_POST['entry2'];
}

$sql = "INSERT INTO entry2 (entries) VALUES ('$entry2')";

if ($con->query($sql) === TRUE) {
  echo "<p>New record created successfully</p>";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}
 ?>