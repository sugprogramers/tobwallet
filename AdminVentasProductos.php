<?php
require('includes/configuration/prepend.inc.php');
require('general.php');

class AdminVentasDiarias extends QForm
{

    protected $user;
    protected $dlgConfirm;
    protected $dtgReports;
    protected $txtModelo;
    protected $btnFilter;
    protected $arrayReport;
    protected $arrayFinal;
    protected $arrayFilter2;
    protected $lblTotal;
    protected $txtDateFrom;
    protected $txtDateEnd;
    protected $lstSucursal;

    protected function Form_Run()
    {

        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);

        if ($Datos1) {
            $this->user = Administrador::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
    }

    protected function Form_Create()
    {
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->lstSucursal = new QListBox($this);
        $this->lstSucursal->CssClass = "form-control";
        $sucursales = Sucursal::LoadAll();
        $this->lstSucursal->AddItem(new QListItem("--Todas las sedes--",0));
        foreach ($sucursales as $value) {
            $this->lstSucursal->AddItem(new QListItem($value->Nombre,$value->IdSucursal));
        }

        $this->dtgReports = new QDataGrid($this, 'maintable');

        $query = "SELECT  concat(producto.Nombre,' , ',modelo.Nombre) as nom_prod , 
                                producto.Talla as talla,
                                date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta, 
                                sucursal.Nombre as suc_nombre , 
                                sum(venta.TotalVenta) as TotalVenta,
                                sum(ventaproducto.Cantidad) as cantidad 
                  FROM venta
                  inner join sucursal on sucursal.IdSucursal = venta.IdSucursal
                  inner join ventaproducto on ventaproducto.IdVenta = venta.IdVenta
                  inner join producto on ventaproducto.IdProducto = producto.IdProducto
                  inner join modelo on producto.IdModelo = modelo.IdModelo                  
                  where (venta.FechaVenta <=   DATE_ADD(now(), INTERVAL 1 DAY) ) 
                  group by producto.IdProducto, sucursal.IdSucursal";

        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            //$count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array(
                'nombre_Producto' => $report['nom_prod'].' , '.$this->getTalla($report['talla']),
                'FechaVenta' => $report['FechaVenta'],
                'Sucursal' => $report['suc_nombre'],
                'Cantidad' => $report['cantidad'],
                'TotalVenta' => $report['TotalVenta']);

