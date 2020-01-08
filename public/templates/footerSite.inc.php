<footer class="footer">
    <div class="container">
        <p>&copy;Site instituicional - desenvolvimento 2019 - <?=date('Y')?> </p>
    </div>
</footer>
<script>
    <?php
        foreach($config as $prop){
            if($prop['typeConfig'] === 'color' || $prop['typeConfig'] === 'tamanho' ){
                echo "document.documentElement.style.setProperty('{$prop["labelConfig"]}', '{$prop["valueConfig"]}');\n" ;
            }
        }
    ?>
</script>