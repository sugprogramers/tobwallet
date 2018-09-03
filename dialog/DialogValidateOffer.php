<?php

class DialogValidateOffer extends QDialogBox {

    public $txtMessage;
    public $btnYes;
    public $btnNo;
    public $ID = 0;
    public $strClosePanelMethod;
    public $btnValidarQr;
    public $btnValidarUbicacion;
    public $btnHideClickQr;
    public $txtCurrentAddress;
    public $txtHideText;

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
        $this->btnYes->Visible = false;
        $this->btnYes->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnYes_Click'));

        $this->btnNo = new QButton($this);
        $this->btnNo->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnNo->HtmlEntities = false;
        $this->btnNo->CssClass = "btn btn-raised btn-danger";
        $this->btnNo->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnNo_Click'));

        $this->btnValidarQr = new QButton($this);
        $this->btnValidarQr->Text = '<i class="icon wb-camera" aria-hidden="true"></i> Validate QR ';
        $this->btnValidarQr->HtmlEntities = false;
        $this->btnValidarQr->CssClass = "btn btn-raised btn-secondary";
        $this->btnValidarQr->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnMostrarCamera_Click'));

        $this->btnValidarUbicacion = new QButton($this);
        $this->btnValidarUbicacion->Text = '<i class="fas fa-location-arrow" aria-hidden="true"></i> Validate Location ';
        $this->btnValidarUbicacion->HtmlEntities = false;
        $this->btnValidarUbicacion->blnVisible = true;
        $this->btnValidarUbicacion->CssClass = "btn btn-raised btn-secondary";
        $this->btnValidarUbicacion->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnHideClick_Click'));

        $this->btnHideClickQr = new QButton($this);
        $this->btnHideClickQr->Text = '';
        $this->btnHideClickQr->HtmlEntities = false;
        $this->btnHideClickQr->CssClass = "hide";
        $this->btnHideClickQr->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnHideClick_Click'));

        $this->txtCurrentAddress = new QTextBox($this);

        $this->txtHideText = new QTextBox($this);       
        $this->txtHideText->CssClass = "hide";
    }

    public function setMessage($message) {
        $this->txtMessage->Text = $message;
        $this->txtMessage->Refresh();
    }

    public function btnMostrarCamera_Click($strFormId, $strControlId, $strParameter) {

        QApplication::ExecuteJavaScript("muestracamera();");
        QApplication::ExecuteJavaScript("getLocation();");
//        $this->CloseSelf(true);
    }

    public function btnHideClick_Click($strFormId, $strControlId, $strParameter) {

        $hideText = $this->txtHideText->Text;

        $preText = explode(":", $hideText)[0];
        $info = explode(":", $hideText)[1];

        $objOffer = Offer::LoadByIdOffer($this->ID);
        $idRestaurant = $objOffer->IdRestaurant;

        if (explode(":", $hideText)[0] == "qr") {
            if ($info == $idRestaurant) {
                QApplication::ExecuteJavaScript("showSuccess('Verificacion correcta 1/2 ...');");
//                QApplication::ExecuteJavaScript("getLocation();");
            } else {
                QApplication::ExecuteJavaScript("showError('La imagen qr no coincide con la oferta');");
            }
        } else if ($preText == "gps") {

            $latLong = explode(";", $info);
            $txtLat = $latLong[0];
            $txtLong = $latLong[1];

            $objRestaurant = Restaurant::LoadByIdRestaurant($idRestaurant);
            $objLat = $objRestaurant->Latitude;
            $objLon = $objRestaurant->Longitude;

            if ((abs($txtLat) - abs($objLat)) < 1 && (abs($txtLong) - abs($objLon)) < 1) {
                QApplication::ExecuteJavaScript("showSuccess('Verificacion correcta 2/2 ...');");


                //Actualizando el numero de ofertas aplicadas
                $objOffer->AppliedOffers = ($objOffer->AppliedOffers + 1);
                $objOffer->Save();

                $user = @unserialize($_SESSION['DatosUsuario']);
                //Creando balance para usuario
                $objBalance = new Balance();
                $objBalance->Date = new DateTime();
                $objBalance->AmountExchangedCoins = $objOffer->OfferedCoins;
                $objBalance->IdUser = $user->IdUser;
                $objBalance->IdOffer = $objOffer->IdOffer;

                $objBalance->Save();

                QApplication::ExecuteJavaScript("showSuccess('Oferta aplicada correctamente ...');");
                $this->CloseSelf(true);
            } else {
                QApplication::ExecuteJavaScript("showError('Usted no se encuentra cerca del restaurante ');");
            }
        }


//        $this->CloseSelf(true);
    }

//    public function btnAutoClick_Click($strFormId, $strControlId, $strParameter) {
//
//        QApplication::ExecuteJavaScript("muestracamera();");
////        $this->CloseSelf(true);
//    }

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
