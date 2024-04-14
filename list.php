<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>
<?php
$org1 = $_SESSION['user']['org1'];
$dbh = new PDO('mysql:dbname=myfrac;host=localhost', 'root', '');
$sth = $dbh->prepare("SELECT * FROM `users` WHERE `org1` = '$org1'");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

$admin = $_SESSION['user']['mod1'];
if ($admin == "1") {
$admin_style = "adminjkolasdfkl";
}
else {
$admin_style = "none";
}
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
        .adminjkolasdfkl {
          display: show;
        }
        .none {
          display: none;
        }
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

<link href="headers.css" rel="stylesheet">
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
  <h1>Список сотрудников</h1><br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Ник</th>
      <th scope="col">Должность</th>
      <th scope="col">Вступил</th>
      <th scope="col">ВК</th>
      <th scope="col">Состояние</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($list as $row): ?>
    <tr>
      <th scope="row"><?php echo $row['name']; ?> (<?php echo $row['id']; ?>)</th>
      <td><?php echo $row['org1_rank']; ?></td>
      <td><?php  $date = $row['date'];
          $dates = date("d.m.Y", strtotime($date));
          echo $dates ?></td>
      <td><a href="<?php echo $row['vk']; ?>">клик</a></td>
      <td><?php echo $row['org1_dv']; ?></td>
      <td><a type="button" class="btn btn-primary <?= $admin_style ?>" href="edit.php?id=<?php echo $row['id']; ?>&company=<?php echo $row['org1']; ?>"><i class="bi bi-pencil"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16" style="margin-top: -5%;">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></i></a></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
  </main>
  <footer class="pt-5 my-5 text-muted">
    Разработчик сайта: Арсений Мальцев (<a href="https://vk.com/by_mtsv">iammtsv</a>)
  </footer>
</div>


    <script src="js/bootstrap.bundle.min.js"></script>

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
  </body>
</html>
