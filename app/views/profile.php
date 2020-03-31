<?php
    use App\Models\User;
    
    $user = unserialize($_SESSION['user']) ?? null;
    
    if(!$user) {
        header("Location:" . BASE_URL . "/");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile - <?=$user->getName()?></title>
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
            <img src=<?=$user->getUrl_image()?> alt="profile">
        </section>
        <section class="description">
            <header>
                <strong><?=$user->getName()?></strong>
                <p><?=$user->getDescription()?></p>
            </header>
            <article>
                <ul>
                    <li><span>Email:</span> <?=$user->getEmail()?></li>
                    <li><span>Github:</span> <?=$user->getGithub()?></li>
                    <li><span>Cargo:</span> <?=$user->getOffice()?></li>
                </ul>
                <ul>
                    <li><span>Data de Nascimento:</span> <?=$user->getDt_birth()?></li>
                    <li><span>Telefone:</span> <?=$user->getPhone()?></li>
                    <li><span>Cidade:</span> <?=$user->getCity()?></li>
                </ul>
            </article>
            <footer>
            <?=$user->getBio()?>
            </footer>
        </section>

    </main>
</body>
</html>