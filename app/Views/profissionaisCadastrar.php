<!DOCTYPE html>
<html>

<head>
    <title>
        <?=$titulo?>
    </title>
    <?php include('templates/head.inc.php');?>
    <?php include('templates/scripts.inc.php');?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php include('templates/header.inc.php');?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profissionais - Equipe
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form action="/painel-profissionais-cadastrar" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Imagem:</label>
                                    <input type="file" class="form-control" id="imagem" name="imagem">
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="nome" class="form-control" id="nome" name="nome" placeholder="Nome profissional">
                                </div>
                                <div class="form-group">
                                    <label>Sobre:</label>
                                    <textarea class="form-control" id="sobre" name="sobre" rows="10" cols="80" placeholder="Sobre Profissional"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Cadastrar Profissional</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Profissionais</h3>
                        </div>
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Foto</th>
                                    <th class='text-center'>Nome</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($profissionais as $profissional): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=$profissional['id_profissionais']?>
                                    </td>
                                    <td class='text-center'>
                                        <img src="<?=$profissional['curriculo_profissional']?>" alt="<?=$profissional['nome_profissional']?>" width="60px">
                                    </td>
                                    <td class='text-center'>
                                        <?=$profissional['nome_profissional']?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$profissional['id_profissionais']?>">Excluir</a>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$profissional['id_profissionais']?>">Editar</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete<?=$profissional['id_profissionais']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Profissional será excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$profissional['id_profissionais']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-profissionais" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$profissional['id_profissionais']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edit<?=$profissional['id_profissionais']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$profissional['nome_profissional']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/painel-profissionais-editar/<?=$profissional['id_profissionais']?>" method="post" enctype="multipart/form-data">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label>Imagem:</label>
                                                                    <input type="file" class="form-control" id="imagem-edit" name="imagem-edit">
                                                                </div>
                                                                <div class="form-group">
                                                                    <span><b>Imagem Atual:</b></span>
                                                                    <img src="<?=$profissional['curriculo_profissional']?>" alt="<?=$profissional['sobre_profissional']?>" width="100%">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nome-edit">Nome:</label>
                                                                    <input type="nome" class="form-control" id="nome-edit" name="nome-edit" placeholder="Nome profissional" value="<?=$profissional['nome_profissional']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sobre:</label>
                                                                    <textarea class="form-control" id="sobre-edit" name="sobre-edit" rows="10" cols="80" placeholder="Sobre Profissional"><?=$profissional['sobre_profissional']?></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Salvar Alterações</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
        </div>
        <?php include('templates/footer.inc.php');?>
    </div>
</body>

</html>