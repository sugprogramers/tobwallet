<?php

require('./qcubed.inc.php');
require('general.php');

class LoginForm extends QForm {

    protected $txtEmail;
    protected $txtPassword;
    protected $btnLogin;
    protected $chkVendor;

    protected function Form_Run() {
        $Datos1 = @unserialize($_SESSION['TobAdmin']);
        $Datos2 = @unserialize($_SESSION['TobUser']);
        $Datos3 = @unserialize($_SESSION['TobUserNoVerificado']);

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
        $this->loginUser();
    }

    protected function loginUser() {
        $User = User::LoadByEmail(trim($this->txtEmail->Text));
        if ($User) {
            if ($User->Password == trim($this->txtPassword->Text)) {
                $User->Password = 'NULL';

                $_SESSION['TobUser'] = serialize($User);

                if ($User->UserType == 'C') {
                    $_SESSION['TobUserNoVerificado'] = serialize($User);
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/DashboardRestaurant');
                }

                if ($User->UserType == 'O') {
                    $_SESSION['TobUserNoVerificado'] = serialize($User);
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/ownerRestaurants');
                }

                if ($User->StatusUser == 2) {
                    $_SESSION['TobUserNoVerificado'] = serialize($User);
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/mining');
                }

                if ($User->StatusUser == 4) {
                    $_SESSION['TobUser'] = serialize($User);
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/miningoptions');
                }

                if ($User->StatusUser == 1) {
                    QApplication::ExecuteJavaScript("showWarning('" . htmlentities("wait for the administrator to approve or reject your registration!") . "');");
                }
                if ($User->StatusUser == 3) {
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

    

}

LoginForm::Run('LoginForm');
?>