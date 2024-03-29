<?php
    $currentPage = 'about';
    include_once(__DIR__ . '/components/header.php');
?>
    <main class="my-4">
        <section class="container bg-color-6 py-4 px-5 border-radius-2 shadow">
            <header class="text-center">
                <img src="src/img/sem-desperdicio-logo.png" alt="Sem Desperdício" class="img-fluid" width="240">
                <h1 class="text-color-2 h3">Sobre o Sem Desperdício</h1>
                <?php
                    include_once(__DIR__ . '/components/video.php');
                ?>
            </header>
            <hr>
            <section>
                <p>
                    O Sem Desperdício nasceu da minha paixão pela culinária e da minha luta contra o desperdício de
                    alimentos. Como um entusiasta da cozinha, sempre me incomodou ver ingredientes sendo jogados fora,
                    especialmente aqueles que claramente ainda poderiam ser usados para fazer uma outra refeição.
                </p>
                <p>
                    Foi daí que veio a ideia de criar um site para ajudar as pessoas a aproveitar ao máximo os
                    ingredientes que já têm em casa, evitando o desperdício e economizando dinheiro. Com a ajuda da API
                    da OpenAI, o Sem Desperdício sugere receitas com base nos ingredientes disponíveis utilizando
                    Inteligência Artificial.
                </p>
                <p>
                    O Sem Desperdício é mais do que um simples site. É uma forma de promover a sustentabilidade e a
                    consciência sobre o desperdício de alimentos. Espero que muitas pessoas possam usar essa ferramenta
                    para contribuir na redução do desperdício em suas cozinhas.
                </p>
                <p>
                    Compartilhe suas receitas feitas com ingredientes reaproveitados nas redes sociais usando a hashtag
                    <span class="text-color-2 font-weight-bold">#SemDesperdicio</span>. Juntos, podemos trabalhar por um
                    mundo mais sustentável e mais saboroso!
                </p>
            </section>
            <hr>
            <section class="container mt-4">
                <h2 class="text-center mb-4 text-color-2 h2">Notícias sobre desperdício de alimentos</h2>
                <p>
                    Confira abaixo algumas notícias sobre o desperdício de alimentos e a importância de reduzir o
                    desperdício em nossas casas.
                </p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card mb-4 shadow-sm equal-height-card ">
                            <img src="https://images.ecycle.com.br/wp-content/uploads/2013/01/29150815/1431088ff5bb4f738533c71b0c60ab80.jpeg.webp"
                                alt="eCycle" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="https://www.ecycle.com.br/reaproveitamento-de-alimentos/">17 dicas de
                                        reaproveitamento de alimentos - eCycle</a>
                                </h5>
                                <p class="card-text">Este artigo fornece 17 dicas para reutilizar alimentos e discute a
                                    importância de reduzir o desperdício de alimentos.</p>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="https://images.ecycle.com.br/wp-content/uploads/2021/06/24184242/logo-ecycle-topo-o.png.webp"
                                    alt="eCycle" class="img-fluid mr-3" width="100">
                                <small class="text-muted">Publicado em 29/01/2013</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card mb-4 shadow-sm equal-height-card ">
                            <img src="https://s2-g1.glbimg.com/BbeJ0dkGeymVFEUdZNqnAfaS8ps=/0x0:3840x2160/1008x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2022/6/s/M7AAgERnKIdY2krS1lXA/profrep-443-desperdicio-22022022-bloco1-frame-1265.jpeg"
                                alt="G1" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a
                                        href="https://g1.globo.com/profissao-reporter/noticia/2022/02/24/brasil-desperdica-cerca-de-27-milhoes-de-toneladas-de-alimentos-por-ano-60percent-vem-do-consumo-de-familias.ghtml">Brasil
                                        desperdiça cerca de 27 milhões de toneladas de alimentos por ano - G1</a>
                                </h5>
                                <p class="card-text">Este artigo relata que o Brasil desperdiça cerca de 27 milhões de
                                    toneladas de alimentos por ano, sendo 60% provenientes do consumo doméstico.</p>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="https://th.bing.com/th/id/R.050278096f601744f3b1e636681122e5?rik=V9s8kkQiPIiPKw&pid=ImgRaw&r=0"
                                    alt="Logo G1" class="img-fluid mr-3" width="30">
                                <small class="text-muted">Publicado em 24/02/2022</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <div class="card mb-4 shadow-sm equal-height-card">
                            <img src="https://ichef.bbci.co.uk/news/800/cpsprodpb/F0F1/production/_117518616_gettyimages-1131417684.jpg"
                                alt="BBC" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="https://www.bbc.com/portuguese/internacional-56377418">Os efeitos do
                                        desperdício chocante de alimentos no mundo</a>
                                </h5>
                                <p class="card-text">
                                    Este artigo da BBC News discute a escala chocante do desperdício global de alimentos
                                    e seus impactos no meio ambiente, na sociedade e na economia.
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="https://ichef.bbci.co.uk/news/640/cpsprodpb/9DC6/production/_101909304_bbc_news_tile_rgb.png"
                                    alt="Logo Ministério da Agricultura" class="img-fluid mr-3" width="100">
                                <small class="text-muted">Publicado em 20/03/2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card mb-4 shadow-sm equal-height-card ">
                            <img src="https://cdn.unenvironment.org/s3fs-public/2021-03/Cover_FoodWasteIndex.png?VersionId=null"
                                alt="UNEP" class="card-img-top" style="max-height: 320px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a
                                        href="https://www.unep.org/pt-br/resources/relatorios/indice-de-desperdicio-de-alimentos-2021">Índice
                                        de Desperdício de Alimentos 2021 - UNEP - UN Environment Programme</a>
                                </h5>
                                <p class="card-text">Este relatório do Programa das Nações Unidas para o Meio Ambiente
                                    apresenta dados abrangentes sobre o desperdício global de alimentos e seus impactos,
                                    bem como estratégias para reduzir o desperdício em todos os níveis.</p>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/Unep_logo.png?20210205104803"
                                    alt="Logo UNEP" class="img-fluid mr-3" width="80">
                                <small class="text-muted">Publicado em 04/03/2021</small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

<?php
    include_once(__DIR__ . '/components/footer.php');
?>