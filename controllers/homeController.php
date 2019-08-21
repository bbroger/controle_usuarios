<?php

class homeController extends Controller
{
    public function index()
    {
        $usuarios = new Usuarios();
        $dados['usuarios'] = $usuarios->selecionarTodos();
        $this->loadTemplate('usuarios', $dados);
    }
}
