<footer class="footer-area section-gap">
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos direitos reservados - <b>Prado Soluções Digitais</b></p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <?php foreach($redes as $rede):?>
                    <a href="<?=$rede['link_social']?>" target="_black"><?=$rede['icone_social']?></a>
                <?php endforeach?>
            </div>
        </div>
    </div>
</footer>
<script>
    <?php
        foreach($config as $prop){
            if($prop['typeConfig'] === 'text' || $prop['typeConfig'] === 'tamanho' ){
                echo "document.documentElement.style.setProperty('{$prop["labelConfig"]}', '{$prop["valueConfig"]}');\n" ;
            }
        }
    ?>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="site/js/vendor/jquery-2.2.4.min.js"></script>
<script src="site/js/vendor/bootstrap.min.js"></script>
<script src="site/js/owl.carousel.min.js"></script>     
<script src="site/js/jquery.sticky.js"></script>
<script src="site/js/jquery.magnific-popup.min.js"></script>            
<script src="site/js/main.js"></script> 