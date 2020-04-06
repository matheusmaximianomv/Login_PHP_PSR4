<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$dataView["titlePage"]?></title>
    <style>
      <?php
         include("".PATH_ASSETS."css/profile.css");
      ?>
    </style>
</head>
<body>
    <nav>
        <h1>Suas Informações: </h1>
        <form action="<?=BASE_URL?>/logout">
            <button type="submit" >Logout</button>
        </form>
    </nav>
    <main>
        <section class="info">
            <img src=<?=!empty($dataView["avatar"]) ? $dataView["avatar"] : "https://image.flaticon.com/icons/svg/1077/1077063.svg"?> alt="profile">
        </section>
        <section class="description">
            <header>
                <strong><?=$dataView["name"]?></strong>
                <p><?=$dataView["description"]?></p>
            </header>
            <article>
                <ul>
                    <li><span>Email:</span> <?=$dataView["email"]?></li>
                    <li><span>Github:</span> <?=$dataView["github"]?></li>
                    <li><span>Cargo:</span> <?=$dataView["office"]?></li>
                </ul>
                <ul>
                    <li><span>Data de Nascimento:</span> <?=$dataView["dt_birth"]?></li>
                    <li><span>Telefone:</span> <?=$dataView["phone"]?></li>
                    <li><span>Cidade:</span> <?=$dataView["city"]?></li>
                </ul>
            </article>
            <footer>
            <?=$dataView["bio"] ? $dataView["bio"] : "Insira uma bio." ?>
            </footer>
        </section>

    </main>
</body>
</html>