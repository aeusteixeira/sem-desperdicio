<?php
    $currentPage = 'index';
    include_once(__DIR__ . '/components/header.php');
?>
<main class="my-4">
    <section class="container bg-color-6 py-4 px-5 border-radius-2 shadow">
        <header class="text-center">
            <img src="src/img/sem-desperdicio-logo.png" alt="Sem Desperdício" class="img-fluid" width="240">
            <h1 class="text-color-2 h3">
                Evite o desperdício de alimentos em sua casa utilizando Inteligência Artificial.
            </h1>
            <p>
                De acordo com a ONU, 45% de todas as frutas e hortaliças que nascem são perdidos e 30% de todo o
                alimento do mundo são desperdiçados¹. Estima-se que 17% dos alimentos disponíveis no mundo acabam sendo
                jogados fora²
            </p>
            <?php
                include_once(__DIR__ . '/components/video.php');
            ?>
        </header>
        <hr>
        <section>
            <form id="form" class="form">
                <div class="form-group">
                    <textarea class="form-control" id="ingredients" rows="5" require></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-color-2" id="generateRevenue">
                        Gerar receita
                    </button>
                </div>
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