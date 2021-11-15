<?php
    Class Usuario
    {
        private $pdo;
        public $msgErro = "";
        
        // FUNÇÃO CONECTAR
        public function conectar()
        {
            global $pdo;
            try{
                $pdo = new PDO("mysql:dbname=financeira;host=localhost","root","");
            }catch(PDOException $e){
                $msgErro = $e->getMessage();
            }
        }

        // FUNÇÃO CADASTRAR
        public function cadastrar($usuario, $senha, $nome)
        {
            global $pdo;

            $sql = $pdo->prepare("SELECT id FROM users WHERE usuario = :e");
            $sql->bindValue(":e", $usuario);
            $sql->execute();
            if($sql->rowCount() > 0){
                return false;
            }else{
                $sql = $pdo->prepare("INSERT INTO users(usuario,senha,nome) values(:u, :s, :e)");
                $sql->bindValue(":u", $usuario);
                $sql->bindValue(":s", md5($senha));
                $sql->bindValue(":e", $nome);
                $sql->execute();
                return true;
            }
        }

        // FUNÇÃO LOGAR

        public function logar($usuario, $senha)
        {
            global $pdo;

            $sql = $pdo->prepare("SELECT id, nome, nivel FROM users WHERE usuario = :u and senha = :s");
            $sql->bindValue(":u", $usuario);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                session_start();
                $dados = $sql->fetch();
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['nivel'] = $dados['nivel'];
                return true;
            }else{
                return false;
            }
        }

        public function alterar($id, $nome, $usuario, $nivel){
            global $pdo;
            $sql = "UPDATE users SET usuario=?, nome=?, nivel=? WHERE id=?";
            $pdo->prepare($sql)->execute([$usuario, $nome, $nivel, $id]);
        }

        public function excluir($id){
            global $pdo;
            $sql = $pdo->prepare("DELETE from users WHERE id = '$id'");
            $sql->execute();
        }

    }
?>