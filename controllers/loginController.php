<?php

class loginController extends Controller
{
    public function index()
    {
        $this->loadTemplate('login');
    }

    public function acessar()
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $_SESSION['result'] = false;
                    $_SESSION['msg'] = "Campos em branco";
                    header("Location:" . BASE_URL . 'login');
                }
            }
            $usuarios = new Usuarios();
            $usuarios->setEmail(addslashes($_POST['usuario']));
            $usuarios->setSenha(addslashes($_POST['senha']));
            $result = $usuarios->acessar($usuarios->getEmail(), $usuarios->getSenha());
            if (is_array($result)) {
                $_SESSION['login'] = true;
                header("Location: " . BASE_URL);
            } else {
                $_SESSION['result'] = false;
                $_SESSION['msg'] = "Usuário e/ou senha inválidos";
                header("Location:" . BASE_URL . 'login');
            }
        }
    }
}
