<div class="panel">
    <?php if (isset($_SESSION) && $_SESSION['sucesso']) : ?>
    <div class="panel-header">
        <h1>Sucesso</h1>
        <div class="panel-body">
            <p class="text-center">Cadastro realizado com sucesso! Acesse seu e-mail e confirme o seu cadastro.</p>
        </div>
    </div>
    <?php else : ?>
    <div class="panel-header">
        <h1>Erro</h1>
        <div class="panel-body">
            <p class="text-center">Ocorreu um erro no seu cadastro</p>
            <a href="<?php echo BASE_URL ?>login/adicionar" class="text-center">Tente novamente</a>
        </div>
    </div>
    <?php endif; ?>
</div>