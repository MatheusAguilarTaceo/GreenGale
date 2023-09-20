
<style>
    .box{
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0,0,0, 09);
        padding: 15px;
        border-radius: 15px;
        width: 20%;
        min-width: 350px;
    }
    fieldset{
        border: 3px solid violet;
    }
    legend{
        border:  1px solid violet;
        padding: 10px;
        text-align: center;
        background-color: violet;
        border-radius: 7px;
    }
    .inputBox{
        position: relative;
    }
    .inputUser{
        background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
        width: 100%;
        letter-spacing: 1px;
    }
    .labelInput{
        position: absolute;
        top: 0px;
        left: 0px;
        pointer-events: none;
        transition: .5s;
    }

    .inputUser:focus ~ .labelInput, 
    .inputUser:valid ~ .labelInput{ 
        top: -20px;
        font-size: 12px;
        color: violet;
    }

    #submit{
        background-image: linear-gradient(to right, violet, blue);
        width: 100%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 5px;
    }

    #submit:hover{
        background-image: linear-gradient(to left, violet, blue);
    }
</style>

<div class="box">
    <form action="register" method="POST">
        <fieldset>
            <legend><b>Cadastro de Usuario</b></legend>
            <br><br>
            <div class="inputBox"> 
                <input type="text" name="name" id="name" class="inputUser" >
                <?php echo getFlash('name')?>
                <label for="nome" class="labelInput">Nome completo</label>         
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" >
                <?php echo getFlash('email')?>
                <label for="email" class="labelInput">Email</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="password" name="password" id="password" class="inputUser" >
                <?php echo getFlash('password')?>
                <label for="senha" class="labelInput">Senha</label>
            </div>    
            <br><br>
            <input type="submit" name ="submit" id="submit" value="Criar conta">
        </fieldset>
    </form>
</div>