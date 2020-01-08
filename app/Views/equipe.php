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
    <meta name="keywords" content="Nossa equipe, Profissionais, Soluções, Prado Soluções Digitais">
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
                <h1>Nossa Equipe</h1>
            </div>
        </section>
        <section>
            <?php foreach($profissionais as $profissional):?>
            <div class="card-retrato">
                <div class="card-retrato-img" >
                    <img src="<?=base_url($profissional['curriculo_profissional']);?>" />
                </div>
                <div class="content">
                    <div class="card-retrato-titulo">
                        <h1><?=$profissional['nome_profissional']?></h1>
                    </div>
                    <div class="card-retrato-corpo">
                        <p><?=$profissional['sobre_profissional']?></p>
                    </div>
                    <div class="btn-portfolio">
                        <a  rel="nofollow"  href="/portfolio/<?=url_title($profissional['nome_profissional'],'-', false);?>">Portfólio >></a>
                    </div>
                </div>
            </div> 
        <?php endforeach;?>
        </section>
    </main>
</body>
<?php include('templates/footerSite.inc.php');?>
</html>