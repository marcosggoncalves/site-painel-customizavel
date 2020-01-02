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
                Novo serviço
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" action="/painel-servicos-cadastrar" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="titulo"> Titulo:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo serviço">
                                </div>
                                <div class="form-group">
                                    <label for="descrição">Descrição</label>
                                    <textarea class="form-control" rows="3" id="descrição" name="descrição" placeholder="Descrição serviço"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Salvar Serviço</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Serviços</h3>
                        </div>
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Serviço</th>
                                    <th class='text-center'>Descrição</th>
                                    <th class='text-center'>Postado</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($servicos as $servico): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$servico['id_servico']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$servico['titulo_servico']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$servico['descricao_servico']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$servico['created']?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$servico['id_servico']?>">Excluir</a>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$servico['id_servico']?>">Editar</a>

                                        <div class="modal fade" id="delete<?=$servico['id_servico']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Serviço será excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$servico['id_servico']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-servicos" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$servico['id_servico']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="edit<?=$servico['id_servico']?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$servico['titulo_servico']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" action="/painel-servicos-editar/<?=$servico['id_servico']?>" method="post">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="titulo-edit"> Titulo:</label>
                                                                    <input type="text" class="form-control" id="titulo-edit"  name="titulo-edit" placeholder="Titulo serviço" value="<?=$servico['titulo_servico']?>"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descrição">Descrição</label>
                                                                    <textarea class="form-control" id="descrição-edit"  name="descrição-edit" placeholder="Descrição serviço"><?=$servico['descricao_servico']?></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Salvar Alteração</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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