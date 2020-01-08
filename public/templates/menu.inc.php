<div class="menu-header">
    <div class="logo">
        <img src="<?=$site['Cabeçalho']['img_page']?>" alt="<?=$site[0]['desc_page']?>">
    </div>
    <div class="menu">
        <img src="<?=base_url('img/menu.png')?>" id="menu">
    </div>
</div>

<script>
    let open = ()=>{
        document.querySelector("#open").style.display = "block";
    }
    let close = ()=>{
        document.querySelector("#open").style.display = "none";
    }

    document.querySelector('#menu').onclick = () => {
        if(document.querySelector("#open").style.display != "block"){
            open();  
        }else{
            close();
        }
    };
</script>