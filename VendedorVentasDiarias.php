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

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = Usuario::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
    }

    protected function Form_Create()
    {
        $this->objDefaultWaitIcon = new QWaitIcon($this);
        $this->dtgReports = new QDataGrid($this, 'maintable');

        $this->txtDateFrom = new QTextBox($this, 'initDate');
        $this->txtDateFrom->CssClass = "form-control";
        //$this->txtDateFrom->Placeholder="Fechan Inicio";

        $this->txtDateEnd = new QTextBox($this, 'endDate');
        $this->txtDateEnd->CssClass = "form-control";

        $this->lstSucursal = new QListBox($this);
        $this->lstSucursal->CssClass = "form-control";
        $sucursales = Sucursal::LoadAll();
        $this->lstSucursal->AddItem(new QListItem("--Todas las sedes--",0));
        foreach ($sucursales as $value) {
            $this->lstSucursal->AddItem(new QListItem($value->Nombre,$value->IdSucursal));
        }
        $user_id = $this->user->IdUsuario;

        $query = "SELECT  date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta,
                        sucursal.Nombre as suc_nombre, 
                        sum(venta.TotalVenta ) as TotalVenta,
                         count(venta.IdVenta) as cantidad
                FROM venta  
                inner join sucursal on sucursal.IdSucursal = venta.IdSucursal 
                left join usuario on venta.IdUsuarioVenta = usuario.IdUsuario 
                where (venta.FechaVenta >=  now() and venta.FechaVenta <=  DATE_ADD(NOW(), INTERVAL 1 DAY) 
                        and usuario.IdUsuario = $user_id) 
                group by YEAR (venta.FechaVenta),MONTH (venta.FechaVenta),DAY (venta.FechaVenta)";

        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            //$count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array(
                'cantidad'=>$report['cantidad'],
                'FechaVenta' => $report['FechaVenta'],
                'IdSucursal' => $report['suc_nombre'],
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
        $this->dtgReports->AddColumn(new QDataGridColumn('Fecha', '<?= $_FORM->FechaVenta($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Tienda', '<?= $_FORM->tienda_id($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Cantidad', '<?= $_FORM->Cantidad_venta($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Monto Total', '<?= $_FORM->monto_col($_ITEM) ?>', 'HtmlEntities=false'));

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

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


    public function actionFilter_Click($dini = null, $dfin = null)
    {


        $startDate = (new QDateTime(trim($this->txtDateFrom->Text)))->qFormat('YYYY-MM-DD');
        $endDate = (new QDateTime(trim($this->txtDateEnd->Text)))->qFormat('YYYY-MM-DD');

        //$idSuc = $this->user->IdSucursal;
        $user_id = $this->user->IdUsuario;
        $query ="SELECT  date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta, 
                          sucursal.Nombre as suc_nombre, 
                          sum(venta.TotalVenta ) as TotalVenta,
                           count(venta.IdVenta) as cantidad
                    FROM venta 
                    inner join sucursal on sucursal.IdSucursal = venta.IdSucursal 
                    left join usuario on venta.IdUsuarioVenta = usuario.IdUsuario 
                      where ( venta.FechaVenta <= DATE_ADD('$endDate', INTERVAL 1 DAY) 
                              and venta.FechaVenta >= '$startDate'
                              and usuario.IdUsuario = $user_id) 
                    group by YEAR (venta.FechaVenta),MONTH (venta.FechaVenta),DAY (venta.FechaVenta)";
        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            //$count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array(
                'cantidad'=>$report['cantidad'],
                'FechaVenta' => $report['FechaVenta'],
                'IdSucursal' => $report['suc_nombre'],
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

    protected function add_atributes_datepicker()
    {
        $this->txtDateFrom->SetCustomAttribute("data-plugin", "datepicker");
        $this->txtDateFrom->SetCustomAttribute("data-date-format", "yyyy/mm/dd");

        $this->txtDateEnd->SetCustomAttribute("data-plugin", "datepicker");
        $this->txtDateEnd->SetCustomAttribute("data-date-format", "yyyy/mm/dd");
    }

    public function FechaVenta($arrayCol)
    {
        return $arrayCol['FechaVenta'];
    }

    public function tienda_id($arrayCol)
    {
        return $arrayCol['IdSucursal'];
    }

    public function monto_col($arrayCol)
    {
        return $arrayCol['TotalVenta'];
    }
    public function Codigo_venta($arrayCol)
    {
        return $arrayCol['IdVenta'];
    }
    public function Cantidad_venta($arrayCol)
    {
        return $arrayCol['cantidad'];
    }

}

AdminVentasDiarias::Run('AdminVentasDiarias');
?>