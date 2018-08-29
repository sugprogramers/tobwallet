<?php

require('./qcubed.inc.php');
require './general.php';

class ProfileUser extends QForm {

    protected $user;
    protected $mctUser;
    protected $txtUsername;
    protected $txtPassword;
    protected $txtNewPassword;
    protected $txtRepeatPassword;
    protected $txtEmail;
    protected $txtFirstName;
    protected $txtLastName;
    protected $txtPhone;
    protected $txtMiddleName;
    protected $txtDni;
    protected $userData;
    protected $txtMac;
    protected $txtTokenMac;
    protected $lblStatusTokenMac;
    protected $lblPlan;
    
    
    protected $txtWalletAddress;
    protected $btnLogin;

    /*
     * Buttons
     */
    protected $btnSave;
    protected $btnSavePass;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = User::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
    }

    protected function Form_Create() {

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->mctUser = UserMetaControl::CreateFromPathInfo($this);
        $this->mctUser->objUser = $this->user;
        $this->mctUser->Refresh();


        $this->txtEmail = $this->mctUser->txtEmail_Create();
        $this->txtEmail->Placeholder = "Email";
        $this->txtEmail->CssClass = "form-control";
        $this->txtEmail->Enabled = false;

        $this->txtFirstName = $this->mctUser->txtFirstName_Create();
        $this->txtFirstName->Placeholder = "First Name";
        $this->txtFirstName->CssClass = "form-control";

        $this->txtLastName = $this->mctUser->txtLastName_Create();
        $this->txtLastName->Placeholder = "Last Name";
        $this->txtLastName->CssClass = "form-control";

        $this->txtMiddleName = $this->mctUser->txtMiddleName_Create();
        $this->txtMiddleName->Placeholder = htmlentities("Middle Name");
        $this->txtMiddleName->CssClass = "form-control";

        $this->txtPhone = $this->mctUser->txtPhone_Create();
        $this->txtPhone->Placeholder = htmlentities("Phone");
        $this->txtPhone->CssClass = "form-control";


        $this->txtPassword = new QTextBox($this);
        $this->txtPassword->Placeholder = htmlentities("Old Password");
        $this->txtPassword->CssClass = "form-control";
        $this->txtPassword->TextMode = QTextMode::Password;

        $this->txtNewPassword = new QTextBox($this);
        $this->txtNewPassword->Placeholder = htmlentities("New Password");
        $this->txtNewPassword->CssClass = "form-control";
        $this->txtNewPassword->TextMode = QTextMode::Password;

        $this->txtRepeatPassword = new QTextBox($this);
        $this->txtRepeatPassword->Placeholder = htmlentities("Repeat Password");
        $this->txtRepeatPassword->CssClass = "form-control";
        $this->txtRepeatPassword->TextMode = QTextMode::Password;

        $this->btnSave = new QButton($this);
        $this->btnSave->Text = '<i class="icon fa-floppy-o" aria-hidden="true"></i> Save Profile';
        $this->btnSave->HtmlEntities = false;
        $this->btnSave->CssClass = "btn btn-raised btn-primary"; // "site-action btn-raised btn btn-primary btn-floating";
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));


        /*$this->txtMac = new QTextBox($this);
        $this->txtMac->CssClass = "form-control";
        $this->txtMac->Text = $this->user->Mac;
        $this->txtMac->Enabled = false ;*/

        /*$this->txtTokenMac = new QTextBox($this);
        $this->txtTokenMac->CssClass = "form-control";
        $this->txtTokenMac->Text = $this->user->TokenMac;
        $this->txtTokenMac->Enabled = false ;*/

        $this->lblStatusTokenMac = new QLabel($this);
        $this->lblStatusTokenMac->HtmlEntities = false;
        $this->statustokenRender($this->user);

        


        $this->btnSavePass = new QButton($this);
        $this->btnSavePass->Text = '<i class="icon fa-floppy-o" aria-hidden="true"></i> ' . htmlentities("Save Password");
        $this->btnSavePass->CssClass = "btn btn-raised btn-primary"; //"site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnSavePass->HtmlEntities = false;
        $this->btnSavePass->AddAction(new QClickEvent(), new QAjaxAction('btnSavePass_Click'));
        
        
        
       
    }
    
    
   
     
    public function statustokenRender(User $obj) {

        /*if ($obj->StatusTokenMac == 1) {
            $this->lblStatusTokenMac->Text = '<div class="label label-table label-success">Enable</div>';
        } else if ($obj->StatusTokenMac == 2) {
            $this->lblStatusTokenMac->Text = '<div class="label label-table label-danger">Disable</div>';
        } else {
            $this->lblStatusTokenMac->Text = '<div class="label label-table label-default">None</div>';
        }*/
    }

   

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        try {
            $this->mctUser->SaveUser();
            $this->mctUser->Refresh();
            QApplication::ExecuteJavaScript("showSuccess('data saved correctly!');");
        } catch (Exception $exc) {
            $msg = addslashes($exc->getMessage());
            QApplication::ExecuteJavaScript("showWarning('Error: $msg');");
        }
    }

    protected function btnSavePass_Click($strFormId, $strControlId, $strParameter) {
        try {
            if ($this->txtPassword->Text != $this->mctUser->objUser->Password) {
                QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Invalid Password") . "');");
                $this->txtPassword->Focus();
                return false;
            }

            if (!$this->txtNewPassword->Text || !$this->txtRepeatPassword->Text) {
                QApplication::ExecuteJavaScript("showWarning('" . htmlentities("The password is empty") . "');");
                return false;
            }

            if ($this->txtNewPassword->Text != $this->txtRepeatPassword->Text) {
                QApplication::ExecuteJavaScript("showWarning('" . htmlentities("The passwords do not match") . "');");
                $this->txtNewPassword->Focus();
                return false;
            }
            $this->mctUser->objUser->Password = $this->txtNewPassword->Text;
            $this->mctUser->SaveUser();
            $this->mctUser->Refresh();
            QApplication::ExecuteJavaScript("showSuccess('" . htmlentities("Password updated correctly!") . "');");
        } catch (Exception $exc) {
            $msg = addslashes($exc->getMessage());
            QApplication::ExecuteJavaScript("showWarning('Error: $msg');");
        }
    }

}

ProfileUser::Run('ProfileUser');
?>