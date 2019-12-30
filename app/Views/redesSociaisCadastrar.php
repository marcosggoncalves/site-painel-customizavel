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
                Redes sociais
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" action="/painel-rede-social-cadastrar" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="link">Link:</label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Link rede social">
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome rede social">
                                </div>
                                <div class="form-group">
                                    <label for="icone">Icone:</label>
                                    <input type="text" class="form-control" id="icone" name="icone" placeholder="icone rede social exemplo: <i class='fa fa-fw  fa-facebook'></i>" value="<i class='fa fa-fw  ==coloque o nome do icone=='></i>">
                                </div>
                                <div class="callout callout-warning">
                                    <h4>Atenção !</h4>
                                    <p>Acesse o link <a href="https://adminlte.io/themes/AdminLTE/pages/UI/icons.html">https://adminlte.io/themes/AdminLTE/pages/UI/icons.html</a> escolha o icone de sua rede social, copie o nome e cole com tag 'i', exemplo descrito no campo icone.</p>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Salvar Rede Social</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Rede sociais</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Icone</th>
                                    <th class='text-center'>Nome</th>
                                    <th class='text-center'>Link</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($redes as $rede): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=$rede['id_rede_social']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$rede['icone_social']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$rede['nome_social']?>
                                    </td>
                                    <td class='text-center'>
                                        
                                        <a class="btn btn-primary btn-sm" href="<?=$rede['link_social']?>">Acessar</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$rede['id_rede_social']?>">Excluir</a>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$rede['id_rede_social']?>">Editar</a>

                                        <div class="modal fade" id="delete<?=$rede['id_rede_social']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Rede Social excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$rede['id_rede_social']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-rede-social" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$rede['id_rede_social']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="edit<?=$rede['id_rede_social']?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$rede['nome_social']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" action="/painel-rede-social-editar/<?=$rede['id_rede_social']?>" method="post">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="link-edit">Link:</label>
                                                                    <input type="text" class="form-control" id="link-edit" name="link-edit" placeholder="Link rede social" value="<?=$rede['link_social']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nome-edit">Nome:</label>
                                                                    <input type="text" class="form-control" id="nome-edit" name="nome-edit" placeholder="Nome rede social" value="<?=$rede['nome_social']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="icone-edit">Icone:</label>
                                                                    <input type="text" class="form-control" id="icone-edit" name="icone-edit" placeholder="Icone rede social" value="<?=$rede['icone_social']?>">
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