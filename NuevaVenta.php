<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogConfirm.php');
require('general.php');


class ViewListMisVentasForm extends QForm {

    protected $user;
    protected $txtDniRuc;
    protected $lstTipoVenta;
    protected $txtNombreCliente;
    protected $txtNombreVendedor;
    protected $txtTienda;
    protected $dtgVenta;
    protected $txtCodigoProducto;
    protected $btnScaner;
    protected $txtColegio;
    protected $txtProducto;
    protected $btnAdd;
    protected $btnVender;
    protected $btnImprimir;
    protected $btnFinalizar;
    protected $btnVenderCajaDespacho;
    protected $lblEncontrado;
    protected $txtCantidad;
    protected $lblTotal;
    protected $idProductoEncontrado = 0;
    protected $arrayProducto = array();
    protected $idVentaCreada = 0;
    protected $lblTextImprimir;

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

        $this->txtDniRuc = new QTextBox($this);
        $this->txtDniRuc->Placeholder = "Dni o Ruc";

        $this->lstTipoVenta = new QListBox($this);
        $this->lstTipoVenta->AddItem(new QListItem("Recibo", 1));
        $this->lstTipoVenta->AddItem(new QListItem("Boleta Detallada", 2));
     


        $this->txtNombreCliente = new QTextBox($this);
        $this->txtNombreCliente->Placeholder = "Nombre Cliente";

        $this->txtNombreVendedor = new QTextBox($this);
        $this->txtNombreVendedor->Placeholder = "Nombre Vendedor";
        $this->txtNombreVendedor->Text = $this->user->Nombre . " " . $this->user->Apellido;

        $this->txtTienda = new QTextBox($this);
        $this->txtTienda->Placeholder = "Nombre Tienda";
        $this->txtTienda->Text = $this->user->IdSucursalObject->Nombre;

