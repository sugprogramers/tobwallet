<?php

class DialogDownloadPrint extends QDialogBox {

    public $mctRestaurant;
    public $txtMessage;
    public $btnPrint;
    public $btnDownload;
    public $btnCancel;
    public $ID = 0;
    public $strClosePanelMethod;
    public $strPathFile;
    public $strObjectId;
    public $fileName;

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

        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogDownloadPrint.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        $this->mctRestaurant = RestaurantMetaControl::CreateFromPathInfo($this);

        $this->txtMessage = "default message...";

        $this->fileName = $this->mctRestaurant->objRestaurant->RestaurantName . "_qr.png";

        $this->btnDownload = new QButton($this);
        $this->btnDownload->Text = '<i class="icon fa-download" aria-hidden="true"></i> Download';
        $this->btnDownload->HtmlEntities = false;
        $this->btnDownload->CssClass = "btn btn-raised btn-primary";
        $this->btnDownload->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDownload_Click'));

        $this->btnPrint = new QButton($this);
        $this->btnPrint->Text = '<i class="icon  wb-print" aria-hidden="true"></i> Print';
        $this->btnPrint->HtmlEntities = false;
        $this->btnPrint->CssClass = "btn btn-raised btn-primary";
        $this->btnPrint->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnPrint_Click'));

        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnCancel->HtmlEntities = false;
        $this->btnCancel->CssClass = "btn btn-raised btn-danger";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnNo_Click'));
    }

    public function setMessage($message) {
        $this->txtMessage->Text = $message;
        $this->txtMessage->Refresh();
    }

    public function setObjectId($strObjectId) {
        $this->strObjectId = $strObjectId;
    }

    public function btnDownload_Click($strFormId, $strControlId, $strParameter) {

        $filePath = $this->strPathFile;
        $filename = $this->mctRestaurant->objRestaurant->RestaurantName . "_qr";

        QApplication::ExecuteJavaScript("downloadFile('" . $filename . "','" . $filePath . "');");
        $this->CloseSelf(FALSE);
    }

    public function btnPrint_Click($strFormId, $strControlId, $strParameter) {
        $filePath = $this->strPathFile;
        print_r($filePath);

        QApplication::ExecuteJavaScript("printQrImage('" . $filePath . "');");
        $this->CloseSelf(FALSE);
    }

    public function btnNo_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    public function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade, $this->ID);
        $this->HideDialogBox();
    }

    public function loadDefault($id) {
        try {
            $obj = Restaurant::LoadByIdRestaurant($id);
            $this->mctRestaurant->objRestaurant = $obj;

        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }
}

?>
