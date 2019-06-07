<?php
	$id = $_POST['id'];
	if($_GET['pass'] == 'yaneadmin'){
	$conn = mysqli_connect('127.0.0.1', '3nikmix', '2b5VhaJWe', '3nikmix');
	$query = mysqli_query($conn, "DELETE FROM places WHERE id = '$id'");
	};
	header("Location: http://3nikmix.myjino.ru/admin_panel.php?pass=" . $_GET['pass'] . "");
?>