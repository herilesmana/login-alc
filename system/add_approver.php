<?php

require '../config/connection.php';

$name = isset($_POST['name']) ? $_POST['name'] : "" ;
$card_number = isset($_POST['card_number']) ? $_POST['card_number'] : "";
$foto_name = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "";
$audio_name = isset($_FILES['audio']['name']) ? $_FILES['audio']['name'] : "";

if ($name == "" || $card_number == "" || $foto_name == "" || $audio_name == "") {
	echo "Ada yang kosong. Coba periksa. <br>";
	echo $name."<br>";
	echo $card_number."<br>";
	echo $foto_name."<br>";
	echo $audio_name."<br>";
}else{
	if (mysqli_query($conn, "INSERT INTO approvers (id,name,card_number,foto,audio,urutan) VALUES ('','$name','$card_number','$foto_name','$audio_name','10')" ) ) {
		echo "inputed!";
		 header('Location: ' . "http://localhost/login-alc/backend");
	}else{
		mysqli_error($conn);
	}
}