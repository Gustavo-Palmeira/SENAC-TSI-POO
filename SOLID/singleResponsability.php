<?php 
// SOLID 
// Single Responsability

//Exemplo
class User {

    private $name;

    public function setName() {

    }

    public function getName() {

    }
}

class Email {
    public function sendEmail() {

    }
}

class Export {

}

class ExportToSheet extends Export {
    public function exportToSheet() {

    }
}

//Exemplo 2

class Relatorio {
    private $data;

    public function setData(array $data) {

    }
}

class Export {

}

class ExportToPdf extends Export {
    public function exportToPdf() {

    }
}

class ExportToCsv extends Export {
    public function exportToCsv() {
    
    }
}

//Exemplo 2

class Post {
    
    private $title;

    public function setTitle(string $title) {

    }
}

class Url {
    public function genereateUrl() {

    }
}

class Search {

}

class SearchSimilar extends Search {
    public function search() {

    }
}