<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditConfeccion.php');
require_once('dialog/DialogUseMateriaPrima.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListConfeccionForm extends QForm {

    protected $user;
    public $dtgConfeccionproductos;
    protected $btnNewConfeccion;
    protected $dlgConfirm;
    protected $dlgDialogEdiConfecciones;
    protected $dlgDialogUseMateriaPrima;
    protected $txtConfeccion;
    protected $btnFilter;
    protected $txtDateFrom;
    protected $txtDateTo;


    protected function Form_Run() {
        $this->items_Found();
    }

    protected function Form_Create() {

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dlgDialogEdiConfecciones = new DialogEditConfeccion($this, 'close_edit');
        $this->dlgDialogUseMateriaPrima = new DialogUseMateriaPrima($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");


        $this->dtgConfeccionproductos = new ConfeccionproductoDataGrid($this);
        $this->dtgConfeccionproductos->Paginator = new QPaginator($this->dtgConfeccionproductos);
        $this->dtgConfeccionproductos->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgConfeccionproductos->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgConfeccionproductos->ItemsPerPage = 20;
        $this->dtgConfeccionproductos->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgConfeccionproductos->UseAjax = true;
        $this->dtgConfeccionproductos->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgConfeccionproductos->ShowFilter = false;
        $this->dtgConfeccionproductos->SortColumnIndex = 0;
        $this->dtgConfeccionproductos->SortDirection = true;

        $this->dtgConfeccionproductos->MetaAddColumn(QQN::Confeccionproducto()->IdProductoObject->Nombre,"Name=Producto");
        $this->dtgConfeccionproductos->MetaAddColumn('CantidadStock');
        //$this->dtgConfeccionproductos->MetaAddColumn('EstadoConfeccion');
        $this->dtgConfeccionproductos->AddColumn(new QDataGridColumn('Estado', '<?= $_FORM->actionsEstado($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        $this->dtgConfeccionproductos->AddColumn(new QDataGridColumn('Materia<br>Prima', '<?= $_FORM->renderMateriaPrima($_ITEM); ?>', 'HtmlEntities=false'));

        $this->dtgConfeccionproductos->MetaAddColumn('FechaConfeccion');
        $this->dtgConfeccionproductos->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=150'));




        $this->btnNewConfeccion = new QButton($this);
        $this->btnNewConfeccion->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewConfeccion->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewConfeccion->HtmlEntities = false;
        $this->btnNewConfeccion->AddAction(new QClickEvent(), new QAjaxAction('btnNewConfeccion_Click'));

        $this->txtConfeccion = new QTextBox($this);
        $this->txtConfeccion->Placeholder = "Nombre";

        $this->txtDateFrom = new QTextBox($this, 'initDate');
        $this->txtDateFrom->CssClass = "form-control";
        $this->txtDateFrom->Placeholder = "Fecha Inicio";

        $this->txtDateTo = new QTextBox($this, 'endDate');
        $this->txtDateTo->CssClass = "form-control";
        $this->txtDateTo->Placeholder = "Fecha Final";
        $this->add_atributes_datepicker();
        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        $dateInit = new QDateTime(trim($this->txtDateFrom->Text));
        $dateFin = new QDateTime(trim($this->txtDateTo->Text));

        $searchTipo = QQ::AndCondition(
            QQ::GreaterOrEqual(QQN::Confeccionproducto()->FechaConfeccion, $dateInit),
            QQ::LessOrEqual(QQN::Confeccionproducto()->FechaConfeccion, $dateFin)
        );
        if (trim($this->txtConfeccion->Text != "")) {
            $searchTipo = QQ::Like(QQN::Confeccionproducto()->Nombre, "%".trim($this->txtConfeccion->Text)."%");
        } else {
            $searchTipo = QQ::All();
        }

        $this->dtgConfeccionproductos->AdditionalConditions = QQ::AndCondition(
            $searchTipo
        );

        $this->dtgConfeccionproductos->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    protected function add_atributes_datepicker() {
        $this->txtDateTo->SetCustomAttribute("data-plugin", "datepicker");
        $this->txtDateTo->SetCustomAttribute("data-date-format", "yyyy/mm/dd");
        $this->txtDateFrom->SetCustomAttribute("data-plugin", "datepicker");
        $this->txtDateFrom->SetCustomAttribute("data-date-format", "yyyy/mm/dd");
    }

    protected function default_datepicker() {
        $today = date('Y/m/d', strtotime('today'));
        $yesterday = date('Y/01/01', strtotime('today -365 day'));
        QApplication::ExecuteJavaScript("$('#initDate').datepicker('update','$yesterday');");
        QApplication::ExecuteJavaScript("$('#endDate').datepicker('update','$today');");
    }


    public function btnNewConfeccion_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogEdiConfecciones->Title = addslashes("<i class='icon wb-plus'></i> Nueva Confeccion");
        $this->dlgDialogEdiConfecciones->createNew();
        $this->dlgDialogEdiConfecciones->ShowDialogBox();

    }

    public function actionsEstado(Confeccionproducto $id) {

        if (!$id->EstadoConfeccion) {
            return '<div class="label label-table label-round label-dark">Procesando</div>';
        }
        else {
            return '<div class="label label-table label-round label-success">Finalizado</div>';
        }

    }

    public function renderMateriaPrima(Confeccionproducto $obj) {
        $controlID = 'view' . $obj->IdConfeccionProducto;
        $val = Materiaprimausada::CountByIdConfeccionProducto($obj->IdConfeccionProducto);
        $editCtrl = $this->dtgConfeccionproductos->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgConfeccionproductos, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;

            $editCtrl->ActionParameter = $obj->IdConfeccionProducto;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('btnview_Count'));
        }

        $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ver">
                           <div class="label label-outline label-info">' . $val . '</div>
                          </div>';

        return $editCtrl->Render(false);
    }

    public function btnview_Count($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogUseMateriaPrima->Title = addslashes("<i class='icon wb-edit'></i> Materia Prima");
        $this->dlgDialogUseMateriaPrima->loadDefault($strParameter, $this->dtgConfeccionproductos);
        $this->dlgDialogUseMateriaPrima->ShowDialogBox();

    }




    public function actionsRender(Confeccionproducto $id) {


        $controlID3 = 'stat' . $id->IdConfeccionProducto;
        $conCtrl = $this->dtgConfeccionproductos->GetChildControl($controlID3);
        if (!$conCtrl) {
            $conCtrl = new QLabel($this->dtgConfeccionproductos, $controlID3);
            $conCtrl->HtmlEntities = FALSE;
            $conCtrl->Cursor = QCursor::Pointer;
            $conCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Finalizar">
                            <i class="icon wb-check" aria-hidden="true"></i>
                          </div>';
            $conCtrl->ActionParameter = $id->IdConfeccionProducto;
            $conCtrl->AddAction(new QClickEvent(), new QAjaxAction('status_Click'));
        }

        $controlID = 'edit' . $id->IdConfeccionProducto;
        $editCtrl = $this->dtgConfeccionproductos->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgConfeccionproductos, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdConfeccionProducto;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdConfeccionProducto;
        $deleteCtrl = $this->dtgConfeccionproductos->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgConfeccionproductos, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdConfeccionProducto;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>".$conCtrl->Render(false).' ' . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";

    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $obj = Confeccionproducto::LoadByIdConfeccionProducto(intval($strParameter));
        if($obj->EstadoConfeccion){
            QApplication::ExecuteJavaScript("showWarning('Ya no puedes editar');");
            return;
        }


        $this->dlgDialogEdiConfecciones->Title = addslashes("<i class='icon wb-edit'></i> Edit Confeccion");
        $this->dlgDialogEdiConfecciones->loadDefault($strParameter);
        $this->dlgDialogEdiConfecciones->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar esta Confeccion?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }

    public function status_Click($strFormId, $strControlId, $strParameter) {
        $obj = Confeccionproducto::LoadByIdConfeccionProducto(intval($strParameter));
        if($obj->EstadoConfeccion){
            QApplication::ExecuteJavaScript("showWarning('Ya no puedes editar');");
            return;
        }



        $validate = false;
        $all = Materiaprimausada::LoadArrayByIdConfeccionProducto($strParameter);
        foreach ($all as $value) {
            if(!( $value->IdMateriaPrimaObject->CantidadStock >= $value->Cantidad ))
            {
                $validate = true;break;
            }
        }

        if($validate == false){
            $con = Confeccionproducto::LoadByIdConfeccionProducto(intval($strParameter));
            $con->EstadoConfeccion = true ;
            $con->Save();

            $con->IdProductoObject->CantidadStock =  $con->IdProductoObject->CantidadStock + $con->CantidadStock;
            $con->IdProductoObject->Save();

            $all = Materiaprimausada::LoadArrayByIdConfeccionProducto($strParameter);
            foreach ($all as $value) {
                $value->IdMateriaPrimaObject->CantidadStock = $value->IdMateriaPrimaObject->CantidadStock - $value->Cantidad ;
                $value->IdMateriaPrimaObject->Save();
            }
            $this->dtgConfeccionproductos->Refresh();

            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        }
        else{
            QApplication::ExecuteJavaScript("showWarning('Error Los stock no coinciden');");
        }

    }



    protected function delete($id) {
        $obj = Confeccionproducto::LoadByIdConfeccionProducto(intval($id));
        if($obj->EstadoConfeccion){
            QApplication::ExecuteJavaScript("showWarning('Ya no puedes editar');");
            return;
        }



        try {
            $users = Confeccionproducto::LoadByIdConfeccionProducto(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }

    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgConfeccionproductos->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }

    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgConfeccionproductos->Refresh();

    }
    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Confeccionproducto::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListConfeccionForm::Run('ViewListConfeccionForm');
?>