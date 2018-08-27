<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditProducto.php');
require_once('dialog/DialogUploadProducto.php');
require_once('dialog/DialogConfirm.php');
require('general.php');



class ViewListProductoForm extends QForm {

    protected $user;
    protected $dtgProductos;
    protected $btnNewProducto;
    protected $dlgConfirm;
    protected $dlgDialogProducto;
    protected $dlgDialogProductoExcel;
    protected $btnExcel;
    protected $txtProducto;
    protected $btnFilter;
    protected $btnCantidad;
    protected $btnCosto;
    protected $lstTalla;
    protected $lstcolegio;
    protected $txtCantidadUpdate;
    protected $txtCostoUpdate;
    protected $colSelect;
    protected $lstTienda;
    protected $btnDistribuir;
    protected $btnGeneraBarCode;
  

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

        $this->dlgDialogProducto = new DialogEditProducto($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");
        $this->dlgDialogProductoExcel = new DialogUploadProducto($this, 'close_edit');


        $this->dtgProductos = new ProductoDataGrid($this);
        $this->dtgProductos->Paginator = new QPaginator($this->dtgProductos);
        $this->dtgProductos->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgProductos->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgProductos->ItemsPerPage = 20;
        $this->dtgProductos->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgProductos->UseAjax = true;
        $this->dtgProductos->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgProductos->ShowFilter = false;
        $this->dtgProductos->SortColumnIndex = 0;
        $this->dtgProductos->SortDirection = true;

        $this->colSelect = new QCheckBoxColumn('', $this->dtgProductos);
        $this->colSelect->HtmlEntities = false;
        $this->colSelect->strPrimaryKey = 'IdProducto';
        $this->colSelect->Width = 15;

        $this->dtgProductos->AddColumn($this->colSelect);
        //$this->dtgProductos->MetaAddColumn('IdProducto',"Name=ID");
        $this->dtgProductos->MetaAddColumn('Codigo', 'Width=100');
        $this->dtgProductos->MetaAddColumn(QQN::Producto()->IdModeloObject->Nombre, "Name=Colegio");
        $this->dtgProductos->MetaAddColumn('Nombre');
        //$this->dtgProductos->MetaAddColumn('Talla');

        $this->dtgProductos->AddColumn(new QDataGridColumn('Talla', '<?= $_FORM->actionsTalla($_ITEM); ?>', 'HtmlEntities=false', 'Width=80'));
        $this->dtgProductos->MetaAddColumn('CantidadStock', "Name=Stock");
        $this->dtgProductos->MetaAddColumn('CostoUnitario', "Name=C/U");
        $this->dtgProductos->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

        $this->btnNewProducto = new QButton($this);
        $this->btnNewProducto->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewProducto->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewProducto->HtmlEntities = false;
        $this->btnNewProducto->AddAction(new QClickEvent(), new QAjaxAction('btnNewProducto_Click'));


        $this->txtProducto = new QTextBox($this);
        $this->txtProducto->Placeholder = "Nombre";

        $this->lstTalla = new QListBox($this);
        $this->lstTalla->CssClass = "form-control input-sm editHidden";
        $this->lstTalla->AddItem(new QListItem('-- Todas las Tallas --', 0));
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

        $this->lstcolegio = new QListBox($this);
        $this->lstcolegio->CssClass = "form-control";
        $colegios = Modelo::LoadAll();
        $this->lstcolegio->AddItem(new QListItem('--Todos los Colegios--', 0));
        foreach ($colegios as $value) {
            $this->lstcolegio->AddItem(new QListItem($value->Nombre, $value->IdModelo));
        }

        $this->btnExcel = new QButton($this);
        $this->btnExcel->Text = '<i class="icon fa-file-excel-o" aria-hidden="true"></i>';
        $this->btnExcel->CssClass = "site-action-toggle btn-raised btn btn-success btn-floating";
        $this->btnExcel->HtmlEntities = false;
        $this->btnExcel->AddAction(new QClickEvent(), new QAjaxAction('btnExcel_Click'));

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

        $this->txtCostoUpdate = new QTextBox($this);
        $this->txtCostoUpdate->Placeholder = "Costo";

        $this->btnCosto = new QButton($this);
        $this->btnCosto->CssClass = "btn btn-success";
        $this->btnCosto->HtmlEntities = false;
        $this->btnCosto->Text = '<i class="icon fa-check-square-o" aria-hidden="true"></i>';
        $this->btnCosto->AddAction(new QClickEvent(), new QAjaxAction('actionCosto_Click'));

        $this->txtCantidadUpdate = new QTextBox($this);
        $this->txtCantidadUpdate->Placeholder = "Stock";

        $this->btnCantidad = new QButton($this);
        $this->btnCantidad->CssClass = "btn btn-success";
        $this->btnCantidad->HtmlEntities = false;
        $this->btnCantidad->Text = '<i class="icon fa-check-square-o" aria-hidden="true"></i>';
        $this->btnCantidad->AddAction(new QClickEvent(), new QAjaxAction('actionCantidad_Click'));
        
        $this->lstTienda = new QListBox($this);
        $this->lstTienda->CssClass = "form-control";
        $tiendas = Sucursal::LoadAll();
        foreach ($tiendas as $value1) {
            $this->lstTienda->AddItem(new QListItem($value1->Nombre, $value1->IdSucursal));
        }

        $this->btnDistribuir = new QButton($this);
        $this->btnDistribuir->CssClass = "btn btn-success";
        $this->btnDistribuir->HtmlEntities = false;
        $this->btnDistribuir->Text = '<i class="icon fa-check-square-o" aria-hidden="true"></i> Distribuir';
        $this->btnDistribuir->AddAction(new QClickEvent(), new QAjaxAction('actionDistribuir_Click'));
        
        $this->btnGeneraBarCode = new QButton($this);
        $this->btnGeneraBarCode->CssClass = "btn btn-primary";
        $this->btnGeneraBarCode->HtmlEntities = false;
        $this->btnGeneraBarCode->Text = '<i class="icon fa-barcode" aria-hidden="true"></i> Bar Code';
        $this->btnGeneraBarCode->AddAction(new QClickEvent(), new QAjaxAction('GeneraBarCode_Click'));
        
        
    }
    
