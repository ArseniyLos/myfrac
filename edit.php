<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>
<?php 
$company = $_SESSION['user']['org1'];
$companys = $_GET['company'];

if ($companys == "$company") {
}
else {
  header('Location: list.php');
}
?>
<?php
$admin = $_SESSION['user']['mod1'];
if ($admin == "0") {
 header('Location: main.php');
}
?>
<?php
require_once 'vendor/connect.php';
$user_id = $_GET['id'];
$stmt = $connect->prepare("SELECT * FROM `users` WHERE `id` = ? AND `org1` = ?");
$stmt->bind_param("ss", $user_id, $company);

$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
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
  <h1>Редактирование <?= $user['name'] ?></h1><br>
  <form action="vendor/edit.php" method="post">
  <div class="mb-3">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <input type="hidden" name="company" value="<?= $_GET['company']; ?>">
    <input type="hidden" name="author" value="<?= $_SESSION['user']['name'] ?>">
    <label class="zag form-label">Должность пользователя</label>
    <select name="rank" class="form-select" style="max-width: 300px;" aria-label="Пример выбора по умолчанию">
  <option value="<?= $user['org1_rank'] ?>" selected>ВЫБРАТЬ</option>
  <option>Руководитель</option>
  <option>Старший</option>
  <option>Сотрудник</option>
</select><br>
    <label class="zag form-label">Наказания</label>
    <select name="dv" class="form-select" style="max-width: 300px;" aria-label="Пример выбора по умолчанию">
  <option value="<?= $user['org1_dv'] ?>" selected>ВЫБРАТЬ</option>
  <option>0/3</option>
  <option>0.5/3</option>
  <option>1/3</option>
  <option>1.5/3</option>
  <option>2/3</option>
  <option>2.5/3</option>
  <option>3/3</option>
</select><br><br>
<button class="btn btn-outline-success" type="submit">Сохранить</button>
<a type="button" href="vendor/remove.php?id=<?= $user['id'] ?>&company=<?= $_GET['company'] ?>"class="btn btn-outline-danger">Уволить</a>
<a type="button" href="history_user.php?id=<?= $user['id'] ?>&company=<?= $_GET['company'] ?>"class="btn btn-outline-warning">Личное дело</a>
    </form>
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
