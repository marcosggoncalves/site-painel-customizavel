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
                Configurações gerais
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <?php include('templates/msg.inc.php');?>
                <div class="col-md-12">
                        <div class="box box-primary">
                            <form role="form" action="/painel-configuracoes-gerais" method="post">
                                <div class="box-body">
                                    <?php foreach($configSite as $config):?>
                                    <?php if($config['labelConfig'] === "--font-size"):?>
                                        <div class="callout callout-warning">
                                            <h4>Atenção!</h4>

                                            <p>Acesse <a  rel="nofollow"  href="https://fonts.google.com/"  target="_blank" ">https://fonts.google.com</a> para escolher a fonte para seu site, copie o nome e cole no campo determinado abaixo.</p>
                                        </div>
                                    <?php endif?>
                                    <?php if($config['labelConfig'] === "--fundo-depoimentos"):?>
                                        <div class="callout callout-warning">
                                            <h4>Atenção !</h4>
                                            <p>Acesse o link <a  rel="nofollow"  href="https://www.pexels.com/"  target="_blank" ">https://www.pexels.com</a> escolha uma imagem, copie o link e cole dentro url(== cole o link da imagem ==) no-repeat center center</p>
                                        </div>
                                    <?php endif?>
                                    <div class="form-group">
                                        <label for="<?=$config['labelConfig']?>"><?=$config['label']?></label>
                                        <input type="<?=$config['typeConfig']?>" class="form-control" id="<?=$config['labelConfig']?>" name="<?=$config['labelConfig']?>" value="<?=$config['valueConfig']?>">
                                    </div>
                                    <?php endforeach?>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i>Salvar configurações</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
        </div>
        <?php include('templates/footer.inc.php');?>
        </div>
        <?php include('templates/scripts.inc.php');?>
</body>

</html>