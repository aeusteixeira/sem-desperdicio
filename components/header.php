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
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3WWVTSRZD0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3WWVTSRZD0');
</script>
<script async src="https://fundingchoicesmessages.google.com/i/pub-9977411139806346?ers=1" nonce="MOLigFUFdv3AK8TSva9WcQ"></script><script nonce="MOLigFUFdv3AK8TSva9WcQ">(function() {function signalGooglefcPresent() {if (!window.frames['googlefcPresent']) {if (document.body) {const iframe = document.createElement('iframe'); iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;'; iframe.style.display = 'none'; iframe.name = 'googlefcPresent'; document.body.appendChild(iframe);} else {setTimeout(signalGooglefcPresent, 0);}}}signalGooglefcPresent();})();</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $currentPage === 'index' ? 'Sem Desperdício - Evite o Desperdício de Alimentos' : '' ?>
        <?= $currentPage === 'about' ? 'Sem Desperdício - Sobre' : '' ?>
        <?= $currentPage === 'my_recipes' ? 'Sem Desperdício - Minhas Receitas' : '' ?>
        <?= $currentPage === 'terms_of_use' ? 'Sem Desperdício - Termos de Uso' : '' ?>
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
    <meta property="og:image" content="src/img/sem-desperdicio-banner.jpg">
    <meta property="og:image:alt" content="Sem Desperdício">
    <meta property="og:url" content="https://semdesperdicio.eco.br">
    <meta property="og:type" content="website">

    <!-- Metatags dos favicons -->
    <link rel="icon" type="image/png" href="src/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="src/img/favicon/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href=src/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#80CC28">
    <meta name="msapplication-TileImage" content="src/img/favicon/android-chrome-192x192.png">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9977411139806346"
     crossorigin="anonymous"></script>
    </head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-color-2 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="src/img/favicon/android-chrome-512x512.png" class="d-inline-block align-top" class="img-fluid"
                    alt="Sem Desperdício" title="Sem Desperdício" width="30" height="30">
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
                    <li class="nav-item <?= isActivePage($currentPage, 'about') ?>">
                        <a class="nav-link" href="about.php">
                            <i class="fas fa-user"></i>
                            Sobre
                        </a>
                    </li>
                    <li class="nav-item <?= isActivePage($currentPage, 'my_recipes') ?>">
                        <a class="nav-link" href="my_recipes.php">
                            <i class="fas fa-book"></i>
                            <span class="badge badge-pill badge-color-1" id="savedRecipesCount">
                                <script>
                                    localStorage.getItem('recipes') ? savedRecipesCount.innerText = JSON.parse(localStorage.getItem('recipes')).length : savedRecipesCount.innerText = 0;
                                </script>
                            </span>
                            Minhas receitas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>