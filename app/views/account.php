

<div class= "divAccount">

    <div class="tab">
        <!-- Botões da aba -->
        <button class="tab-button active" onclick="openTab('perfil')">Perfil</button>
        <button class="tab-button" onclick="openTab('configuracoes')">Configurações</button>
        <button class="tab-button" onclick="openTab('mensagens')">Mensagens</button>
    </div>

    <!-- Conteúdo da aba -->
    <div id="perfil" class="tab-content active">
        <h2>Perfil do Usuário</h2>
        <!-- Conteúdo do perfil do usuário aqui -->
        <p class="letras">Nome: <?php echo $_SESSION[LOGGED]->name?></p>
        <p class = "letras">Email:  <?php echo $_SESSION[LOGGED]->email?></p>
    </div>

    <div id="configuracoes" class="tab-content">
        <h2>Configurações</h2>
        <!-- Conteúdo de configurações aqui -->
        <p>Configurações do usuário podem ser alteradas aqui.</p>
    </div>

    <div id="mensagens" class="tab-content">
        <h2>Mensagens</h2>
        <!-- Conteúdo de mensagens aqui -->
        <p>Caixa de entrada de mensagens do usuário.</p>
    </div>

</div>
<script>
    function openTab(tabName){
        // Esconder todo o conteúdo da aba
        const tabContents = document.getElementsByClassName('tab-content');
        for (const content of tabContents) {
            content.style.display = 'none';
        }
    }
<script>   