

<nav class="nav-bar container-fluid">
   
    <div class="header-logo">
        <img class="menu-logo"src="<?php echo IMGS?>png/logo-novo.png" alt="Imagem">
        <img class="menu-button" src="<?php echo IMGS?>png/button-menu.png" alt="menu">
    </div>

    
    <div class="nav-list">
        <ul>
            <li class="nav-item"><a  class="nav-link" href="."><img src="<?php echo IMGS?>png/casa.png" alt="LOGO"> Home</a></li>
            <li class="nav-item"><a  class="nav-link" href="#"><img src="<?php echo IMGS?>png/novo.png" alt="LOGO"> New</a></li>
            <li class="nav-item"><a  class="nav-link" href="#"><img src="<?php echo IMGS?>png/grafico-button.png" alt="LOGO"> Estatisticas</a></li>
            <li class="nav-item"><a  class="nav-link" href="#"><img src="<?php echo IMGS?>png/sobre.png" alt="LOGO"> Sobre</a></li>
        </ul>
        <?php require showNavForMenu()?>
    </div>
</nav>

<div class="mobile-menu">    
    <?php require showNavForMenu()?>
    <div class= "mobile-nav-list">
        <ul>
            <li class="nav-item"><a  class="nav-link" href="."><img src="<?php echo IMGS?>png/casa.png" alt="LOGO"> Home</a></li>
            <li class="nav-item"><a  class="nav-link" href="#"><img src="<?php echo IMGS?>png/novo.png" alt="LOGO"> New</a></li>
            <li class="nav-item"><a  class="nav-link" href="#"><img src="<?php echo IMGS?>png/grafico-button.png" alt="LOGO"> Estatisticas</a></li>
            <li class="nav-item"><a  class="nav-link" href="#"><img src="<?php echo IMGS?>png/sobre.png" alt="LOGO"> Sobre</a></li>
        </ul>
    </div>
</div>


