<?php

class TalhaoModel{
    private $id_talhao;
    private $nomeTalhao;
    private $tipoCultura;
    private $coordx;
    private $coordy;
    private $area;
    private $image;
    private $connection;
            
    function getId_talhao() {
        return $this->id_talhao;
    }

    function getNomeTalhao() {
        return $this->nomeTalhao;
    }

    function getTipoCultura() {
        return $this->tipoCultura;
    }

    function getCoordx() {
        return $this->coordx;
    }

    function getCoordy() {
        return $this->coordy;
    }

    function getArea() {
        return $this->area;
    }

    function getImage() {
        return $this->image;
    }

    function setId_talhao($id_talhao) {
        $this->id_talhao = $id_talhao;
    }

    function setNomeTalhao($nomeTalhao) {
        $this->nomeTalhao = $nomeTalhao;
    }

    function setTipoCultura($tipoCultura) {
        $this->tipoCultura = $tipoCultura;
    }

    function setCoordx($coordx) {
        $this->coordx = $coordx;
    }

    function setCoordy($coordy) {
        $this->coordy = $coordy;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setImage($image) {
        $this->image = $image;
    }
    
    public function __construct(){
	$this->connection  = ConnectDB::conectaDB();
    }
	
    public function __destruct() {
	ConnectDB::disconectaDB($this->connection);
    }
    
    public function insert(){
        $query = "INSERT INTO talhao (coorX, coorY, nomeTalhao, area, tipoCultura, img) "
                . "VALUES (:coorX, :coorY, :nomeTalhao, :area, :tipoCultura, :img)";
        $statement = $this->connection->prepare($query);
	$statement->bindValue(':coorX', $this->getCoordx());
        $statement->bindValue(':coorY', $this->getCoordy());
	$statement->bindValue(':nomeTalhao', $this->getNomeTalhao());
        $statement->bindValue(':area', $this->getArea());
        $statement->bindValue(':tipoCultura', $this->getTipoCultura());
        $statement->bindValue(':img', $this->getImage());
	$statement->execute();
    }
    
    public function select($id = 0){
        
        $query = "SELECT * FROM talhao";       
        $statement = $this->connection->prepare($query);
        $statement->execute();
	return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectInfo(){
        $query = "SELECT * FROM infotalhao ORDER BY id_infoTalhao DESC";
        
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
