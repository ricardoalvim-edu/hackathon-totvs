<?php

class IrrigacaoModel{
    
    private $id_irrigacao;
    private $status;
    private $data_inicial;
    private $data_final;
    private $id_Talhao;
    private $connection;
    
    function getId_irrigacao() {
        return $this->id_irrigacao;
    }

    function getStatus() {
        return $this->status;
    }

    function getData_inicial() {
        return $this->data_inicial;
    }

    function getData_final() {
        return $this->data_final;
    }

    function getId_talhao() {
        return $this->id_talhao;
    }

    function setId_irrigacao($id_irrigacao) {
        $this->id_irrigacao = $id_irrigacao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setData_inicial($data_inicial) {
        $this->data_inicial = $data_inicial;
    }

    function setData_final($data_final) {
        $this->data_final = $data_final;
    }

    function setId_talhao($id_talhao) {
        $this->id_talhao = $id_talhao;
    }

    public function __construct(){
	$this->connection  = ConnectDB::conectaDB();
    }
	
    public function __destruct() {
	ConnectDB::disconectaDB($this->connection);
    }
    
    public function insert(){
        $query = "INSERT INTO irrigacao (status, data_inicial, data_final, id_Talhao) "
                . " VALUES (:status, :data_inicial, :data_final, :id_talhao)";
        
        $statement = $this->connection->prepare($query);
	$statement->bindValue(':status', $this->getStatus());
        $statement->bindValue(':data_inicial', $this->getData_inicial());
	$statement->bindValue(':data_final', $this->getData_final());
        $statement->bindValue(':id_talhao', $this->getId_talhao());
	$statement->execute();
    }
    
    public function select(){
        $query = "SELECT * FROM irrigacao ORDER BY id_Irrigacao DESC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update(){
        $query = "UPDATE irrigacao SET status = :status, data_final = :data_final WHERE id_Irrigacao = :id_irrigacao";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(":id_irrigacao", $this->getId_irrigacao());
        $statement->bindValue(":status", $this->getStatus());
        $statement->bindValue(":data_final", $this->getData_final());
        $statement->execute();
    }
}

?>