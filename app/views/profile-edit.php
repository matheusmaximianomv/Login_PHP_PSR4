<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <?php
            include("".PATH_ASSETS."css/profile-edit.css");
        ?>
    </style>
    <title>Profile - <?=$dataView["titlePage"]?></title>
</head>
<body>
    <nav>
        <h1>Suas Informações: </h1>
        <div>
            <a href="<?=BASE_URL?>/profile"><button type="button" class="profile">Perfil</button></a>
            <form action="<?=BASE_URL?>/logout">
                <button type="submit" >Logout</button>
            </form>
        </div>
    </nav>
    <!-- Comparar essas informações com o user na sessao e ai fazer a atualização -->
    <main>
        <form action="<?=BASE_URL?>/update" method="POST">
            <h1>Editar Perfil</h1>
            <div>
                <label>Nome</label>
                <input type="text" name="name" value="<?=$dataView["name"]?>" placeholder="Nome Completo"/>
            </div>
            <div>
                <label>Descrição</label>
                <textarea type="text" name="description"  placeholder="Pequena descrição sua..."><?=$dataView["description"]?></textarea>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?=$dataView["email"]?>" placeholder="Email" />
            </div>
            <div>
                <label>Senha</label>
                <input type="password" name="password" value="<?=$dataView["password"]?>" placeholder="Senha"/>
            </div>
            <div>
                <label>Endereço de Imagem</label>
                <input type="text" name="url_image" value=<?=$dataView["avatar"]?> placeholder="Endereço da sua imagem"/>
            </div>
            <div>
                <label>Usuário do Github</label>
                <input type="text" name="github" value=<?=$dataView["github"]?>  placeholder="Github"/>
            </div>
            <div>
                <label>Data de Nascimento</label>
                <input type="text" name="dt_birth" value="<?=$dataView["dt_birth"]?>" placeholder="11/11/1111"/>
            </div>
            <div>
                <label>Cargo</label>
                <input type="text" name="office" value="<?=$dataView["office"]?>"  placeholder="Backend"/>
            </div>
            <div>
                <label>Celular ou Telefone</label>
                <input type="text" name="phone" value="<?=$dataView["phone"]?>" placeholder="(88) 8 8888-8888"/>
            </div>
            <div>
                <label>Cidade</label>
                <input type="text" name="city" value="<?=$dataView["city"]?>"  placeholder="Central City"/>
            </div>
            <div>
                <label>Bio</label>
                <textarea type="text" name="bio"  placeholder="Uma frase inspiradora"><?=$dataView["bio"]?></textarea>
            </div>
            <?=isset($_SESSION[MESSAGE]) ? "<p class=\"erro\">".$_SESSION[MESSAGE]."</p>" : null?>
            <div>
                <button type="button"><a href="<?=BASE_URL?>/profile">Voltar</a></button>
                <button type="submit">Atualizar</button>
            </div>
        </form>
    </main>
</body>
</html>