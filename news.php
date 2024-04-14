<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

$frac = $_SESSION['user']['org1'];
$cat = $_GET['sort'];
$dbh = new PDO('mysql:dbname=myfrac;host=localhost', 'root', '');

if ($cat != "" && $cat != "Все") {
    $sth = $dbh->prepare("SELECT * FROM `news` WHERE `frac` = :frac AND `category` = :cat");
    $sth->bindParam(':frac', $frac, PDO::PARAM_STR);
    $sth->bindParam(':cat', $cat, PDO::PARAM_STR);
} elseif ($cat == "Все" || $cat == "" || $cat == null) {
    $sth = $dbh->prepare("SELECT * FROM `news` WHERE `frac` = :frac");
    $sth->bindParam(':frac', $frac, PDO::PARAM_STR);
}

$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>MyFrac | МТА Провинция</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/starter-template/">

    

    

<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }


      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
  <script>
  window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
      document.body.classList.add('loaded');
      document.body.classList.remove('loaded_hiding');
    }, 500);
  }
</script><div class="preloader">
  <div class="preloader__row">
    <div class="preloader__item"></div>
    <div class="preloader__item"></div>
  </div>
</div>
    <style>
      .preloader {
  /*фиксированное позиционирование*/
  position: fixed;
  /* координаты положения */
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  /* фоновый цвет элемента */
  background: #e0e0e0;
  /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
  z-index: 1001;
}

.preloader__row {
  position: relative;
  top: 50%;
  left: 50%;
  width: 70px;
  height: 70px;
  margin-top: -35px;
  margin-left: -35px;
  text-align: center;
  animation: preloader-rotate 2s infinite linear;
}

.preloader__item {
  position: absolute;
  display: inline-block;
  top: 0;
  background-color: #337ab7;
  border-radius: 100%;
  width: 35px;
  height: 35px;
  animation: preloader-bounce 2s infinite ease-in-out;
}

.preloader__item:last-child {
  top: auto;
  bottom: 0;
  animation-delay: -1s;
}

@keyframes preloader-rotate {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes preloader-bounce {

  0%,
  100% {
    transform: scale(0);
  }

  50% {
    transform: scale(1);
  }
}

.loaded_hiding .preloader {
  transition: 0.3s opacity;
  opacity: 0;
}

.loaded .preloader {
  display: none;
}
.rainbow {
    background-image: linear-gradient(270deg,#37c72e,#cdb723,#fff400,#37c72e)!important;
    background-size: 1200% 1200%!important;
    animation: rainbow 3s linear infinite;
    background-color: transparent;
}
@keyframes rainbow {
    0% {
    background-position: 0% 50%;
}
50% {
    background-position: 100% 50%;
}
100% {
    background-position: 0% 50%;
}
}
.none {
  display: none;
}
</style>
<link href="headers.css" rel="stylesheet">
<link href="blog.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
  <?php
 require_once('vendor/header.php');
 ?>
  <div class="b-example-t"></div>
<div class="col-lg-8 mx-auto p-4 py-md-5">
  

  <main>
  <h1>Свежие новости</h1><br>
  <select id="mySelect" class="form-select" style="max-width: 300px;" aria-label="Пример выбора по умолчанию">
  <option></option>
  <option>Все</option>
  <option>Сайт</option>
  <option>Организация</option>
  <option>Прочее</option>
</select><br>
<script type="text/javascript">
 document.addEventListener('DOMContentLoaded', (event) => {
    var select = document.getElementById("mySelect");
    select.onchange = function() {
        var selectedOption = this.options[this.selectedIndex].value;
        window.location.href = "news.php?sort=" + selectedOption;
    }
    var urlParams = new URLSearchParams(window.location.search);
    if (!urlParams.has('sort')) {
        window.location.href = "news.php?sort=Все";
    }
});


</script>
  <div class="row mb-2">


  <?php foreach ($list as $row): ?>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary"><?php echo $row['category']; ?></strong>
          <h3 class="mb-0"><?php echo $row['name']; ?></h3>
          <div class="mb-1 text-muted"><?php 
          $date = $row['date'];
          $dates = date("d.m.Y", strtotime($date));
          echo $dates ?></div>
          <p class="card-text mb-auto"><?php echo $row['short']; ?></p>
          <a href="readnews.php?id=<?php echo $row['id']; ?>" class="stretched-link">Читать</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <?php 
          if ($row['img'] == "") {
            echo '<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Картинка</title>
            <rect width="100%" height="100%" fill="#55595c"/>
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Картинка</text>
          </svg>';
          }
          else {
            $imgs = $row['img'];
            echo '<img src="' . $imgs . '" class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
          </img>';
          }
          ?>

        </div>
      </div>
    </div>
  <?php endforeach; ?>
    
  </div>
  </main>
  <footer class="pt-5 my-5 text-muted">
    Разработчик сайта: Арсений Мальцев (<a href="https://vk.com/by_mtsv">iammtsv</a>)
  </footer>
</div>


    <script src="js/bootstrap.bundle.min.js"></script>
   
  </body>
</html>
