<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="site/img/fav.png">
		<!-- Author Meta -->
		<meta name="description" content="<?=$titulo?>">
        <meta name="keywords" content="Prado Soluções Digitais, Tecnologia, Soluções, Marketing Digital, Digital ">
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
			<header class="default-header" data-widget="tree">			
				<nav class="navbar navbar-expand-lg  navbar-light">
					<ul class="container">
						  <a class="navbar-brand" href="/">
                            <img src="<?=$site['Cabeçalho']['img_page']?>" alt="<?=$site['Banner']['desc_page']?>" >
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>
						  <?php include('templates/menu.inc.php');?>					
					</ul>
				</nav>
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay-bg overlay"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-uppercase">
                            <?=$site['Banner']['title_page']?>
							</h1>
							<div class="pb-20 text-white">
							    <?=$site['Banner']['desc_page']?>
							</div>
						</div>
						<!-- <div class="col-lg-6">
							<img class="img-fluid" src="<?=$site['Banner']['img_page']?>" alt="">
						</div>												 -->
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start service Area -->
			<section class="service-area section-gap" id="servicos">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<div class="mb-10"><?=$site['Serviços']['title_page']?></div>
                                <?=$site['Serviços']['desc_page']?> 
							</div>
						</div>
					</div>						
					<div class="row">
                        <?php foreach($servicos as $servico): ?>
                            <div class="col-lg-4 ">
                                <div class="single-service mt-20">
									<?=$servico['icon_servico']?>
                                    <h4 class="pt-60 pb-20"><?=$servico['titulo_servico']?></h4>
                                    <p><?=$servico['descricao_servico']?></p>
                                </div>
                            </div>	
                        <?php endforeach?>									
					</div>
				</div>	
			</section>

			<section class="team-area pt-200 mb-60" id="equipe">
				<div class="container">	
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-30 col-lg-8">
							<div class="title text-center">
								<div class="mb-10">
                                    <?=$site['Profissionais']['title_page']?>
                                </div>
								<div>   
								<?=$site['Profissionais']['desc_page']?>
                                </div>
							</div>
						</div>	
					</div>			
					<div class="row justify-content-center d-flex align-items-center">
						<?php foreach($profissionais as $profissional):?>
							<div class="col-md-2 single-team">
								<div class="thumb">
									<img class="img-fluid" src="<?=base_url($profissional['curriculo_profissional']);?>" alt="">
									<div class="align-items-center justify-content-center d-flex">
										<a href="/portfolio/<?=$profissional['nome_profissional']?>" class="genric-btn primary">Portfólio</a>
									</div>
								</div>
								<div class="meta-text mt-30 text-center">
									<h4><?=$profissional['nome_profissional']?></h4>								    	
								</div>
							</div>
						<?php endforeach;?>
					</div>
				</div>	
			</section>
			<!-- End team Area -->

			<section class="testimonial-area relative section-gap" id="depoimentos">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-30 col-lg-8">
							<div class="title text-center">
								<div class="mb-10">
                                    <h1 class="text-white"><?=$site['Depoimentos']['title_page']?></h1>
                                </div>
								<div class="text-white">
                                    <?=$site['Depoimentos']['desc_page']?>
                                </div>
							</div>
						</div>
					</div>		
					<div class="row">
						<div class="active-testimonial">
                            <?php foreach($depoimentos as $depoimento): ?>
                                <div class="single-testimonial item d-flex flex-row">
                                    <div class="desc">
                                        <p><?=$depoimento['descricao_depoimento']?></p>
                                        <h4 mt-30><?=$depoimento['cliente_depoimento']?></h4>
                                    </div>
                                </div>
                            <?php endforeach?>						
						</div>					
					</div>
				</div>	
			</section>
			<!-- End testimonial Area -->
			

			<!-- start blog Area -->		
			<section class="blog-area section-gap" id="artigos">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<?=$site['Artigos']['title_page']?>
								<?=$site['Artigos']['desc_page']?>
							</div>
						</div>
					</div>					
					<div class="row">
                        <?php foreach($artigos as $artigo): ?>
                            <div class="col-lg-3 col-md-6 single-blog">
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
				</div>	
			</section>
			<!-- end blog Area -->		

			<!-- start contact Area -->		
			<section class="contact-area section-gap" id="fale-conosco">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-30 col-lg-8">
							<div class="title-contato text-center">
								<div class="mb-10">
                                	<?=$site['Contato']['title_page']?>
                            	</div>
                                 <?=$site['Contato']['desc_page']?>
							</div>
						</div>
					</div>										
					<form class="form-area mt-60" id="myForm" action="/fale-conosco" method="post">
						<div class="row">	
                            <div class="col-lg-6 form-group">

                                <input type="text" placeholder="Nome" name="nome" class="common-input mb-20 form-control">

                                <input type="email" placeholder="E-mail" name="email"  class="common-input mb-20 form-control" >

                                <input type="number" placeholder="Telefone" name="telefone" class="common-input mb-20 form-control">

                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea type='text' class="common-textarea mt-10 form-control" placeholder="Escreva sua mensagem" name="mensagem"></textarea>
                                <button class="primary-btn mt-20">Enviar Mensagem<span class="lnr lnr-arrow-right"></span></button>
                            </div>
                        </div>
						<?php
                            $session = \Config\Services::session();
							
							if($session->getFlashdata('save')){
								echo $session->getFlashdata('save')['message'];
							}
                        ?>
					</form>						
				</div>	
			</section>
		</body>
		<?php include('templates/footerSite.inc.php');?>
	</html>