<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditMateriaPrima.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListMateriaPrimaForm extends QForm {

    protected $user;
    protected $dtgMateriaprimas;
    protected $btnNewMateriaprima;
    protected $dlgConfirm;
    protected $dlgDialogEditMateriaPrima;
    protected $btnExcel;
    protected $txtNombreMateria;
    protected $btnFilter;

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

        $this->dlgDialogEditMateriaPrima = new DialogEditMateriaPrima($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");


        $this->dtgMateriaprimas = new MateriaprimaDataGrid($this);
        $this->dtgMateriaprimas->Paginator = new QPaginator($this->dtgMateriaprimas);
        $this->dtgMateriaprimas->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgMateriaprimas->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgMateriaprimas->ItemsPerPage = 20;
        $this->dtgMateriaprimas->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgMateriaprimas->UseAjax = true;
        $this->dtgMateriaprimas->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgMateriaprimas->ShowFilter = false;
        $this->dtgMateriaprimas->SortColumnIndex = 0;
        $this->dtgMateriaprimas->SortDirection = true;

        //falta la fecha de compra de la materia prima
        //$this->dtgMateriaprimas->MetaAddColumn('IdMateriaPrima');
        //$this->dtgMateriaprimas->MetaAddColumn('Codigo');
        $this->dtgMateriaprimas->MetaAddColumn('Nombre');
        //$this->dtgMateriaprimas->MetaAddColumn('Descripcion');
        $this->dtgMateriaprimas->MetaAddColumn('CantidadStock',"Name=Stock");
        
        $this->dtgMateriaprimas->MetaAddColumn('CostoUnitario');
        $this->dtgMateriaprimas->MetaAddColumn('UnidadMedida',"Name=UM");
        $this->dtgMateriaprimas->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

        $this->btnNewMateriaprima = new QButton($this);
        $this->btnNewMateriaprima->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewMateriaprima->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewMateriaprima->HtmlEntities = false;
        $this->btnNewMateriaprima->AddAction(new QClickEvent(), new QAjaxAction('btnNewMateriaprima_Click'));
        
        
        $this->btnExcel = new QButton($this);
        $this->btnExcel->Text = '<i class="icon fa-file-excel-o" aria-hidden="true"></i>';
        $this->btnExcel->CssClass = "site-action-toggle btn-raised btn btn-success btn-floating";
        $this->btnExcel->HtmlEntities = false;
        $this->btnExcel->AddAction(new QClickEvent(), new QAjaxAction('btnExcel_Click'));

        $this->txtNombreMateria = new QTextBox($this);
        $this->txtNombreMateria->Placeholder = "Nombre";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
        
        
    }
    
      public function btnExcel_Click($strFormId, $strControlId, $strParameter) {

        QApplication::ExecuteJavaScript("showSuccess('Usted necesita configurar esto antes!');");
          
      }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtNombreMateria->Text != "")) {
            $searchTipo = QQ::Like(QQN::Materiaprima()->Nombre, "%".trim($this->txtNombreMateria->Text)."%");
        }
        else {
            $searchTipo = QQ::All();
        }

        $this->dtgMateriaprimas->AdditionalConditions = QQ::AndCondition(
            $searchTipo
        );

        $this->dtgMateriaprimas->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function btnNewMateriaprima_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogEditMateriaPrima->Title = addslashes("<i class='icon wb-plus'></i> Nueva Material");
        $this->dlgDialogEditMateriaPrima->createNew();
        $this->dlgDialogEditMateriaPrima->ShowDialogBox();
    }


    public function actionsRender(Materiaprima $id) {

        $controlID = 'edit' . $id->IdMateriaPrima;
        $editCtrl = $this->dtgMateriaprimas->GetChildControl($controlID);
        if (!$editCtrl) {
                $editCtrl = new QLabel($this->dtgMateriaprimas, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdMateriaPrima;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdMateriaPrima;
        $deleteCtrl = $this->dtgMateriaprimas->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgMateriaprimas, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdMateriaPrima;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditMateriaPrima->Title = addslashes("<i class='icon wb-edit'></i> Edit Material");
        $this->dlgDialogEditMateriaPrima->loadDefault($strParameter);
        $this->dlgDialogEditMateriaPrima->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar este Material?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();

    }

    protected function delete($id) {
        try {
            $users = Materiaprima::LoadByIdMateriaPrima(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }

    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgMateriaprimas->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }

    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgMateriaprimas->Refresh();

    }
    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Materiaprima::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListMateriaPrimaForm::Run('ViewListMateriaPrimaForm');
?>