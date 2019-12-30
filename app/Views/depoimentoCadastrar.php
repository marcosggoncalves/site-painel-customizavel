<!DOCTYPE html>
<html>

<head>
    <title>
        <?=$titulo?>
    </title>
    <?php include('templates/head.inc.php');?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php include('templates/header.inc.php');?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Novo depoimento
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" action="/painel-depoimentos-cadastrar" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="cliente">Nome cliente:</label>
                                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nome cliente">
                                </div>
                                <div class="form-group">
                                    <label id="descrição">Depoimento</label>
                                    <textarea class="form-control" rows="3" id="descrição" name="descrição" placeholder="Escreva o depoimento"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Salvar Depoimento</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Depoimentos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Cliente</th>
                                    <th class='text-center'>Depoimento</th>
                                    <th class='text-center'>Postado</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($depoimentos as $depoimento): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$depoimento['id_depoimento']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$depoimento['cliente_depoimento']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$depoimento['descricao_depoimento']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$depoimento['created']?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$depoimento['id_depoimento']?>">Excluir</a>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$depoimento['id_depoimento']?>">Editar</a>

                                        <div class="modal fade" id="delete<?=$depoimento['id_depoimento']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Depoimento do cliente será excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$depoimento['id_depoimento']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-depoimentos" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$depoimento['id_depoimento']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="edit<?=$depoimento['id_depoimento']?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$depoimento['cliente_depoimento']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" action="/painel-depoimentos-editar/<?=$depoimento['id_depoimento']?>" method="post">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="cliente-edit">Nome cliente:</label>
                                                                    <input type="text" class="form-control" id="cliente-edit" name="cliente-edit" value="<?=$depoimento['cliente_depoimento']?>" placeholder="Nome cliente">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label id="descrição-edit">Depoimento</label>
                                                                    <textarea class="form-control" rows="3" id="descrição-edit" name="descrição-edit" placeholder="Escreva o depoimento"><?=$depoimento['descricao_depoimento']?></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Salvar alteração</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </table>
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