<?php

class DialogUseMateriaPrima extends QDialogBox
{

    public $dtgMateriaprimausadas;
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
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogUseMateriaPrima.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
     
        
        
        $this->dtgMateriaprimausadas = new MateriaprimausadaDataGrid($this);
        $this->dtgMateriaprimausadas->Paginator = new QPaginator($this->dtgMateriaprimausadas);
        $this->dtgMateriaprimausadas->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgMateriaprimausadas->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgMateriaprimausadas->ItemsPerPage = 20;
        $this->dtgMateriaprimausadas->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgMateriaprimausadas->UseAjax = true;
        //$this->dtgMateriaprimausadas->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgMateriaprimausadas->ShowFilter = false;
        $this->dtgMateriaprimausadas->SortColumnIndex = 0;
        $this->dtgMateriaprimausadas->SortDirection = true;    
        $this->dtgMateriaprimausadas->Owner = $this;
          
        $this->dtgMateriaprimausadas->MetaAddColumn(QQN::Materiaprimausada()->IdMateriaPrimaObject->Nombre,"Name=MateriaPrima");
        $this->dtgMateriaprimausadas->MetaAddColumn('Cantidad');
        $this->dtgMateriaprimausadas->AddColumn(new QDataGridColumn('', '<?= $_OWNER->Delete($_ITEM) ?>', 'HtmlEntities=false'));
        
        $this->dtgMateriaprimausadas->AdditionalConditions = QQ::AndCondition(QQ::Equal(QQN::Materiaprimausada()->IdConfeccionProducto, -1));
        
        $this->lstMateria = new QListBox($this);
        $this->lstMateria->CssClass = "form-control";
        $productos = Materiaprima::LoadAll();
        foreach ($productos as $value) {
            $this->lstMateria->AddItem(new QListItem($value->Nombre . " - Stock : " . $value->CantidadStock, $value->IdMateriaPrima));
        }

        $this->txtCantidad = new QTextBox($this);
        $this->txtCantidad->CssClass = "form-control";
        $this->txtCantidad->Placeholder = "Cantidad";
        
        $this->btnAdd = new QButton($this);
        $this->btnAdd->CssClass = "btn btn-success";
        $this->btnAdd->HtmlEntities = false;
        $this->btnAdd->Text = '<i class="icon fa-plus" aria-hidden="true"></i>';
        $this->btnAdd->AddAction(new QClickEvent(),  new QAjaxControlAction($this, 'actionAdd_Click'));

        $this->btnCancel = new QButton($this);
        $this->btnCancel->HtmlEntities = FALSE;
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Close';
        $this->btnCancel->CssClass = "btn btn-danger btn-raised ";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
    }

     public function actionAdd_Click($strFormId, $strControlId, $strParameter) {
         
          $obj = Confeccionproducto::LoadByIdConfeccionProducto(intval($this->idconfeccion));
        if($obj->EstadoConfeccion){
            QApplication::ExecuteJavaScript("showWarning('Ya no puedes editar');");
            return;
        }
            
         
          try {

            $pro = Materiaprima::LoadByIdMateriaPrima($this->lstMateria->SelectedValue);
            if ($pro && $pro->CantidadStock >= intval($this->txtCantidad->Text) && intval($this->txtCantidad->Text) > 0) {
                
                $newp = Materiaprimausada::LoadByIdConfeccionProductoIdMateriaPrima($this->idconfeccion, $this->lstMateria->SelectedValue);
                if (!$newp) {
                    $newp = new Materiaprimausada();
                    $newp->IdConfeccionProducto = $this->idconfeccion;
                    $newp->IdMateriaPrima = $this->lstMateria->SelectedValue;
                    $newp->Cantidad = $this->txtCantidad->Text;
                } else {
                    $newp->Cantidad = $this->txtCantidad->Text;
                }
                $newp->Save();

               
                $this->dtgMateriaprimausadas->Refresh();
                $this->dtgPrincipal->Refresh();
               
                QApplication::ExecuteJavaScript("showSuccess('Agregado correctamente!');");
            } else {
                QApplication::ExecuteJavaScript("showWarning('Error Cantidad Stock');");
            }
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
       
    }
    
    
    
     public function Delete(Materiaprimausada $id) {
        $controlID2 = 'delum' . $id->IdMateriaPrima;
        $deleteCtrl = $this->dtgMateriaprimausadas->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgMateriaprimausadas, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdMateriaPrima;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btndelete_Click'));
        }

        return "<center>" . $deleteCtrl->Render(false) . "</center>";
    }

    public function btndelete_Click($strFormId, $strControlId, $strParameter) {
        
         $obj = Confeccionproducto::LoadByIdConfeccionProducto(intval($this->idconfeccion));
        if($obj->EstadoConfeccion){
            QApplication::ExecuteJavaScript("showWarning('Ya no puedes editar');");
            return;
        }
        
        try{
        $val = Materiaprimausada::LoadByIdConfeccionProductoIdMateriaPrima($this->idconfeccion, $strParameter);
        $val->Delete();         
       
       
         $this->dtgMateriaprimausadas->Refresh();
         $this->dtgPrincipal->Refresh();
        QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
         } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }
    

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(false);
    }

   
    public function loadDefault($id, $dtg ) {
        try {
            $this->dtgPrincipal = $dtg;
            $this->idconfeccion = $id;
            $this->dtgMateriaprimausadas->AdditionalConditions = QQ::AndCondition(QQ::Equal(QQN::Materiaprimausada()->IdConfeccionProducto, $id));
             $this->dtgMateriaprimausadas->Refresh();
             
             $this->lstMateria->RemoveAllItems();
             $productos = Materiaprima::LoadAll();
        foreach ($productos as $value) {
            $this->lstMateria->AddItem(new QListItem($value->Nombre . " - Stock : " . $value->CantidadStock, $value->IdMateriaPrima));
        }
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