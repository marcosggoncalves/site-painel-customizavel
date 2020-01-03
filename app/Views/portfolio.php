<!doctype html>
<html>

<head>
    <title><?=$titulo?></title>
    <meta charset="UTF-8">
    <link  rel="stylesheet" type="text/css" href="../siteStyle/css/variaveis.css">
    <link  rel="stylesheet" type="text/css" href="../siteStyle/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=<?=$font?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index">
    <meta name="keywords" content="Portfólio, Soluções, Prado Soluções Digitais">
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
                            <a href="/#artigos">Artigos</a>
                        </li>
                        <li>
                            <a href="/nossa-equipe" >Nossa Equipe</a>
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
                        <img src="../<?=$trabalho['img_portifolio']?>" />
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
    <footer class="footer">
        <div class="container">
            <p>&copy;Site instituicional - desenvolvimento 2019 - <?=date('Y')?> </p>
        </div>
    </footer>
    <script>
        <?php
            foreach($config as $prop){
                if($prop['typeConfig'] === 'color' || $prop['typeConfig'] === 'tamanho' ){
                    echo "document.documentElement.style.setProperty('{$prop["labelConfig"]}', '{$prop["valueConfig"]}');\n" ;
                }
            }
        ?>
    </script>
</body>
</html>