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
                Portfólios - Trabalhos
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form action="/painel-portfolios-cadastrar" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Imagem:</label>
                                    <input type="file" class="form-control" id="imagem" name="imagem">
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Titulo:</label>
                                    <input type="titulo" class="form-control" id="titulo" name="titulo" placeholder="Titulo do trabalho">
                                </div>
                                <div class="form-group">
                                    <label>Sobre:</label>
                                    <textarea class="form-control"  id="sobre" name="sobre" rows="10" cols="80" placeholder="Sobre o trabalho"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Profissional:</label>
                                    <select name="profissional"  class="form-control">
                                        <?php foreach($profissionais as $profissional):?>
                                            <option value="<?=$profissional['id_profissionais']?>"><?=$profissional['nome_profissional']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Cadastrar Trabalho</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Trabalhos</h3>
                        </div>
                        <div class="box-body  table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Foto</th>
                                    <th class='text-center'>Titulo</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($portfolios as $portfolio): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=$portfolio['id_portifolio']?>
                                    </td>
                                    <td class='text-center'>
                                        <img src="<?=$portfolio['img_portifolio']?>" alt="<?=$portfolio['titulo_portifolio']?>" width="60px">
                                    </td>
                                    <td class='text-center'>
                                        <?=$portfolio['titulo_portifolio']?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$portfolio['id_portifolio']?>">Excluir</a>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$portfolio['id_portifolio']?>">Editar</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete<?=$portfolio['id_portifolio']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Trabalho do portfólio será excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$portfolio['id_portifolio']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-portfolios" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$portfolio['id_portifolio']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edit<?=$portfolio['id_portifolio']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$portfolio['titulo_portifolio']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/painel-portfolios-editar/<?=$portfolio['id_portifolio']?>" method="post" enctype="multipart/form-data">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label>Imagem:</label>
                                                                    <input type="file" class="form-control" id="imagem-edit" name="imagem-edit">
                                                                </div>
                                                                <div class="form-group">
                                                                    <span><b>Imagem Atual:</b></span>
                                                                    <img src="<?=$portfolio['img_portifolio']?>" alt="<?=$portfolio['titulo_portifolio']?>" width="100%">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="titulo-edit">titulo:</label>
                                                                    <input type="nome" class="form-control" id="titulo-edit" name="titulo-edit" placeholder="titulo trabalho" value="<?=$portfolio['titulo_portifolio']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sobre:</label>
                                                                    <textarea class="form-control" id="sobre-edit" name="sobre-edit" rows="10" cols="80" placeholder="Sobre Profissional"><?=$portfolio['sobre_portifolio']?></textarea>
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