<?php

class DialogValidateOffer extends QDialogBox {

    public $txtMessage;
    public $btnYes;
    public $btnNo;
    public $ID = 0;
    public $strClosePanelMethod;
    public $btnValidarQr;
    public $btnValidarUbicacion;
    public $btnHideClick;
    public $btnHideClickLoadDefault;
    public $txtCurrentAddress;
    public $txtHideText;
    public $alertTypes;

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
        $this->btnYes->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnYes_Click'));

        $this->btnNo = new QButton($this);
        $this->btnNo->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnNo->HtmlEntities = false;
        $this->btnNo->CssClass = "btn btn-raised btn-danger";
        $this->btnNo->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnNo_Click'));

        $this->btnValidarQr = new QButton($this);
        $this->btnValidarQr->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnMostrarCamera_Click'));

        $this->btnValidarUbicacion = new QButton($this);
        $this->btnValidarUbicacion->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnHideClick_Click'));

        $this->btnHideClick = new QButton($this);
        $this->btnHideClick->Text = '';
        $this->btnHideClick->HtmlEntities = false;
        $this->btnHideClick->CssClass = "hide";
        $this->btnHideClick->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnHideClick_Click'));

        $this->txtCurrentAddress = new QTextBox($this);
        $this->txtCurrentAddress->Enabled = false;

        $this->txtHideText = new QTextBox($this);
        $this->txtHideText->CssClass = "hide";
        $this->loadDefault();

