

<div class="header-logo container-fluid">
    <img src="<?php echo IMGS?>png/logo-novo.png" alt="Imagem">
</div>

<nav class="header-container">
    <ul class="header-ul-menu container-fluid">
        <li class="header-icon"><a> <img src="<?php echo IMGS?>png/casa.png" alt=""></a></li>
        <li class="header-menu"><a class="text-a" href="." id="pag">Home</a></li>

        <li class="header-icon"><a> <img src="<?php echo IMGS?>png/novo.png" alt=""></a></li>
        <li class="header-menu"><a class="text-a" href="#" id="pag">New</a></li>
        <li class="header-icon"><a> <img src="<?php echo IMGS?>png/grafico-button.png" alt=""></a></li>
        <li class="header-menu"><a class="text-a" href="#" id="pag">Estatistica</a></li>

        <li class="header-icon"><a> <img src="<?php echo IMGS?>png/sobre.png" alt=""></a></li>
        <li class="header-menu"><a class="text-a" href="#" id="pag">Sobre</a></li>

            <!--BOTÃO MENU-->
        <?php 
            require showNavForMenu()
        ?>
       
    </ul>
</nav>

    <div id="conteudo"></div>



