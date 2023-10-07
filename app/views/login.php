<div class="loginn">
    
    <form action="login" method="POST">
      <h1>Login de usuario</h1>
      <?php echo getFlash('messageLogin')?>
      <br>
      <input type="text" name = "email" placeholder="Email">
      <br><br>
      <input type="password" name="password"  placeholder= "Senha">
      <br><br>
      <input class="inputSubmit" type="submit" name="submit" value="Fazer login">

      <ul class="voltar">
        <li><a class="element" href="">voltar</a></li>
      </ul>

    </form>
  </div>
  
  <?php //echo getcwd() ?>