        $this->alertTypes = getAlertTypes();
    }

    public function loadDefault() {
        $this->btnYes->Text = '<i class="icon fa-check" aria-hidden="true"></i> Apply';
        $this->btnYes->HtmlEntities = false;
        $this->btnYes->Enabled = FALSE;
        $this->btnYes->CssClass = "btn btn-raised btn-primary";


        $this->btnValidarQr->Text = '<i class="icon wb-camera" aria-hidden="true"></i> Validate QR ';
        $this->btnValidarQr->HtmlEntities = false;
        $this->btnValidarQr->CssClass = "btn btn-raised btn-secondary";

        $this->btnValidarUbicacion->Text = '<i class="fas fa-location-arrow" aria-hidden="true"></i> Validate Location ';
        $this->btnValidarUbicacion->HtmlEntities = false;
        $this->btnValidarUbicacion->CssClass = "btn btn-raised btn-secondary";
        $this->btnValidarUbicacion->Enabled = false;
        
        $this->txtCurrentAddress->Text="";
    }

    public function setMessage($message) {
        $this->txtMessage->Text = $message;
        $this->txtMessage->Refresh();
    }

    public function btnMostrarCamera_Click($strFormId, $strControlId, $strParameter) {

        QApplication::ExecuteJavaScript("muestracamera();");
    }

    public function btnHideClick_Click($strFormId, $strControlId, $strParameter) {

        $hideText = $this->txtHideText->Text;
        $preText = explode(":", $hideText)[0];
        $info = explode(":", $hideText)[1];

        $objOffer = Offer::LoadByIdOffer($this->ID);
        $idRestaurant = $objOffer->IdRestaurant;

        if ($preText == "qr") {
            if ($info == $idRestaurant) {
//                QApplication::ExecuteJavaScript("showSuccess('Correct verification 1/2 ...');");
                QApplication::ExecuteJavaScript("showDialogAlert('" . $this->alertTypes['success'] . "','Correct verification 1/2 ...');");

                QApplication::ExecuteJavaScript("getLocation();");

                $this->btnValidarQr->Text = '<i class="icon wb-camera" aria-hidden="true"></i> Validate QR <i class="icon fa-check" aria-hidden="true"></i>';
                $this->btnValidarQr->CssClass = "btn btn-raised btn-success";
                $this->btnValidarUbicacion->Enabled = true;
                $this->txtHideText->Text = "gps:";
                $this->txtHideText->Refresh();
                $this->btnValidarUbicacion->Refresh();
            } else {
                QApplication::ExecuteJavaScript("showDialogAlert('" . $this->alertTypes['danger'] . "','The qr image does not match the offer');");
//                QApplication::ExecuteJavaScript("showError('The qr image does not match the offer');");
                $this->btnValidarQr->Text = '<i class="icon wb-camera" aria-hidden="true"></i> Validate QR <i class="icon fa-close" aria-hidden="true"></i>';
                $this->btnValidarQr->CssClass = "btn btn-raised btn-danger";
            }
            $this->btnValidarQr->Refresh();
        } else if ($preText == "gps") {

            if ($this->txtCurrentAddress->Text == "") {
                QApplication::ExecuteJavaScript("showDialogAlert('" . $this->alertTypes['warning'] . "','Please activate your GPS to continue');");
//                QApplication::ExecuteJavaScript("showWarning('Please activate your GPS to continue');");
            } else {
                $latLong = explode(";", $info);
                $txtLat = $latLong[0];
                $txtLong = $latLong[1];

                $objRestaurant = Restaurant::LoadByIdRestaurant($idRestaurant);
                $objLat = $objRestaurant->Latitude;
                $objLon = $objRestaurant->Longitude;

                if ((abs($txtLat) - abs($objLat)) < 1 && (abs($txtLong) - abs($objLon)) < 1) {
//                    QApplication::ExecuteJavaScript("showSuccess('Correct verification 2/2 ...');");
                    QApplication::ExecuteJavaScript("showDialogAlert('" . $this->alertTypes['success'] . "','Correct verification 2/2 ...');");
                    $this->btnValidarUbicacion->Text = '<i class="icon wb-camera" aria-hidden="true"></i> Validate Location <i class="icon fa-check" aria-hidden="true"></i>';
                    $this->btnValidarUbicacion->CssClass = "btn btn-raised btn-success";
                    $this->btnYes->Enabled = true;
                } else {
                    $this->btnValidarUbicacion->Text = '<i class="icon wb-camera" aria-hidden="true"></i> Validate Location <i class="icon fa-close" aria-hidden="true"></i>';
                    $this->btnValidarUbicacion->CssClass = "btn btn-raised btn-danger";
                    QApplication::ExecuteJavaScript("showDialogAlert('" . $this->alertTypes['danger'] . "','You are not near the restaurant');");
//                    QApplication::ExecuteJavaScript("showError('You are not near the restaurant ');");
                }
                $this->btnYes->Refresh();
                $this->btnValidarUbicacion->Refresh();
            }
        }
    }

    public function btnYes_Click($strFormId, $strControlId, $strParameter) {

        $objOffer = Offer::LoadByIdOffer($this->ID);
        $objOffer->AppliedOffers = ($objOffer->AppliedOffers + 1);

        if ($objOffer->AppliedOffers <= $objOffer->MaxOffers) {

            $prevBalance = Balance::LoadArrayByIdOffer($this->ID);
            if (empty($prevBalance)) {
//              Actualizando el numero de ofertas aplicadas
                $objOffer->Save();

                $user = @unserialize($_SESSION['TobUser']);
//              Creando balance para usuario
                $objBalance = new Balance();
                $objBalance->Date = QDateTime::Now();
                $objBalance->AmountExchangedCoins = $objOffer->OfferedCoins;
                $objBalance->IdUser = $user->IdUser;
                $objBalance->IdOffer = $objOffer->IdOffer;

                $objBalance->Save();
                QApplication::ExecuteJavaScript("showAlert('" . $this->alertTypes['success'] . "','Offer applied correctly ...');");
//                QApplication::ExecuteJavaScript("showSuccess('Offer applied correctly ...');");
            } else {
                QApplication::ExecuteJavaScript("showAlert('" . $this->alertTypes['danger'] . "','Sorry, you have already applied to this offer in another instance!');");
//                QApplication::ExecuteJavaScript("showWarning('Sorry, you have already applied to this offer in another instance!');");
            }
            $this->CloseSelf(true);
        } else {
            QApplication::ExecuteJavaScript("showAlert('" . $this->alertTypes['danger'] . "','Sorry, the maximum number of offers has already been reached!');");
//            QApplication::ExecuteJavaScript("showError('Sorry, the maximum number of offers has already been reached!');");
        }
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
