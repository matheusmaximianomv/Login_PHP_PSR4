<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      <?php
         include("".PATH_ASSETS."css/users.css");
      ?>
    </style>
    <title><?=$dataView["titlePage"]?></title>
</head>
<body>
    <!-- Precisa modificar o model user e adicionar o id como atributo na classe -->
    <nav>
        <h1>Usuários no Sistema</h1>
        <div>
            <?=$dataView["isAdmin"] ? "<a href=\"".BASE_URL."/profile\"><button type=\"button\" class=\"users\">Perfil</button></a>" : null?>
            <form action="<?=BASE_URL?>/logout">
                <button type="submit" >Logout</button>
            </form>
        </div>
    </nav>
    <section>
        <form action="<?=BASE_URL?>/users/profile" method="POST">
            <div>
                <input type="text" name="id" placeholder="Pesquisar por id" />
                <button type="submit"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/1200px-Magnifying_glass_icon.svg.png" alt="Pesquisar" title="Pesquisar"></button>     
            </div>
        </form>
    </section>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th >Email</th>
                    <th>Github</th>
                    <th>Cargo</th>
                    <th>Celular/Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($dataView["users"] as $value) {
                        echo "
                            <tr>
                                <td>#".$value["id"]."</td>
                                <td class=\"profile\">
                                    <img src=\"".$value["url_image"]."\" />
                                    <span>".$value["name"]."</span>
                                </td>
                                <td >".$value["email"]."</td>
                                <td>".$value["github"]."</td>                       
                                <td>".$value["office"]."</td>
                                <td>".$value["phone"]."</td>
                                <td>
                                    <a href=\"/\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Check_green_icon.svg/215px-Check_green_icon.svg.png\" alt=\"Ver\" title=\"Visualizar Usuário\" /></a>
                                    <a href=\"/users/delete\"><img src=\"https://i.ya-webdesign.com/images/error-transparent-symbol-png-1.png\" alt=\"Deletar\" title=\"Deletar Usuário\"/></a>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            <tbody>
        </table>
    </main>
</body>
</html>