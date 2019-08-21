<div class="panel shadow">
    <div class="panel-header">
        <h1>Controle de Usuários</h1>
    </div>
    <div class="panel-body">
        <div class="buttons">
            <a href="<?php echo BASE_URL ?>usuarios/adicionar" class="btn btn-primary">Adicionar</a>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th><a href="<?php echo BASE_URL ?>?ordenacao=nome">Nome</a></th>
                    <th><a href="<?php echo BASE_URL ?>?ordenacao=email">E-mail</a></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($usuarios > 0) :
                    foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td>
                        <a href="<?php echo BASE_URL ?>usuarios/editar/<?php echo $usuario['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="<?php echo BASE_URL ?>usuarios/excluir/<?php echo $usuario['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach;
                else : ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if (isset($_SESSION['msg'])) {
            switch ($_SESSION['msg']) {
                case 'sucesso': ?>
        <div class="alert alert-success msg">Usuário cadastrado com sucesso</div>
        <?php break;
            case 'remove_success': ?>
        <div class="alert alert-success msg">Usuário removido com sucesso</div>
        <?php break;
            case 'update_success': ?>
        <div class="alert alert-success msg">Usuário atualizado com sucesso</div>
        <?php break;
            case 'erro': ?>
        <div class="alert alert-danger msg"><?php echo $_SESSION['erro'] ?></div>
        <?php break;
        } ?>
        <?php }
        unset($_SESSION['msg']);
        unset($_SESSION['erro']); ?>
    </div>
</div>