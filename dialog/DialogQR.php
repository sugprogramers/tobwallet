<?php

require('qrcode/phpqrcode.php');

class DialogQR extends QDialogBox {
    
    public $mctRestaurant;

    public $txtMessage;
    public $btnYes;
    public $btnNo;
    public $ID = 0;
    public $strClosePanelMethod;
    private $imagespath;
    
    public $strObjectId;

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
        
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogQR.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
        
        $this->mctRestaurant = RestaurantMetaControl::CreateFromPathInfo($this);
        
        $this->imagespath = __QR_IMAGES__;
        
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
    
    public function setObjectId($strObjectId){
        $this->strObjectId = $strObjectId;
    }

    public function btnYes_Click($strFormId, $strControlId, $strParameter) {
        
        try{
            QRcode::png($this->mctRestaurant->objRestaurant->IdRestaurant, __QR_IMAGES__ . "/" . $this->mctRestaurant->objRestaurant->IdRestaurant . '.png');
        
            $this->mctRestaurant->objRestaurant->QrCode = __QR_IMAGES__ . "/" . $this->mctRestaurant->objRestaurant->IdRestaurant . '.png';
            
            $this->mctRestaurant->SaveRestaurant();
            
        } catch (Exception $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
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
    
    public function loadDefault($id) {
        try {
            $obj = Restaurant::LoadByIdRestaurant($id);
            $this->mctRestaurant->objRestaurant = $obj;
            //$this->mctRestaurant->blnEditMode = TRUE;
            //$this->mctRestaurant->Refresh();
            
            /*$obj = User::LoadByIdUser(intval($id));
            $this->mctUsuario->objUser = $obj;
            $this->mctUsuario->blnEditMode = TRUE;
            $this->mctUsuario->Refresh();
            $this->lstStatus->SelectedValue = $obj->StatusUser;
            $this->lstMiningOption->SelectedValue = $obj->MiningOption;*/
            
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }

}

?>
