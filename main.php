<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
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
  

<div class="container mt-4"><div class="row justify-content-center">
  <div class="col-lg-3 col-md-4 col-12">
    <div class="bg-body rounded-3 shadow-sm p-4 mb-5 d-none d-md-block">
      <div id="sidebar-offcanvas" class="sidebar-inplace offcanvas-md offcanvas-start" aria-labelledby="sidebar-offcanvas-label">
        <div class="offcanvas-header">
          <div class="offcanvas-title h5" id="sidebar-offcanvas-label">Личный кабинет</div>
          <button type="button" class="btn-close" aria-label="Close"></button></div>
          <div class="offcanvas-body">
            <div class="sidebar w-100">
              <div class="nav-header p-1 mb-1">Меню</div>
          <ul class="nav nav-pills flex-column mb-3">
            <li class="nav-item">
            <a class="nav-link active" href="main.php">
              <i class="bi bi-house-door"></i>Главная</a>
            </li><li class="nav-item">
              <a class="nav-link" href="security.php">
                <i class="bi bi-shield"></i>Безопасность</a>
              </li></ul>
              <?php
$org1 = $_SESSION['user']['org1'];
if ($org1 != "") {
  echo '<div class="nav-header p-1 mb-1">' . $org1 . '</div>
  <ul class="nav nav-pills flex-column"><li class="nav-item">
    <a class="nav-link" href="profile_log.php">
      <i class="bi bi-cash-coin"></i>Личное дело</a>
    </li>
    </ul>';
}
?>
            </div></div></div></div></div>
              <div class="col-lg-9 col-md-8 col-12">
                <div class="row mb-4 gy-4">
                  <div class="col-lg-6 col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="mb-0">Ваши данные</h4>
                        <span>Информация об аккаунте</span>
                      </div>
                      <div class="card-body">
                        <dl class="row mb-0">
                          <dt class="col-sm-4">Ник</dt>
                          <dd class="col-sm-8 user-select-all"><?= $_SESSION['user']['name']; ?></dd>
                          <dt class="col-sm-4">Страница ВК</dt><dd class="col-sm-8" role="button">
  <?php 
  $check_vk = $_SESSION['user']['vk'];
  $text = '<a href="' . $check_vk . '" target="blank_"">Перейти</a>';
  if ($check_vk != "") {
    echo $text;
  }
  else {
    echo "Не привязан";
  }
  ?></dd><dt class="col-sm-4">Регистрация</dt><dd class="col-sm-8"><?= $_SESSION['user']['reg']; ?></dd><dt class="col-sm-4">Личный №</dt><dd class="col-sm-8"><?= $_SESSION['user']['id']; ?></dd><p class="sm-5">Личный номер нужно сообщить работодателю при трудоустройстве</p></dl></div></div><div class="mt-4"><div class="card"><div class="card-header d-flex justify-content-between align-items-center"><div class="mb-0"><h4 class="mb-0">Бонусы</h4><span>! Система в разработке</span></div></div><div class="card-body"><h4 class="text-danger text-center">0 баллов</h4></div></div></div></div>

      </main>
  <footer class="pt-5 my-5 text-muted border-top">
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
