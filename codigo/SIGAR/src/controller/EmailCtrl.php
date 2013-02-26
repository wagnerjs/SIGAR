<?php

require_once 'C:/xampp/htdocs/SIGAR/codigo/SIGAR/src/DAO/EmailDAO.php';

class EmailCtrl {
    
    protected $_res = 0;
    
    public function criarListaEmails(){
       $emailDAO = new EmailDAO();
       $this->_res = $emailDAO->criarListaEmails();
    }
    
    public function getResposta() {
        return $this->_res;
    }
}
?>
