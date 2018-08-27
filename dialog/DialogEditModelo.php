<?php

/**
 * Created by PhpStorm.
 * User: César Pantoja
 * Date: 9/20/17
 * Time: 11:03 PM
 */
class DialogEditModelo extends QDialogBox
{

    public $mctModelo;
    public $txtNombre;
    public $chkProductoDefecto;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditModelo.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;


        // controles generados
        $this->mctModelo = ModeloMetaControl::CreateFromPathInfo($this);

        $this->txtNombre = $this->mctModelo->txtNombre_Create();
        $this->txtNombre->Placeholder = "Nombre";

        $this->chkProductoDefecto = new QCheckBox($this, 'Crear');
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


            //cuando es new
            if ($this->mctModelo->objModelo->IdModelo == null) {
            }

            //salvar
            $this->mctModelo->SaveModelo();
            if($this->chkProductoDefecto->Checked == true){
                $idfinal = $this->mctModelo->objModelo->IdModelo;
                $allproductos= Productodefecto::LoadAll();
                foreach ($allproductos as $p){
                    $newProduct = new Producto();
                    $newProduct->Nombre= $p->Nombre;
                    $newProduct->Talla= $p->Talla;
                    $newProduct->CostoUnitario= 0;
                    $newProduct->CantidadStock= 0;
                    $newProduct->Codigo= strtoupper(uniqid());
                    $newProduct->IdModelo= $idfinal;
                    $newProduct->Save();
                }

            }

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
        $this->mctModelo->objModelo = new Modelo();
        $this->mctModelo->Refresh();
        $this->chkProductoDefecto->Checked= false;

    }

    public function loadDefault($id) {
        try {
            $obj = Modelo::LoadByIdModelo(intval($id));
            $this->mctModelo->objModelo = $obj;
            $this->mctModelo->blnEditMode = TRUE;
            $this->mctModelo->Refresh();
            $this->chkProductoDefecto->Checked= false;
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