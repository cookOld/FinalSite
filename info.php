<!DOCTYPE html>
<html>
<head>
	<title>Подробная информация</title>
	<meta charset="utf-8" name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1" />
	<script src="https://api-maps.yandex.ru/2.1/?apikey=<0ab80543-792c-4a8d-a353-9e37b799ac1c>&lang=ru_RU"
  	type="text/javascript">
  	</script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>
</head>
<body>


<?php
	$id = $_GET['id'];
	$conn = mysqli_connect('127.0.0.1', '3nikmix', '2b5VhaJWe', '3nikmix');
	$query = mysqli_query($conn, "SELECT * FROM places WHERE checked = 1 AND id = '" . $id . "'");
	$res = $query->fetch_assoc();
	if($res == 0){
		echo 'Error';
	} else {?>
	<div class="container">
	<a href="http://3nikmix.myjino.ru/" class="">Вернуться на сайт</a>
	<h2><strong><?php echo $res['zag'] ?></strong></h2>
	<p class="card-text"><i class="far fa-clock pr-2"></i><?php echo $res['date'] ?></p>
  <p class="card-text">Категория: <?php echo $res['category'] ?></p>
	<p><?php echo $res['text'] ?></p>
	<?php
		$un=unserialize($res['img']);
		if (is_null($un[0])) {
	  			
	  		} else{
	?>
	<?php for ($i=0; $i < count($un); $i++) { 
    $lol[$i] = 'l' . $i;
	?> 
		<img src="images/<?php echo $un[$i] ?>" data-toggle="modal" data-target="#<?php echo $lol[$i] ?>" style="max-height: 10rem; max-width: 16rem; margin-top: 1rem">
	<!-- modal -->
	<div class="modal fade" id="<?php echo $lol[$i] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
	        <img src="images/<?php echo $un[$i] ?>" style="max-width: 100%;">
	      </div>
	    </div>
	  </div>
	</div>
	<?php }}} ?>

	<div id="map<?php echo $res['id'] ?>" style="width: 100%; height: 450px; margin-top:50px;"></div>
		<script type="text/javascript">
		ymaps.ready(init);
		var myMap<?php echo $res['id'] ?>;
			function init () {
		    var myMap = new ymaps.Map("map<?php echo $res['id'] ?>", {
				center: [<?php echo $res['x'] ?>, <?php echo $res['y'] ?>],
				zoom: 17
				}, {
				searchControlProvider: 'yandex#search'
				}),
				myPlacemark = new ymaps.Placemark([<?php echo $res['x'] ?>, <?php echo $res['y'] ?>], {
				});
				myMap.geoObjects.add(myPlacemark);
					   ;
				}
		</script>
</div>
</body>
</html>