<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<0ab80543-792c-4a8d-a353-9e37b799ac1c>&lang=ru_RU" type="text/javascript"></script>
</head>
<body>
    <div class="container pb-5s"> 
    <a href="http://3nikmix.myjino.ru/"><strong>Вернуться</strong></a>
    <h5>Password: yaneadmin</h5>
        <form>
            <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="pass">
        </form>
    </div>
<?php
    $pass = $_GET['pass'];
    if (is_null($pass)) {
        # code...
    } else{
	if($pass == 'yaneadmin'){ ?> 
		<?php
		$conn = mysqli_connect('127.0.0.1', '3nikmix', '2b5VhaJWe', '3nikmix');
		$query = mysqli_query($conn, "SELECT * FROM places WHERE checked = 0");
		?>
    <div class="container">
	<?php
		for ($i=0; $i < $query->num_rows; $i++){ 
			$res = $query->fetch_assoc();
		?>
	<div class="card promoting-card w-100 mt-4">
	  <div class="card-body row">
	  	<div class="col-12">
	  		<div class="container">
	  			<h5 class="card-title font-weight-bold mb-2"><?php echo $res['zag'] ?></h5>
	  			<p class="card-text"><i class="far fa-clock pr-2"></i><?php echo $res['date'] ?></p>
                <p class="card-text">Категория: <?php echo $res['category'] ?></p>
	  			<div>
	  				<p>
	  					<?php echo $res['text'] ?>
	  				</p>
	  			</div>

                <?php
	        	$un=unserialize($res['img']);
		        if (is_null($un[0])) {
	  			
	  		    } else{
	            ?>
                <?php for ($y=0; $y < count($un); $y++) { 
                $lol[$y] = 'l' . $y . $res['id'];
                ?> 
                    <img src="images/<?php echo $un[$y] ?>" data-toggle="modal" data-target="#<?php echo $lol[$y] ?>" style="max-height: 10rem; max-width: 16rem;">
                <div class="modal fade" id="<?php echo $lol[$y] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="images/<?php echo $un[$y] ?>">
                    </div>
                    </div>
                </div>
                </div>
                <?php }} ?>
                <div id="map<?php echo $res['id'] ?>" style="width: 100%; height: 450px; margin-top: 2rem;"></div>

                <div class="row" class="">
                    <div class="col-6 text-center">
                        <form action="admin_insert.php?pass=<?php echo $_GET['pass'] ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </form>
                    </div>
                    <div class="col-6 text-center">
                        <form action="admin_delete.php?pass=<?php echo $_GET['pass'] ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
                            <button class="btn btn-danger" type="submit" value="<?php echo $res['id']; ?>">Удалить</button>
                        </form>
                    </div>
                </div>

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
	  	</div>
	  </div>
	</div>
	<?php if(isset($un)){
		unset($un); 
	}
	?>
	<?php }?>
    </div>
	<?php } else{
		echo 'Неправильно';
    };
    };
?>
</body>
</html>
    