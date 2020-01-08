<!doctype html>
<html>

<head>
    <title><?=$titulo?></title>
    <meta charset="UTF-8">
    <link  rel="stylesheet" type="text/css" href="<?=base_url('siteStyle/css/variaveis.css')?>">
    <link  rel="stylesheet" type="text/css" href="<?=base_url('siteStyle/css/style.css')?>">
    <link href="https://fonts.googleapis.com/css?family=<?=$font?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$artigo[0]['previa_artigo']?>">
    <meta name="robots" content="index">
    <meta name="author" content="<?=$artigo[0]['autor_artigo']?>">
    <meta name="keywords" content="<?=$artigo[0]['palavras_chaves_artigos']?>">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-layout">
                <?php include('templates/menu.inc.php');?>
                    <nav id="open">
                    <ul>
                        <li>
                            <a href="/#home">Home</a>
                        </li>
                        <li>
                            <a href="/#serviços">Serviços</a>
                        </li>
                        <li>
                            <a href="/#depoimentos">Depoimentos</a>
                        </li>
                        <li>
                            <a  rel="nofollow"  href="/artigos">Artigos</a>
                        </li>
                        <li>
                            <a  rel="nofollow"  href="/nossa-equipe" >Nossa Equipe</a>
                        </li>
                    </ul>
                </nav>
                <div class="btn-especial">
                    <a href="/#fale-conosco" >Fale Conosco</a>
                </div>
            </div>
        </div>
    </header>
    <main class="postagem">
        <article class='postagem-artigo container'>
            <div class="titulo-postagem">
             <h1><?=$artigo[0]['titulo']?></h1>
          </div>
          <div class="postagem-created">
            <p><b>Publicado em: </b> <?= date_format(date_create($artigo[0]['created']),"d/m/Y H:i:s")?></p>
            <p><b><?=$artigo[0]['autor_artigo']?> </b></p>
            <p><b>Palavras Chaves: </b><?=$artigo[0]['palavras_chaves_artigos']?></p>
        </div>
          <div class="desc-postagem">
            <figure>
                <img src="<?=base_url($artigo[0]['img_artigo'])?>" alt="<?=$artigo[0]['palavras_chaves_artigos']?>">
            </figure>
            <?=$artigo[0]['publicacao_artigo']?>
          </div>
        </article>
    </main>
</body>
<?php include('templates/footerSite.inc.php');?>
</html>