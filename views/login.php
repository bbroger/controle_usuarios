<div class="panel form-login shadow">
    <div class="panel-header">
        <h1>Login</h1>
    </div>
    <div class="panel-body">
        <form action="<?php echo BASE_URL ?>login/acessar" method="post">
            <div class="form-label-group">
                <input type="text" name="usuario" id="inputUser" class="form-control" placeholder="Seu e-mail">
                <label for="inputUser">Seu e-mail</label>
            </div>
            <div class="form-label-group">
                <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha">
                <label for="inputPassword">Senha</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Acessar</button>
            </div>
        </form>
    </div>

    <?php if (isset($_SESSION['result']) && $_SESSION['result'] == false) { ?>
    <div class="alert alert-danger msg-login text-center"><?php echo $_SESSION['msg'] ?></div>
    <?php }
    unset($_SESSION['result']);
    unset($_SESSION['msg']); ?>

</div>