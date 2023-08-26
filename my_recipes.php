<?php
    $currentPage = 'my_recipes';
    include_once(__DIR__ . '/components/header.php');
?>
    <main class="my-4">
    <section class="container bg-color-6 py-4 px-5 border-radius-2 shadow">
    <header class="text-center">
        <img src="src/img/sem-desperdicio-logo.png" alt="Sem Desperdício" class="img-fluid" width="240">
        <h1 class="text-color-2 h3">Minhas receitas</h1>
        <p>
            Aqui estão as receitas que você salvou.
        </p>
    </header>
    <hr>
    <div class="row" id="myRecipes">
    </div>
</section>
</main>

<?php
    include_once(__DIR__ . '/components/footer.php');
?>

<script>
    renderSavedRecipes();
</script>