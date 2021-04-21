<?php

require('classes/usuario.class.php');
require('classes/fabricante.class.php');
require('classes/estoque.class.php');
require('classes/item.class.php');
require('classes/movimentacao.class.php');

class Main {

    private $objUsuario;
    private $objFabricante;
    private $objEstoque;
    private $objItem;
    private $objMovimentacao;

    public function __construct() {

        $this->objUsuario = new Usuario;
        $this->objFabricante = new Usuario;
        $this->objEstoque = new Estoque;
        $this->objItem = new Item;
        $this->objMovimentacao = new Movimentacao;

        $this->verificaArg(1);
        $this->executaOperacao($_SERVER["argv"][1]);
    }
    
    private function executaOperacao(string $operacao) {
        switch ($operacao) {

            case 'gravaUsuario':
                $this->gravaUsuario();
                break;
            case 'editaUsuario':
                $this->editaUsuario();
                break;
            case 'listaUsuario':
                $this->listaUsuario();
                break;
            case 'apagaUsuario':
                $this->apagaUsuario();
                break;
            default:
                echo "Não existe a funcionalidade {$_SERVER["argv"][1]}";
        }
    }

    private function listaUsuario() {
        $lista = $this->objUsuario->getAll();

        foreach ($lista as $key => $usuario) {
            echo "{$usuario['id']}\t\t{$usuario['nome']}\t\t{$usuario['cpf']}\n";
        }
    }

    private function gravaUsuario() {
        $dados = $this->prepararDados();

        $this->objUsuario->setDados($dados);
        if ($this->objUsuario->gravarDados()) {
            echo "Usuário gravado com sucesso!";
        }
    }

    private function editaUsuario() {
        $dados = $this->prepararDados();

        $this->objUsuario->setDados($dados);
        if ($this->objUsuario->gravarDados()) {
            echo "Usuário editado com sucesso!";
        }
    }

    private function apagaUsuario() {
        $dados = $this->prepararDados();

        $this->objUsuario->setDados($dados);
        if ($this->objUsuario->delete()) {
            echo "Usuário apagado com sucesso!";
        }
    }

    private function verificaArg(int $numArg) {
        if ( !isset($_SERVER["argv"][$numArg]) ) {

            $msg = $numArg == 1 
                ? "Erro: para utilizar o programa digite: php estoque.php [operacao]" 
                : "Erro: para utilizar o programa digite: php estoque.php [operacao] [dado=valor,dado2=valor2]";

            echo "Erro: $msg";
            exit();
        }
    }

    private function prepararDados() {
        $this->verificaArg(2);

        $args = explode( "," , $_SERVER["argv"][2]);

        foreach ($args as $valor) {
            $arg = explode("=" , $valor);
            $dados[$arg[0]] = $arg[1];
        }
        return $dados;
    }

    public function __destruct() {
        echo "---- FIM DO PROGRAMA ----";
    }

}

new Main;

/* Tabelas:
    Itens
    Itens no estoque
    Estoques
    Movimentações
    Usuários
    Fabricantes
*/

/* 
TABELAS:

Usuários
+-------+---------------------+------+-----+---------+----------------+
| Field | Type                | Null | Key | Default | Extra          |
+-------+---------------------+------+-----+---------+----------------+
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| nome  | char(255)           | YES  |     | NULL    |                |
| cpf   | bigint(20)          | YES  |     | NULL    |                |
+-------+---------------------+------+-----+---------+----------------+

Fabricantes
+-------+---------------------+------+-----+---------+----------------+
| Field | Type                | Null | Key | Default | Extra          |
+-------+---------------------+------+-----+---------+----------------+
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| cnpj  | bigint(20)          | YES  |     | NULL    |                |
| nome  | char(255)           | YES  |     | NULL    |                |
+-------+---------------------+------+-----+---------+----------------+

Estoque
+-------+---------------------+------+-----+---------+----------------+
| Field | Type                | Null | Key | Default | Extra          |
+-------+---------------------+------+-----+---------+----------------+
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| nome  | char(255)           | YES  |     | NULL    |                |
+-------+---------------------+------+-----+---------+----------------+

Movimentações
+------------------+-------------------------+------+-----+---------+-------+
| Field            | Type                    | Null | Key | Default | Extra |
+------------------+-------------------------+------+-----+---------+-------+
| id_item          | bigint(20) unsigned     | NO   |     | NULL    |       |
| id_estoque       | bigint(20) unsigned     | NO   |     | NULL    |       |
| qtd_movimentacao | bigint(20)              | YES  |     | NULL    |       |
| tipo             | enum('entrada','saida') | NO   | PRI | NULL    |       |
| datahora         | datetime                | NO   | PRI | NULL    |       |
| id_usuario       | bigint(20) unsigned     | NO   | PRI | NULL    |       |
+------------------+-------------------------+------+-----+---------+-------+

Itens
+---------------+---------------------+------+-----+---------+----------------+
| Field         | Type                | Null | Key | Default | Extra          |
+---------------+---------------------+------+-----+---------+----------------+
| id            | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| nome          | char(255)           | NO   |     | NULL    |                |
| descricao     | char(255)           | YES  |     | NULL    |                |
| preco         | double(12,2)        | YES  |     | NULL    |                |
| id_fabricante | bigint(20) unsigned | YES  |     | NULL    |                |
+---------------+---------------------+------+-----+---------+----------------+

*/