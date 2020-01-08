<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?=$titulo?></title>
    <link  rel="stylesheet" type="text/css" href="<?=base_url('siteStyle/css/variaveis.css')?>">
    <link  rel="stylesheet" type="text/css" href="<?=base_url('siteStyle/css/style.css')?>">
    <link href="https://fonts.googleapis.com/css?family=<?=$font?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$artigo[0]['titulo']?>">
    <meta name="keywords" content="Artigos, Soluções, Prado Soluções Digitais">
    <meta name="robots" content="index">
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
                            <a  rel="nofollow"  href="/artigos">Artigos</a>
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
        <section>
            <div class="container-titulo">
                <h1>(<?=count($artigos);?>) - Artigos Publicados</h1>
            </div>
        </section>
        <section class="artigos">
            <?php foreach($artigos as $artigo): ?>
                <div class="card ">
                    <div class="card-corpo" >
                        <img src="<?=base_url($artigo['img_artigo']);?>" />
                    </div>
                    <div class="card-titulo">
                        <h1><?=$artigo['titulo']?></h1>
                    </div>
                    <div class="ler-mais">
                        <a  rel="nofollow"  href="artigos/<?=$artigo['slug']?>" class="ler-mais">Ver mais >></a>
                    </div>
                </div>
            <?php endforeach?>
        </section>
        <?php if(count($artigos) > 6):?>
            <section class="pagination">
                <?=$pager->links('list'); ?>
            </section>
        <?php endif?>
    </main>
</body>
<?php include('templates/footerSite.inc.php');?>
</html>