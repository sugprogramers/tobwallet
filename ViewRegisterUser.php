<?php

require('includes/configuration/prepend.inc.php');
require('general.php');

class ViewRegisterUserForm extends QForm {

    protected $txtEmail;
    protected $btnLogin;
    protected $txtPassword;
    protected $txtRePassword;
    protected $txtFirstName;
    protected $txtLastName;
    protected $txtMiddleName;
    protected $txtPhone;
    protected $txtCity;
    protected $txtBirth;
    protected $lstCountry;
    protected $lstYear;
    protected $lstCohort;
    protected $txtUploadDriver;
    protected $txtUploadPhoto;
    protected $chkVendor;
    protected $btnFinalizar;
    protected $txtOtherCohort;

    protected function Form_Run() {
        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);
        $Datos2 = @unserialize($_SESSION['DatosUsuario']);
        $Datos3 = @unserialize($_SESSION['DatosUsuarioNoVerificado']);

        if ($Datos1) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/users');
        } elseif ($Datos2) {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/profileuser');
        } else {
            if ($Datos3) {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/mining');
            }
        }
    }

    protected function Form_Create() {

        $this->strAction = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . "/register";

        $this->txtFirstName = new QTextBox($this);
        $this->txtFirstName->CssClass = "form-control input-lg";
        $this->txtFirstName->Placeholder = "First Name";

        $this->txtMiddleName = new QTextBox($this);
        $this->txtMiddleName->CssClass = "form-control input-lg";
        $this->txtMiddleName->Placeholder = "Middle Name";

        $this->txtLastName = new QTextBox($this);
        $this->txtLastName->CssClass = "form-control input-lg";
        $this->txtLastName->Placeholder = "Last Name";

        $this->txtPhone = new QTextBox($this);
        $this->txtPhone->CssClass = "form-control input-lg";
        $this->txtPhone->Placeholder = "Phone Number";

        $this->lstCountry = new QListBox($this);
        $this->lstCountry->CssClass = "form-control input-lg";
        $arrayCountry = getCountry();
        foreach ($arrayCountry as $value) {
            $this->lstCountry->AddItem(new QListItem($value, $value));
        }
        $this->lstCountry->SelectedValue = "United States";


        $this->txtCity = new QTextBox($this);
        $this->txtCity->CssClass = "form-control input-lg";
        $this->txtCity->Placeholder = "City";


        $this->txtBirth = new QDateTimePicker($this);
        $this->txtBirth->MinimumYear = 1940;

        $this->txtUploadDriver = new QFileControl($this);
        $this->txtUploadDriver->SetCustomAttribute("style", "position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';opacity:0;background-color:transparent;color:transparent;");
        $this->txtUploadDriver->SetCustomAttribute("onchange", "\$j('#upload-file-info1').html(\$j(this).val());");
        $this->txtUploadDriver->SetCustomAttribute("accept", "image/*");

        $this->txtUploadPhoto = new QFileControl($this);
        $this->txtUploadPhoto->SetCustomAttribute("style", "position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';opacity:0;background-color:transparent;color:transparent;");
        $this->txtUploadPhoto->SetCustomAttribute("onchange", "\$j('#upload-file-info2').html(\$j(this).val());");
        $this->txtUploadPhoto->SetCustomAttribute("accept", "image/*");




        $this->txtEmail = new QTextBox($this);
        $this->txtEmail->CssClass = "form-control input-lg";
        $this->txtEmail->Placeholder = "Email";

        $this->txtPassword = new QTextBox($this);
        $this->txtPassword->CssClass = "form-control input-lg";
        $this->txtPassword->Placeholder = "Password";
        $this->txtPassword->TextMode = QTextMode::Password;

        $this->txtRePassword = new QTextBox($this);
        $this->txtRePassword->CssClass = "form-control input-lg";
        $this->txtRePassword->Placeholder = "Repeat Password";
        $this->txtRePassword->TextMode = QTextMode::Password;


        $this->lstYear = new QListBox($this);
        $this->lstYear->CssClass = "form-control input-lg";
        $this->lstYear->AddItem(new QListItem('Year of graduation', '0'));
        for ($i = 2022; $i >= 1900; $i--) {
            $this->lstYear->AddItem(new QListItem($i, $i));
        }


        $this->lstCohort = new QListBox($this);
        $this->lstCohort->CssClass = "form-control input-lg";
        $this->lstCohort->AddItem(new QListItem('Your cohort', '0'));
        $arrayCohort = getArrayCohort();
        foreach ($arrayCohort as $value) {
            $this->lstCohort->AddItem(new QListItem($value, $value));
        }
        $this->lstCohort->AddAction(new QChangeEvent(), new QAjaxAction('btnChangeCohort_Click'));


        $this->txtOtherCohort = new QTextBox($this);
        $this->txtOtherCohort->CssClass = "form-control input-lg";
        $this->txtOtherCohort->Placeholder = "Insert your cohort";
        $this->txtOtherCohort->Visible = false;



        $this->chkVendor = new QCheckBox($this, 'chkVendor');
        $this->chkVendor->SetCustomAttribute('data-plugin', 'switchery');
        $this->chkVendor->SetCustomAttribute('data-color', '#502581');
        $this->chkVendor->SetCustomAttribute('data-size', "small");

        $this->btnLogin = new QButton($this);
        $this->btnLogin->Text = '<i class="icon fa-save" aria-hidden="true"></i> Register';
        $this->btnLogin->CssClass = "btn btn-raised btn-primary btn-block btn-lg";
        $this->btnLogin->HtmlEntities = false;
        $this->btnLogin->AddAction(new QClickEvent(), new QServerAction('btnLogin_Click'));

        $this->btnFinalizar = new QButton($this);
        $this->btnFinalizar->HtmlEntities = FALSE;
        $this->btnFinalizar->Text = '<i class="icon wb-check-circle" aria-hidden="true"></i> Finalize';
        $this->btnFinalizar->CssClass = "btn btn-success btn-raised ";
        $this->btnFinalizar->AddAction(new QClickEvent(), new QAjaxAction('btnFinalizar_Click'));
    }

    protected function btnChangeCohort_Click($strFormId, $strControlId, $strParameter) {
        if ($this->lstCohort->SelectedValue == "Other please type") {
            $this->txtOtherCohort->Visible = true;
        } else {
            $this->txtOtherCohort->Visible = false;
        }
    }

    protected function btnLogin_Click($strFormId, $strControlId, $strParameter) {


        if ($this->txtUploadDriver->File != null && $this->txtUploadDriver->Size > 5000000) {
            $size = $this->txtUploadDriver->Size / 1000000;
            QApplication::ExecuteJavaScript("showWarning('Error Size Image Driver is  $size Megabytes, <br>Verify that it is less than 5 Megabytes');");
            return;
        }

        if ($this->txtUploadPhoto->File != null && $this->txtUploadPhoto->Size > 5000000) {
            $size = $this->txtUploadPhoto->Size / 1000000;
            QApplication::ExecuteJavaScript("showWarning('Error Size Image Photo is  $size Megabytes, <br>Verify that it is less than 5 Megabytes');");
            return;
        }

        if (trim($this->txtFirstName->Text) == '') {
            $this->txtFirstName->Focus();
            $this->txtFirstName->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid First Name');");
            return;
        }

        /* if (trim($this->txtMiddleName->Text) == '') {
          $this->txtMiddleName->Focus();
          $this->txtMiddleName->ValidationError = "error";
          QApplication::ExecuteJavaScript("showWarning('Invalid Middle Name');");
          return;
          } */

        if (trim($this->txtLastName->Text) == '') {
            $this->txtLastName->Focus();
            $this->txtLastName->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid Last Name');");
            return;
        }

        if (trim($this->txtCity->Text) == '') {
            $this->txtCity->Focus();
            $this->txtCity->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid City');");
            return;
        }

        if (!isEmail(trim($this->txtEmail->Text))) {
            $this->txtEmail->Focus();
            $this->txtEmail->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid Email!');");
            return;
        }


        if (!(trim($this->txtPassword->Text) == trim($this->txtRePassword->Text)) || trim($this->txtPassword->Text) == '') {
            $this->txtPassword->Focus();
            $this->txtPassword->ValidationError = "error";
            $this->txtRePassword->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid Password!');");
            return;
        }

        if (trim($this->txtPhone->Text) == '') {
            $this->txtPhone->Focus();
            $this->txtPhone->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid Phone');");
            return;
        }

        if (!$this->txtBirth->DateTime) {
            $this->txtBirth->Focus();
            QApplication::ExecuteJavaScript("showWarning('Invalid Birthday!');");
            return;
        }


        if ($this->lstYear->SelectedValue == '0') {
            $this->lstYear->Focus();
            $this->lstYear->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Select year!');");
            return;
        }

        if ($this->lstCohort->SelectedValue == '0') {
            $this->lstCohort->Focus();
            $this->lstCohort->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Select your Cohort!');");
            return;
        }

        if ($this->txtOtherCohort->Visible == true && trim($this->txtOtherCohort->Text) == '') {
            $this->txtOtherCohort->Focus();
            $this->txtOtherCohort->ValidationError = "error";
            QApplication::ExecuteJavaScript("showWarning('Invalid Other Cohort');");
            return;
        }

        /* if ($this->txtUploadDriver->File == null) {
          QApplication::ExecuteJavaScript("showWarning('Upload Image Driver and Photo!');");
          return;
          } */
        if ($this->txtUploadPhoto->File == null) {
            QApplication::ExecuteJavaScript("showWarning('Upload  Photo!');");
            return;
        }

        $allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg', 'JPG', 'JPEG');
        if ($this->txtUploadDriver->File != null) {
            $ext = pathinfo($this->txtUploadDriver->FileName, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                QApplication::ExecuteJavaScript("showWarning('Invalid Extension File Upload');");
                return;
            }
        }
        if ($this->txtUploadPhoto->File != null) {
            $ext = pathinfo($this->txtUploadPhoto->FileName, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                QApplication::ExecuteJavaScript("showWarning('Invalid Extension File Upload');");
                return;
            }
        }



        try {

            if ($this->txtOtherCohort->Visible == true) {
                $COHORT = $this->txtOtherCohort->Text;
            } else {
                $COHORT = $this->lstCohort->SelectedValue;
            }

            $user = new User();
            $user->FirstName = $this->txtFirstName->Text;
            $user->LastName = $this->txtLastName->Text;
            $user->MiddleName = $this->txtMiddleName->Text;
            $user->Country = $this->lstCountry->SelectedValue;
            $user->City = $this->txtCity->Text;
            $user->Email = $this->txtEmail->Text;
            $user->Password = $this->txtPassword->Text;
            $user->Phone = $this->txtPhone->Text;
            $user->Birthday = $this->txtBirth->DateTime;
            $user->YearGraduation = $this->lstYear->SelectedValue;
            $user->Cohort = $COHORT;
            $user->StatusUser = 1;
            $user->MiningOption = 0;
            $user->ImageDriver = '';
            $user->ImagePhoto = '';
            $user->Mac = '';
            $user->TokenMac = md5(uniqid());
            $user->StatusTokenMac = 1;
            $user->WalletAddress = '';
            $user->NumberMasterNode = 0;
            $user->Save();


            $subido = true;
            if ($this->txtUploadDriver->File == null) {
                $to1 = '';
                $subido = true;
            } else {
                $to1 = date('YmdHis') . "_" . str_replace(' ', '', $this->txtUploadDriver->FileName);
                if (@copy($this->txtUploadDriver->File, __UPLOAD__ . "/" . $to1)) {
                    $subido = true;
                } else {
                    $subido = false;
                }
            }

            $to2 = date('YmdHis') . "_" . str_replace(' ', '', $this->txtUploadPhoto->FileName);


            if (@copy($this->txtUploadPhoto->File, __UPLOAD__ . "/" . $to2) && $subido == true) {

                $user->ImageDriver = $to1;
                $user->ImagePhoto = $to2;
                $user->Save();


                try {
                    simpleEmailSend($user->IdUser, $user->Email, 'You have registered to the Kcoin Blockcahin', "You have registered to kcoin correctly, the House of Blockchains needs to approve your account. Another email will be sent to notify you that you have been accepted.<br><br>" . __DOMAIN_BASE__);
                    simpleEmailSend(0, 'alfrecampana@gmail.com', 'New Registered', "New registered.<br>$user->Email<br>" . __DOMAIN_BASE__);
                } catch (Exception $e) {
                    
                }

                QApplication::ExecuteJavaScript("$('#ventaModal').modal('show');");
                QApplication::ExecuteJavaScript("showSuccess('Data save correctly!');");

                //QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
                return true;
            } else {
                $user->Delete();
                QApplication::ExecuteJavaScript("showWarning('Error save Images');");
            }
        } catch (Exception $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function btnFinalizar_Click($strFormId, $strControlId, $strParameter) {

        QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        QApplication::ExecuteJavaScript("$('#ventaModal').modal('hide');");
    }

}

ViewRegisterUserForm::Run('ViewRegisterUserForm');
?>