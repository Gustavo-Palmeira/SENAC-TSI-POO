<?php 
// SOLID 
// Open Close 

//Exemplo 1 - Strategy

interface EmpresaLogistica {
    public function setPeso();
    public function setDestino();
    public function setOrigem();
    public function setTamanho();
    public function calcular();
}

class Correios implements EmpresaLogistica {

}

class Loggi implements EmpresaLogistica {
    
}

class Frete {

    private $empresa;

    public function __construct(EmpresaLogistica $empresa) {
        $this->empresa = $empresa;
    }

    public function calcular() {
        //Lógica com os valores recebidos
    }
}




//Exemplo 2

interface OrgaoNegativador {
    public function enviarRemessaInclusao();
    public function enviarRemessaExclusao();
    public function receberRetorno();
}

class Serasa implements OrgaoNegativador {

}

class SpcBrasil implements OrgaoNegativador {
    
}

class Negativacao {
    private $devedor;

    public function __construct(Devedor $devedor) {
        $this->devedor = $devedor;
    }

    public function enviar(OrgaoNegativador $orgao) {

    }
}

class Main {
    public function retricao() {
        $negativacao = new Negativacao;

        $negativacao->enviar($orgao);
    }
}