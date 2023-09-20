
<style>
    /* Estilos gerais da aba */
    .tab {
        display: flex;
        border: 1px solid #ccc;
        background-color: cadetblue;
        border: solid 3px black;
        margin: 15px;
    }

    /* Estilos do botão da aba */
    .tab-button {
        padding: 10px 20px;
        cursor: pointer;
        border: none;
        background-color: transparent;
        font-size: 16px;
        outline: none;
        transition: background-color 0.3s;
    }

    .tab-button:hover {
        background-color: cadetblue;;
    }

    .tab-button.active {
        background-color: ;
    }

    /* Estilos do conteúdo da aba */
    .tab-content {
        display: none;
        padding: 20px;
        border: 1px solid #ccc;
    }

    /* Exibir conteúdo quando o botão da aba estiver ativo */
    .tab-content.active {
        display: block;
        border: solid black;
        margin: 15px;
        padding-inline: 30px;  
        width: 20%;
        min-width: 350px;
        background-color: cadetblue;
    }

    .letras{
        color: black;
    }

    .divAccount{
        background-color: var(--main-color);
        border: solid black;
        position: relative;
        padding-left: 35%;
        padding-right: 37%;
        padding-bottom: 20%;    
    }
</style>

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