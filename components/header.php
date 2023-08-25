<?php

function isActivePage($currentPage, $pageName) {
    if ($currentPage === $pageName) {
        return 'active';
    }
    return '';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $currentPage === 'index' ? 'Sem Desperdício - Evite o Desperdício de Alimentos' : '' ?>
        <?= $currentPage === 'sobre' ? 'Sem Desperdício - Sobre' : '' ?>
        <?= $currentPage === 'receitas' ? 'Sem Desperdício - Minhas Receitas' : '' ?>    
    </title>

    <!-- Metatags para SEO -->
    <meta name="description"
        content="Sem Desperdício é uma aplicação simples e intuitiva que tem como objetivo ajudar as pessoas a evitar o desperdício de alimentos em suas casas.">
    <meta name="keywords"
        content="sem desperdício, evitar desperdício de alimentos, redução de desperdício, aproveitamento de alimentos">
    <meta name="author" content="Matheus Teixeira>

    <!-- Metatags para mídias sociais -->
    <meta property=" og:title" content="Sem Desperdício - Evite o Desperdício de Alimentos">
    <meta property="og:description"
        content="Sem Desperdício é uma aplicação simples e intuitiva que tem como objetivo ajudar as pessoas a evitar o desperdício de alimentos em suas casas.">
    <meta property="og:image" content="https://aeusteixeira.github.io/sem-desperdicio/img/sem-desperdicio-banner.jpg">
    <meta property="og:image:alt" content="Sem Desperdício">
    <meta property="og:url" content="https://aeusteixeira.github.io/sem-desperdicio">
    <meta property="og:type" content="website">

    <!-- Metatags dos favicons -->
    <link rel="icon" type="image/png" href="/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#80CC28">
    <meta name="msapplication-TileImage" content="/img/favicon/android-chrome-192x192.png">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body class="bg-color-3">
    <nav class="navbar navbar-expand-lg navbar-dark bg-color-2 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="src/img/favicon/android-chrome-512x512.png" class="d-inline-block align-top" class="img-fluid"
                    alt="Project" width="30" height="30">
                Sem Desperdício
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= isActivePage($currentPage, 'index') ?>">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home"></i>
                            Página inicial
                        </a>
                    </li>
                    <li class="nav-item <?= isActivePage($currentPage, 'sobre') ?>">
                        <a class="nav-link" href="sobre.php">
                            <i class="fas fa-user"></i>
                            Sobre
                        </a>
                    </li>
                    <li class="nav-item <?= isActivePage($currentPage, 'receitas') ?>">
                        <a class="nav-link" href="receitas.php">
                            <i class="fas fa-envelope"></i>
                            Minhas receitas
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>