            $total = $total + $report['TotalVenta'];
        }
        $this->lblTotal = new QLabel($this);
        $this->lblTotal->Text = "<h4>TOTAL : $$total </h4>";
        $this->lblTotal->HtmlEntities = false;

        $this->dtgReports->DataSource = $arrayFilter2;

        $this->dtgReports->CssClass = 'table table-bordered table-striped';
        $this->dtgReports->UseAjax = true;
        $this->dtgReports->ShowFilter = FALSE;
        /* $this->dtgReports->Paginator = new QPaginator($this->dtgReports);
          $this->dtgReports->ItemsPerPage = 20; */
        $this->dtgReports->AddColumn(new QDataGridColumn('Producto', '<?= $_FORM->producto_id($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Tienda', '<?= $_FORM->tienda_id($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Cantidad', '<?= $_FORM->cantidad_id($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Total', '<?= $_FORM->monto_col($_ITEM) ?>', 'HtmlEntities=false'));

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

        $this->txtDateFrom = new QTextBox($this, 'initDate');
        $this->txtDateFrom->CssClass = "form-control";
        //$this->txtDateFrom->Placeholder="Fechan Inicio";

        $this->txtDateEnd = new QTextBox($this, 'endDate');
        $this->txtDateEnd->CssClass = "form-control";

        $today = date('Y/m/d', strtotime('today'));
        $lastMonth = date('Y/m/01', strtotime('this month'));
        $this->update_datepicker($lastMonth, $today);
        $this->add_atributes_datepicker();

    }

    protected function update_datepicker($initDate, $endDate)
    {
        QApplication::ExecuteJavaScript("$('#initDate').datepicker('update','$initDate');");
        QApplication::ExecuteJavaScript("$('#endDate').datepicker('update','$endDate');");
    }

    protected function add_atributes_datepicker()
    {
        $this->txtDateFrom->SetCustomAttribute("data-plugin", "datepicker");
        $this->txtDateFrom->SetCustomAttribute("data-date-format", "yyyy/mm/dd");

        $this->txtDateEnd->SetCustomAttribute("data-plugin", "datepicker");
        $this->txtDateEnd->SetCustomAttribute("data-date-format", "yyyy/mm/dd");
    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter)
    {

        $startDate = (new QDateTime(trim($this->txtDateFrom->Text)))->qFormat('YYYY-MM-DD');
        $endDate = (new QDateTime(trim($this->txtDateEnd->Text)))->qFormat('YYYY-MM-DD');

        $idSuc = $this->lstSucursal->SelectedValue;

        if (trim($this->lstSucursal->SelectedValue != 0)) {
            $query =" SELECT  concat(producto.Nombre,' , ',modelo.Nombre) as nom_prod , 
                                producto.Talla as talla,
                                date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta,
                                sucursal.Nombre as suc_nombre , 
                                sum(venta.TotalVenta) as TotalVenta,
                                sum(ventaproducto.Cantidad) as cantidad 
                      FROM venta
                      inner join sucursal on sucursal.IdSucursal = venta.IdSucursal
                      inner join ventaproducto on ventaproducto.IdVenta = venta.IdVenta
                      inner join producto on ventaproducto.IdProducto = producto.IdProducto
                      inner join modelo on producto.IdModelo = modelo.IdModelo  
                      where ( venta.FechaVenta <= DATE_ADD('$endDate', INTERVAL 1 DAY) and 
                              venta.FechaVenta >= '$startDate') and 
                              sucursal.IdSucursal = $idSuc 
                      group by producto.IdProducto, sucursal.IdSucursal";
        }
        else{

            $query =" SELECT  concat(producto.Nombre,' , ',modelo.Nombre) as nom_prod , 
                                producto.Talla as talla,
                                date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta, 
                                sucursal.Nombre as suc_nombre , 
                                sum(venta.TotalVenta) as TotalVenta,
                                sum(ventaproducto.Cantidad) as cantidad 
                      FROM venta
                      inner join sucursal on sucursal.IdSucursal = venta.IdSucursal
                      inner join ventaproducto on ventaproducto.IdVenta = venta.IdVenta
                      inner join producto on ventaproducto.IdProducto = producto.IdProducto
                      inner join modelo on producto.IdModelo = modelo.IdModelo 
                      where ( venta.FechaVenta <= DATE_ADD('$endDate', INTERVAL 1 DAY) and venta.FechaVenta >= '$startDate') 
                      group by producto.IdProducto, sucursal.IdSucursal";

        }
        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            //$count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array(
                'nombre_Producto' => $report['nom_prod'].' , '.$this->getTalla($report['talla']),
                'FechaVenta' => $report['FechaVenta'],
                'Sucursal' => $report['suc_nombre'],
                'Cantidad' => $report['cantidad'],
                'TotalVenta' => $report['TotalVenta']);

            $total = $total + $report['TotalVenta'];
        }

        $this->dtgReports->DataSource = $arrayFilter2;
        $this->dtgReports->Refresh();

        $this->lblTotal->Text = "<h4>TOTAL : $$total </h4>";
        $this->lblTotal->Refresh();
        //var_dump($arrayDT);return;
        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function filter_report()
    {

        $query = "SELECT  IdSucursal,EstadoVenta,IdProducto,Cantidad, IdUsuarioVenta FROM venta t1, ventaproducto t2 where t1.FechaVenta >=  CURDATE()";

        $arrayFilter2 = array();

        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $count = 0;
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            $count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array('IdSucursal' => $report['IdSucursal'],
                'EstadoVenta' => $report['EstadoVenta'],
                'IdProducto' => $report['IdProducto'],
                'Cantidad' => $report['Cantidad'],
                'IdUsuarioVenta' => $report['IdUsuarioVenta']);

            // $total = $total + $report['EstimatedRevenue'];
        }

        if ($count == 0) {
            QApplication::ExecuteJavaScript("showWarning('No results found!');");
        } else {
            QApplication::ExecuteJavaScript("showSuccess('Data loaded correctly!');");
        }


        $this->arrayFinal = array();
        $this->arrayFinal = $arrayFilter2;
    }

    public function producto_id($arrayCol)
    {
        return $arrayCol['nombre_Producto'];
    }

    public function tienda_id($arrayCol)
    {
        return $arrayCol['Sucursal'];
    }

    public function cantidad_id($arrayCol)
    {
        return $arrayCol['Cantidad'];
    }

    public function monto_col($arrayCol)
    {
        return $arrayCol['TotalVenta'];
    }

    public function user_col($arrayCol)
    {
        return $arrayCol['IdUsuarioVenta'];
    }

    public function getTalla($id)
    {
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

}

AdminVentasDiarias::Run('AdminVentasDiarias');
?>