     public function GeneraBarCode_Click($strFormId, $strControlId, $strParameter) {
         
        require_once __DOCROOT__. __SUBDIRECTORY__. "/lib/fpdf/fpdf.php";
        require_once __DOCROOT__. __SUBDIRECTORY__. "/lib/php-barcode-master/barcode.php";
       
	$pdf = new FPDF();
	$pdf->AddPage();        
	$pdf->SetAutoPageBreak(true, 20);
	$y = $pdf->GetY();
	
        $all= Producto::LoadAll();
        foreach ($all as $value) {
  
                $code = $value->Codigo;
                $nombre = $value->IdModeloObject->Nombre." , ".$value->Nombre." , ". getTalla($value->Talla);
                $precio = "S/".$value->CostoUnitario;
		barcode('tmp/'.$code.'.png', $code, 50, 'horizontal', 'code128', true);
		
		
                $pdf->SetFont('Helvetica','',9);
                //$pdf->Text(10 , $y + 20, $nombre);
                //$pdf->Image('tmp/'.$code.'.png',10,$y,60,0,'PNG');
                $pdf->Image('tmp/'.$code.'.png',25);                
                $pdf->Cell(80,5,$nombre,0,1,'C');
                $pdf->Cell(80,5,$precio,0,1,'C');
                $pdf->ln();
                $pdf->ln();
               
                
		//$y = $y +40;
	}
	$pdf->Output('tmp/doc.pdf','F');	
        QApplication::ExecuteJavaScript("window.open('tmp/doc.pdf', '_blank');");
        QApplication::ExecuteJavaScript("showSuccess('Generado Correctamente!');");
     }
    
    public function actionDistribuir_Click($strFormId, $strControlId, $strParameter) {
        $changedIds = $this->colSelect->GetSelectedIds();
        $ch = array_keys($changedIds);
        if (count($ch) > 0) {
            for ($j = 0; $j < count($ch); $j++) {
                $pro = Producto::LoadByIdProducto($ch[$j]);
                if($pro){
                    $newmov = new Movimientoproducto();
                    $newmov->IdProducto = $pro->IdProducto;
                    $newmov->IdSucursal = $this->lstTienda->SelectedValue;
                    $newmov->CantidadStock = $pro->CantidadStock;
                    $newmov->Save();
                    
                    $newp = Productosucursal::LoadByIdProductoIdSucursal($pro->IdProducto, $this->lstTienda->SelectedValue);
                    if (!$newp) {
                        $newp = new Productosucursal();
                        $newp->IdProducto = $pro->IdProducto;
                        $newp->IdSucursal = $this->lstTienda->SelectedValue;
                        $newp->CantidadStock = $pro->CantidadStock;
                    } else {
                        $newp->CantidadStock = $newp->CantidadStock + $pro->CantidadStock;
                    }
                    $newp->Save();

                    $pro->CantidadStock = 0;
                    $pro->Save();
                }
                
            }
            $changedIds = $this->colSelect->GetSelectedIds();
            foreach ($changedIds as $value) {
                $this->colSelect->SetCheckbox($value, false);
            }
            $this->dtgProductos->Refresh();
            QApplication::ExecuteJavaScript("showSuccess('Agregado correctamente!');");
        } else {
            QApplication::ExecuteJavaScript("showWarning('Necesita seleccionar!');");
        }
        
        
    }


