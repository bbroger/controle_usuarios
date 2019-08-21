<?php

class usuariosController extends Controller
{
    public function adicionar()
    {
        $this->loadTemplate('adicionar-usuario');
    }

    public function editar($id)
    {
        $usuarios = new Usuarios();
        $usuarios->setId($id);
        $dados['usuario'] = $usuarios->selecionarPorId($usuarios->getId());
        $this->loadTemplate('editar-usuario', $dados);
    }

    public function excluir($id)
    {
        $usuarios = new Usuarios();
        $usuarios->setId($id);
        $result = $usuarios->excluir($usuarios->getId());
        if ($result === true) {
            $_SESSION['msg'] = 'remove_success';
            header("Location: " . BASE_URL);
        } else {
            $_SESSION['msg'] = 'erro';
            $_SESSION['erro'] = $result;
            header("Location: " . BASE_URL);
        }
    }

    public function cadastrar()
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $_SESSION['msg'] = 'sem_dados';
                    header("Location: " . BASE_URL . 'usuarios/adicionar');
                }
            }
            $usuarios = new Usuarios();
            $usuarios->setNome(addslashes($_POST['nome']));
            $usuarios->setEmail(addslashes($_POST['email']));
            $usuarios->setSenha(addslashes($_POST['senha']));
            $result = $usuarios->adicionar($usuarios->getNome(), $usuarios->getEmail(), $usuarios->getSenha());
            if ($result === true) {
                $_SESSION['msg'] = 'sucesso';
                header("Location: " . BASE_URL);
            } else {
                $_SESSION['msg'] = 'erro';
                $_SESSION['erro'] = $result;
                header("Location: " . BASE_URL);
            }
        }
    }

    public function atualizar()
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $_SESSION['msg'] = 'sem_dados';
                    header("Location: " . BASE_URL . 'usuarios/editar/' . $id);
                }
            }

            $usuarios = new Usuarios();
            $usuarios->setId(addslashes($_POST['id']));
            $usuarios->setNome(addslashes($_POST['nome']));
            $usuarios->setEmail(addslashes($_POST['email']));
            $usuarios->setSenha(addslashes($_POST['senha']));
            $result = $usuarios->atualizar($usuarios->getId(), $usuarios->getNome(), $usuarios->getEmail(), $usuarios->getSenha());
            if ($result === true) {
                $_SESSION['msg'] = 'update_success';
                header("Location: " . BASE_URL);
            } else {
                $_SESSION['msg'] = 'erro';
                $_SESSION['erro'] = $result;
                header("Location: " . BASE_URL);
            }
        }
    }
}
