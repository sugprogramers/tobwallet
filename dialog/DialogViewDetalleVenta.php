<?php

class DialogViewDetalleVenta extends QDialogBox
{

    public $dtgVentaproductos;
    public $lstMateria;
    public $txtCantidad;
    public $idconfeccion;
    public $btnAdd;
    public $dtgPrincipal;




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

        $this->Width = 700;
        $this->Resizable = false;
        $this->isAutosize = true;
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogViewDetalleVenta.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
     
        
        
        $this->dtgVentaproductos = new VentaproductoDataGrid($this);
        $this->dtgVentaproductos->Paginator = new QPaginator($this->dtgVentaproductos);
        $this->dtgVentaproductos->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgVentaproductos->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgVentaproductos->ItemsPerPage = 30;
        $this->dtgVentaproductos->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgVentaproductos->UseAjax = true;
        //$this->dtgVentaproductos->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgVentaproductos->ShowFilter = false;
        $this->dtgVentaproductos->SortColumnIndex = 0;
        $this->dtgVentaproductos->SortDirection = true;    
        $this->dtgVentaproductos->Owner = $this;
          
        //$this->dtgVentaproductos->MetaAddColumn(QQN::Ventaproducto()->IdVentaObject);
        //$this->dtgVentaproductos->MetaAddColumn(QQN::Ventaproducto()->IdProductoObject->Nombre);
       $this->dtgVentaproductos->AddColumn(new QDataGridColumn('Producto', '<?= $_OWNER->view_producto($_ITEM) ?>', 'HtmlEntities=false'));
         
        $this->dtgVentaproductos->MetaAddColumn('Cantidad');
        $this->dtgVentaproductos->MetaAddColumn('CostoUnitario',"Name=CU");
        $this->dtgVentaproductos->MetaAddColumn('CostoTotal');
                        
         
        $this->dtgVentaproductos->AdditionalConditions = QQ::AndCondition(QQ::Equal(QQN::Ventaproducto()->IdVenta, -1));
        
          $this->btnCancel = new QButton($this);
        $this->btnCancel->HtmlEntities = FALSE;
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Close';
        $this->btnCancel->CssClass = "btn btn-danger btn-raised ";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
        
    }

    public function view_producto(Ventaproducto $obj) {
        
        return $obj->IdProductoObject->IdModeloObject->Nombre." , ".$obj->IdProductoObject->Nombre." , ".getTalla($obj->IdProductoObject->Talla);
        
    }
    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(false);
    }

   
    public function loadDefault($id ) {
        try {
            $this->dtgVentaproductos->AdditionalConditions = QQ::AndCondition(QQ::Equal(QQN::Ventaproducto()->IdVenta, $id));
            $this->dtgVentaproductos->Refresh();            
            
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