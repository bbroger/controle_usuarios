<?php

class Usuarios extends Model
{
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $cod_convite;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of cod_convite
     */
    public function getCod_convite()
    {
        return $this->cod_convite;
    }

    /**
     * Set the value of cod_convite
     *
     * @return  self
     */
    public function setCod_convite($cod_convite)
    {
        $this->cod_convite = $cod_convite;

        return $this;
    }

    public function logado()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            return true;
        } else {
            return false;
        }
    }

    /*
        FUNÇÕES PARA O BANCO DE DADOS
    */

    public function acessar($email, $senha)
    {
        try {
            $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND status = 1");
            $sql->execute(array(
                ':email' => $email,
                ':senha' => $senha
            ));
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return false;
            }
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }

    public function selecionarTodos($ordenacao)
    {
        try {
            if ($ordenacao == '') {
                $sql = $this->db->query("SELECT * FROM usuarios");
            } else {
                $sql = $this->db->query("SELECT * FROM usuarios ORDER BY $ordenacao");
            }

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll();
            } else {
                return 0;
            }
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }

    public function selecionarPorId($id)
    {
        try {
            $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->execute(array(
                ':id' => $id
            ));
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return 0;
            }
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }

    public function adicionar($nome, $email, $senha)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha);");
            $sql->execute(array(
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha
            ));
            return true;
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }

    public function cadastroComConvite($nome, $email, $senha, $cod_convite)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO usuarios (nome, email, senha, cod_convite) VALUES (:nome, :email, :senha, :cod_convite);");
            $sql->execute(array(
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha,
                ':cod_convite' => $cod_convite
            ));
            return true;
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
            $sql->execute(array(
                ':id' => $id
            ));
            return true;
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }

    public function atualizar($id, $nome, $email, $senha)
    {
        try {
            $sql = $this->db->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
            $sql->execute(array(
                ':id' => $id,
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha
            ));
            return true;
        } catch (Exception $erro) {
            return $erro->getMessage();
        }
    }
}
