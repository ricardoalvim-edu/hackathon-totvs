<?php

class TalhaoController{
    
    public function newImage($image){
        $imageName = md5(uniqid(time())) . strrchr($image["name"], '.');
        $imagePath = UP_ABS_PATH.'img/'. $imageName;
        move_uploaded_file($image["tmp_name"], $imagePath);
        $image->saveToFile($imagePath);
        return $imageName;
    }
    
    public function create(){
        $image = $_FILES['image'];
        $nomeTalhao = $_POST['nameTalhao'];
        $tipoCultura = $_POST['tipoCultura'];
        $coordx = $_POST['longitude'];
        $coordy = $_POST['latitude'];
        $area = $_POST['area'];
        $imageName = $this->newImage($image);
        
        $talhaoModel = new TalhaoModel();
        $talhaoModel->setArea($area);
        $talhaoModel->setCoordx($coordx);
        $talhaoModel->setCoordy($coordy);
        $talhaoModel->setNomeTalhao($nomeTalhao);
        $talhaoModel->setTipoCultura($tipoCultura);
        $talhaoModel->setImage($imageName);
        
        $talhaoModel->insert();
       
        Helper::_redirect("Location: home.php");
    }
    
    public function select($id = 0){
        $talhaoModel = new TalhaoModel();
        return $talhaoModel->select($id);
    }
    
    public function selectInfo(){
        $talhaoModel = new TalhaoModel();
        return $talhaoModel->selectInfo();
    }
    
}

?>