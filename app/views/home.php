<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
      <?php
         include("".PATH_ASSETS."css/index.css");
      ?>
    </style>
    <title>Login</title>
</head>
<body>
    <div class="sidenav">
        <div class="login-main-text">
           <h2>Atividade<br> Implementação de Login</h2>
           <p>Interface com Back-End PHP</p>
        </div>
     </div>
     <div class="main">
        <div class="col-md-12 col-sm-12">
           <div class="login-form">
               <img src="https://image.flaticon.com/icons/svg/25/25231.svg" alt="logo" height="150px" width="150px"/>
               <form action="<?=BASE_URL?>/login" method="POST">
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
               <?= isset($_SESSION[ERROR]) ? "<div class=\"alert alert-danger\" role=\"alert\">".$_SESSION[ERROR]."</div>" : null ?>
               </form>
           </div>
        </div>
     </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>