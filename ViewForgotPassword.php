<?php

require('includes/configuration/prepend.inc.php');
require('general.php');
class ForgotPasswordForm extends QForm {

    protected $txtEmail;
    protected $btnLogin;
   
    protected function Form_Run() {
         $Datos1 = @unserialize($_SESSION['DatosAdministrador']);
        $Datos2 = @unserialize($_SESSION['DatosUsuario']);
        $Datos3 = @unserialize($_SESSION['DatosUsuarioNoVerificado']);

        if ($Datos1) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/users');
        } elseif ($Datos2) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/miningoptions');
        } else {
            if ($Datos3) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/mining');
        }
        }
    }

    protected function Form_Create() {
        $this->txtEmail = new QTextBox($this);
        $this->txtEmail->CssClass = "form-control";
        $this->txtEmail->Placeholder = "Your Email";
     
        $this->btnLogin = new QButton($this, 'idlogintext');
        $this->btnLogin->Text = '<i class="icon fa-send" aria-hidden="true"></i> Forgot Password';
        $this->btnLogin->HtmlEntities = false;
        $this->btnLogin->CssClass = "btn btn-raised btn-primary btn-block";
        $this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnLogin_Click'));
    }

    protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {
        
        if(isEmail($this->txtEmail->Text)){            
            $user = User::LoadByEmail(trim($this->txtEmail->Text));
            if($user){
                
                //$user->Tokenlogin = md5(uniqid());
                //$user->Save();
                //resetPassword($user->AdmUserId);
                QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
                return false;
            }
            else{
               QApplication::ExecuteJavaScript("showWarning('Invalid User!');");
                return false;
            }
            
        }
        else{
           QApplication::ExecuteJavaScript("showWarning('Invalid User!');");
            return false;
        }
            
       
    }

   

}

ForgotPasswordForm::Run('ForgotPasswordForm');
?>