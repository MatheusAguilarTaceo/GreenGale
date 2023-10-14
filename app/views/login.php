
<div class="container">
    <h2 class="container-h2">Login de Usuário</h2>
    <form action="#" method="POST">
        <?php echo getFlash('messageLogin')?>
        <label class="container-label" for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        
        <label class="container-label" for="senha">Senha:</label>
        <input type="password" id="senha" name="password" required>
        
        <button class="container-button" type="submit">Entrar</button>
    </form>
</div>

