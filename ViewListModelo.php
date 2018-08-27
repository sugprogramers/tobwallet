<?php
require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditModelo.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListModeloForm extends QForm {

    protected $user;
    protected $dtgModelos;
    protected $btnNewModelo;
    protected $dlgConfirm;
    protected $dlgDialogEditModelo;
    protected $txtModelo;
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

        $this->dlgDialogEditModelo = new DialogEditModelo($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");


        $this->dtgModelos = new ModeloDataGrid($this);
        $this->dtgModelos->Paginator = new QPaginator($this->dtgModelos);
        $this->dtgModelos->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgModelos->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgModelos->ItemsPerPage = 20;
        $this->dtgModelos->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgModelos->UseAjax = true;
        $this->dtgModelos->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgModelos->ShowFilter = false;
        $this->dtgModelos->SortColumnIndex = 0;
        $this->dtgModelos->SortDirection = true;

        $this->dtgModelos->MetaAddColumn('IdModelo',"Name=ID");
        $this->dtgModelos->MetaAddColumn('Nombre');
        $this->dtgModelos->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

        $this->btnNewModelo = new QButton($this);
        $this->btnNewModelo->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewModelo->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewModelo->HtmlEntities = false;
        $this->btnNewModelo->AddAction(new QClickEvent(), new QAjaxAction('btnNewModelo_Click'));

        $this->txtModelo = new QTextBox($this);
        $this->txtModelo->Placeholder = "Nombre";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtModelo->Text != "")) {
            $searchTipo = QQ::Like(QQN::Modelo()->Nombre, "%".trim($this->txtModelo->Text)."%");
        } else {
            $searchTipo = QQ::All();
        }

        $this->dtgModelos->AdditionalConditions = QQ::AndCondition(
            $searchTipo
        );

        $this->dtgModelos->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }


    public function btnNewModelo_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-plus'></i> Nuevo Colegio");
        $this->dlgDialogEditModelo->createNew();
        $this->dlgDialogEditModelo->ShowDialogBox();

    }


    public function actionsRender(Modelo $id) {

        $controlID = 'edit' . $id->IdModelo;
        $editCtrl = $this->dtgModelos->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgModelos, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdModelo;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdModelo;
        $deleteCtrl = $this->dtgModelos->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgModelos, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdModelo;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";

    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-edit'></i> Edit Colegio");
        $this->dlgDialogEditModelo->loadDefault($strParameter);
        $this->dlgDialogEditModelo->ShowDialogBox();

    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar este Modelo?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();

    }

    protected function delete($id) {
        try {
            $users = Modelo::LoadByIdModelo(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }

    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgModelos->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }

    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgModelos->Refresh();

    }
    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Modelo::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListModeloForm::Run('ViewListModeloForm');
?>