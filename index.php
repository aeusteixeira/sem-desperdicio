<?php
session_set_cookie_params(86400);

session_start();
    $currentPage = 'index';
    include_once(__DIR__ . '/components/header.php');
    $config = require_once(__DIR__ . '/config/config.php');
    require_once(__DIR__ . '/config/database.php');

    $conn = (new Database(
        $config['DB_HOST'],
        $config['DB_USERNAME'],
        $config['DB_PASSWORD'],
        $config['DB_DATABASE']
    ))->getConnection();
    $totalRecipes = Database::getTotalRecipeCount($conn);
?>

<main class="my-4">
    <section class="container bg-color-6 py-4 px-5 border-radius-2 shadow">
        <header class="text-center">
            <img src="src/img/sem-desperdicio-logo.png" alt="Sem Desperdício" class="img-fluid" width="240">
            <h1 class="text-color-2 h3">
                Reduza o Desperdício de Alimentos com a Ajuda da Inteligência Artificial.
            </h1>
            <p>
                A Organização das Nações Unidas (ONU) estima que 45% de todas as frutas e hortaliças produzidas sejam
                perdidas, enquanto 30% de todo o alimento mundial é desperdiçado¹. Contribua para mudar essa realidade!
            </p>
            <div class="my-3">
                Já ajudamos a criar mais de <span id="totalRecipes" class="text-color-2 font-weight-bold">
                    <?php echo $totalRecipes; ?>
                </span>
                refeições deliciosas e sustentáveis.
            </div>

            <?php include_once(__DIR__ . '/components/video.php'); ?>
        </header>

        <hr>
        <section>
            <form id="form" class="form">
                <div class="form-group">
                    <textarea class="form-control" id="ingredients" rows="5" require></textarea>
                </div>
                <!---
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="mealPlannerSwitch">
                        <label class="custom-control-label" for="mealPlannerSwitch" id="mealPlannerSwitchLabel">
                            Ativar Planejador de Refeições da Semana
                        </label>
                    </div>
                    <small class="form-text text-muted">
                        O planejador de refeições da semana é uma funcionalidade que permite que você gere receitas para a semana inteira de uma só vez com base nos ingredientes que você tem em casa.
                    </small>
                </div>
                --->
                <?php

                // Verifique se a sessão para o contador de solicitações existe
                if (!isset($_SESSION['request_count'])) {
                    $_SESSION['request_count'] = 0; // Inicialize o contador
                }

                // Verifique se o usuário já atingiu o limite de solicitações
                if ($_SESSION['request_count'] >= 3) {
                    // Exiba uma mensagem ou realize qualquer ação desejada quando o limite for atingido
                    echo "
                        <p class='text-danger'>
                            Você já atingiu o limite de 3 solicitações. Aguarde 24 horas para gerar mais receitas.
                        </p>
                    ";
                } else {
                    // Se o usuário não atingiu o limite, renderize o botão
                    echo '
                    <div class="form-group">
                        <button type="submit" class="btn btn-color-2" id="generateRevenue">
                            Gerar receita
                        </button>
                    </div>
                    <hr>
                    <p>
                        <small class="form-text text-muted">
                            <span class="text-danger">*</span> Você gerou <span id="requestCount">' . $_SESSION['request_count'] . '</span> de 3 solicitações. Aguarde 24 horas para gerar mais receitas.
                        </small>
                    ';
                }
                ?>
            </form>
        </section>
        <section id="result" class="mb-2">

        </section>
        <section id="fontes">
            <p class="fonte-titulo">
                Fontes:
            </p>
            <ol class="fonte-lista">
                <li>
                    <a target="_blank"
                        href="https://g1.globo.com/empreendedorismo/noticia/2022/06/16/sustentabilidade-empresas-vendem-alimentos-proprios-para-consumo-mas-com-defeitos-ou-perto-do-vencimento.ghtml"
                        title="Fonte: G1">
                        <span class="link-icon">→</span> ¹ Sustentabilidade: Empresas vendem alimentos próprios para
                        consumo, mas com defeitos ou perto do vencimento (G1)
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.bbc.com/portuguese/internacional-56377418" title="Fonte: BBC">
                        <span class="link-icon">→</span> ² Como os países ricos planejam combater o desperdício de
                        alimentos (BBC)
                    </a>
                </li>
            </ol>
        </section>

        </div>
    </section>
</main>
<?php
    include_once(__DIR__ . '/components/footer.php');
?>