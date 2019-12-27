<?php if($session->getFlashdata('save')):?>
    <?php if($session->getFlashdata('save')['status'] != 1):?>
    <div class="col-md-12">
        <div class="alert alert-danger">
            <h4><i class="icon fa fa-ban"></i>Falha encontrada !</h4>
               <?=$session->getFlashdata('save')['message']?>
            <div>
                <?php print_r($session->getFlashdata('save')['validate'])?>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="col-md-12">
        <div class="alert alert-success">
            <h4><i class="icon fa fa-check"></i> Realizado !</h4>
            <?=$session->getFlashdata('save')['message']?>
        </div>
    </div>
    <?php endif ?>
<?php endif ?>