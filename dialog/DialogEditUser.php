<?php

class DialogEditUser extends QDialogBox {

    public $mctUsuario;
    public $txtEmail;
    public $txtPassword;
    public $txtFirstname;
    public $txtMiddlename;
    public $txtLastname;
    public $txtCountry;
    public $txtCity;
    public $txtPhone;
    public $txtBirthday;
    public $lstStatus;
    public $lstUserType;
    public $txtUserType;
    public $txtStatus;
    public $txtWalletAddress;
    public $btnSave;
    public $btnCancel;
    public $strClosePanelMethod;

    public function __construct($objParentObject, $strClosePanelMethod, $strControlId = null) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->Width = 750;
        $this->Resizable = false;
        $this->isAutosize = true;
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditUser.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctUsuario = UserMetaControl::CreateFromPathInfo($this);

        $this->txtEmail = $this->mctUsuario->txtEmail_Create();
        $this->txtEmail->Placeholder = "Email";

        $this->txtPassword = $this->mctUsuario->txtPassword_Create();
        $this->txtPassword->Placeholder = htmlentities("Password");

        $this->txtFirstname = $this->mctUsuario->txtFirstName_Create();
        $this->txtFirstname->Placeholder = "First Name";
        
        $this->txtMiddlename = $this->mctUsuario->txtMiddleName_Create();
        $this->txtMiddlename->Placeholder = "Middle Name";

        $this->txtLastname = $this->mctUsuario->txtLastName_Create();
        $this->txtLastname->Placeholder = "Last Name";

        $this->txtCountry = $this->mctUsuario->txtCountry_Create();
        $this->txtCountry->Placeholder = htmlentities("Country");
        
        $this->txtCity = $this->mctUsuario->txtCity_Create();
        $this->txtCity->Placeholder = htmlentities("City");

        $this->txtPhone = $this->mctUsuario->txtPhone_Create();
        $this->txtPhone->Placeholder = htmlentities("Phone");

        $this->txtBirthday = $this->mctUsuario->calBirthday_Create();
        $this->txtBirthday->DateTimePickerType = QDateTimePickerType::Date;
        
        $this->txtStatus = $this->mctUsuario->txtStatusUser_Create();        
        $this->lstStatus = new QListBox($this);
        $this->lstStatus->CssClass = "form-control input-sm editHidden"; 
        $this->lstStatus->AddItem(new QListItem("Register", 1));
        $this->lstStatus->AddItem(new QListItem("Approved", 2));
        $this->lstStatus->AddItem(new QListItem("Rejected", 3));
        $this->lstStatus->AddItem(new QListItem("Mining", 4));
        
        $this->txtUserType = $this->mctUsuario->txtUserType_Create();
        $this->lstUserType = new QListBox($this);
        $this->lstUserType->CssClass = "form-control input-sm editHidden"; 
        $this->lstUserType->AddItem(new QListItem("Customer", 'C'));
        $this->lstUserType->AddItem(new QListItem("Owner", 'O'));
        
        $this->txtWalletAddress = $this->mctUsuario->txtWalletAddress_Create();   
        
        //buttons
        $this->btnSave = new QButton($this);
        $this->btnSave->HtmlEntities = FALSE;
        $this->btnSave->Text = '<i class="icon fa-check" aria-hidden="true"></i> Save';
        $this->btnSave->CssClass = "btn btn-primary btn-raised ";
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));

        $this->btnCancel = new QButton($this);
        $this->btnCancel->HtmlEntities = FALSE;
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnCancel->CssClass = "btn btn-danger btn-raised ";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
    }

    // eventos buttons
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
       
        try {
            if (!isEmail(trim($this->txtEmail->Text))) {
                $this->txtEmail->SetFocus();
                throw new Exception("Debe ingresar un email válido");
            }
            
            if(strcmp(trim($this->txtPassword->Text), "") === 0){
                $this->txtPassword->SetFocus();
                throw new Exception("Debe ingresar una contraseña válida");
            }
            
            if (!is_numeric(trim($this->txtPhone->Text))) {
                $this->txtPhone->SetFocus();
                throw new Exception("Debe ingresar un teléfono válido");
            }
            
            //cuando es new
            if ($this->mctUsuario->objUser->IdUser == null) {
                $this->mctUsuario->objUser->ImagePhoto = '';
                $this->mctUsuario->objUser->WalletAddress= '';
            }
            //siempre
            $this->txtStatus->Text = $this->lstStatus->SelectedValue;
            $this->txtUserType->Text = $this->lstUserType->SelectedValue;
            
            //salvar
            $this->mctUsuario->SaveUser();
            
            $this->CloseSelf(TRUE);
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error: " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    //funciones de carga
    public function createNew() {
        $this->mctUsuario->objUser = new User();
        $this->mctUsuario->Refresh();
    }

    public function loadDefault($id) {
        try {
            $obj = User::LoadByIdUser(intval($id));
            $this->mctUsuario->objUser = $obj;
            $this->mctUsuario->blnEditMode = TRUE;
            $this->mctUsuario->Refresh();
            $this->lstStatus->SelectedValue = $obj->StatusUser;
            $this->lstUserType->SelectedValue = $obj->UserType;
            
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }

    // aditional funciones
    public function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade);
        $this->HideDialogBox();
    }

}

?>
