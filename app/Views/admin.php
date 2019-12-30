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
            <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-ios-people"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usuários</span>
                            <span class="info-box-number"><?=count($usuarios)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-wrench"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Serviços</span>
                            <span class="info-box-number"><?=count($servicos)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion-ios-albums"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Artigos</span>
                            <span class="info-box-number"><?=count($artigos)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion-ios-people"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Depoimentos</span>
                            <span class="info-box-number"><?=count($depoimentos)?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
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