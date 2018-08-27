<?php
require('includes/configuration/prepend.inc.php');
require('general.php');

class ViewListProductoDisponiblesForm extends QForm
{

    protected $user;
    protected $dtgProductosucursals;
    protected $btnFilter;
    
    protected $lstcolegio;


    protected function Form_Run()
    {
        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = Usuario::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create()
    {

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dtgProductosucursals = new ProductosucursalDataGrid($this);
        $this->dtgProductosucursals->Paginator = new QPaginator($this->dtgProductosucursals);
        $this->dtgProductosucursals->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgProductosucursals->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgProductosucursals->ItemsPerPage = 20;
        $this->dtgProductosucursals->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgProductosucursals->UseAjax = true;
        $this->dtgProductosucursals->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgProductosucursals->ShowFilter = false;
        $this->dtgProductosucursals->SortColumnIndex = 0;
        $this->dtgProductosucursals->SortDirection = true;

        $this->dtgProductosucursals->MetaAddColumn(QQN::Productosucursal()->IdSucursalObject->Nombre, "Name=Tienda");
        $this->dtgProductosucursals->MetaAddColumn(QQN::Productosucursal()->IdProductoObject->Codigo, "Name=Codigo");
        $this->dtgProductosucursals->MetaAddColumn(QQN::Productosucursal()->IdProductoObject->IdModeloObject->Nombre, "Name=Colegio");
        $this->dtgProductosucursals->MetaAddColumn(QQN::Productosucursal()->IdProductoObject->Nombre, "Name=Producto");
        $this->dtgProductosucursals->AddColumn(new QDataGridColumn('Talla', '<?= $_FORM->actionsTalla($_ITEM); ?>', 'HtmlEntities=false', 'Width=80'));
        $this->dtgProductosucursals->MetaAddColumn('CantidadStock',"Name=Stock");


         $this->dtgProductosucursals->AdditionalConditions = QQ::AndCondition(            
                QQ::Equal(QQN::Productosucursal()->IdSucursal, $this->user->IdSucursal)
        );
         
      
         $this->lstcolegio = new QListBox($this);
        $this->lstcolegio->CssClass = "form-control";
        $colegios = Modelo::LoadAll();
        $this->lstcolegio->AddItem(new QListItem('--Todos los Colegios--', 0));
        foreach ($colegios as $value) {
            $this->lstcolegio->AddItem(new QListItem($value->Nombre, $value->IdModelo));
        }


        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter)
    {
       
        if ($this->lstcolegio->SelectedValue != 0) {
            $searchColegio = QQ::Equal(QQN::Productosucursal()->IdProductoObject->IdModelo, $this->lstcolegio->SelectedValue);
        } else {
            $searchColegio = QQ::All();
        }
        
        $this->dtgProductosucursals->AdditionalConditions = QQ::AndCondition(
            $searchColegio,
                QQ::Equal(QQN::Productosucursal()->IdSucursal, $this->user->IdSucursal)
        );

        $this->dtgProductosucursals->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }


    public function actionsTalla(Productosucursal $id)
    {
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

    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found()
    {
        $countProjects = Producto::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListProductoDisponiblesForm::Run('ViewListProductoDisponiblesForm');
?>