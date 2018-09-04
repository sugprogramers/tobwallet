<?php

class DialogEditOffer extends QDialogBox {

    public $txtMessage;
    public $btnYes;
    public $btnNo;
    public $ID = 0;
    public $strClosePanelMethod;
    
    public $strIdRestaurant;
    public $strIdUser;
    
    public $mctOffer;
    public $lstRestaurants;
    public $txtDescription;
    public $txtOfferedCoins;
    public $txtStartDate;
    public $txtEndDate;
    public $txtIdRestaurant;
    public $txtMaxOffers;
    public $txtAppliedOfferes;
    
    public $btnSave;
    public $btnCancel;
    
    

    public function __construct($objParentObject, $strClosePanelMethod, $strControlId = null, $strParentId = null) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        $this->mctOffer = OfferMetaControl::CreateFromPathInfo($this);
        
        $this->lstRestaurants = new QListBox($this);
        
        $this->strIdUser = $strParentId;
        
        //QApplication::ExecuteJavaScript("showWarning('"."select restaurant.IdRestaurant as id, restaurant.RestaurantName as name from restaurant where restaurant.IdUser = " . $this->strIdUser."');");
        
        //$this->strIdUser = $strParentId;
        //if($this->strIdUser != null){
            $query = "select restaurant.IdRestaurant as id, restaurant.RestaurantName as name from restaurant where restaurant.IdUser = ".$this->strIdUser."";
            $arrayFilter = array();
            $objDbResult = QApplication::$Database[1]->Query("$query");
            
            $arrayDT = array();
            
            while (($report = $objDbResult->FetchAssoc())) {
                $arrayDT[] = $report;
                $this->lstRestaurants->AddItem(new QListItem($report['name'], $report['id']));
            }
        //}
        
        $this->lstRestaurants->CssClass = "form-control input-sm editHidden";
        
        $this->txtDescription = $this->mctOffer->txtDescription_Create();
        $this->txtDescription->CssClass = "form-control input-sm editHidden";
        
        $this->txtOfferedCoins = $this->mctOffer->txtOfferedCoins_Create();
        $this->txtStartDate = $this->mctOffer->calDateFrom_Create();
        $this->txtEndDate = $this->mctOffer->calDateTo_Create();
        $this->txtMaxOffers = $this->mctOffer->txtMaxOffers_Create();
        //$this->txtAppliedOfferes = $this->mctOffer->txtAppliedOffers_Create();
        
        $this->txtStartDate->DateTimePickerType = QDateTimePickerType::Date;
        $this->txtEndDate->DateTimePickerType = QDateTimePickerType::Date;

        $this->Title = "Confirmation";
        $this->Width = 550;
        $this->isAutosize = true;
        $this->Resizable = FALSE;
        
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditOffer.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
        
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
    
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
       
        try {
            if(!is_numeric(trim($this->txtOfferedCoins->Text))){
                $this->txtOfferedCoins->SetFocus();
                throw new Exception("Debe ingresar un valor válido");
            }
            
            if(!is_numeric(trim($this->txtMaxOffers->Text))){
                $this->txtMaxOffers->SetFocus();
                throw new Exception("Debe ingresar un valor válido");
            }
            
            $this->mctOffer->objOffer->IdRestaurant = $this->lstRestaurants->SelectedValue;
            
            $this->mctOffer->objOffer->AppliedOffers = 0;
            //siempre
            //$this->txtStatus->Text = $this->lstStatus->SelectedValue;
            //$this->txtMiningOption->Text = $this->lstMiningOption->SelectedValue;
            //salvar
            $this->mctOffer->SaveOffer();
            
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
        $this->mctOffer->objOffer = new Offer();
        $this->mctOffer->Refresh();
    }

    public function loadDefault($id) {
        
        
        try {
            $obj = Offer::LoadByIdOffer($id);
            $this->mctOffer->objOffer = $obj;
            $this->mctOffer->blnEditMode = TRUE;
            $this->mctOffer->Refresh();
            
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
