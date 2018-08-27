<?php

class DialogEditOrganization extends QDialogBox {

    public $mctOrganizacion;
    public $txtName;
    public $txtPhone;
    public $txtQrCode;
    public $txtImageOrganization;
    public $txtLatitude;
    public $txtLongitud;
    public $txtCountry;
    public $txtCity;
    public $txtAddress;
    public $lstIdOrganizationTypeObject;
    public $lstIdOwnerObject;
   
    public $btnSave;
    public $btnCancel;
    public $strClosePanelMethod;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditOrganization.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctOrganizacion = OrganizationMetaControl::CreateFromPathInfo($this);

        $this->txtName = $this->mctOrganizacion->txtName_Create();
        $this->txtName->Placeholder = "Name";

        $this->txtPhone = $this->mctOrganizacion->txtPhone_Create();
        $this->txtPhone->Placeholder = htmlentities("Phone");

        $this->txtQrCode = $this->mctOrganizacion->txtQrCode_Create();
        $this->txtQrCode->Placeholder = "Path qrcode";
        
        $this->txtImageOrganization = $this->mctOrganizacion->txtOrganizationImage_Create();
        $this->txtImageOrganization->Placeholder = "Path organization";
        
        $this->txtLatitude = $this->mctOrganizacion->txtLatitude_Create();
        $this->txtLatitude->Placeholder = "Latitude";
        
        $this->txtLongitud = $this->mctOrganizacion->txtLongitude_Create();
        $this->txtLongitud->Placeholder = "Longitude";
        
        $this->txtCountry = $this->mctOrganizacion->txtCountry_Create();
        $this->txtCountry->Placeholder = "Country";

        $this->txtCity = $this->mctOrganizacion->txtCity_Create();
        $this->txtCity->Placeholder = "City";
        
        $this->txtAddress = $this->mctOrganizacion->txtAddress_Create();
        $this->txtAddress->Placeholder = "Address";
        
        $this->lstIdOrganizationTypeObject = $this->mctOrganizacion->lstIdOrganizationTypeObject_Create();
        $this->txtAddress->CssClass = "form-control input-sm editHidden";
        
        $this->lstIdOwnerObject = $this->mctOrganizacion->lstIdOwnerObject_Create();
        $this->txtAddress->CssClass = "form-control input-sm editHidden";        
        
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
            if (!isEmail(trim($this->txtName->Text))) {
                $this->txtName->SetFocus();
                throw new Exception("Debe ingresar un nombre válido");
            }
            
            if (!is_numeric(trim($this->txtLatitude->Text))) {
                $this->txtLatitude->SetFocus();
                throw new Exception("Debe ingresar una coordenada valida");
            }
            
            if (!is_numeric(trim($this->txtLongitud->Text))) {
                $this->txtLongitud->SetFocus();
                throw new Exception("Debe ingresar una coordenada valida");
            }
            
            //cuando es new
            if ($this->mctOrganizacion->objOrganization->IdOrganization == null) {
                $this->mctOrganizacion->objOrganization->Name = '';
                $this->mctOrganizacion->objOrganization->Latitude = '';
                $this->mctOrganizacion->objOrganization->Longitude = '';
                
                
            }

            //salvar
            $this->mctOrganizacion->SaveOrganization();
           
            

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
        $this->mctOrganizacion->objOrganization = new Organization();
        $this->mctOrganizacion->Refresh();
    }

    public function loadDefault($id) {
        try {
            $obj = Organization::LoadByIdOrganization(intval($id));
            $this->mctOrganizacion->objOrganization = $obj;
            $this->mctOrganizacion->blnEditMode = TRUE;
            $this->mctOrganizacion->Refresh();

            
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
