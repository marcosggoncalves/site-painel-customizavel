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