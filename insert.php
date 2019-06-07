<?php
	//Генераточ чисел (не используется)
	function generateRandomString($length = 10) {
   		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
		};
	$put = [];
	$file_array;
	$name_array = $_FILES['file_array']['name'];
	$tmp_name_array = $_FILES['file_array']['tmp_name'];
	$type_array = $_FILES['file_array']['type'];
	$size_array = $_FILES['file_array']['size'];
	$error_array = $_FILES['file_array']['error'];
		for($i = 0; $i < count($tmp_name_array); $i++){
			if (isset($name_array[$i])) {
	    		array_push($put, $name_array[$i]);
			} 
		}
	$string = serialize( $put );
	$now = new DateTime();
	if ($string == 'a:1:{i:0;s:0:"";}') {
		unset($string);
	}
	$conn = mysqli_connect('127.0.0.1', '3nikmix', '2b5VhaJWe', '3nikmix');
	$query = mysqli_query($conn, "INSERT INTO places (zag, text, img, x, y, category, date) VALUES('" . $_POST['zag'] . "', '" . $_POST['text'] . "', '" . $string ."' ,  '" . $_POST['x'] . "', '" . $_POST['y'] . "', '" . $_POST['category'] . "', '" . $now->format('d-m-Y') . "')");
	for ($i=0; $i < count($tmp_name_array); $i++) { 
	move_uploaded_file($tmp_name_array[$i], 'images/' . $name_array[$i]);
	}
	header("Location: http://3nikmix.myjino.ru/?l=1");
?>