    public function actionCosto_Click($strFormId, $strControlId, $strParameter) {
        $changedIds = $this->colSelect->GetSelectedIds();
        $ch = array_keys($changedIds);
        if (count($ch) > 0) {
            for ($j = 0; $j < count($ch); $j++) {
                $reporte = Producto::LoadByIdProducto($ch[$j]);
                $reporte->CostoUnitario = $this->txtCostoUpdate->Text;
                $reporte->Save();
            }

            $changedIds = $this->colSelect->GetSelectedIds();
            foreach ($changedIds as $value) {
                $this->colSelect->SetCheckbox($value, false);
            }

            $this->dtgProductos->Refresh();
        } else {
            QApplication::ExecuteJavaScript("showWarning('Necesita seleccionar!');");
        }
    }

    public function actionCantidad_Click($strFormId, $strControlId, $strParameter) {
        $changedIds = $this->colSelect->GetSelectedIds();
        $ch = array_keys($changedIds);
        if (count($ch) > 0) {
            for ($j = 0; $j < count($ch); $j++) {
                $reporte = Producto::LoadByIdProducto($ch[$j]);
                $reporte->CantidadStock = $this->txtCantidadUpdate->Text;
                $reporte->Save();
            }
            $changedIds = $this->colSelect->GetSelectedIds();
            foreach ($changedIds as $value) {
                $this->colSelect->SetCheckbox($value, false);
            }

            $this->dtgProductos->Refresh();
        } else {
            QApplication::ExecuteJavaScript("showWarning('Necesita seleccionar!');");
        }
    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtProducto->Text != "")) {
            $searchTipo = QQ::Like(QQN::Producto()->Nombre, "%" . trim($this->txtProducto->Text) . "%");
        } elseif (trim($this->lstTalla->SelectedValue != 0)) {
            $searchTipo = QQ::Like(QQN::Producto()->Talla, $this->lstTalla->SelectedValue);
        } elseif ($this->lstcolegio->SelectedValue != 0) {
            $searchTipo = QQ::Equal(QQN::Producto()->IdModelo, $this->lstcolegio->SelectedValue);
        } else {
            $searchTipo = QQ::All();
        }

        $this->dtgProductos->AdditionalConditions = QQ::AndCondition(
                        $searchTipo
        );

        $this->dtgProductos->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function btnExcel_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogProductoExcel->ShowDialogBox();
    }

    public function btnNewProducto_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogProducto->Title = addslashes("<i class='icon wb-plus'></i> Nuevo Producto");
        $this->dlgDialogProducto->createNew();
        $this->dlgDialogProducto->ShowDialogBox();
    }

    public function actionsRender(Producto $id) {

        $controlID = 'edit' . $id->IdProducto;
        $editCtrl = $this->dtgProductos->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgProductos, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdProducto;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdProducto;
        $deleteCtrl = $this->dtgProductos->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgProductos, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdProducto;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";
    }

    public function actionsTalla(Producto $id) {
        //4 6 8 10 12 14 16 S M L XL XXL XXXL
        switch ($id->Talla) {
            case 1:
                return '4';
            case 2:
                return '6';
            case 3:
                return '8';
            case 4:
                return '10';
            case 5:
                return '12';
            case 6:
                return '14';
            case 7:
                return '16';
            case 8:
                return 'S';
            case 9:
                return 'M';
            case 10:
                return 'L';
            case 11:
                return 'XL';
            case 12:
                return 'XXL';
            case 13:
                return 'XXXL';

            default:
                return '--';
        }
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogProducto->Title = addslashes("<i class='icon wb-edit'></i> Edit Producto");
        $this->dlgDialogProducto->loadDefault($strParameter);
        $this->dlgDialogProducto->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar este Producto?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $users = Producto::LoadByIdProducto(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgProductos->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgProductos->Refresh();
    }
    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Producto::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListProductoForm::Run('ViewListProductoForm');
?>