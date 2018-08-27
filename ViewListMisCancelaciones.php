<?php
require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogViewDetalleVenta.php');
require('general.php');


class ViewListMisCancelacionesForm extends QForm {

    protected $user;
    protected $dtgVentas;

    protected $txtModelo;
    protected $btnFilter;
    protected $dlgDialogViewDetalleVenta;
    
    protected $lblTextImprimir;


    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = Usuario::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
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
        $this->dtgVentas->MetaAddColumn('DniRucCliente', "Name=Dni/Ruc");
        $this->dtgVentas->MetaAddColumn('NombreCliente', "Name=Cliente");
        $this->dtgVentas->AddColumn(new QDataGridColumn('Productos', '<?= $_FORM->renderProductos($_ITEM); ?>', 'HtmlEntities=false'));


        $this->dtgVentas->MetaAddColumn('TotalVenta',"Name=Monto");        
        /*$this->dtgVentas->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));*/
  $this->dtgVentas->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

       
        $this->dtgVentas->AdditionalConditions = QQ::AndCondition(
            QQ::Equal(QQN::Venta()->IdSucursal, $this->user->IdSucursal),
            QQ::Equal(QQN::Venta()->IdUsuarioCaja, $this->user->IdUsuario),
            QQ::OrCondition(QQ::Equal(QQN::Venta()->EstadoVenta, 2),QQ::Equal(QQN::Venta()->EstadoVenta, 3))    
                
        );
      
        $this->txtModelo = new QTextBox($this);
        $this->txtModelo->Placeholder = "Nombre Cliente";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
        
        
        
        $this->lblTextImprimir = new QLabel($this);
        $this->lblTextImprimir->HtmlEntities = false;
        $this->lblTextImprimir->Text = '<img src="template/assets/images/logo-blue@2x.png">';
    }
    
    
      public function actionsRender(Venta $id) {

        $controlID = 'print' . $id->IdVenta;
        $editCtrl = $this->dtgVentas->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgVentas, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Imprimir">
                            <i class="icon fa-print" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdVenta;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('btnImprimir_Click'));
        }

       

        return "<center>" . $editCtrl->Render(false). "</center>";
    }

     public function btnImprimir_Click($strFormId, $strControlId, $strParameter) {
      
         
              $venta = Venta::LoadByIdVenta($strParameter);
        $allproducts = Ventaproducto::LoadArrayByIdVenta($venta->IdVenta);
        $detalleVenta = '';
        foreach ($allproducts as $value) {
        $detalleVenta .= "<tr >
          <td align='left'>$value->Cantidad</td>
          <td align='left'>".$value->IdProductoObject->IdModeloObject->Nombre . " , " . $value->IdProductoObject->Nombre . " , " . getTalla($value->IdProductoObject->Talla)."</td>
          <td align='right'>S/$value->CostoTotal </td>
        </tr>";           
        }
        
        $Final = "<br><div style='float:right;font-size:12px;'>Total : S/ $venta->TotalVenta </div><br><br>";
        if($venta->TipoVenta==2){
        $Final .= "<div style='float:right;font-size:12px;'>OP. GRAVADA : S/ $venta->SubTotalVenta </div><br>";        
        $Final .= "<div style='float:right;font-size:12px;'>IGV-18% : S/ $venta->Igv </div><br>";
        }
        $Final .= "<div style='float:right;font-size:12px;'>IMPORTE TOTAL S/ : S/ $venta->TotalVenta </div><br>";
        
        $FechaVenta = $venta->FechaVenta->qFormat('DD/MM/YYYY hhhh:mm:ss');
        
        $titulo = "";
        $sunat ="";
        if($venta->TipoVenta==1){ 
             $titulo = "RECIBO DE VENTA";
             $sunat ="";
        }
        if($venta->TipoVenta==2){ 
             $titulo = "BOLETA DE VENTA ELECTRONICA";
             $sunat ="Autorizado mediante resolucion Nro: 0063845131362/SUNAT Representacion impresa de la boleta de venta electronica.";
        }
        
    $this->lblTextImprimir->Text = ' 
    <div id="divImprimir" >
    <style>
    #idVoucher {
     height: auto;
     width: 100%;
     margin: 0px;
     padding: 0px; 
     font-size:11px;
     font-family: Arial, Helvetica, sans-serif;
     font-style: normal;
     line-height: normal;
     font-weight: normal;
     font-variant: normal;
     text-transform: none;
     color: #000;
     line-height: 1.8em;
    }
    @page{
    margin:3px;
    size: auto;
    }
    </style>



    <div id="idVoucher">
    <center>
    <img src="' . __SUBDIRECTORY__ . '/template/assets/images/logo-blue@2x.png">
    <h3 style="font-size:19px;" >GYATSO & CARLO</h3>
    <font style="font-size:9px;" >De: César Augusto Olea Becerra </font><br>
    Ayacucho nro 414, Interior 112, Centro Historico.<br>
    La Libertad - Trujillo - Trujillo <br>
    R.U.C. Nº 10480624578 <br>
    Telefono : 955666841 <br><br>
    <b>'.$titulo.'</b><br>
    Nº de Serie '.$venta->SerieBoleta.' <br>
    <b>Fecha de Emision</b> '.$FechaVenta.'<br>
    Cliente : '.$venta->NombreCliente.' <br>
    </center>
    <br>
    
    <table style="font-size:11px;width:100%;margin:2px">
      <thead>
        <tr>
          <th align="left"><b>CANT</b></th>
          <th align="left"><b>PRODUCTO</b></th>
          <th align="right"><b>PRECIO</b></th>
        </tr>
      </thead>
      <tbody>
      '.$detalleVenta.'
      </tbody>
    </table>
      '.$Final.' 
    <br>
    <center>
    <br>
    '.$sunat.'.<br>
    Conserver su comprobante.<br><br>
    *****************************************<br>
    GRACIAS POR COMPRAR EN GYATSO&CARLO!<br>
    *****************************************
    </center>
    </div>
    </div>  
    ';
        $this->lblTextImprimir->Refresh();
        QApplication::ExecuteJavaScript("printContent('divImprimir');");


        
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
    
     public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtModelo->Text != "")) {
            $searchTipo = QQ::Like(QQN::Venta()->NombreCliente, "%" . trim($this->txtModelo->Text) . "%");
        } else {
            $searchTipo = QQ::All();
        }

        $this->dtgVentas->AdditionalConditions = QQ::AndCondition(
                        $searchTipo,
                QQ::AndCondition(
            QQ::Equal(QQN::Venta()->IdSucursal, $this->user->IdSucursal),
            QQ::Equal(QQN::Venta()->IdUsuarioCaja, $this->user->IdUsuario),
            QQ::OrCondition(QQ::Equal(QQN::Venta()->EstadoVenta, 2),QQ::Equal(QQN::Venta()->EstadoVenta, 3))    
                
        )
        );

        $this->dtgVentas->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }
    public function close_edit($update) {

        if ($update) {
            
        }
    }




    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Venta::QueryCount(
                QQ::AndCondition(
                QQ::Equal(QQN::Venta()->IdSucursal, $this->user->IdSucursal),
            QQ::Equal(QQN::Venta()->IdUsuarioCaja, $this->user->IdUsuario),
            QQ::OrCondition(QQ::Equal(QQN::Venta()->EstadoVenta, 2),QQ::Equal(QQN::Venta()->EstadoVenta, 3))    
             )
                );
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListMisCancelacionesForm::Run('ViewListMisCancelacionesForm');
?>