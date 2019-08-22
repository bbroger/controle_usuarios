<?php



class loginController extends Controller
{
    public function index()
    {
        $this->loadTemplate('login');
    }

    public function adicionar()
    {
        $this->loadTemplate('novo-usuario');
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

    public function cadastrar()
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
            $usuarios->setNome(addslashes($_POST['nome']));
            $usuarios->setEmail(addslashes($_POST['email']));
            $usuarios->setSenha(addslashes($_POST['senha']));
            $usuarios->setCod_convite(md5(rand(0, 999)));

            $result = $usuarios->cadastroComConvite($usuarios->getNome(), $usuarios->getEmail(), $usuarios->getSenha(), $usuarios->getCod_convite());

            if ($result === true) {
                $url = BASE_URL . '?' . $usuarios->getCod_convite();
                $email = new Email();
                $result = $email->sendMail($url, $usuarios->getEmail());
                if ($result == 'sucesso') {
                    $dados['retorno'] = $result;
                } else {
                    $dados['retorno'] = $result;
                }

                $this->loadTemplate('retorno-cadastro', $dados);
            }
        }
    }
}
