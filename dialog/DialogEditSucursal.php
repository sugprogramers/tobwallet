<?php

class DialogEditSucursal extends QDialogBox {

    public $mctSucursal;
    public $txtNombre;
    public $txtDireccion;
    public $txtTelefono;
    
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

        $this->Width = 500;
        $this->Resizable = false;
        $this->isAutosize = true;
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditSucursal.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        
        // controles generados
        $this->mctSucursal = SucursalMetaControl::CreateFromPathInfo($this);
        
        $this->txtNombre = $this->mctSucursal->txtNombre_Create();
        $this->txtNombre->Placeholder = "Nombre";
        
        $this->txtDireccion = $this->mctSucursal->txtDireccion_Create();
        $this->txtDireccion->Placeholder = "Direccion";
        
        $this->txtTelefono = $this->mctSucursal->txtTelefono_Create();
        $this->txtTelefono->Placeholder = "Telefono";

        
        //buttons
        $this->btnSave = new QButton($this);
        $this->btnSave->HtmlEntities = FALSE;
        $this->btnSave->Text = '<i class="icon fa-check" aria-hidden="true"></i> Guardar';
        $this->btnSave->CssClass = "btn btn-primary btn-raised ";
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));

        $this->btnCancel = new QButton($this);
        $this->btnCancel->HtmlEntities = FALSE;
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancelar';
        $this->btnCancel->CssClass = "btn btn-danger btn-raised ";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
    }

    // eventos buttons
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {

        try {
           
            if (!is_numeric(trim($this->txtTelefono->Text))) {
                $this->txtTelefono->SetFocus();
                throw new Exception("Debe ingresar un teléfono válido");
            }
            
            //cuando es new
            if ($this->mctSucursal->objSucursal->IdSucursal == null) {               
            }
            
            //salvar
            $this->mctSucursal->SaveSucursal();

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
        $this->mctSucursal->objSucursal = new Sucursal();
        $this->mctSucursal->Refresh();
    }

    public function loadDefault($id) {
        try {
            $obj = Sucursal::LoadByIdSucursal(intval($id));
            $this->mctSucursal->objSucursal = $obj;
            $this->mctSucursal->blnEditMode = TRUE;
            $this->mctSucursal->Refresh();
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
