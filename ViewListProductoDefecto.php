<?php
require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditProductoDefecto.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListProductoDefectoForm extends QForm {
    protected $user;
    protected $dtgProductodefectos;
    protected $btnNewModelo;
    protected $dlgConfirm;
    protected $dlgDialogEditModelo;
    protected $txtModelo;
    protected $btnFilter;
    protected $btnExcel;

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

        $this->dlgDialogEditModelo = new DialogEditProductoDefecto($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");

        $this->dtgProductodefectos = new ProductodefectoDataGrid($this);
        $this->dtgProductodefectos->Paginator = new QPaginator($this->dtgProductodefectos);
        $this->dtgProductodefectos->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgProductodefectos->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgProductodefectos->ItemsPerPage = 20;
        $this->dtgProductodefectos->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgProductodefectos->UseAjax = true;
        $this->dtgProductodefectos->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgProductodefectos->ShowFilter = false;
        $this->dtgProductodefectos->SortColumnIndex = 0;
        $this->dtgProductodefectos->SortDirection = true;

        $this->dtgProductodefectos->MetaAddColumn('IdProductodefecto',"Name=ID");
        $this->dtgProductodefectos->MetaAddColumn('Nombre');
        $this->dtgProductodefectos->AddColumn(new QDataGridColumn('Talla', '<?= $_FORM->actionsTalla($_ITEM); ?>', 'HtmlEntities=false'));
        $this->dtgProductodefectos->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

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
            $searchTipo = QQ::Like(QQN::Productodefecto()->Nombre, "%".trim($this->txtModelo->Text)."%");
        } else {
            $searchTipo = QQ::All();
        }

        $this->dtgProductodefectos->AdditionalConditions = QQ::AndCondition(
            $searchTipo
        );

        $this->dtgProductodefectos->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }


    public function btnNewModelo_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-plus'></i> Nuevo Producto por Defecto");
        $this->dlgDialogEditModelo->createNew();
        $this->dlgDialogEditModelo->ShowDialogBox();

    }

    public function actionsRender(Productodefecto $id) {

        $controlID = 'edit' . $id->IdProductodefecto;
        $editCtrl = $this->dtgProductodefectos->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgProductodefectos, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdProductodefecto;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdProductodefecto;
        $deleteCtrl = $this->dtgProductodefectos->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgProductodefectos, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdProductodefecto;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";

    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-edit'></i> Editar Producto Defecto");
        $this->dlgDialogEditModelo->loadDefault($strParameter);
        $this->dlgDialogEditModelo->ShowDialogBox();

    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar este Producto?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();

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

    public function actionsTalla(Productodefecto $id) {
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

    protected function delete($id) {
        try {
            $users = Productodefecto::LoadByIdProductodefecto(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }

    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgProductodefectos->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }

    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgProductodefectos->Refresh();

    }
    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Productodefecto::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListProductoDefectoForm::Run('ViewListProductoDefectoForm');
?>