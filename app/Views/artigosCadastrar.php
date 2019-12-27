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
                Novo Artigo
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form action="/painel-artigos-cadastrar" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nome"> Titulo:</label>
                                    <input type="nome" class="form-control" id="titulo" name="titulo" placeholder="Titulo Artigo">
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" id="descrição" name="descrição" rows="10" cols="80" placeholder="Descrição serviço"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Imagem Artigo</label>
                                    <input type="file" class="form-control" id="imagem-artigo" name="imagem-artigo">
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Publicar artigo</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Artigos</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th class='text-center'>#</th>
                                    <th class='text-center'>Titulo</th>
                                    <th class='text-center'>Postado</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($artigos as $artigo): ?>
                                <tr>
                                    <td class='text-center'>
                                        <?=date('y')?>
                                            <?=$artigo['id_artigo']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$artigo['titulo']?>
                                    </td>
                                    <td class='text-center'>
                                        <?=$artigo['created']?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$artigo['id_artigo']?>">Excluir</a>
                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$artigo['id_artigo']?>">Editar</a>
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view<?=$artigo['id_artigo']?>">Visualizar</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete<?=$artigo['id_artigo']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="deleteLabel">Atenção ! Artigo será excluido. </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=$artigo['id_artigo']?> - Deseja excluir mesmo ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/painel-artigos" method="post">
                                                            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                                            <input type='submit' class="btn btn-success" value="Sim, estou ciente." />
                                                            <input type='hidden' name="id" value="<?=$artigo['id_artigo']?>" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edit<?=$artigo['id_artigo']?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Editar -
                                                            <?=$artigo['titulo']?>
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/painel-artigos-editar/<?=$artigo['id_artigo']?>" method="post" enctype="multipart/form-data">
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="nome"> Titulo:</label>
                                                                    <input type="text" class="form-control" id="titulo-edit" name="titulo-edit" placeholder="Titulo serviço" value="<?=$artigo['titulo']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Descrição</label>
                                                                    <textarea class="form-control" id="descrição-edit<?=$artigo['id_artigo']?>" name="descrição-edit<?=$artigo['id_artigo']?>" rows="10" cols="80" placeholder="Descrição serviço">
                                                                    <?=$artigo['descricao_artigo']?>
                                                                    </textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Imagem Artigo - apenas edição</label>
                                                                    <input type="file" class="form-control" id="imagem-artigo-edit" name="imagem-artigo-edit"/>

                                                                    <div style="margin-top:2rem;">
                                                                        <div>
                                                                            <span>Imagem Atual:</span>
                                                                        </div>
                                                                        <img src="<?=$artigo['img_artigo']?>" style="width:100%">
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-success">Salvar publicação</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="view<?=$artigo['id_artigo']?>" tabindex="-1" role="dialog" aria-labelledby="viewLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="viewLabel"><b><?=$artigo['titulo']?></b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <img src="<?=$artigo['img_artigo']?>" style="width:100%">
                                                        </div>
                                                        <div style="margin-top:2rem;">
                                                            <p>
                                                                <?=$artigo['descricao_artigo']?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
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
        </section>s
        </div>
        <?php include('templates/footer.inc.php');?>
    </div>
    <?php include('templates/scripts.inc.php');?>
</body>
<?php foreach($artigos as $artigo): ?>
    <script>
        $(function() {
            CKEDITOR.replace('descrição-edit<?=$artigo['id_artigo']?>');
        });
    </script>
<?php endforeach ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="adminLTE/plugins/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function() {
        CKEDITOR.replace('descrição');
        $(".textarea").wysihtml5();
    });
</script>

</html>