<?php 

abstract class Database extends PDO {

    private $user = 'sa';
    private $pass = 'Senhasqlsenac2020';
    private $dns = 'sqlsrv:Server=localhost\\SQLEXPRESS;database=BD_MegaTriunfo';

    public function __construct() {
        parent::__construct( $this->dns, $this->user, $this->pass );
    }
}