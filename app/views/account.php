
<div class="container_plan container-fluid">
    
    <div class="box-plan">
        <div class="inf" id="user-info-popup">
            <div class="img">
                <img src= "<?php echo IMGS?>png/perfildados.png">
            </div>
            <p><strong>Nome:</strong></p>
            <div class="editar"><img src="<?php echo IMGS?>png/editar.png"></div>
            <p class="nome" id="name"><?php echo( $_SESSION[LOGGED]->name)?></p> 
            <p><strong>Email:</strong></p>
            <div class="editar"><img src="<?php echo IMGS?>png/editar.png"></div>
            <p class="nome" id="email"><?php echo( $_SESSION[LOGGED]->email)?></p>
            <p><strong>Senha:</strong></p>
            <div class="editar"><img src="<?php echo IMGS?>png/editar.png"></div>
            <p class="nome" id="password">*****************</p>
        </div>

        <div class="inf">
            <div class="img">
                <img src= "<?php echo IMGS?>png/configdados.png">
            </div>
            
            <p><strong>Plano:</strong></p>
            <div class="plano"><img src="<?php echo IMGS?>png/um.png"></div>
            <p class=" basico"><strong>Basico</strong></p> 
            <div class="container-inf-plan">
                <div class="container-inf-plan-int">

                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                       
                       
                </div>

                <div class="container-inf-plan-int">
                        
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                    <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                    <label for="minhaCaixaDeSelecao" class="checkbox-label">
                        <input type="checkbox" id="minhaCaixaDeSelecao" name="minhaCaixaDeSelecao" class="checkbox">
                            Modelo 1
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>  
