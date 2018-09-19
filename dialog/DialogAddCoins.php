<?php

class DialogAddCoins extends QDialogBox {

    public $mctUsuario;
    public $txtTotalQtyCoins;
    public $currentQtyCoins;
    public $aditionalcoins;
    public $txtWalletAddress;
    public $btnSave;
    public $btnCancel;
    public $strClosePanelMethod;
    
    protected $alertTypes;
    protected $errorDialog;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogAddCoins.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctUsuario = UserMetaControl::CreateFromPathInfo($this);
        
        /*$this->txtTotalQtyCoins = $this->mctUsuario->txtTotalqtycoins_Create();
        $this->txtTotalQtyCoins->ReadOnly = true;*/
        
        $this->currentQtyCoins = new QIntegerTextBox($this);
        $this->currentQtyCoins->ReadOnly = true;
        $this->currentQtyCoins->Placeholder = "Additional coins";
        
        $this->aditionalcoins = new QIntegerTextBox($this);
        $this->aditionalcoins->Placeholder = "Additional coins";
        $this->aditionalcoins->Minimum = 0;
        
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
        
        $this->alertTypes = getAlertTypes();
        $this->errorDialog = false;
    }

    // eventos buttons
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
       
        try {
            if (!is_numeric(trim($this->aditionalcoins->Text))) {
                $this->aditionalcoins->SetFocus();
                $this->errorDialog = true;
                throw new Exception("You must enter a number");
            }
            $qty = $this->mctUsuario->objUser->Totalqtycoins;
            
            $this->mctUsuario->objUser->Totalqtycoins = $qty + $this->aditionalcoins->Text;
            
            //salvar
            $this->mctUsuario->SaveUser();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data Saved Correctly!');");
            
            $this->CloseSelf(true);
        } catch (Exception $exc) {
            /*if($this->errorDialog == true){
                QApplication::ExecuteJavaScript("showDialogAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
            }else{
                QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
            }*/
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    public function loadDefault($id) {
        try {
            $obj = User::LoadByIdUser(intval($id));
            $this->mctUsuario->objUser = $obj;
            $this->mctUsuario->blnEditMode = TRUE;
            $this->currentQtyCoins->Text = $obj->Totalqtycoins;
            $this->aditionalcoins->Text = 0;
            $this->mctUsuario->Refresh();
            
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
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
