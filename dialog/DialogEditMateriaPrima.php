<?php

/**
 * Created by PhpStorm.
 * User: César Pantoja
 * Date: 9/20/17
 * Time: 11:03 PM
 */
class DialogEditMateriaPrima extends QDialogBox
{

    public $mctMateriaprima;
    public $txtNombre;
    public $txtDescripcion;
    public $txtCantidadStock;
    public $txtCantidadStockRestante;
    public $txtCostoUnitario;
    public $txtUnidadMedida;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditMateriaPrima.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;


        // controles generados
        $this->mctMateriaprima = MateriaprimaMetaControl::CreateFromPathInfo($this);

       $this->txtNombre = $this->mctMateriaprima->txtNombre_Create();
        $this->txtNombre->Placeholder = "Nombre";

        $this->txtDescripcion = $this->mctMateriaprima->txtDescripcion_Create();
        $this->txtDescripcion->Placeholder = "Descripción";

        $this->txtCantidadStock = $this->mctMateriaprima->txtCantidadStock_Create();
        $this->txtCantidadStock->Placeholder = "Stock";

        $this->txtCostoUnitario = $this->mctMateriaprima->txtCostoUnitario_Create();
        $this->txtCostoUnitario->Placeholder = "Costo Unitario";

        $this->txtUnidadMedida = $this->mctMateriaprima->txtUnidadMedida_Create();
        $this->txtUnidadMedida->Placeholder = "Unidad de Medida";

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
            if ($this->mctMateriaprima->objMateriaprima->IdMateriaPrima == null) {
                $this->mctMateriaprima->objMateriaprima->Codigo = strtoupper(uniqid());
            }

            //salvar
            $this->mctMateriaprima->SaveMateriaprima();

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
        $this->mctMateriaprima->objMateriaprima = new Materiaprima();
        $this->mctMateriaprima->Refresh();
    }

    public function loadDefault($id) {
        try {
            $obj = Materiaprima::LoadByIdMateriaPrima(intval($id));
            $this->mctMateriaprima->objMateriaprima = $obj;
            $this->mctMateriaprima->blnEditMode = TRUE;
            $this->mctMateriaprima->Refresh();
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