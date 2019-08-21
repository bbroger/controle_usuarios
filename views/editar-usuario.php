<div class="panel shadow">
    <div class="panel-header">
        <h1>Editar Usuário</h1>
    </div>
    <div class="panel-body">
        <form action="<?php echo BASE_URL ?>usuarios/atualizar" method="post">
            <input type="hidden" name="id" value="<?php echo $usuario['id'] ?>">
            <div class="form-label-group">
                <input type="text" name="nome" id="inputName" class="form-control" placeholder="Nome do usuário" required value="<?php echo $usuario['nome'] ?>">
                <label for="inputName">Nome do usuário</label>
            </div>
            <div class="form-label-group">
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required value="<?php echo $usuario['email'] ?>">
                <label for=" inputEmail">E-mail</label>
            </div>
            <div class="form-label-group">
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha" required value="<?php echo $usuario['senha'] ?>">
                <label for=" inputSenha">Senha</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?php echo BASE_URL ?>" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
</div>