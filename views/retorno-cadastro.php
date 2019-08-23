<div class="panel">
    <?php if (isset($_SESSION['retorno']) && $_SESSION['retorno'] == 'sucesso') : ?>
    <div class="panel-header">
        <h1 class="text-center">Sucesso</h1>
        <div class="panel-body">
            <p class="text-center">Cadastro realizado com sucesso! Acesse seu e-mail e confirme o seu cadastro.</p>
        </div>
    </div>
    <?php else : ?>
    <div class="panel-header">
        <h1 class="text-center">Erro</h1>
        <div class="panel-body">
            <p class="text-center">Ocorreu um erro no seu cadastro</p>
            <a href="<?php echo BASE_URL ?>login/adicionar" class="text-center d-block">Tente novamente</a>
        </div>
    </div>
    <?php endif; ?>
</div>