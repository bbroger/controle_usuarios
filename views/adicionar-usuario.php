<div class="panel shadow">
    <div class="panel-header">
        <h1>Adicionar Usuário</h1>
    </div>
    <div class="panel-body">
        <form action="<?php echo BASE_URL ?>usuarios/cadastrar" method="post">
            <div class="form-label-group">
                <input type="text" name="nome" id="inputName" class="form-control" placeholder="Nome do usuário" required>
                <label for="inputName">Nome do usuário</label>
            </div>
            <div class="form-label-group">
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required>
                <label for="inputEmail">E-mail</label>
            </div>
            <div class="form-label-group">
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha" required>
                <label for="inputSenha">Senha</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>