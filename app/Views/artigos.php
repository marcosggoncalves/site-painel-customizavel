<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="site/img/fav.png">
		<!-- Author Meta -->
		<meta name="description" content="<?=$titulo?>">
        <meta name="keywords" content="Soluções Digitais, Tecnologia, Soluções, Marketing Digital, Digital ">
        <meta name="robots" content="index">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title><?=$titulo?></title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="site/css/linearicons.css">
			<link rel="stylesheet" href="site/css/font-awesome.min.css">
			<link rel="stylesheet" href="site/css/jquery.DonutWidget.min.css">
			<link rel="stylesheet" href="site/css/bootstrap.css">
			<link rel="stylesheet" href="site/css/owl.carousel.css">
			<link rel="stylesheet" href="site/css/variable.css">
			<link rel="stylesheet" href="site/css/main.css">
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
				
			<section class="blog-area section-gap" id="artigos">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-50 col-lg-8">
							<div class="title text-center typography">
                                <h3>(<?=count($artigos)?>) - Artigos publicados</h3>
							</div>
						</div>
					</div>					
					<div class="row">
                        <?php foreach($artigos as $artigo): ?>
                            <div class="col-lg-3 col-md-6 single-blog ">
									<a href="artigos/<?=$artigo['slug']?>"><div class="thumb">
									<img class="img-fluid" src="<?=$artigo['img_artigo']?>" alt="">
									
									<h4><?=$artigo['titulo']?></h4>
									<p>
									<?=$artigo['previa_artigo']?>
									</p>	
								</a>	
							</div>							
                    	</div>
                        <?php endforeach?>
                    </div>
                    <?php if(count($artigos) >= 6 ):?>
                        <section class="pagination">
                           <h1 style="font-size:1rem; padding:10px 15px; border:2px solid #ededed; margin-right:10px;"> <?=$pager->links('list'); ?><h1>
                        </section>
                    <?php endif?>
				</div>	
			</section>
		</body>
		<?php include('templates/footerSite.inc.php');?>
	</html>