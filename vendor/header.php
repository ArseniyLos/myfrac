<?php 
$check_org = $_SESSION['user']['org1'];
$admin = $_SESSION['user']['mod1'];
if ($check_org != "") {
  if ($admin == "1") {
  echo '<header class="p-3 mb-3 border-bottom shadow-sm bg-body rounded">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="main.php" class="nav-link px-2 link-dark">Обзор</a></li>
        <li><a href="list.php" class="nav-link px-2 link-dark">Сотрудники</a></li>
        <li><a href="news.php" class="nav-link px-2 link-dark">Новости</a></li>
        <li><a href="chat.php" class="nav-link px-2 link-dark">Чат</a></li>
      </ul>

      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="/ava.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="newuser.php">Добавить юзера</a></li>
        <li><a class="dropdown-item" href="addnew.php">Добавить новости</a></li>
        <li><a class="dropdown-item" href="vendor/logout.php">Выйти</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>';
}
elseif ($admin == "0") {
  echo '<header class="p-3 mb-3 border-bottom shadow-sm bg-body rounded">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="main.php" class="nav-link px-2 link-dark">Обзор</a></li>
        <li><a href="list.php" class="nav-link px-2 link-dark">Сотрудники</a></li>
        <li><a href="news.php" class="nav-link px-2 link-dark">Новости</a></li>
        <li><a href="chat.php" class="nav-link px-2 link-dark">Чат</a></li>
      </ul>

      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="/ava.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="vendor/logout.php">Выйти</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>';
}
}
else {
  echo '<header class="p-3 mb-3 border-bottom shadow-sm bg-body rounded">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="main.php" class="nav-link px-2 link-dark">Обзор</a></li>
      </ul>

      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="/ava.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="vendor/logout.php">Выйти</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>';
}
?>
