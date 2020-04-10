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
                  <button type="button" class="btn btn-light" style="float: left;"><a style="text-decoration: none; color: #212529" href="/atividade_login/register">Registrar</a></button>
                  <button type="submit" class="btn btn-black"style="float: right;">Login</button>
                  <?= isset($_SESSION[ERROR_LOGIN]) ? "<div class=\"alert alert-danger\" style=\"margin-top: 70px;\" role=\"alert\">".$_SESSION[ERROR_LOGIN]."</div>" : null ?>
                  <?= isset($_SESSION[MESSAGE]) ? "<div class=\"alert alert-success\" style=\"margin-top: 70px;\" role=\"alert\">".$_SESSION[MESSAGE]."</div>" : null ?>
               </form>
           </div>
        </div>
     </div>