<div class="main">
        <div class="col-md-12 col-sm-12">
           <div class="register-form">
               <img src="https://image.flaticon.com/icons/svg/25/25231.svg" alt="logo" height="150px" width="150px"/>
               <form action="<?=BASE_URL?>/signup" method="POST">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Nome">
                  </div>
                  <div class="form-group">
                     <label>Descrição</label>
                     <textarea type="text" class="form-control" name="description" placeholder="Digite uma pequena descrição sua..."></textarea>
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label>Digite sua senha</label>
                     <input type="password" class="form-control" name="password" placeholder="Senha">
                  </div>
                  <div class="form-group">
                     <label>URL da Imagem</label>
                     <input type="text" class="form-control" name="url_image" placeholder="Cole o link da imagem">
                  </div>
                  <div class="form-group">
                     <label>Usuário do Github</label>
                     <input type="text" class="form-control" name="github" placeholder="Github">
                  </div>
                  <div class="form-group">
                     <label>Data de Nascimento</label>
                     <input type="text" class="form-control" name="dt_birth" placeholder="07/04/1990">
                  </div>
                  <div class="form-group">
                     <label>Cargo de Preferência</label>
                     <input type="text" class="form-control" name="office" placeholder="Função de preferencia">
                  </div>
                  <div class="form-group">
                     <label>Celular ou Telefone</label>
                     <input type="text" class="form-control" name="phone" placeholder="Digite seu celular">
                  </div>
                  <div class="form-group">
                     <label>Cidade onde Reside</label>
                     <input type="text" class="form-control" name="city" placeholder="Cidade">
                  </div>
                  <div class="form-group">
                     <label>Bio</label>
                     <textarea type="email" class="form-control" name="bio" placeholder="Digite uma frase que lhe inspire..."></textarea>
                  </div>
                  <button type="button" class="btn btn-light" style="float:left;"><a style="text-decoration: none; color: #212529" href="/atividade_login/">Voltar</a></button>
                  <button type="submit" class="btn btn-black" style="float:right;">Registrar</button>
                <?= isset($_SESSION[ERROR_REGISTER]) ? "<div class=\"alert alert-danger\" style=\"margin-top: 70px;\" role=\"alert\">".$_SESSION[ERROR_REGISTER]."</div>" : null ?>
               </form>
           </div>
        </div>
     </div>