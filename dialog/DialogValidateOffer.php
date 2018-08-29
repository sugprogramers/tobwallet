<?php

class DialogValidateOffer extends QDialogBox {

    public $txtMessage;
    public $btnYes;
    public $btnNo;
    public $ID = 0;
    public $strClosePanelMethod;

    public function __construct($objParentObject, $strClosePanelMethod, $strControlId = null) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->Title = "Confirmation";
        $this->Width = 400;
        $this->isAutosize = true;
        $this->Resizable = FALSE;
        
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogValidateOffer.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        
        $this->txtMessage = "default message...";

        $this->btnYes = new QButton($this);
        $this->btnYes->Text = '<i class="icon fa-check" aria-hidden="true"></i> Yes';
        $this->btnYes->HtmlEntities = false;
        $this->btnYes->CssClass = "btn btn-raised btn-primary";
        $this->btnYes->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnYes_Click'));

        $this->btnNo = new QButton($this);
        $this->btnNo->Text = '<i class="icon fa-close" aria-hidden="true"></i> No';
        $this->btnNo->HtmlEntities = false;
        $this->btnNo->CssClass = "btn btn-raised btn-danger";
        $this->btnNo->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnNo_Click'));
    }
    
    public function setMessage($message){
          $this->txtMessage->Text = $message;
          $this->txtMessage->Refresh();
    }

    public function btnYes_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(true);
    }

    public function btnNo_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    public function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        //if($strMethod!= NULL)
        $this->objForm->$strMethod($blnChangesMade, $this->ID);
        $this->HideDialogBox();
    }

}

?>
