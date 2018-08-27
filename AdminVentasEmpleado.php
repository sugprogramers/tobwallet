<?php
require('includes/configuration/prepend.inc.php');
require('general.php');

class AdminVentasEmpleado extends QForm
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
    protected $lstEmpleados;
    protected $txtDateFrom;
    protected $txtDateEnd;

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
        $this->dtgReports = new QDataGrid($this, 'maintable');

        $this->lstEmpleados= new QListBox($this);
        $this->lstEmpleados->CssClass = "form-control";
        $empleados = Usuario::LoadAll();
        $this->lstEmpleados->AddItem(new QListItem("--Todos los empleados--",0));
        foreach ($empleados as $value) {
            $this->lstEmpleados->AddItem(new QListItem($value->Email ,$value->IdUsuario));
        }

        $query = "SELECT  concat(usuario.Nombre,' ',usuario.Apellido,' , ', sucursal.Nombre) as nom_empleado ,
		          date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta,
		          sum(venta.TotalVenta ) as TotalVenta,
                          count(venta.IdVenta) as Cantidad
                  FROM venta
                  inner join sucursal on sucursal.IdSucursal = venta.IdSucursal
                  inner join usuario on venta.IdUsuarioVenta = usuario.IdUsuario
                  where (venta.FechaVenta <=  DATE_ADD(NOW(), INTERVAL 1 DAY)) group by usuario.IdUsuario";

        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            //$count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array(
                'nom_empleado' => $report['nom_empleado'],
                'Cantidad' => $report['Cantidad'],
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
        $this->dtgReports->AddColumn(new QDataGridColumn('Vendedor', '<?= $_FORM->user_col($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Cantidad', '<?= $_FORM->cantidad_col($_ITEM) ?>', 'HtmlEntities=false'));
        $this->dtgReports->AddColumn(new QDataGridColumn('Total', '<?= $_FORM->total_col($_ITEM) ?>', 'HtmlEntities=false'));

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

    public function actionFilter_Click($dini = null, $dfin = null)
    {


        $startDate = (new QDateTime(trim($this->txtDateFrom->Text)))->qFormat('YYYY-MM-DD');
        $endDate = (new QDateTime(trim($this->txtDateEnd->Text)))->qFormat('YYYY-MM-DD');

        $query = "SELECT  concat(usuario.Nombre,' ',usuario.Apellido,' , ', sucursal.Nombre) as nom_empleado ,
		          date_format(venta.FechaVenta,'%d/%m/%Y') as FechaVenta,
		          sum(venta.TotalVenta ) as TotalVenta,
                          count(venta.IdVenta) as Cantidad
                  FROM venta
                  inner join sucursal on sucursal.IdSucursal = venta.IdSucursal
                  inner join usuario on venta.IdUsuarioVenta = usuario.IdUsuario
                  where ( venta.FechaVenta <= DATE_ADD('$endDate', INTERVAL 1 DAY) and venta.FechaVenta >= '$startDate') 
                  group by usuario.IdUsuario";

        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $arrayDT = array();
        $total = 0.0;
        while (($report = $objDbResult->FetchAssoc())) {
            //$count++;
            $arrayDT[] = $report;
            $arrayFilter2[] = array(
                'nom_empleado' => $report['nom_empleado'],
                'Cantidad' => $report['Cantidad'],
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

    public function user_col($arrayCol)
    {
        return $arrayCol['nom_empleado'];
    }


    public function cantidad_col($arrayCol)
    {
        return $arrayCol['Cantidad'];
    }

    public function total_col($arrayCol)
    {
        return $arrayCol['TotalVenta'];
    }

}

AdminVentasEmpleado::Run('AdminVentasEmpleado');
?>