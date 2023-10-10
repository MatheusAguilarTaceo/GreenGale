
<div class="container">
    <h2 class="container-h2">Login de Usuário</h2>
    <form action="#" method="POST">
        <label class="container-label" for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        
        <label class="container-label" for="senha">Senha:</label>
        <?php echo getFlash('password')?>
        <input type="password" id="senha" name="password" required>
        
        <button class="container-button" type="submit">Entrar</button>
    </form>
</div>

