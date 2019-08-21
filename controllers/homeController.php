<?php

class homeController extends Controller
{
    public function index()
    {
        $usuarios = new Usuarios();
        if ($usuarios->logado()) {
            $dados['usuarios'] = $usuarios->selecionarTodos();
            $this->loadTemplate('usuarios', $dados);
        } else {
            header("Location: " . BASE_URL . 'login');
        }
    }
}
