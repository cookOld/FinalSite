<!DOCTYPE html>
<html>
<head>
	<title></title>
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
    <section class="form-elegant">
    <div class="container">
        <strong><a href="http://3nikmix.myjino.ru/">Назад</a></strong>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="md-form">
                <input class="form-control" type="text" name="zag" id="zag" placeholder="Заголовок">
            </div>
            <div class="md-form">
                <textarea id="textarea-char-counter" class="form-control md-textarea pt-5 overflow-auto" length="355" rows="3" name="text"></textarea>
                <label for="textarea-char-counter"><strong>Текст</strong></label>
            </div>
            <div class="file-upload-wrapper">
                <input type="file" id="input-file-now" name="file_array[]" class="file-upload" multiple="" value="">
            </div>
            <div class="md-form">
                <select class="form-control" name="category">
                <option>Разное</option>
                <option>Стоит посетить</option>
                <option>Заброшенные места</option>
                <option>Достопримечательности</option>
                </select>
            </div>
            <script type="text/javascript">
            var sel = document.querySelector('select')
            </script>
            <input type="hidden" name="x" value="" class="inpx">
            <input type="hidden" name="y" value="" class="inpy">
            <div id="map" style="width: 100%; height: 600px"></div>
            <button type="submit" class="btn btn-primary">Предложить</button>
        </form>
    </div>
    </section>
    <script type="text/javascript">
    ymaps.ready(init);
    var myMap;
    var x = document.querySelector('.inpx');
    var y = document.querySelector('.inpy');
    function init () {
        myMap = new ymaps.Map("map", {
            center: [62.03389, 129.73306],
            zoom: 13,
            controls: []
        }, {
            searchControlProvider: 'yandex#search',
            yandexMapDisablePoiInteractivity: true
        });
        myMap.events.add('click', function (e) {
            if (!myMap.balloon.isOpen()) {
                var coords = e.get('coords');
                x.value = coords[0].toPrecision(10);
                y.value = coords[1].toPrecision(10);
                console.log(x.value);
                console.log(y.value);
                myMap.balloon.open(coords, {
                    contentHeader:'Вы выбрали место',
                });
            }
            else {
                myMap.balloon.close();
            }
        });
        myMap.events.add('contextmenu', function (e) {
            myMap.hint.open(e.get('coords'), 'Кто-то щелкнул правой кнопкой');
        });
        myMap.events.add('balloonopen', function (e) {
            myMap.hint.close();
        });
    };
    </script>
</body>
</html>