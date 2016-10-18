<?php

class LoginController{

    public function loginAction() {
        
        
        if (($_POST['username'] == "admin") && ($_POST['password'] == "tbms")) {
            $_SESSION['user']['login'] = "admin";
            $_SESSION['user']['password'] = "tbmsadmin";
            $_SESSION['user']['on'] =  time();
            $_SESSION['user']['end'] = time()+800;
            
            GlobalFunction::redirect('Location: home.php?page=chooseTalhao');
        } 
        
        else {
            GlobalFunction::redirect('Location: index.php');
        }
    }

    public function logoutAction() {
        session_unset();
        session_destroy();

        GlobalFunction::redirect('Location: index.php');
    }
}
?>