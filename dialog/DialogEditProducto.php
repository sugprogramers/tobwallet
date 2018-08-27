<?php

/**
 * Created by PhpStorm.
 * User: César Pantoja
 * Date: 9/20/17
 * Time: 11:03 PM
 */
class DialogEditProducto extends QDialogBox
{

    public $mctProducto;

    public $txtNombre;
    public $txtTalla;
    public $txtCantidadStock;
    public $txtCostoUnitario;
    public $lstIdModeloObject;
    
    public $lstTalla;
    public $btnAddModelo;

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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditProducto.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;


        // controles generados
        $this->mctProducto = ProductoMetaControl::CreateFromPathInfo($this);


        $this->txtNombre = $this->mctProducto->txtNombre_Create();
        $this->txtNombre->Placeholder = "Nombre";

        $this->txtTalla = $this->mctProducto->txtTalla_Create();
        $this->txtTalla->Placeholder = "Talla";
        
        //4 6 8 10 12 14 16 S M L XL XXL XXXL
        $this->lstTalla = new QListBox($this);
        $this->lstTalla->CssClass = "form-control input-sm editHidden";
        $this->lstTalla->AddItem(new QListItem('4', 1));
        $this->lstTalla->AddItem(new QListItem('6', 2));
        $this->lstTalla->AddItem(new QListItem('8', 3));
        $this->lstTalla->AddItem(new QListItem('10', 4));
        $this->lstTalla->AddItem(new QListItem('12', 5));
        $this->lstTalla->AddItem(new QListItem('14', 6));
        $this->lstTalla->AddItem(new QListItem('16', 7));
        $this->lstTalla->AddItem(new QListItem('S', 8));
        $this->lstTalla->AddItem(new QListItem('M', 9));
        $this->lstTalla->AddItem(new QListItem('L', 10));
        $this->lstTalla->AddItem(new QListItem('XL', 11));
        $this->lstTalla->AddItem(new QListItem('XXL', 12));
        $this->lstTalla->AddItem(new QListItem('XXXL', 13));
        
        

        $this->txtCantidadStock= $this->mctProducto->txtCantidadStock_Create();
        $this->txtCantidadStock->Placeholder = "Cantidad Stock";

        $this->txtCostoUnitario= $this->mctProducto->txtCostoUnitario_Create();
        $this->txtCostoUnitario->Placeholder = "Costo Unitario";
        
        $this->lstIdModeloObject = $this->mctProducto->lstIdModeloObject_Create();
        $this->lstIdModeloObject->CssClass = "form-control input-sm editHidden";
        
        
        //adicionales
        $this->btnAddModelo = new QButton($this);
        $this->btnAddModelo->CssClass = "btn btn-icon btn-dark btn-outline btn-round btn-sm";
        $this->btnAddModelo->HtmlEntities = "false";
        $this->btnAddModelo->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnAddModelo->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnAddModelo_Click'));
        
        

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
            if ($this->mctProducto->objProducto->IdProducto == null) {
                $this->mctProducto->objProducto->Codigo = strtoupper(uniqid());                
            }
            
            
             $this->txtTalla->Text = $this->lstTalla->SelectedValue;

            //salvar
            $this->mctProducto->SaveProducto();

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
        $this->mctProducto->objProducto = new Producto();
        $this->mctProducto->objProducto->CostoUnitario = '0.0';
        $this->mctProducto->objProducto->CantidadStock = 0;
        $this->mctProducto->Refresh();
    }

    public function loadDefault($idp) {
        try {
            $obj = Producto::LoadByIdProducto(intval($idp));
            $this->mctProducto->objProducto = $obj;
            $this->mctProducto->blnEditMode = TRUE;
            $this->mctProducto->Refresh();
            $this->lstTalla->SelectedValue =  $obj->Talla;
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