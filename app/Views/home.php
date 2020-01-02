<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?=$titulo?></title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="siteStyle/css/variaveis.css">
    <link rel="stylesheet" type="text/css" href="siteStyle/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$titulo?>">
    <meta name="keywords" content="Prado Soluções Digitais, Tecnologia, Soluções, Marketing Digital, Digital ">
    <meta name="robots" content="index">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-layout">
                <div class="logo">
                    <img src="<?=$site['Cabeçalho']['img_page']?>" alt="<?=$site[0]['desc_page']?>" >
                </div>
                <nav>
                    <ul>
                        <li>
                            <a onclick="rolar('#home')">Home</a>
                        </li>
                        <li>
                            <a onclick="rolar('#serviços')">Serviços</a>
                        </li>
                        <li>
                            <a onclick="rolar('#depoimentos')">Depoimentos</a>
                        </li>
                        <li>
                            <a href="/artigos">Artigos</a>
                        </li>
                        <li>
                            <a href="/painel" target="_seft">Painel</a>
                        </li>
                    </ul>
                </nav>
                <div class="btn-especial">
                    <a onclick="rolar('#fale-conosco')">Fale Conosco</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="banner" id="home">
            <div class="container">
                <div class="banner-container container">
                    <div class="banner-container-img">
                        <img src="<?=$site['Banner']['img_page']?>" alt="Imagem banner container">
                    </div>
                    <div class="banner-container-texto">
                        <div>
                            <?=$site['Banner']['title_page']?>
                        </div>
                        <div>
                            <?=$site['Banner']['desc_page']?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="serviços">
            <div class="container">
                <div>
                    <div class="container-titulo">
                        <?=$site['Serviços']['title_page']?>
                        <?=$site['Serviços']['desc_page']?>
                    </div>
                    <div class="servicos owl-carousel">
                    <?php foreach($servicos as $servico): ?>
                        <div class="card ">
                            <div class="card-titulo">
                                <h1><?=$servico['titulo_servico']?></h1>
                            </div>
                            <div class="card-corpo">
                                <p><?=$servico['descricao_servico']?></p>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>
            </div>
        </section>
        <section id="depoimentos" class="container-variavel">
            <div class="container">
                <div>
                    <div class="container-titulo">
                         <?=$site['Depoimentos']['title_page']?>
                         <?=$site['Depoimentos']['desc_page']?>
                    </div>
                    <div class="depoimentos owl-carousel">
                    <?php foreach($depoimentos as $depoimento): ?>
                        <div class="card ">
                            <div class="card-titulo">
                                <h1><?=$depoimento['cliente_depoimento']?></h1>
                            </div>
                            <div class="card-corpo">
                                <p><?=$depoimento['descricao_depoimento']?></p>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>
            </div>
        </section>
        <section id="artigos">
            <div class="container">
                <div>
                    <div class="container-titulo">
                        <?=$site['Artigos']['title_page']?>
                        <?=$site['Artigos']['desc_page']?>
                    </div>
                    <div class="artigos owl-carousel">
                        <?php foreach($artigos as $artigo): ?>
                            <div class="card ">
                                <div class="card-titulo">
                                    <h1><?=$artigo['titulo']?></h1>
                                </div>
                                <div class="ler-mais">
                                    <a href="artigos/<?=$artigo['slug']?>" class="ler-mais">Ver mais >></a>
                                </div>
                            </div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </section>
        <section id="fale-conosco" class="container-variavel-opcional ">
            <div class="container">
                <div>
                    <div class="container-titulo">
                        <?=$site['Contato']['title_page']?>
                        <?=$site['Contato']['desc_page']?>
                    </div>
                    <div class="fale-conosco">
                      <?php
                        $session = \Config\Services::session();
                        if($session->getFlashdata('save')):
                            if($session->getFlashdata('save')['status'] == true) :?>
                                <div class="success">
                                    <h4><i class="icon fa fa-check"></i> Mensagem enviada !</h4>
                                    <?php
                                        echo $session->getFlashdata('save')['message'];
                                    ?>
                                    <div>
                                        <?php print_r($session->getFlashdata('save')['validate'])?>
                                    </div>
                                </div>
                            <?php else:?>
                            <div class="alert">
                                <h4><i class="icon fa fa-ban"></i> Falha encontrada !</h4>
                                <?php
                                    echo $session->getFlashdata('save')['message'];
                                ?>
                                <div>
                                    <?php print_r($session->getFlashdata('save')['validate'])?>
                                </div>
                            </div>
                            <?php endif ?>
                         <?php endif ?>
                        <form action="/fale-conosco" method="post">
                            <div class="container-input">
                                <input type="text" placeholder="Nome" name="nome">
                            </div>
                            <div class="container-input">
                                <input type="number" placeholder="Telefone" name="telefone">
                            </div>
                            <div class="container-input">
                                <input type="email" placeholder="E-mail" name="email">
                            </div>
                            <div class="container-input">
                                <textarea type='text' placeholder="Escreva sua mensagem" name="mensagem"></textarea>
                            </div>
                            <input type="submit" value="Enviar mensagem">
                        </form>
                    </div>
                </div>
                <div class="container-titulo">
                    <h1>Redes Sociais</h1>
                    <div class="redes-sociais">
                        <ul>
                            <?php foreach($redes as $rede):?>
                                <li><a href="<?=$rede['link_social']?>"><?=$rede['icone_social']?></a></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy;Site instituicional - Desenvolvimento 2019 - <?=date('Y')?> </p>
        </div>
    </footer>
</body>
<script>
    <?php
        foreach($config as $prop){
            if($prop['typeConfig'] === 'color' ||  $prop['typeConfig'] === 'tamanho'){
                echo "document.documentElement.style.setProperty('{$prop["labelConfig"]}', '{$prop["valueConfig"]}');\n" ;
            }
        }
    ?>
</script>
<script src="siteStyle/js/carousel.js"></script>
<script src="siteStyle/js/scroll.js"></script>
</html>