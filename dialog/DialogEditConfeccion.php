<?php

/**
 * Created by PhpStorm.
 * User: César Pantoja
 * Date: 9/20/17
 * Time: 11:03 PM
 */
class DialogEditConfeccion extends QDialogBox
{

    public $mctConfeccionproducto;
    public $lstIdProductoObject;
    public $txtCantidadStock;
    public $chkEstadoConfeccion;
    public $calFechaConfeccion;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditConfeccion.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;


        // controles generados
        $this->mctConfeccionproducto = ConfeccionproductoMetaControl::CreateFromPathInfo($this);

        $this->lstIdProductoObject = $this->mctConfeccionproducto->lstIdProductoObject_Create();
        $this->lstIdProductoObject->CssClass = "form-control input-sm editHidden";
        
        $this->txtCantidadStock = $this->mctConfeccionproducto->txtCantidadStock_Create();
        $this->txtCantidadStock->Placeholder = "Cantidad Stock";
       

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
            if ($this->mctConfeccionproducto->objConfeccionproducto->IdConfeccionProducto == null) {
                $this->mctConfeccionproducto->objConfeccionproducto->FechaConfeccion = QDateTime::Now();
                $this->mctConfeccionproducto->objConfeccionproducto->EstadoConfeccion = false;
            }

            //salvar
            $this->mctConfeccionproducto->SaveConfeccionproducto();

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
        $this->mctConfeccionproducto->objConfeccionproducto = new Confeccionproducto();
        $this->mctConfeccionproducto->Refresh();
    }

    public function loadDefault($id) {
        try {
            $obj = Confeccionproducto::LoadByIdConfeccionProducto(intval($id));
            $this->mctConfeccionproducto->objConfeccionproducto = $obj;
            $this->mctConfeccionproducto->blnEditMode = TRUE;
            $this->mctConfeccionproducto->Refresh();
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