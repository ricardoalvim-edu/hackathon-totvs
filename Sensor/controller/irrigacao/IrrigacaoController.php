<?php

class IrrigacaoController{
    
    public function create(){
        $irrigacaoModel = new IrrigacaoModel();
        
        $item = $irrigacaoModel->select();
        
        /*Update the last command send*/
        if($item[0]['status']){
            $irrigacaoModel->setId_irrigacao($item[0]['id_Irrigacao']);
            $irrigacaoModel->setStatus(false);
            $irrigacaoModel->setData_final(date("Y-m-d H:i:s"));
            $irrigacaoModel->update();
            return false;
        }
        else{
            /*insert a new command*/
            $irrigacaoModel->setStatus(true);
            $irrigacaoModel->setData_inicial(date("Y-m-d H:i:s"));
            $irrigacaoModel->setData_final(NULL);
            $irrigacaoModel->setId_talhao(1);
            $irrigacaoModel->insert();
            return true;
        }
    }
}

?>