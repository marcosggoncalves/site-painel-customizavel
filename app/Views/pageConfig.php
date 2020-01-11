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
                    <div class="col-md-12">
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Instruções configurações gerais</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="callout callout-warning">
                                    <p>
                                        Essa sessão foi criada com objetivo para alterar opções gráficas do site e inregrações com outras ferramentas. Em relações a opções gráficas, mantenha as proporções e combinações de cores, logo abaixo, disponibilizarei artigo sobre esse assunto.</p>
                                    <ul>
                                        <span><b>Opções gráficas</b></span>
                                        <li>Cor principal do site</li>
                                        <li>Tamanho da logo tipo de site</li>
                                        <li>Cor do dos containers do site</li>
                                    </ul>
                                    <ul>
                                        <span><b>Outras configurações</b></span>
                                        <li>Email de contato</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

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