<?php
    $currentPage = 'receitas';
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
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card recipe-card">
                <img src="src/img/sem-desperdicio-banner.jpg" class="card-img-top" alt="Nome da Receita">
                <div class="card-body">
                    <h5 class="card-title">Nome da Receita</h5>
                    <p class="card-text">Descrição breve da receita...</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <button class="btn btn-danger">Excluir</button>
                    <button class="btn btn-primary">Imprimir</button>
                </div>
            </div>
        </div>
        
        <!-- Repita os blocos .col-lg-4 para cada receita -->
    </div>
</section>


    </main>

<?php
    include_once(__DIR__ . '/components/footer.php');
?>