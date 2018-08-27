<?php
require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogViewDetalleVenta.php');
require('general.php');

class ViewListCancelarProductoForm extends QForm {

    protected $user;
    protected $dtgVentas;

    protected $txtModelo;
    protected $btnFilter;
    protected $dlgDialogViewDetalleVenta;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = Usuario::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        
    }

    protected function Form_Create() {

        $this->objDefaultWaitIcon = new QWaitIcon($this);
        $this->dlgDialogViewDetalleVenta = new DialogViewDetalleVenta($this, 'close_edit');

        $this->dtgVentas = new  VentaDataGrid($this);
        $this->dtgVentas->Paginator = new QPaginator($this->dtgVentas);
        $this->dtgVentas->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgVentas->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgVentas->ItemsPerPage = 20;
        $this->dtgVentas->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgVentas->UseAjax = true;
        $this->dtgVentas->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgVentas->ShowFilter = false;
        $this->dtgVentas->SortColumnIndex = 0;
        $this->dtgVentas->SortDirection = true;

        
        $this->dtgVentas->MetaAddColumn('IdVenta',"Name=ID");
        $this->dtgVentas->AddColumn(new QDataGridColumn('Fecha', '<?= $_FORM->view_Date($_ITEM); ?>', 'HtmlEntities=false'));
        
        //$this->dtgVentas->MetaAddColumn('FechaVenta');
        $this->dtgVentas->MetaAddColumn('DniRucCliente',"Name=Dni/Ruc");  
        $this->dtgVentas->MetaAddColumn('NombreCliente', "Name=Cliente");
        $this->dtgVentas->AddColumn(new QDataGridColumn('Productos', '<?= $_FORM->renderProductos($_ITEM); ?>', 'HtmlEntities=false'));

        $this->dtgVentas->MetaAddColumn('TotalVenta',"Name=Monto");        
        $this->dtgVentas->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=150'));

        $this->dtgVentas->AdditionalConditions = QQ::AndCondition(
            QQ::Equal(QQN::Venta()->IdSucursal, $this->user->IdSucursal),
            QQ::OrCondition(QQ::Equal(QQN::Venta()->EstadoVenta, 1))                    
        );
      
      
    }
    
     public function renderProductos(Venta $obj) {
        $controlID = 'view' . $obj->IdVenta;
        $val = Ventaproducto::CountByIdVenta($obj->IdVenta);
        $editCtrl = $this->dtgVentas->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgVentas, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->ActionParameter = $obj->IdVenta;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('btnview_Count'));
        }

        $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ver">
                           <div class="label label-outline label-info">' . $val . '</div>
                          </div>';

        return $editCtrl->Render(false);
    }

    function btnview_count($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogViewDetalleVenta->Title = addslashes("<i class='icon wb-search'></i> Ver Detalle");
        $this->dlgDialogViewDetalleVenta->loadDefault($strParameter);
        $this->dlgDialogViewDetalleVenta->ShowDialogBox();
    }

    
     function view_Date(Venta $objCol) {
        return $objCol->FechaVenta->qFormat('MM/DD/YYYY hhhh:mm:ss');
    }
    
     public function actionsRender(Venta $id) {

        $controlID = 'can' . $id->IdVenta;
        $editCtrl = $this->dtgVentas->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QButton($this->dtgVentas, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->CssClass = "btn btn-outline btn-success btn-sm ";
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<i class="icon wb-check" aria-hidden="true"></i> Cancelar';
            $editCtrl->ActionParameter = $id->IdVenta;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('cancelar_Click'));
        }

        return $editCtrl->Render(false);

    }
    
     public function cancelar_Click($strFormId, $strControlId, $strParameter) {
       $var =  Venta::LoadByIdVenta($strParameter);
       if($var->EstadoVenta == 1){
           $var->EstadoVenta = 2;
           $var->IdUsuarioCaja = $this->user->IdUsuario;
           $var->Save();
           
           $this->dtgVentas->Refresh();
           QApplication::ExecuteJavaScript("showSuccess('Se Ha guardado correctamente');");
           QApplication::ExecuteJavaScript("showSuccess('IMPRIMIENDO...');");
       }
       else{
           QApplication::ExecuteJavaScript("showWarning('Error la veta ya fue tomada.');");
       }
       
       
     }

    
    public function close_edit($update) {

        if ($update) {
            
        }
    }

   

}

ViewListCancelarProductoForm::Run('ViewListCancelarProductoForm');
?>