        $this->dtgVenta = new QDataGrid($this);
        $this->dtgVenta->CssClass = 'table table-bordered table-striped';
        $this->dtgVenta->UseAjax = true;
        $this->dtgVenta->ShowFilter = FALSE;
        /* $this->dtgVenta->AddColumn(new QDataGridColumn('Codigo', '<?= $_FORM->view_codigo($_ITEM) ?>', 'HtmlEntities=false')); */
        $this->dtgVenta->AddColumn(new QDataGridColumn('Producto', '<?= $_FORM->view_producto($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgVenta->AddColumn(new QDataGridColumn('Cantidad', '<?= $_FORM->view_cantidad($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgVenta->AddColumn(new QDataGridColumn('Precio', '<?= $_FORM->view_precio($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgVenta->AddColumn(new QDataGridColumn('Total', '<?= $_FORM->view_total($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgVenta->AddColumn(new QDataGridColumn('', '<?= $_FORM->delete_colum($_ITEM) ?>', 'HtmlEntities=false', 'Width=50'));


        $this->txtCodigoProducto = new QSelect2ListBox($this);
        $this->txtCodigoProducto->AddItem(new QListItem("Selecciona Codigo", -1));
        $allproduct = Productosucursal::LoadArrayByIdSucursal($this->user->IdSucursal);
        foreach ($allproduct as $value) {
            $this->txtCodigoProducto->AddItem(new QListItem($value->IdProductoObject->Codigo, $value->IdProducto));
        }
        $this->txtCodigoProducto->AddAction(new QClickEvent(), new QAjaxAction('btnSelectCodigo_Click'));


        $this->btnScaner = new QButton($this);
        $this->btnScaner->CssClass = "btn btn-danger btn-raised";
        $this->btnScaner->HtmlEntities = false;
        $this->btnScaner->Width = "100%";
        $this->btnScaner->Text = '<i class="icon fa-barcode" aria-hidden="true"></i> Estado Scaner';
        $this->btnScaner->AddAction(new QClickEvent(), new QAjaxAction('btnScaner_Click'));

        $this->txtColegio = new QSelect2ListBox($this);
        $this->txtColegio->AddItem(new QListItem("Selecciona Colegio", -1));
        $allmodelo = Modelo::LoadAll();
        foreach ($allmodelo as $value) {
            $this->txtColegio->AddItem(new QListItem($value->Nombre, $value->IdModelo));
        }
        $this->txtColegio->AddAction(new QClickEvent(), new QAjaxAction('btnSelectColegio_Click'));


        $this->txtProducto = new QSelect2ListBox($this);
        $this->txtProducto->AddItem(new QListItem("Selecciona Producto", -1));
        $this->txtProducto->AddAction(new QClickEvent(), new QAjaxAction('btnSelectProducto_Click'));



        $this->lblEncontrado = new QLabel($this);
        $this->lblEncontrado->HtmlEntities = false;
        $this->lblEncontrado->FontSize = 11;
        $this->lblEncontrado->Text = "<p style='color:red'>No encontrado</p>";

        $this->lblTotal = new QLabel($this);
        $this->lblTotal->HtmlEntities = false;
        $this->lblTotal->Text = "<h4 style='color: #848484;font-weight: normal;'>TOTAL : S/0.00</h4>";

        $this->txtCantidad = new QTextBox($this, "idspinner");
        $this->txtCantidad->Text = 0;
        $this->txtCantidad->Width = 100;
        $this->txtCantidad->SetCustomAttribute('data-plugin', "asSpinner");


        $this->btnAdd = new QButton($this);
        $this->btnAdd->CssClass = "btn btn-primary btn-raised";
        $this->btnAdd->HtmlEntities = false;
        $this->btnAdd->Text = '<i class="icon fa-plus" aria-hidden="true"></i>';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('btnAdd_Click'));


        $this->btnVenderCajaDespacho = new QButton($this);
        $this->btnVenderCajaDespacho->HtmlEntities = FALSE;
        $this->btnVenderCajaDespacho->Text = '<i class="icon fa-shopping-cart" aria-hidden="true"></i> + <i class="icon fa-calculator" aria-hidden="true"></i> + <i class="icon fa-check" aria-hidden="true"></i>';
        $this->btnVenderCajaDespacho->CssClass = "btn btn-default btn-raised ";
        $this->btnVenderCajaDespacho->AddAction(new QClickEvent(), new QAjaxAction('btnVenderCajaDespacho_Click'));


        $this->btnVender = new QButton($this);
        $this->btnVender->HtmlEntities = FALSE;
        $this->btnVender->Text = '<i class="icon fa-shopping-cart" aria-hidden="true"></i>';
        $this->btnVender->CssClass = "btn btn-default btn-raised ";
        $this->btnVender->AddAction(new QClickEvent(), new QAjaxAction('btnVender_Click'));

        $this->btnImprimir = new QButton($this);
        $this->btnImprimir->HtmlEntities = FALSE;
        $this->btnImprimir->Text = '<i class="icon fa-print" aria-hidden="true"></i> Imprimir';
        $this->btnImprimir->CssClass = "btn btn-primary btn-raised ";
        $this->btnImprimir->AddAction(new QClickEvent(), new QAjaxAction('btnImprimir_Click'));

        $this->lblTextImprimir = new QLabel($this);
        $this->lblTextImprimir->HtmlEntities = false;
        $this->lblTextImprimir->Text = '<img src="template/assets/images/logo-blue@2x.png">';

        $this->btnFinalizar = new QButton($this);
        $this->btnFinalizar->HtmlEntities = FALSE;
        $this->btnFinalizar->Text = '<i class="icon wb-check-circle" aria-hidden="true"></i> Finalizar';
        $this->btnFinalizar->CssClass = "btn btn-success btn-raised ";
        $this->btnFinalizar->AddAction(new QClickEvent(), new QAjaxAction('btnFinalizar_Click'));
    }

    public function btnSelectColegio_Click($strFormId, $strControlId, $strParameter) {
        if ($this->txtColegio->SelectedValue != -1) {
            $this->txtProducto->RemoveAllItems();
            $this->txtProducto->AddItem(new QListItem("Selecciona Producto", -1));
            $all = Productosucursal::QueryArray(
                            QQ::AndCondition(
                                    QQ::Equal(QQN::Productosucursal()->IdSucursal, $this->user->IdSucursal), QQ::Equal(QQN::Productosucursal()->IdProductoObject->IdModelo, $this->txtColegio->SelectedValue)
                            )
            );
            foreach ($all as $value) {
                $this->txtProducto->AddItem(new QListItem($value->IdProductoObject->Nombre . " , " . getTalla($value->IdProductoObject->Talla), $value->IdProducto));
            }
        } else {
            $this->txtProducto->RemoveAllItems();
            $this->txtProducto->AddItem(new QListItem("Selecciona Producto", -1));
        }
    }

    public function btnSelectProducto_Click($strFormId, $strControlId, $strParameter) {

        if ($this->txtProducto->SelectedValue != -1) {
            $product = Producto::LoadByIdProducto($this->txtProducto->SelectedValue);
            $var = Productosucursal::LoadByIdProductoIdSucursal($product->IdProducto, $this->user->IdSucursal);
            $this->lblEncontrado->Text = "<p style='color:green'>" . $product->IdModeloObject->Nombre . " , " . $product->Nombre . " , " . getTalla($product->Talla) . ", <b>STOCK : $var->CantidadStock</b></p>";
            $this->lblEncontrado->Refresh();
            //$this->txtCantidad->Text = 1;
            QApplication::ExecuteJavaScript("$('#idspinner').asSpinner('set', '1');");
            $this->idProductoEncontrado = $this->txtProducto->SelectedValue;

            QApplication::ExecuteJavaScript("showSuccess('Seleccionado Correctamente!');");
        } else {

            $this->lblEncontrado->Text = "<p style='color:red'>No encontrado</p>";
            $this->lblEncontrado->Refresh();
            // $this->txtCantidad->Text = 0;
            QApplication::ExecuteJavaScript("$('#idspinner').asSpinner('set', '0');");
            $this->idProductoEncontrado = 0;
        }
    }

    public function btnVender_Click($strFormId, $strControlId, $strParameter) {
        if (count($this->arrayProducto) <= 0) {
            QApplication::ExecuteJavaScript("showWarning('No existen producto para la venta');");
            return;
        }

        if (trim($this->txtDniRuc->Text) == '') {
            $this->txtDniRuc->Focus();
            QApplication::ExecuteJavaScript("showWarning('Ingrese datos del cliente');");
            return;
        }

        if (trim($this->txtNombreCliente->Text) == '') {
            $this->txtNombreCliente->Focus();
            QApplication::ExecuteJavaScript("showWarning('Ingrese datos del cliente');");
            return;
        }


        $total = $this->calcularTotal();

        $venta = new Venta();
        $venta->DniRucCliente = trim($this->txtDniRuc->Text);
        $venta->NombreCliente = trim($this->txtNombreCliente->Text);
        $venta->IdSucursal = $this->user->IdSucursal;
        $venta->FechaVenta = QDateTime::Now();
        $venta->TipoVenta = $this->lstTipoVenta->SelectedValue;
        
       

        if ($this->lstTipoVenta->SelectedValue == 1 ) {
            $venta->SubTotalVenta = $total;
            $venta->Igv = 0;
            $venta->TotalVenta = $total;
            
            $venta->SerieBoleta = str_pad(0, 12, "0", STR_PAD_LEFT);
        } else {
            $venta->SubTotalVenta = $total - ($total * 0.18);
            $venta->Igv = $total * 0.18;
            $venta->TotalVenta = $total ;
            
            
            $val = Administrador::QuerySingle(QQ::AndCondition(QQ::NotEqual(QQN::Administrador()->IdAdministrador, 0)));
            $genera = $val->SerieBoleta +1;
            $val->SerieBoleta = $genera;
            $val->Save();
            $venta->SerieBoleta = str_pad($genera, 12, "0", STR_PAD_LEFT);
            
        }


        $venta->EstadoVenta = 1;
        $venta->IdUsuarioVenta = $this->user->IdUsuario;
        $venta->Save();

        foreach ($this->arrayProducto as $value) {
            try {

                $new = new Ventaproducto();
                $new->IdVenta = $venta->IdVenta;
                $new->IdProducto = $value['idproducto'];
                $new->Cantidad = $value['cantidad'];
                $new->CostoTotal = $value['costounitario'] * $value['cantidad'];
                $new->CostoUnitario = $value['costounitario'];
                $new->Save();

                $var = Productosucursal::LoadByIdProductoIdSucursal($value['idproducto'], $this->user->IdSucursal);
                if ($var) {
                    $canti = $var->CantidadStock - $value['cantidad'];
                    if ($canti <= 0)
                        $canti = 0;
                    $var->CantidadStock = $canti;
                    $var->Save();
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        $this->idVentaCreada = $venta->IdVenta;
        $this->btnImprimir->Display = false;
        QApplication::ExecuteJavaScript("$('#ventaModal').modal('show');");
        QApplication::ExecuteJavaScript("showSuccess('Venta Creada!');");
    }

    public function btnVenderCajaDespacho_Click($strFormId, $strControlId, $strParameter) {
        if ($this->user->PermisoCajero == 0 || $this->user->PermisoVendedor == 0 || $this->user->PermisoDespacho == 0) {
            QApplication::ExecuteJavaScript("showWarning('Usted no tiene los permisos para usar esta funcion');");
            return;
        }
        if (count($this->arrayProducto) <= 0) {
            QApplication::ExecuteJavaScript("showWarning('No existen producto para la venta');");
            return;
        }
        if (trim($this->txtDniRuc->Text) == '') {
            $this->txtDniRuc->Focus();
            QApplication::ExecuteJavaScript("showWarning('Ingrese datos del cliente');");
            return;
        }

        if (trim($this->txtNombreCliente->Text) == '') {
            $this->txtNombreCliente->Focus();
            QApplication::ExecuteJavaScript("showWarning('Ingrese datos del cliente');");
            return;
        }


        $total = $this->calcularTotal();

        $venta = new Venta();
        $venta->DniRucCliente = trim($this->txtDniRuc->Text);
        $venta->NombreCliente = trim($this->txtNombreCliente->Text);
        $venta->IdSucursal = $this->user->IdSucursal;
        $venta->FechaVenta = QDateTime::Now();
        $venta->TipoVenta = $this->lstTipoVenta->SelectedValue;
 
          if ($this->lstTipoVenta->SelectedValue == 1 ) {
            $venta->SubTotalVenta = $total;
            $venta->Igv = 0;
            $venta->TotalVenta = $total;
            
            $venta->SerieBoleta = str_pad(0, 12, "0", STR_PAD_LEFT);
            
        } else {
            $venta->SubTotalVenta = $total - ($total * 0.18);
            $venta->Igv = $total * 0.18;
            $venta->TotalVenta = $total ;
            
                   
            $val = Administrador::QuerySingle(QQ::AndCondition(QQ::NotEqual(QQN::Administrador()->IdAdministrador, 0)));
            $genera = $val->SerieBoleta +1;
            $val->SerieBoleta = $genera;
            $val->Save();
            $venta->SerieBoleta = str_pad($genera, 12, "0", STR_PAD_LEFT);

        }

        $venta->EstadoVenta = 3;
        $venta->IdUsuarioVenta = $this->user->IdUsuario;
        $venta->IdUsuarioCaja = $this->user->IdUsuario;
        $venta->IdUsuarioDespacho = $this->user->IdUsuario;
        $venta->Save();

        foreach ($this->arrayProducto as $value) {
            try {

                $new = new Ventaproducto();
                $new->IdVenta = $venta->IdVenta;
                $new->IdProducto = $value['idproducto'];
                $new->Cantidad = $value['cantidad'];
                $new->CostoTotal = $value['costounitario'] * $value['cantidad'];
                $new->CostoUnitario = $value['costounitario'];
                $new->Save();

                $var = Productosucursal::LoadByIdProductoIdSucursal($value['idproducto'], $this->user->IdSucursal);
                if ($var) {
                    $canti = $var->CantidadStock - $value['cantidad'];
                    if ($canti <= 0)
                        $canti = 0;
                    $var->CantidadStock = $canti;
                    $var->Save();
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        $this->idVentaCreada = $venta->IdVenta;
        $this->btnImprimir->Display = true;
        QApplication::ExecuteJavaScript("$('#ventaModal').modal('show');");
        QApplication::ExecuteJavaScript("showSuccess('Venta Creada!');");
    }

    public function btnImprimir_Click($strFormId, $strControlId, $strParameter) {
        if (count($this->arrayProducto) <= 0 || $this->idVentaCreada == 0) {
            QApplication::ExecuteJavaScript("showWarning('No existen producto para la venta, o la venta no existe');");
            return;
        }

        $venta = Venta::LoadByIdVenta($this->idVentaCreada);
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
    Ayacucho Nro 414, Interior 112, Centro Historico.<br>
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
    '.$sunat.'<br>
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

    public function btnFinalizar_Click($strFormId, $strControlId, $strParameter) {

        if (count($this->arrayProducto) <= 0 || $this->idVentaCreada == 0) {
            QApplication::ExecuteJavaScript("showWarning('No existen producto para la venta, o la venta no existe');");
            return;
        }
        QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/nuevaventa');
        QApplication::ExecuteJavaScript("$('#ventaModal').modal('hide');");
    }

    public function btnScaner_Click($strFormId, $strControlId, $strParameter) {

        if (rand(0, 1)) {
            $this->btnScaner->CssClass = "btn btn-success btn-raised";
        } else {
            $this->btnScaner->CssClass = "btn btn-danger btn-raised";
        }
    }

    public function btnSelectCodigo_Click($strFormId, $strControlId, $strParameter) {

        if ($this->txtCodigoProducto->SelectedValue != -1) {
            $product = Producto::LoadByIdProducto($this->txtCodigoProducto->SelectedValue);
            $var = Productosucursal::LoadByIdProductoIdSucursal($product->IdProducto, $this->user->IdSucursal);
            $this->lblEncontrado->Text = "<p style='color:green'>" . $product->IdModeloObject->Nombre . " , " . $product->Nombre . " , " . getTalla($product->Talla) . ", <b>STOCK : $var->CantidadStock</b></p>";
            $this->lblEncontrado->Refresh();
            //$this->txtCantidad->Text = 1;
            QApplication::ExecuteJavaScript("$('#idspinner').asSpinner('set', '1');");
            $this->idProductoEncontrado = $this->txtCodigoProducto->SelectedValue;

            QApplication::ExecuteJavaScript("showSuccess('Seleccionado Correctamente!');");
        } else {

            $this->lblEncontrado->Text = "<p style='color:red'>No encontrado</p>";
            $this->lblEncontrado->Refresh();
            // $this->txtCantidad->Text = 0;
            QApplication::ExecuteJavaScript("$('#idspinner').asSpinner('set', '0');");
            $this->idProductoEncontrado = 0;
        }
    }

    public function searchProduct() {
        foreach ($this->arrayProducto as $value) {

            if ($this->idProductoEncontrado == $value['idproducto']) {
                return true;
                break;
            }
        }
        return false;
    }

    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {

        if ($this->idProductoEncontrado == 0) {
            QApplication::ExecuteJavaScript("showWarning('No existe producto capturado');");
            return;
        }
        if (intval(trim($this->txtCantidad->Text)) <= 0) {
            QApplication::ExecuteJavaScript("showWarning('Seleecione una cantidad mayor a 0');");
            return;
        }



        $obj = Producto::LoadByIdProducto($this->idProductoEncontrado);
        $var = Productosucursal::LoadByIdProductoIdSucursal($obj->IdProducto, $this->user->IdSucursal);
        $id = $obj->IdProducto . '_';
        $cantidad = intval(trim($this->txtCantidad->Text));
        if($var->CantidadStock>=$cantidad){
        $this->arrayProducto[$id] = array('idproducto' => $obj->IdProducto, 'nombre' => $obj->Nombre, 'colegio' => $obj->IdModeloObject->Nombre, 'costounitario' => $obj->CostoUnitario, 'talla' => $obj->Talla, 'cantidad' => $cantidad, 'codigo' => $obj->Codigo);
        $this->dtgProducto_Bind();
        $this->dtgVenta->Refresh();
        }
        else{
           QApplication::ExecuteJavaScript("showWarning('Usted no puede agregar esta cantidad STOCK INAVLIDO.');"); 
        }
    }

    public function dtgProducto_Bind() {
        $this->dtgVenta->DataSource = $this->arrayProducto;
        $this->updateLabelTotal();
    }

    public function delete_colum($obj) {
        $strDeleteId = 'del' . $obj['idproducto'];
        $btnDelete = $this->dtgVenta->GetChildControl($strDeleteId);
        if (!$btnDelete) {
            $btnDelete = new QLabel($this->dtgVenta, $strDeleteId);
            $btnDelete->Text = "<i class=\"icon wb-close\"></i>";
            $btnDelete->FontSize = 16;
            $btnDelete->Cursor = QCursor::Pointer;
            $btnDelete->ToolTip = 'Eliminar';
            $btnDelete->HtmlEntities = false;
            $btnDelete->ActionParameter = $obj['idproducto'];
            $btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btndelete_Click'));
        }

        return $btnDelete->Render(false);
    }

    public function btndelete_Click($strFormId, $strControlId, $strParameter) {
        if (isset($this->arrayProducto[$strParameter . '_']))
            unset($this->arrayProducto[$strParameter . '_']);

        $this->dtgProducto_Bind();
        $this->dtgVenta->Refresh();
    }

    public function view_codigo($obj) {

        return $obj['codigo'];
    }

    public function view_cantidad($obj) {

        return $obj['cantidad'];
    }

    public function view_producto($obj) {

        return $obj['colegio'] . " , " . $obj['nombre'] . " , " . getTalla($obj['talla']);
    }

    public function view_precio($obj) {

        return "S/" . $obj['costounitario'];
    }

    public function view_total($obj) {

        return "S/" . $obj['costounitario'] * $obj['cantidad'];
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->arrayProducto as $value) {
            $total = $total + $value['costounitario'] * $value['cantidad'];
        }
        return $total;
    }

    public function updateLabelTotal() {
        $total = $this->calcularTotal();
        $this->lblTotal->Text = "<h4 style='color: #848484;font-weight: normal;'>TOTAL : S/$total</h4>";
    }

}

ViewListMisVentasForm::Run('ViewListMisVentasForm');
?>