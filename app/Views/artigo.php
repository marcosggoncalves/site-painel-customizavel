<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <meta name="description" content="<?=$artigo[0]['previa_artigo']?>">
    <meta name="robots" content="index">
    <meta name="author" content="<?=$artigo[0]['autor_artigo']?>">
    <meta name="keywords" content="<?=$artigo[0]['palavras_chaves_artigos']?>">
    <title>
        <?=$titulo?>
    </title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="../site/css/linearicons.css">
    <link rel="stylesheet" href="../site/css/font-awesome.min.css">
    <link rel="stylesheet" href="../site/css/jquery.DonutWidget.min.css">
    <link rel="stylesheet" href="../site/css/bootstrap.css">
    <link rel="stylesheet" href="../site/css/owl.carousel.css">
    <link rel="stylesheet" href="../site/css/variable.css">
    <link rel="stylesheet" href="../site/css/main.css">
</head>

<body>

    <!-- Start Header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg  navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                            <img src="<?=$site['Cabeçalho']['img_page']?>" alt="<?=$site[0]['desc_page']?>" >
						  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

                <?php include('templates/menu.inc.php');?>
            </div>
        </nav>
    </header>
    <div class="main-wrapper">

        <!-- Start team Area -->

        <!-- Start Generic Area -->
        <article class="about-generic-area section-gap">
            <div class="container border-top-generic">
                <h3 class="about-title mb-30">
                    <?=$artigo[0]['titulo']?>
                </h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="img-text">
                            <img src="../<?=$artigo[0]['img_artigo']?>" alt="<?=$artigo[0]['palavras_chaves_artigos']?>" class="img-fluid float-left mr-20 mb-20" width="100%">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <blockquote class="generic-blockquote">
                            <p><em><b>Publicado em: <?= date_format(date_create($artigo[0]['created']),"d/m/Y H:i:s")?><br><?=$artigo[0]['autor_artigo']?><br> Palavras Chaves:<?=$artigo[0]['palavras_chaves_artigos']?></b></em></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-12">
                        <?=($artigo[0]["publicacao_artigo"])?>
                    </div>
                </div>
            </div>
        </article>
</body>
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Todos direitos reservados - <b>Prado Soluções Digitais</b></p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <?php foreach($redes as $rede):?>
                <a href="<?=$rede['link_social']?>" target="_black">
                    <?=$rede['icone_social']?>
                </a>
                <?php endforeach?>
            </div>
        </div>
    </div>
</footer>
<script>
    <?php
			foreach($config as $prop){
				if($prop['typeConfig'] === 'text' || $prop['typeConfig'] === 'tamanho' ){
					echo "document.documentElement.style.setProperty('{$prop["labelConfig"]}', '{$prop["valueConfig"]}');\n" ;
				}
			}
		?>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../site/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../site/js/vendor/bootstrap.min.js"></script>
<script src="../site/js/owl.carousel.min.js"></script>
<script src="../site/js/jquery.sticky.js"></script>
<script src="../site/js/jquery.magnific-popup.min.js"></script>
<script src="../site/js/main.js"></script>

</html>