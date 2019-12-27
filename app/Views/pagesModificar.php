<!DOCTYPE html>
<html>

<head>
    <title>
        <?=$titulo?>
    </title>
    <?php include('templates/head.inc.php');?>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php include('templates/header.inc.php');?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Editar página <?=$pageInputs[0]['page']?>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" action="/personalizar/<?=$pageInputs[0]['id_page']?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <?php foreach($pageInputs as $page):?>
                                    <?php if($page['is_img_page'] == 'true' ): ?>
                                        <?php if($page['page'] != 'Cabeçalho' ): ?>
                                            <div class="form-group">
                                                <label>Titulo Container : </label>
                                                <textarea class="form-control" id="title_page" name="title_page" rows="10" cols="80" placeholder="Titulo container"> <?=$page['title_page']?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Descrição container : </label>
                                                <textarea class="form-control" id="desc_page" name="desc_page" rows="10" cols="80" placeholder="Descrição container"> <?=$page['desc_page']?></textarea>
                                            </div>
                                        <?php endif?>
                                        <div class="form-group">
                                            <label>Imagem - apenas edição</label>
                                            <input type="file" class="form-control" id="img_page" name="img_page" />
                                            <input type="hidden" class="form-control" id="img_antiga" name="img_antiga"  value="<?=$page['img_page']?>" />
                                            <div style="margin-top:2rem;">
                                                <div>
                                                    <span>Imagem Atual:</span>
                                                </div>
                                                <img src="<?=$page['img_page']?>" style="width:100%">
                                        </div>
                                    </div>
                                    <?php else :?>
                                        <div class="form-group">
                                            <label>Titulo container : </label>
                                            <textarea class="form-control" id="title_page" name="title_page" rows="10" cols="80" placeholder="Titulo container"> <?=$page['title_page']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição container : </label>
                                            <textarea class="form-control" id="desc_page" name="desc_page" rows="10" cols="80" placeholder="Descrição container"> <?=$page['desc_page']?></textarea>
                                        </div>
                                     <?php endif?>
                                <?php endforeach?>
                                <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Atualizar página</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include('templates/footer.inc.php');?>
    </div>
    <?php include('templates/scripts.inc.php');?>
</body>
<script src="adminLTE/plugins/bootstrap3-wysihtml5.all.min.js"></script>
<script>
    $(function() {
        CKEDITOR.replace('desc_page');
        CKEDITOR.replace('title_page');
        $(".textarea").wysihtml5();
    });
</script>

</html>