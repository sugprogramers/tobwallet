<?php

class DialogEditRestaurant extends QDialogBox {

    public $strIdUser;
    public $mctRestaurant;
    public $txtCountry;
    public $txtCity;
    
    public $txtRestaurantName;
    public $txtAddress;
    
    public $txtLongitude;
    public $txtLatitude;
   
    public $btnSave;
    public $btnCancel;
    public $strClosePanelMethod;
    
    public $filePath;
    public $hasQR;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditRestaurant.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctRestaurant = RestaurantMetaControl::CreateFromPathInfo($this);
        
        $this->txtCountry = $this->mctRestaurant->txtCountry_Create();
        $this->txtCountry->Placeholder = htmlentities("Country");
        
        $this->txtCity = $this->mctRestaurant->txtCity_Create();
        $this->txtCity->Placeholder = htmlentities("City");
        $this->txtRestaurantName = $this->mctRestaurant->txtRestaurantName_Create();
        $this->txtAddress = $this->mctRestaurant->txtAddress_Create();
        $this->txtLongitude = $this->mctRestaurant->txtLongitude_Create();
        $this->txtLatitude = $this->mctRestaurant->txtLatitude_Create();
        
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
            if(!is_numeric(trim($this->txtLongitude->Text))){
                $this->txtLongitude->SetFocus();
                throw new Exception("Debe ingresar un valor válido");
            }
            
            if(!is_numeric(trim($this->txtLatitude->Text))){
                $this->txtLatitude->SetFocus();
                throw new Exception("Debe ingresar un valor válido");
            }
            
            //cuando es new
            if($this->mctRestaurant->objRestaurant->IdRestaurant == null){
                $this->mctRestaurant->objRestaurant->QrCode = "";
            }
            
            /*if($this->strIdUser !== ""){
                $this->mctRestaurant->objRestaurant->IdUser = $this->strIdUser;
            }*/
            
            $this->mctRestaurant->objRestaurant->IdUser = $this->strIdUser;
            $this->mctRestaurant->objRestaurant->Type = "restaurant";
            
            //$oldStatus = $this->mctUsuario->objUser->StatusUser;
            
            //siempre
            //$this->txtStatus->Text = $this->lstStatus->SelectedValue;
            //$this->txtMiningOption->Text = $this->lstMiningOption->SelectedValue;
            //salvar
            $this->mctRestaurant->SaveRestaurant();
            
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
        $this->hasQR = FALSE;
        $this->mctRestaurant->objRestaurant = new Restaurant();
        $this->Refresh();
    }

    public function loadDefault($id) {
        
        try {
            $obj = Restaurant::LoadByIdRestaurant($id);
            $this->mctRestaurant->objRestaurant = $obj;
            $this->mctRestaurant->blnEditMode = TRUE;
            
            $filePath = __QR_IMAGES__ . "/" . $this->mctRestaurant->objRestaurant->IdRestaurant . '.png';
            if(file_exists($filePath)){
                $this->hasQR = TRUE;
            }else{
                $this->hasQR = FALSE;
            }
            
            $this->mctRestaurant->Refresh();
            
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
