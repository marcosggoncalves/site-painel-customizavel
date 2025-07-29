<?php
    $usuarioLogado = $session->get('login')['user'][0]['usuario'];
?>
<div class="wrapper">
    <header class="main-header">
        <a href="/painel" class="logo">
            <span class="logo-mini"><b>P</b>S</span>
            <span class="logo-xs"><b>Painel</b>Site</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar collapsed">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                <li class="active"><a ><i class="fa fa-user"></i> <span>Logado : <?=$usuarioLogado?></span></a></li>
                <li><a href="/painel"><i class="fa fa-tachometer"></i> <span>Painel Administrativo</span></a></li>
                <li><a href="/painel-configuracoes-gerais"><i class="fa fa-television"></i> <span>Configurações Gerais</span></a></li>
                <li class="treeview" data-widget="tree"
>
                    <a >
                        <i class="fa fa-file"></i> <span>Páginas - Container</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/personalizar?page=Cabeçalho"><i class="fa fa-circle-o"></i>Logo</a></li>
                        <li><a href="/personalizar?page=Banner"><i class="fa fa-circle-o"></i>Banner principal</a></li>
                        <li><a href="/personalizar?page=Depoimentos"><i class="fa fa-circle-o"></i>Depoimentos</a></li>
                        <li><a href="/personalizar?page=Serviços"><i class="fa fa-circle-o"></i>Serviços</a></li>
                        <li><a href="/personalizar?page=profissionais"><i class="fa fa-circle-o"></i>Profissionais</a></li>
                        <li><a href="/personalizar?page=Artigos"><i class="fa fa-circle-o"></i>Artigos</a></li>
                        <li><a href="/personalizar?page=Contato"><i class="fa fa-circle-o"></i>Fale Conosco</a></li>
                    </ul>
                </li>
                <li><a href="/painel-portfolios"><i class="fa  fa-suitcase"></i> <span>Portfólios - Trabalhos</span></a></li>
                <li><a href="/painel-profissionais"><i class="fa fa-child"></i> <span>Profissionais - Equipe</span></a></li>
                <li><a href="/" target="_Seft"><i class="fa fa-home"></i> <span>Visualizar Site</span></a></li>
                <li><a href="/painel-usuarios"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
                <li><a href="/painel-depoimentos"><i class="fa  fa-eye"></i> <span>Depoimentos</span></a></li>
                <li><a href="/painel-servicos"><i class="fa fa-wrench"></i> <span>Serviços</span></a></li>
                <li><a href="/painel-artigos"><i class="fa fa-book"></i> <span>Artigos</span></a></li>
                <li><a href="/painel-rede-social"><i class="fa  fa-commenting-o"></i> <span>Redes Sociais</span></a></li>
                <li class="bg-red color-palette text-white"><a href="/encerrar-painel"><i class="fa fa-close"></i> <span>Encerrar Sessão</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>