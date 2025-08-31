<footer class="footer-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center text-center">
            <a href="/painel" target="_seft" class="genric-btn default small mr-10">Painel Site</a>
            <p class=" footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos direitos reservados - <b>Soluções Digitais</b></p>
        </div>
        <div class="footer-social">
            <?php foreach($redes as $rede):?>
                <a href="<?=$rede['link_social']?>" target="_black"><?=$rede['icone_social']?></a>
            <?php endforeach?>
        </div>
    </div>
</footer>
<script>
    <?php
        echo "document.documentElement.style.setProperty('--fundo-banner', 'url(/".$site['Banner']['img_page'].")');\n" . "document.documentElement.style.setProperty('--fundo-depoimentos', 'url(/".$site['Depoimentos']['img_page'].")');\n" ;

        foreach($config as $prop){
            if (in_array($prop['typeConfig'], ['text', 'oculto', 'color'], true)) {
                echo "document.documentElement.style.setProperty('{$prop["labelConfig"]}', '{$prop["valueConfig"]}');\n" ;
            }
        }
    ?>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="site/js/vendor/bootstrap.min.js"></script>
<script src="site/js/owl.carousel.min.js"></script>     
<script src="site/js/jquery.sticky.js"></script>
<script src="site/js/jquery.magnific-popup.min.js"></script>            
<script src="site/js/main.js"></script> 