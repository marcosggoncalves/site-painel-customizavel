<!doctype html>
<html>

<head>
    <title><?=$titulo?></title>
    <meta charset="UTF-8">
    <link  rel="stylesheet" type="text/css" href="<?=base_url('siteStyle/css/variaveis.css')?>">
    <link  rel="stylesheet" type="text/css" href="<?=base_url('siteStyle/css/style.css')?>">
    <link href="https://fonts.googleapis.com/css?family=<?=$font?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index">
    <meta name="keywords" content="Portfólio, Soluções, Prado Soluções Digitais">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-layout">
                <?php include('templates/menu.inc.php');?>
                    <nav id="open">
                    <ul>
                        <li>
                            <a  rel="nofollow"  href="/#home">Home</a>
                        </li>
                        <li>
                            <a  rel="nofollow"  href="/#serviços">Serviços</a>
                        </li>
                        <li>
                            <a  rel="nofollow"  href="/#depoimentos">Depoimentos</a>
                        </li>
                        <li>
                            <a  rel="nofollow"  href="/#artigos">Artigos</a>
                        </li>
                        <li>
                            <a  rel="nofollow"  href="/nossa-equipe" >Nossa Equipe</a>
                        </li>
                    </ul>
                </nav>
                <div class="btn-especial">
                    <a  rel="nofollow"  href="/#fale-conosco" >Fale Conosco</a>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
        <section class="portfolio">
            <div>
                <h1>Portfólio: <?=$profissional[0]['nome_profissional']?></h1>
                <p><?=$profissional[0]['sobre_profissional']?></p>
            </div>
          <div>
             <h1>Trabalhos</h1>
          </div>
          <div class="trabalhos">
          <?php foreach($portfolio as $trabalho): ?>
                <div class="card">
                    <div class="card-corpo" >
                        <img src="<?=base_url($trabalho['img_portifolio']);?>" />
                    </div>
                    <div class="card-titulo">
                        <div>
                            <h1><?=$trabalho['titulo_portifolio']?></h1>
                        </div>
                        <div>
                            <p><?=$trabalho['sobre_portifolio']?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
          </div>
        </section>
    </main>
</body>
<?php include('templates/footerSite.inc.php');?>
</html>