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
                Novo Usuário
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" action="/painel-usuarios-cadastrar" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="usuario">Nome:</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome usuário">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email usuário">
                                </div>
                                <div class="form-group">
                                    <label for="setor">Setor:</label>
                                    <input type="text" class="form-control" id="setor" name="setor" placeholder="Setor usuário">
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha usuário">
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Salvar Usuário</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Usuários</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Usuário</th>
                                    <th class='text-center'>Email</th>
                                    <th class='text-center'>Setor</th>
                                    <th class='text-center'>Postado</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($usuarios as $usuario): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$usuario['id_usuario']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$usuario['usuario']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$usuario['email']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$usuario['setor']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$usuario['created']?>
                                    </td>
                                    <td>
                                        <a  rel="nofollow"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$usuario['id_usuario']?>">Excluir</a>
                                        <a  rel="nofollow"  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$usuario['id_usuario']?>">Editar</a>

                                        <div class="modal fade" id="delete<?=$usuario['id_usuario']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Usuário excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$usuario['id_usuario']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-usuarios" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$usuario['id_usuario']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="edit<?=$usuario['id_usuario']?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$usuario['usuario']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" action="/painel-usuarios-editar/<?=$usuario['id_usuario']?>" method="post">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="usuario-edit">Nome:</label>
                                                                    <input type="text" class="form-control" id="usuario-edit" name="usuario-edit" placeholder="Nome usuário" value="<?=$usuario['usuario']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email-edit">Email:</label>
                                                                    <input type="text" class="form-control" id="email-edit" name="email-edit" placeholder="Email usuário" value="<?=$usuario['email']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="setor-edit">Setor:</label>
                                                                    <input type="text" class="form-control" id="setor-edit" name="setor-edit" placeholder="Setor usuário" value="<?=$usuario['setor']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="senha-edit">Senha:</label>
                                                                    <input type="password" class="form-control" id="senha-edit" name="senha-edit" placeholder="Senha usuário">
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