<?php

require('./qcubed.inc.php');
require('general.php');

class LoginForm extends QForm {

    protected $txtEmail;
    protected $txtPassword;
    protected $btnLogin;
    protected $chkVendor;

    protected function Form_Run() {
        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);
        $Datos2 = @unserialize($_SESSION['DatosUsuario']);
        $Datos3 = @unserialize($_SESSION['DatosUsuarioNoVerificado']);

        if ($Datos1) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/users');
        } elseif ($Datos2) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/ownerRestaurants');
        } else {
            if ($Datos3) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/mining');
            }
        }
    }

    protected function Form_Create() {

        $this->chkVendor = new QCheckBox($this, 'chkVendor');
        $this->chkVendor->SetCustomAttribute('data-plugin', 'switchery');
        $this->chkVendor->SetCustomAttribute('data-color', '#3aa677');
        $this->chkVendor->SetCustomAttribute('data-size', "small");

        $this->txtEmail = new QTextBox($this, 'idTextEmail2');
        $this->txtEmail->CssClass = "form-control";
        $this->txtEmail->Placeholder = "Email";

        $this->txtPassword = new QTextBox($this, 'idTextPass2');
        $this->txtPassword->TextMode = QTextMode::Password;
        $this->txtPassword->CssClass = "form-control";
        $this->txtPassword->Placeholder = htmlentities("Password");
        $this->txtPassword->AddAction(new QEnterKeyEvent(), new QAjaxAction("btnLogin_Click"));

        $this->btnLogin = new QButton($this, 'idlogintext');
        $this->btnLogin->Text = '<i class="icon fa-sign-in" aria-hidden="true"></i>' . htmlentities("log in");
        $this->btnLogin->HtmlEntities = false;
        $this->btnLogin->CssClass = "btn btn-raised btn-primary btn-block btn-lg margin-top-40";
        $this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnLogin_Click'));
        
    }

    protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {

        if ($this->chkVendor->Checked == false) {
            $this->loginUser();
        } else {
            $this->loginAdmin();
        }
    }

    protected function loginUser() {
        $User = User::LoadByEmail(trim($this->txtEmail->Text));
        if ($User) {
            if ($User->Password == trim($this->txtPassword->Text)) {
                $User->Password = 'NULL';
                
                $_SESSION['DatosUsuario'] = serialize($User);
                
                QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/mining');
                return;
                
                if( $User->StatusUser == 2 ){
                    $_SESSION['DatosUsuarioNoVerificado'] = serialize($User);
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/mining');    
                }
                
                if( $User->StatusUser == 4  ){
                    $_SESSION['DatosUsuario'] = serialize($User);
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/miningoptions');                
                }
                
                if( $User->StatusUser == 1 ){
                    QApplication::ExecuteJavaScript("showWarning('" . htmlentities("wait for the administrator to approve or reject your registration!") . "');");
                }
                if( $User->StatusUser == 3 ){
                    QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Your registration has been rejected!") . "');");
                }
                return;
                
            } else {
                QApplication::ExecuteJavaScript("showWarning('" . htmlentities("One of the provided details is incorrect.") . "');");
                return false;
            }
        } else {
            QApplication::ExecuteJavaScript("showWarning('" . htmlentities("One of the provided details is incorrect.") . "');");
            return false;
        }
    }

    protected function loginAdmin() {

        $User = Administrator::LoadByEmail(trim($this->txtEmail->Text));
        if ($User) {
            if ($User->Password == trim($this->txtPassword->Text)) {
                $User->Password = 'NULL';

                $_SESSION['DatosAdministrador'] = serialize($User);
                QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/users');

                return;
            } else {
                QApplication::ExecuteJavaScript("showWarning('" . htmlentities("One of the provided details is incorrect.") . "');");
                return false;
            }
        } else {
            QApplication::ExecuteJavaScript("showWarning('" . htmlentities("One of the provided details is incorrect.") . "');");
            return false;
        }
    }

}

LoginForm::Run('LoginForm');
?>