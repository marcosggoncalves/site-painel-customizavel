<!DOCTYPE html>
<html>
<head>
    <title>
        <?=$titulo?>
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('templates/head.inc.php');?>
    <style>
        html,
        body{
            background:#1A628A;
        }
        .login-page{
            background:unset;
        }
        .login-logo a{
            color:#ffff;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/painel"><b>Painel</b>Site</a>
        </div>
        <div class="login-box-body ">
            <p class="login-box-msg">Para acessar realize o login</p>
            <form action="/entrar" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email usuário">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha usuário">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="/">Voltar para site</a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-fw fa-check"></i>Entrar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <?php include('templates/msg.inc.php');?>
        </div>
        <!-- /.login-box-body -->
    </div>
</body>
</html>