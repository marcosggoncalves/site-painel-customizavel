<!doctype html>
<html>

<head>
    <title><?=$titulo?></title>
    <link  rel="stylesheet" type="text/css" href="../siteStyle/css/variaveis.css">
    <link  rel="stylesheet" type="text/css" href="../siteStyle/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$artigo[0]['titulo']?>">
    <meta name="keywords" content="<?=$artigo[0]['titulo']?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-layout">
                <div class="logo">
                   <img src="<?=$site['Cabeçalho']['img_page']?>" alt="<?=$site[0]['desc_page']?>">
                </div>
                <nav>
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
                            <a href="/artigos">Artigos</a>
                        </li>
                    </ul>
                </nav>
                <div class="btn-especial">
                    <a href="/#fale-conosco" >Fale Conosco</a>
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
                    <div class="card-titulo">
                        <h1><?=$artigo['titulo']?></h1>
                    </div>
                    <div class="card-corpo" >
                        <img src="<?=$artigo['img_artigo']?>" />
                    </div>
                    <div class="ler-mais">
                        <a href="artigo/<?=$artigo['id_artigo']?>" class="ler-mais">Ver mais >></a>
                    </div>
                </div>
            <?php endforeach?>
        </section>
        <section class="pagination">
            <?=$pager->links('list'); ?>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy;Site instituicional - desenvolvimento 2019 - <?=date('Y')?> </p>
        </div>
    </footer>
</body>
</html>