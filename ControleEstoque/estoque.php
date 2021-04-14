<?php

require('classes/usuario.class.php');
require('classes/fabricante.class.php');
require('classes/estoque.class.php');
require('classes/item.class.php');
require('classes/movimentacao.class.php');

class Main {

    public function __construct() {
        // Teste
        $objUsuario = new Usuario;
        
        $objFabricante = new Usuario;
        $objEstoque = new Estoque;
        $objItem = new Item;
        $objMovimentacao = new Movimentacao;

        switch ($_SERVER["argv"][1]) {

            case 'gravaUsuario':
                $this->gravaUsuario($objUsuario);
                break;
            case 'editaUsuario':
                $this->editaUsuario($objUsuario);
                break;
            default:
                echo "Não existe a funcionalidade {$_SERVER["argv"][1]}";
        }
    }

    public function gravaUsuario($objUsuario) {
        $dados = $this->prepararDados();

        $objUsuario->setDados($dados);
        if ($objUsuario->gravarDados()) {
            echo "Usuário gravado com sucesso!";
        }
    }

    public function editaUsuario($objUsuario) {
        $dados = $this->prepararDados();

        $objUsuario->setDados($dados);
        if ($objUsuario->gravarDados()) {
            echo "Usuário editado com sucesso!";
        }
    }

    public function prepararDados() {
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