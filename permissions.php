<?php





function permitInsert(){
    $session = @unserialize($_SESSION['TobUser']);
    
    if($session){
        $user = User::LoadByEmail($session->Email);
        
        if($user->StatusUser==2){
            return true;
        }else{
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','You don\'t have permission to insert!');");
            return false;
        }
    }else{
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','You must log in to start!');");
        return false;
    }
}


function permitUpdate(){
    $session = @unserialize($_SESSION['TobUser']);
    
    if($session){
        $user = User::LoadByEmail($session->Email);
        
        if($user->StatusUser==2){
            return true;
        }else{
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','You don\'t have permission to update!');");
            return false;
        }
    }else{
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','You must log in to start!');");
        return false;
    }
}


function permitDelete(){
    $session = @unserialize($_SESSION['TobUser']);
    if($session){
        $user = User::LoadByEmail($session->Email);
        
        if($user->StatusUser==2){
            return true;
        }else{
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','You don\'t have permission to delete!');");
            return false;
        }
    }else{
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','You must log in to start!');");
        return false;
    }
}


?>