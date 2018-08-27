<?php

class DialogPermit extends QDialogBox {

    public $mctUsuario;
   
    public $chkPermisoCajero;
    public $chkPermisoVendedor;
    public $chkPermisoAlmacen;
    public $chkPermisoDespacho;
                
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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogPermit.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctUsuario = UsuarioMetaControl::CreateFromPathInfo($this);

        $this->chkPermisoCajero = $this->mctUsuario->chkPermisoCajero_Create();
        $this->chkPermisoCajero->SetCustomAttribute('data-plugin', 'switchery');
        $this->chkPermisoCajero->SetCustomAttribute('data-color', '#b9171c');
        
        $this->chkPermisoVendedor = $this->mctUsuario->chkPermisoVendedor_Create();
        $this->chkPermisoAlmacen = $this->mctUsuario->chkPermisoAlmacen_Create();
        $this->chkPermisoDespacho = $this->mctUsuario->chkPermisoDespacho_Create();
			
        
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
            //salvar
            $this->mctUsuario->SaveUsuario();

            $this->CloseSelf(TRUE);
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error: " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

   
    public function loadDefault($id) {
        try {
            $obj = Usuario::LoadByIdUsuario(intval($id));
            $this->mctUsuario->objUsuario = $obj;
            $this->mctUsuario->blnEditMode = TRUE;
            $this->mctUsuario->Refresh();
            
            
          
            
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
