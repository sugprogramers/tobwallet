<?php

require('includes/configuration/prepend.inc.php');



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
    public $fromAdmin;
    public $lstOwners;
    public $ctrlComplete;
    public $txtUploadPhoto;
    public $txtUpload;
    
    public $strEmptyFile;
    
    public $txtfile;
    public $haserror;
    
    public $userTemp;
    
    public $alertTypes;
    public $errorDialog;

    public function __construct($objParentObject, $strClosePanelMethod, $strControlId = null, $fromAdmin = FALSE) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        
        $this->fromAdmin = $fromAdmin;

        $this->Width = 750;
        $this->Resizable = false;
        $this->isAutosize = true;
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditRestaurant.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
        
        $this->strEmptyFile = 'empty.jpg';

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
        $this->txtLatitude->CssClass="form-control input-sm editHidden";
        //$this->txtLatitude
        
        $this->lstOwners = new QListBox($this);
        $this->lstOwners->CssClass = "form-control input-sm editHidden";
        
        if($this->fromAdmin){
            $query = "select user.IdUser as id, concat(user.FirstName, ' ', user.LastName) as name from user where user.UserType = 'O'";
            
            $objDbResult = QApplication::$Database[1]->Query("$query");
            
            $arrayDT = array();
            
            while (($report = $objDbResult->FetchAssoc())) {
                $arrayDT[] = $report;
                $this->lstOwners->AddItem(new QListItem($report['name'], $report['id']));
            }
        }
        
        $this->txtUploadPhoto = new QFileControl($this);
        $this->txtUploadPhoto->SetCustomAttribute("style", "position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';opacity:0;background-color:transparent;color:transparent;");
        $this->txtUploadPhoto->SetCustomAttribute("onchange", "\$j('#upload-file-info2').html(\$j(this).val()); \$j('#c13').val(\$j(this).val()) ;");
        $this->txtUploadPhoto->SetCustomAttribute("accept", "image/*");
        
        //buttons
        $this->btnSave = new QButton($this);
        $this->btnSave->HtmlEntities = FALSE;
        $this->btnSave->Text = '<i class="icon fa-check" aria-hidden="true"></i> Save';
        $this->btnSave->CssClass = "btn btn-primary btn-raised ";
        //$this->btnSave->AddAction(new QClickEvent(), new QServerControlAction($this,'btnSave_Click'));
        $this->btnSave->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnSave_Click'));
        
        $this->btnCancel = new QButton($this);
        $this->btnCancel->HtmlEntities = FALSE;
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnCancel->CssClass = "btn btn-danger btn-raised ";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
        
        //QApplication::ExecuteJavaScript("initLatLng();");
        
        $this->txtUpload = new QTextBox($this);
        
        
        $this->mctRestaurant->objRestaurant->Logo = $this->strEmptyFile;
        
        /*$this->txtfile = new QImageFileAsset($this);
        //$this->txtfile->Required = true;
        $this->txtfile->TemporaryUploadPath = __UPLOAD__;
        $this->txtfile->ClickToView = true;
        
        $this->txtfile->CssClass = 'file_asset';
                
        $this->txtfile->Height = 200;
        $this->txtfile->Width = 200;*/
        
        $this->haserror = false;
        
        $this->alertTypes = getAlertTypes();
        $this->errorDialog = false;
        
    }
    

    // eventos buttons
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $Datos1;
       
        try {
            if($Datos1 = @unserialize($_SESSION['TobUser'])){
                if ($Datos1) {
                    $this->userTemp = User::LoadByEmail($Datos1->Email);
                    
                    if($this->userTemp->StatusUser != 2){
                        throw new Exception("You don\'t have permission to save or update!");
                    }
                } 
            }
            
            if ($this->txtUploadPhoto->File != null && $this->txtUploadPhoto->Size > 5000000) {
                $size = $this->txtUploadPhoto->Size / 1000000;
                QApplication::ExecuteJavaScript("showWarning('Error Size Image Photo is  $size Megabytes, <br>Verify that it is less than 5 Megabytes');");
                $this->haserror = true;
                return;
            }
            
            if (trim($this->txtRestaurantName->Text) == '') {
                $this->txtRestaurantName->Focus();
                $this->haserror = true;
                throw new Exception("Invalid Restaurant Name");
            }
            
            if(!is_numeric(trim($this->txtLongitude->Text))){
                $this->txtLongitude->SetFocus();
                $this->haserror = true;
                throw new Exception("Invalid Longitude");
                return;
            }
            
            if(!is_numeric(trim($this->txtLatitude->Text))){
                $this->txtLatitude->SetFocus();
                $this->haserror = true;
                throw new Exception("Invalid Latitude");
                return;
            }
            
            if($this->mctRestaurant->objRestaurant->IdRestaurant == null || 
                $this->mctRestaurant->objRestaurant->Logo == null){
                
                //cuando es nuevo o no hay foto almacenada
                if ($this->txtUploadPhoto->File == null) {
                    $this->haserror = true;
                    throw new Exception("Upload  Photo!");
                }
            }
            
            $allowed = array('gif', 'png', 'jpg', 'pdf', 'jpeg', 'JPG', 'JPEG');
            
            if ($this->txtUploadPhoto->File != null) {
                $ext = pathinfo($this->txtUploadPhoto->FileName, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $this->haserror;
                    throw new Exception("Invalid Extension File Upload");
                    return;
                }
            }
            
            //cuando es new
            if($this->mctRestaurant->objRestaurant->IdRestaurant == null){
                $this->mctRestaurant->objRestaurant->QrCode = "";
            }
            
            if($this->fromAdmin){
                $this->mctRestaurant->objRestaurant->IdUser = $this->lstOwners->SelectedItem->Value;
            }else{
                $this->mctRestaurant->objRestaurant->IdUser = $this->strIdUser;
            }
            
            $this->mctRestaurant->objRestaurant->Type = "restaurant";
            
            $this->mctRestaurant->SaveRestaurant();
            
            $subido = true;
            
            $to2 = date('YmdHis') . "_" . str_replace(' ', '', $this->txtUploadPhoto->FileName);

            if (@copy($this->txtUploadPhoto->File, __UPLOAD__ . "/" . $to2) && $subido == true){
                $this->mctRestaurant->objRestaurant->Logo = $to2;
                $this->mctRestaurant->SaveRestaurant();
                
            }
            //$this->CloseSelf(TRUE);
            $this->CloseSelf(false);
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data Saved Successfull!')");
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error: " . str_replace("'", "\'", $exc->getMessage()) . "');");
            if($this->haserror){
                $this->ShowDialogBox();
            }
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    //funciones de carga
    public function createNew() {
        QApplication::ExecuteJavaScript("createMap();");
        
        $this->hasQR = FALSE;
        $this->mctRestaurant->objRestaurant = new Restaurant();
        $this->mctRestaurant->objRestaurant->Logo = $this->strEmptyFile;
        $this->mctRestaurant->Refresh();
    }

    public function loadDefault($id) {
        
        try {
            $obj = Restaurant::LoadByIdRestaurant($id);
            $this->strIdUser = $obj->IdUser;
            $this->mctRestaurant->objRestaurant = $obj;
            $this->mctRestaurant->blnEditMode = TRUE;
            
            
            
            QApplication::ExecuteJavaScript("loadMap(".$obj->Latitude.",".$obj->Longitude.");");
            
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
