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
    
    public $userTemp;
    
    
    
    public $alertTypes;
    
    protected $errorDialog;

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
        
        
        $this->alertTypes = getAlertTypes();
        $this->errorDialog = false;
    }
    
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $Datos1;
        try {
            
            if($Datos1 = @unserialize($_SESSION['TobUser'])){
                if ($Datos1) {
                    $this->userTemp = User::LoadByEmail($Datos1->Email);
                    
                    if($this->userTemp->StatusUser != 2){
                        $this->errorDialog = true;
                        throw new Exception("You do not have permission to save or update!");
                    }
                } 
            }
            
            if(!is_numeric(trim($this->txtOfferedCoins->Text))){
                $this->txtOfferedCoins->SetFocus();
                $this->errorDialog = true;
                throw new Exception("You must enter a valid value");
            }
            
            if(!is_numeric(trim($this->txtMaxOffers->Text))){
                $this->txtMaxOffers->SetFocus();
                $this->errorDialog = true;
                throw new Exception("You must enter a valid value");
            }
            
            $this->mctOffer->objOffer->IdRestaurant = $this->lstRestaurants->SelectedValue;
            $this->mctOffer->objOffer->AppliedOffers = 0;
            $this->mctOffer->SaveOffer();
            
            $this->CloseSelf(TRUE);
        } catch (Exception $exc) {
            if($this->errorDialog == true){
                QApplication::ExecuteJavaScript("showDialogAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $exc->getMessage())."');");
            }else{
                QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $exc->getMessage())."');");
            }
            $this->errorDialog = false;
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
    
    public function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade);
        $this->HideDialogBox();
    }

}

?>
