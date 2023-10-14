
<?php
    if(isset($_SESSION['error'])){
        echo "<span style = color:red> {$_SESSION['error']} </span>";
        unset($_SESSION['error']);
    }
    $token = bin2hex(random_bytes(30)); 
    echo $token.'<br>';
    echo strlen($token)
?>
<div class="container">
    <form action="register" method="POST">
            <h2>Cadastro de Usuário</h2>
            <br><br>
            <div class="inputBox"> 
                <label for="name">Nome completo</label>
                <input type="text" id="name" name="name">
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
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" >
                <?php echo getFlash('password')?>

            </div>    
            <br>
            <input type="submit" name ="submit" id="submit" value="Cadastrar">

    </form>
</div>  