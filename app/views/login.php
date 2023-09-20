
<style>
      body{
          font-family: Arial, Helvetica, sans-serif;
          background-image: linear-gradient(45deg,violet, blue);
      }
      .loginn{
          background-color: rgba(0, 0, 0, 0.9);
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          padding: 60px;
          height: 350px;
          border-radius: 15px;
          color: white;
      }
      input{
          padding: 15px; 
          border: none;
          outline: none;
          font-size: 15px;
          color: black  ;
      }
      .inputSubmit{
          background-color: dodgerblue;
          border: none;
          padding: 15px;
          width: 100%;
          border-radius: 10px;
          color: white;
          font-size: 15px;
      }
      .inputSubmit:hover{
          background-color: blueviolet;
          cursor: pointer;
      }
  </style>  

  <div class="loginn">
    <form action="login" method="POST">
      <h1>Login</h1>
      <?php echo getFlash('messageLogin')?>
      <br>
      <input type="text" name = "email" placeholder="Email">
      <br><br>
      <input type="password" name="password"  placeholder= "Senha">
      <br><br>
      <input class="inputSubmit" type="submit" name="submit" value="Fazer login">
    </form>
  </div>
  


