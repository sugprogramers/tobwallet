<?php

require('includes/configuration/prepend.inc.php');
require('general.php');

class ViewListMovimientoProductoForm extends QForm {

    protected $user;
    protected $dtgMovimientoproductos;
    protected $lstProducto;
    protected $lstTienda;
    protected $txtCantidad;
    protected $btnAdd;
    protected $txtColegio;

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

        $this->dtgMovimientoproductos = new MovimientoproductoDataGrid($this);
        $this->dtgMovimientoproductos->Paginator = new QPaginator($this->dtgMovimientoproductos);
        $this->dtgMovimientoproductos->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgMovimientoproductos->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgMovimientoproductos->ItemsPerPage = 20;
        $this->dtgMovimientoproductos->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgMovimientoproductos->UseAjax = true;
        $this->dtgMovimientoproductos->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgMovimientoproductos->ShowFilter = false;
        $this->dtgMovimientoproductos->SortColumnIndex = 0;
        $this->dtgMovimientoproductos->SortDirection = true;


        $this->dtgMovimientoproductos->MetaAddColumn('IdMovimientoProducto', "Name=ID");
        $this->dtgMovimientoproductos->MetaAddColumn(QQN::Movimientoproducto()->IdProductoObject->IdModeloObject->Nombre, "Name=Colegio");
        $this->dtgMovimientoproductos->MetaAddColumn(QQN::Movimientoproducto()->IdProductoObject->Nombre, "Name=Producto");
        $this->dtgMovimientoproductos->MetaAddColumn('CantidadStock', "Name=Cantidad");

        $this->dtgMovimientoproductos->AddColumn(new QDataGridColumn('Talla', '<?= $_FORM->actionsTalla($_ITEM); ?>', 'HtmlEntities=false', 'Width=80'));
        $this->dtgMovimientoproductos->MetaAddColumn(QQN::Movimientoproducto()->IdSucursalObject->Nombre, "Name=Tienda");
      

        $this->txtColegio = new QSelect2ListBox($this);
        $this->txtColegio->AddItem(new QListItem("Selecciona Colegio", -1));
        $allmodelo = Modelo::LoadAll();
        foreach ($allmodelo as $value) {
            $this->txtColegio->AddItem(new QListItem($value->Nombre, $value->IdModelo));
        }
        $this->txtColegio->AddAction(new QClickEvent(), new QAjaxAction('btnSelectColegio_Click'));
        

        $this->lstProducto = new QListBox($this);
        $this->lstProducto->CssClass = "form-control";
        $this->lstProducto->FontSize = 12;
        $this->lstProducto->AddItem(new QListItem("Selecciona Producto", -1));


        $this->lstTienda = new QListBox($this);
        $this->lstTienda->CssClass = "form-control";
        $this->lstTienda->FontSize = 12;
        $tiendas = Sucursal::LoadAll();
        foreach ($tiendas as $value1) {
            $this->lstTienda->AddItem(new QListItem($value1->Nombre, $value1->IdSucursal));
        }


        $this->txtCantidad = new QTextBox($this);
        $this->txtCantidad->CssClass = "form-control";
        $this->txtCantidad->Placeholder = "Cantidad";

        $this->btnAdd = new QButton($this);
        $this->btnAdd->CssClass = "btn btn-success";
        $this->btnAdd->HtmlEntities = false;
        $this->btnAdd->Text = '<i class="icon fa-plus" aria-hidden="true"></i>';
        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxAction('actionAdd_Click'));
    }

    
     public function btnSelectColegio_Click($strFormId, $strControlId, $strParameter) {
        if ($this->txtColegio->SelectedValue != -1) {
             $this->lstProducto->RemoveAllItems();
             $this->lstProducto->AddItem(new QListItem("Selecciona Producto", -1));
             $all = Producto::QueryArray(
                                QQ::AndCondition(            
                       QQ::Equal(QQN::Producto()->IdModelo, $this->txtColegio->SelectedValue)                   
                   )
                 );
             foreach ($all as $value) {
                    $this->lstProducto->AddItem(new QListItem($value->Nombre . " , " . $this->getTalla($value->Talla) . " , Stock : " . $value->CantidadStock, $value->IdProducto));
             }
        }
        else{
            $this->lstProducto->RemoveAllItems();
            $this->lstProducto->AddItem(new QListItem("Selecciona Producto", -1));
        }
     }
    
    public function getTalla($id) {
        //4 6 8 10 12 14 16 S M L XL XXL XXXL
        switch ($id) {
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

    public function actionsTalla(Movimientoproducto $id) {
        //4 6 8 10 12 14 16 S M L XL XXL XXXL
        switch ($id->IdProductoObject->Talla) {
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

    public function actionAdd_Click($strFormId, $strControlId, $strParameter) {
        try {

            $pro = Producto::LoadByIdProducto($this->lstProducto->SelectedValue);
            if ($pro && $pro->CantidadStock >= intval($this->txtCantidad->Text) && intval($this->txtCantidad->Text) > 0) {
                $newmov = new Movimientoproducto();
                $newmov->IdProducto = $this->lstProducto->SelectedValue;
                $newmov->IdSucursal = $this->lstTienda->SelectedValue;
                $newmov->CantidadStock = $this->txtCantidad->Text;
                $newmov->Save();

                $newp = Productosucursal::LoadByIdProductoIdSucursal($this->lstProducto->SelectedValue, $this->lstTienda->SelectedValue);
                if (!$newp) {
                    $newp = new Productosucursal();
                    $newp->IdProducto = $this->lstProducto->SelectedValue;
                    $newp->IdSucursal = $this->lstTienda->SelectedValue;
                    $newp->CantidadStock = $this->txtCantidad->Text;
                } else {
                    $newp->CantidadStock = $newp->CantidadStock + $this->txtCantidad->Text;
                }
                $newp->Save();

                $pro->CantidadStock = $pro->CantidadStock - $this->txtCantidad->Text;
                $pro->Save();

                $this->dtgMovimientoproductos->Refresh();
                
                
               $this->lstProducto->RemoveAllItems();
                $this->lstProducto->AddItem(new QListItem("Selecciona Producto", -1));
                $all = Producto::QueryArray(
                                   QQ::AndCondition(            
                          QQ::Equal(QQN::Producto()->IdModelo, $this->txtColegio->SelectedValue)                   
                      )
                    );
                foreach ($all as $value) {
                       $this->lstProducto->AddItem(new QListItem($value->Nombre . " , " . $this->getTalla($value->Talla) . " , Stock : " . $value->CantidadStock, $value->IdProducto));
                }
                
                
                QApplication::ExecuteJavaScript("showSuccess('Agregado correctamente!');");
            } else {
                QApplication::ExecuteJavaScript("showWarning('Error Cantidad Producto o Stock');");
            }
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
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

ViewListMovimientoProductoForm::Run('ViewListMovimientoProductoForm');
?>