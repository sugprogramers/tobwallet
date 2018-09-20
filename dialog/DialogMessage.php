<?php

//require('utilities.php');

class DialogMessage extends QDialogBox {

    public $mctMessage;
    
    public $lstType;
    public $txtBody;
    
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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogMessage.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctMessage = MessageMetaControl::CreateFromPathInfo($this);
        
        $this->txtBody = $this->mctMessage->txtBody_Create();
        $this->txtBody->CssClass = "form-control input-sm editHidden";
        
        $this->lstType = new QListBox($this);
        $this->lstType->CssClass = "form-control input-sm editHidden";
        foreach(getMessageTypeToAdmin() as $x => $x_value) {
            $this->lstType->AddItem(new QListItem($x_value, $x));
        }
        
        //buttons
        $this->btnSave = new QButton($this);
        $this->btnSave->HtmlEntities = FALSE;
        $this->btnSave->Text = '<i class="icon fa-check" aria-hidden="true"></i> Send';
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
            if (trim($this->txtBody->Text) == "") {
                $this->txtBody->SetFocus();
                $this->errorDialog = true;
                throw new Exception("You must enter a message");
            }
            
            $this->mctMessage->objMessage->Type = $this->lstType->SelectedValue;
            
            $this->mctMessage->objMessage->IdUser = 2;
            $this->mctMessage->objMessage->IsRead = 0;
            
            if($this->mctMessage->objMessage->IdMessage == null){
                $this->mctMessage->objMessage->CreatedDate = QDateTime::Now();
            }
            
            $this->mctMessage->SaveMessage();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data Saved Correctly!');");
            
            $this->CloseSelf(true);
        } catch (Exception $exc) {
            if($this->errorDialog == true){
                QApplication::ExecuteJavaScript("showDialogAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
                
            }else{
                QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
            }
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }
    
    public function createNew() {
        $this->mctMessage->objMessage = new Message();
        $this->mctMessage->Refresh();
    }

    public function loadDefault($id) {
        try {
            $obj = Message::LoadByIdMessage(intval($id));
            $this->mctMessage->objMessage = $obj;
            $this->mctMessage->blnEditMode = TRUE;
            $this->mctMessage->Refresh();
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".$exc->getMessage()."');");
        }
    }
    
    public function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade);
        $this->HideDialogBox();
    }
    
}

?>
