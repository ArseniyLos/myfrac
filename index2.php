<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>MyFrac | Авторизация</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

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

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
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
      html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.red-square {
    width: 20px;
    height: 20px;
    background-color: red;
    border-radius: 5px;
}
html, body {
        
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="post" action="vendor/signin.php">
    <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

    <div class="form-floating">
      <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Никнейм">
      <label for="floatingInput">Никнейм</label>
    </div>
    <div class="form-floating">
      <input type="password" name="key" class="form-control" id="floatingPassword" placeholder="Пароль">
      <label for="floatingPassword">Пароль</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
  </form>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="exampleModal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Выберите организацию</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
    <div class="red-square"></div>
      <strong class="me-auto" style="margin-left: 10px;">Ошибка!</strong>
      <button type="button" class="btn-close" data-dismiss="toast" aria-label="Закрыть"></button>
    </div>
    <div class="toast-body">
      Неверный логин или пароль
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="fieldToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <div class="red-square"></div>
      <strong class="me-auto" style="margin-left: 10px;">Ошибка!</strong>
      <small>Только что</small>
      <button type="button" class="btn-close" data-dismiss="toast" aria-label="Закрыть"></button>
    </div>
    <div class="toast-body">
      Обнаружены пустые поля
    </div>
  </div>
</div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            if(window.location.search.indexOf('?successauth') > -1) {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
                myModal.show();
            }
        });
        
    </script>
   <script>
document.addEventListener('DOMContentLoaded', (event) => {
    if(window.location.search.indexOf('?badauth') > -1) {
        var toastLiveExample = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLiveExample, {
            delay: 7000 // Задержка перед автоматическим закрытием тоста (в миллисекундах)
        })
        toast.show()

        setTimeout(function() {
            var url = window.location.href;
            var updatedUrl = url.replace('?badauth', '');
            history.replaceState({}, null, updatedUrl);
        }, 7000);
    }
});
document.addEventListener('DOMContentLoaded', (event) => {
    if(window.location.search.indexOf('?badfields') > -1) {
        var toastFieldExample = document.getElementById('fieldToast')
        var toast = new bootstrap.Toast(toastFieldExample, {
            delay: 7000 // Задержка перед автоматическим закрытием тоста (в миллисекундах)
        })
        toast.show()

        // Удаление '?badfields' из URL через 7 секунд
        setTimeout(function() {
            var url = window.location.href;
            var updatedUrl = url.replace('?badfields', '');
            history.replaceState({}, null, updatedUrl);
        }, 7000);
    }
});
</script>

    
  </body>
</html>
