<?php

require '../config/connection.php';
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM approvers WHERE id='$id'")
