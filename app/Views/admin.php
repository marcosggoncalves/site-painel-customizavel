<!DOCTYPE html>

<html>

<head>
    <title><?=$titulo?></title>
    <?php include('templates/head.inc.php');?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php include('templates/header.inc.php');?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Painel Geral
                <small>Informações gerais</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?=count($usuarios)?></h3>
                            <p>Usuários</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="/painel-usuarios" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?=count($servicos)?></h3>
                            <p>Serviços</p>
                        </div>
                        <div class="icon">
                        <i class="fa  fa-briefcase"></i>
                        </div>
                        <a href="/painel-servicos" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?=count($artigos)?></h3>
                            <p>Artigos</p>
                        </div>
                        <div class="icon">
                        <i class="ion-ios-albums"></i>
                        </div>
                        <a href="/painel-artigos" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?=count($depoimentos)?></h3>
                            <p>Depoimentos</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-commenting-o"></i>
                        </div>
                        <a href="/painel-depoimentos" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Depoimentos Recentes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th  class="text-center">#</th>
                                    <th  class="text-center">Cliente</th>
                                    <th  class="text-center">Postado</th>
                                </tr>
                                <?php foreach(array_slice($depoimentos, 0, 5) as $depoimento): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$depoimento['id_depoimento']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$depoimento['cliente_depoimento']?>
                                    </td>
                                    <td class='text-center'>
                                       <a class="btn btn-primary btn-sm"> <?=$depoimento['created']?></a>
                                    </td>
                                <?php endforeach?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Serviços Recentes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Serviço</th>
                                    <th class="text-center">Postado</th>
                                </tr>
                                <?php foreach(array_slice($servicos, 0, 5) as $servico): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$servico['id_servico']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$servico['titulo_servico']?>
                                    </td>
                                    <td class='text-center'>
                                    <a class="btn btn-primary btn-sm"> <?=$servico['created']?></a>
                                    </td>
                                <?php endforeach?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Artigos Recentes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Titulo</th>
                                    <th class='text-center'>Postado</th>
                                </tr>
                                <?php foreach(array_slice($artigos, 0, 5) as $artigo): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$artigo['id_artigo']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$artigo['titulo']?>
                                    </td>
                                    <td class='text-center'>
                                        <a class="btn btn-primary btn-sm"> <?=$artigo['created']?></a>
                                    </td>
                                <?php endforeach?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <?php include('templates/footer.inc.php');?>
    </div>
    <?php include('templates/scripts.inc.php');?>
</body>

</html>