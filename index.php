<!DOCTYPE html>
<html class="full-height">
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
  <script type="text/javascript" src="js/mdb.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>

<header class="mb-4">
  <nav class="navbar navbar-expand-lg navbar-dark black">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://3nikmix.myjino.ru/">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://3nikmix.myjino.ru/admin_panel.php">Admin panel</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="view intro-2">
    <div class="full-bg-img">
      <div class="mask rgba-black-strong flex-center">
        <div class="container">
          <div class="white-text text-center wow fadeInUp">
            <h2>This Navbar isn't fixed</h2>
            <h5>When you scroll down it will disappear</h5>
            <br>
            <p>Full page intro with background image will be always displayed in full screen mode, regardless
              of device </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">
	<nav class="navbar navbar-expand-sm navbar-dark primary-color">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
	    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="basicExampleNav">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="http://3nikmix.myjino.ru/?cat=Достопримечательности">Достопримечательности
	        </a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="http://3nikmix.myjino.ru/?cat=Стоит+посетить">Стоит посетить</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="http://3nikmix.myjino.ru/?cat=Заброшенные+места">Заброшенные места</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="http://3nikmix.myjino.ru/?cat=Разное">Разное</a>
	      </li>
	    </ul>
	    <form class="form-inline">
	      <div class="md-form my-0">
	      	<a class="nav-link warning-color text-white rounded-pill" href="places.php">Предложить место</a>
	      </div>
	    </form>
	  </div>
	</nav>
</div>
	<!-- Card -->
<div class="container">
	<?php
		$conn = mysqli_connect('127.0.0.1', '3nikmix', '2b5VhaJWe', '3nikmix');
		$cat = $_GET['cat'];
		if (is_null($_GET['cat'])) {
			$query = mysqli_query($conn, "SELECT * FROM places WHERE checked = '1'");
		} else{
			$query = mysqli_query($conn, "SELECT * FROM places WHERE checked = '1' AND category = '$cat'");
		}
		for ($i=0; $i < $query->num_rows; $i++){ 
			$res = $query->fetch_assoc();
		?>
	<div class="card promoting-card w-100 mt-4">
	  <div class="card-body row">
	  	<?php
	  		$un=unserialize($res['img']);
	  	?>
	  	<?php
	  		if (is_null($un[0])) {
	  			
	  		} else{
	  	?>
	  	<div class="col-2 text-center" style="padding: 0;">
	  		<img src="images/<?php echo $un[0]?>" class="d-flex mr-3 w-100 rounded">
	  	</div>
	  	<?php } ?>
	  	<div class="<?php
			if (is_null($un[0])) {
	  			echo 'col-12';
	  		} else{
					echo 'col-10';
			}
			?>" style="padding: 0;">
	  		<div class="container" style="padding-left: 10px;">
	  			<h5 class="card-title font-weight-bold mb-2"><?php echo $res['zag'] ?></h5>
	  			<p class="card-text"><i class="far fa-clock pr-2"></i><?php echo $res['date'] ?></p>
					<p class="card-text">Категория: <?php echo $res['category'] ?></p>
	  			<div>
	  				<p>
	  					<?php echo $res['text'] ?>
	  				</p>
	  			</div>
	  			<a href="info.php?id=<?php echo $res['id'] ?>"><p>Подробнее</p></a>
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

    
<script type="text/javascript">
	<?php 
	if($_GET['l'] == 1){
		echo "toastr.success('Будет рассмотрено')";
	}
	?>
</script>

<footer class="page-footer grey darken-2" style="margin-top: 6rem">
    <div class="container">
      <div class="row">
        <div class="col l3 s12">
          <h5 class="white-text">КОНТАКТНАЯ ИНФОРМАЦИЯ</h5>
          <ul>
            <li class="white-text">г. Якутск</li>
            <li class="white-text">к / т: 8 (924) 569-66-15</li>
            <li class="white-text">e-mail: 3nikmix@ro.ru</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2018 Created by "Михайлов Михаил Павлович"
      </div>
    </div>
</footer>

</body>
</html>