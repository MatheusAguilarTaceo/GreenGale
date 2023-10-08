
<div class="container">
    <form action="register" method="POST">
        
            <h2>Cadastro de Usuário</h2>
            <br><br>
            <div class="inputBox"> 
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome">
                <?php echo getFlash('name')?>
                 
            </div>
            <br><br>
            <div class="inputBox">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email">
                <?php echo getFlash('email')?>
                
            </div>
            <br><br>
            <div class="inputBox">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="password" >
                <?php echo getFlash('password')?>

            </div>    
            <br>
            <input type="submit" name ="submit" id="submit" value="Cadastrar">

    </form>
</div>  