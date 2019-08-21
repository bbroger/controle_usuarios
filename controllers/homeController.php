<?php

class homeController extends Controller
{
    public function index()
    {
        $usuarios = new Usuarios();
        if ($usuarios->logado()) {
            if (isset($_GET['ordenacao'])) {
                $ordenar = $_GET['ordenacao'];
            } else {
                $ordenar = "";
            }
            $dados['usuarios'] = $usuarios->selecionarTodos($ordenar);
            $this->loadTemplate('usuarios', $dados);
        } else {
            header("Location: " . BASE_URL . 'login');
        }
    }
}
