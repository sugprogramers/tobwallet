<?php

//require('utilities.php');

class DialogEditStatusUser extends QDialogBox {

    public $mctUsuario;
    public $lstStatus;
    public $lstUserType;
    public $txtUserType;
    public $btnSave;
    public $btnCancel;
    public $strClosePanelMethod;
    
    protected $alertTypes;
    
    protected $lstUserStatus;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditStatusUser.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
        
        $this->lstUserStatus = getStatusUsers();
        
        //$this->txtStatus = $this->mctUsuario->txtStatusUser_Create();        
        $this->lstStatus = new QListBox($this);
        $this->lstStatus->CssClass = "form-control input-sm editHidden";
        
        /* list status user */
        foreach($this->lstUserStatus as $x => $x_value) {
            $this->lstStatus->AddItem(new QListItem($x_value, $x));
        }
        
        // controles generados
        $this->mctUsuario = UserMetaControl::CreateFromPathInfo($this);
        
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
                $this->errorDialog = true;
                throw new Exception("You must enter a valid Email");
            }
            
            if(strcmp(trim($this->txtPassword->Text), "") === 0){
                $this->txtPassword->SetFocus();
                $this->errorDialog = true;
                throw new Exception("You must enter a valid password");
            }
            
            if (!is_numeric(trim($this->txtPhone->Text))) {
                $this->txtPhone->SetFocus();
                $this->errorDialog = true;
                throw new Exception("You must enter a valid phone number");
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
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data Saved Correctly!');");
            
            $this->CloseSelf(false);
        } catch (Exception $exc) {
            
            if($this->errorDialog == true){
                //QApplication::ExecuteJavaScript("showWarning('Error: " . str_replace("'", "\'", $exc->getMessage()) . "');");
                QApplication::ExecuteJavaScript("showDialogAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
                
            }else{
                QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
            }
            
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    

    public function load($id) {
        try {
            $obj = User::LoadByIdUser(intval($id));
            $this->mctUsuario->objUser = $obj;
            $this->mctUsuario->blnEditMode = TRUE;
            $this->mctUsuario->Refresh();
            $this->lstStatus->SelectedValue = $obj->StatusUser;
            
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
