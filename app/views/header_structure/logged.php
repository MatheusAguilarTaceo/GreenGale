<style>
    /* Estilos para o menu */
/* .container-dropdown {
    list-style-type: none;
    float: right;
    margin: 0;
    padding: 0;
    margin-top: -27 px;
    cursor: pointer;
    
}

.acount img{

    width: 20px;
    text-align: center;
    margin-top: 15px;
    
}

.acount1 img{

    width: 7px;
}

.acount , .dropdown-menu{


    display: inline-block;
    margin-top: -3px;
}

.dropdown {
    
    align-items: center;
    display: inline-block;
    margin-right: 31px;
    
} 
.dropdown-menu{

    text-align: center;
    
    
}

.dropdown-menu {
    text-decoration: none;
    text-align: center;
    color: #f7f3f3;
    display: inline-block;
    margin-left: 2px;
    margin-top: 1px;
    margin-bottom: 1px;
    width: 48px;
    height: 19px;
    padding-top: 1px;
    padding-bottom: 0px;
    border-bottom-width: 0px;
} */



/* Estilos para o menu suspenso */
/* .dropdown-content{
    display: none;
    position: absolute;
    background-color: #f7f3f3;
    min-width: 20px;
    width: 144px;
    height: 99px;
    z-index: 1;
    border-radius: 4px;
    list-style-type: none;
    padding-left: 4px;
    left: 1199px;

    

    
}

.dropdown:hover {
    display: block;
}

.dropdown-content li {
    

    padding-top: 16px;
    height: 26px;
    width: 50px;
    

    
}

.dropdown-interno {
    color: #090909;
    padding: 5px 5px;
    text-decoration: none;
    list-style-type: none;
    
    
}

.dropdown-interno , .dropdown-interno img{

    display: inline-block;
    width: 15px;

} */
</style>

<ul class="container-dropdown">
  <li class="dropdown">
    <a class="acount" href="#"><img src="<?php echo IMGS?>png/coroa.png" alt=""></a>
    <a class="dropdown-menu" href="#" >Conta</a>
    <a class="acount1" href="#"><img src="<?php echo IMGS?>png/biscoito.png" alt=""></a>
      <ul class="dropdown-content">                        
        <li>
            <a class="dropdown-interno" href="account">
                <img src="<?php echo IMGS?>png/facebook.png" alt="">
                <span class="dropdown-interno">configurações</span>
            </a>
        </li>
        <li>
            <a class="dropdown-interno" href="logout">
                <img src="<?php echo IMGS?>png/facebook.png" alt="">
                <span class="dropdown-interno">logout</span>
            </a>
        </li>
        

      </ul>
  </li>
</ul>